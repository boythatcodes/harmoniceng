<?php

namespace App\Http\Controllers;

// use App\Models\Project;

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        $user_count = User::all()->count();
        $project_count = Project::all()->count();
        $inqueries_count = Db::table("contactus")->get()->count();
        $header_info = "dashboard";
        $active = "Overview";
        $button = ["Refresh", "refresh"];
        return view('home', compact("user", "active", "header_info", "button", "user_count", "project_count", "inqueries_count"));
    }

    public function all_projects()
    {
        $user = Auth::user();
        $header_info = "projects";
        $active = "All Projects";
        $button = ["Create Project", "create_project"];
        $all_projects = Project::with("User")->orderBy("id", 'desc')->get();
        return view('projects', compact("user", "active", "all_projects", "header_info", "button"));
    }

    public function no_access(){
        $user = Auth::user();
        $header_info = "Cannot View Users";
        $active = "You don't have admin previlages.";
        $button = ["Go to Dashboard", "go_to_dashboard"];
        return view('notfound', compact("user", "active", "header_info", "button"));

    }

    public function delete_services(Request $request)
    {
        Service::where("id", $request->id)->delete();
        return redirect("/services");
    }


    public function all_services()
    {
        $header_info = "services";
        $active = "All Services";
        $button = ["Create Service", "create_service"];
        $all_projects = Service::orderBy("id", 'desc')->get();
        return view('services', compact("active", "all_projects", "header_info", "button"));
    }


    public function service(Request $request, $id = "0")
    {
        $user = Auth::user();
        $viewable_users = User::where("image_visible", "=",true)->select("id", "name", "email", "is_admin")->get();
        $project_count = 0;
        $header_info = "services";
        $active = "Create Service";
        $button = ["Go Back", "go_back"];
        $associated_users_id = [];
        $project = new Service();
        if ($id != "0") {
            $active = "Edit Service";
            $project = Service::find($id);
            $associated_users_id = $project->users()->pluck('users.id');
            if(!$project){
                return redirect("/service/0");
            }
        }
        return view('new_service', compact("user", "active", "project", "header_info",  "button", "viewable_users", "associated_users_id"));
    }



    public function new_service(Request $request, $id = "0")
    {
        if(empty($request->file_name)){
            return redirect("/service/".$id);
        }

        $file_name = $request->file_name;
        

        if ($request->file != null) {
            $file = $request->file('file');
            $file_name = rand() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('data'), $file_name);
        }


        if ($id == "0") {
            $service = Service::create([
                "type" => $request->title_service,
                "sub_category" => strtolower( $request->sub_category),
                "content" => $request->desc,
                "image" => $file_name,
                "category" => $request->category,
            ]);

            if(!empty($request->user_id)) {
                $service->users()->attach($request->user_id);
            }
        } else {
            $update_data = [
                "type" => $request->title_service,
                "sub_category" => strtolower($request->sub_category),
                "content" => $request->desc,
                "image" => $file_name,
                "category" => $request->category,
            ];

            Service::where("id", $id)->update($update_data);

            $service = Service::findOrFail($id);

            if(!empty($request->user_id)) {
                $service->users()->sync($request->user_id);
            }
        }
        return redirect("/service/".$id);

    }


    public function project(Request $request, $id = "0")
    {
        $user = Auth::user();
        $project_count = 0;
        $header_info = "projects";
        $active = "Create Project";
        $button = ["Go Back", "go_back"];
        $project = new Project();
        if ($id != "0") {
            $active = "Edit Project";
            $project = Project::find($id);
            if(!$project){
                return redirect("/project/0");
            }
        }
        return view('new_project', compact("user", "active", "project", "header_info",  "button"));
    }


    public function new_project(Request $request, $id = "0")
    {
        if(empty($request->file_name)){
            return redirect("/project/".$id);
        }
        $file_name = $request->file_name;
        $mimeType = $request->mime_type;
        $file_path = $request->file_path;
        
        $pub_file_path = "";

        if ($request->file != null) {
            $file = $request->file('file');
            $mimeType = $file->getClientMimeType();
            $file_name = $file->getClientOriginalName();
            $file_path = rand() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('data'), $file_path);
        }

        if($request->public_image != null){
            $pub_file = $request->file('public_image');
            $pub_file_path = rand() . "." . $pub_file->getClientOriginalExtension();
            $pub_file->move(public_path('data'), $pub_file_path);
        }



        $user = Auth::user();
        if ($id == "0") {
            Project::create([
                "title" => $request->title,
                "is_visible" => $request->is_visible == "public",
                "description" => $request->desc,
                "language" => $request->language,
                "file_path" => $file_path,
                "file_name" => $file_name,
                "mime_type" => $mimeType,
                "public_image"=> $pub_file_path != ""? $pub_file_path:"",
                "client" => $request->client,
                "submission_date" => $request->submission_date,
                "soil_test" => $request->soil_test == "yes",
                "user_id" => $user->id,
                "type_of_service" =>$request->type_of_service,
                "status" => $request->status,
                "location" => $request->location
            ]);
        } else {
            $update_data = [
                "title" => $request->title,
                "is_visible" => $request->is_visible == "public",
                "description" => $request->desc,
                "language" => $request->language,
                "file_path" => $file_path,
                "file_name" => $file_name,
                "mime_type" => $mimeType,
                "client" => $request->client,
                "submission_date" => $request->submission_date,
                "soil_test" => $request->soil_test == "yes",
                "user_id" => $user->id,
                "status" => $request->status,
                "type_of_service" =>$request->type_of_service,
                "location" => $request->location
            ];

            if($pub_file_path != ""){
                $update_data["public_image"]= $pub_file_path;
            }

            Project::where("id", $id)->update($update_data);
        }
        return redirect("/projects");
    }

    public function users(Request $request)
    {
        $user = Auth::user();
        if (!($user->is_admin)) {
            return redirect("/no-access");
        }
        $all_users = User::orderBy("id", 'desc')->get();
        $project_count = 0;
        $header_info = "users";
        $active = "Current Users";
        $button = ["Add User", "add_user"];
        return view('user', compact("user", "all_users", "active", "header_info", "button"));
    }

    public function delete_user(Request $request)
    {
        if (!(Auth::user()->is_admin)) {
            return redirect("/no-access");
        }
        User::where("id", $request->id)->delete();
        return redirect("/users");
    }

    public function new_user(Request $request)
    {
        if (!(Auth::user()->is_admin)) {
            return redirect("/no-access");
        }


        $user_info = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "is_admin" => $request->type_of_user == "admin",
            "description" => $request->description,
            "position" => $request->position,
            "expertise" => $request->expertise,
            "since" => $request->since,
            "image_visible" => $request->is_visible == "yes",
        ]);

        if ($request->public_image != null) {
            $file = $request->file('public_image');
            $file_path = $user_info->id . ".jpg";
            $file->move(public_path('data') . "/users/", $file_path);
        }

        return redirect("/users");
    }

    public function inqueries(Request $request)
    {
        $user = Auth::user();
        if (!($user->is_admin)) {
            return redirect("/no-access");
        }
        $header_info = "Contact";
        $active = "Unmarked Inqueries";
        $button = ["View Marked Only", "view_marked"];

        $all_inqueries = DB::table("contactus")->where("is_read", "=", $request->read == 1)->orderBy("id", 'desc')->get();

        $count_of_total = DB::table("contactus")->count();
        if(!empty($request->read)) {
            $active = "Marked Inqueries";
            $button = ["View Unmarked", "view_unmarked"];
            $count_of_read = count($all_inqueries);
        }else {
            $count_of_read = DB::table("contactus")->where("is_read", "=", true)->count();
        }

        $conversionRate = ($count_of_read / $count_of_total) * 100;

        return view('inqueries', compact("user", "all_inqueries", "active", "header_info", "button", "conversionRate", "count_of_total", "count_of_read"));
    }

    public function mark_as_read_inquery(Request $request)
    {
        if (!(Auth::user()->is_admin)) {
            return redirect("/no-access");
        }
        DB::table("contactus")->where("id", $request->id)->update(["is_read" => $request->forward == "1"]);
        return redirect("/inqueries?read=".$request->forward);
    }
}
