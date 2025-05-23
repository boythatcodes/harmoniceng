<?php

use App\Models\Project;
use App\Models\Service;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use App\Mail\MailableContact;
use App\Models\Popup;

function header_projects(){
    $projects = Project::where(function($query) {
        $query->where('type_of_service', 'LIKE', '%building%')
              ->orWhere('type_of_service', 'LIKE', '%bridge%');
    })
    ->where('is_visible', true)
    ->get();

    return [
        'building' => $projects->filter(fn($project) => str_contains($project->type_of_service, 'building'))->take(5),
        'bridge' => $projects->filter(fn($project) => str_contains($project->type_of_service, 'bridge'))->take(5),
    ];
}

Route::get('/', function () {
    $popup = Popup::find( 1);
    $url = "";
    $type = "youtube";
    $enabled = false;

    if(!empty($popup) && $popup->enabled){

        if($popup->type == "image") {
            $type = "image";
            $url = "/data/popup/". $popup->url;
        }else {
            $url = $popup->url;
        }

        $enabled = $popup->enabled;
    }
    return view('welcome', compact("url", "type", "enabled"));
});

Route::get('/download', function (Request $request) {
    $s = $request->s;
    $files = [];

    $columns = ['title', 'description', 'client', 'submission_date', 'type_of_service', 'location'];
    $download_query = Project::with("files")->where("is_visible", 1);
    if(!empty($s)){
        $download_query->where(function ($query) use ($s, $columns) {
            foreach ($columns as $column) {
                $query->orWhere($column, 'LIKE', '%' . $s . '%');
            }
        });
    }
    $download_data = $download_query->get();

    foreach ($download_data as $key => $value) {
        if(!empty($value->public_image)){
            array_push($files, [
                "title" => $value->Title,
                "file_name" => $value->public_image,
                "soil_test" => $value->soil_test,
                "client" => $value->client,
                "submission_date"=> $value->submission_date,
                "type_of_service" => $value->type_of_service,
                "location" => $value->location,
                "status" => $value->status,
                "status" => "free",
                "link" => "/data/public_path/".$value->public_image,
            ]);
        }

        foreach ($value->files as $key => $file) {
            array_push($files, [
                "title" => $file->original_name,
                "file_name" => $value->original_name,
                "soil_test" => $value->soil_test,
                "client" => $value->client,
                "submission_date"=> $value->submission_date,
                "type_of_service" => $value->type_of_service,
                "location" => $value->location,
                "status" => $value->status,
                "status" => "paid",
                "link" => "/contact/",
            ]);
        }
        
    }
    return view('download', compact("files"));
});

Route::get('/about', function () {
    return view("about");
});

Route::get('/leadership', function(){
    $users = User::where("image_visible", true)->get();
    return view("leadership", compact("users"));
});

Route::get('/contact', function(){
    return view("contact");
});


Route::get('/public_service/q/{type_of_service}', function(Request $request, $type_of_service){
    if($type_of_service == "all"){
        $categories = [
            [
                "title" => "Office Work",
                "info" => "Info Related To office work is found in this section.",
                "url" => "/public_service/q/office_work"
            ],
            [
                "title" => "Field Work",
                "info" => "Info Related To field work is found in this section.",
                "url" => "/public_service/q/field_work"
            ],
            [
                "title" => "Research",
                "info" => "Info Related To research work is found in this section.",
                "url" => "/public_service/q/research"
            ],
    ];
        return view("services_category", compact("categories"));
    }
    $sub = $request->sub;
    $unique_tags = Service::where("category", "=", $type_of_service)->select("sub_category")->distinct()->pluck("sub_category");
    $services_data = Service::where('category', '=', $type_of_service);
    if(!empty($sub)) {
        $services_data->where("sub_category", "=", $sub);
    }
    $services_data = $services_data->get();

    if( count($services_data) == 1 ){
        return redirect("/public_service/".$services_data[0]->id);
    }
    
    $projects_data= [];
    foreach ($services_data as $key => $value) {
        $append_new = new stdClass();
        $append_new->id = $value->id;
        $append_new->Title = $value->type;
        $append_new->public_image = $value->image;
        $append_new->submission_date = explode("-", $value->updated_at)[0];
        $append_new->type_of_service = $value->category;
        $append_new->sub_category = $value->sub_category;
        array_push($projects_data, $append_new);
    }
    $show_details = false;
    $url_thing = "public_service";
    $tags = ["All", "Office Work", "Field Wrok", "Research"];
    // if(empty($projects_data) || empty($projects_data->id)) {
    //     return redirect("/");
    // }
    $type_of_public = "image";
    return view("all_services", compact("projects_data", "show_details", "url_thing", "tags", "unique_tags", "type_of_service", "sub", "type_of_public"));
});

Route::get('/public_service/{id}', function($id){
    $projectsMap = header_projects();
    $service_data = Service::find($id);
    if(empty($service_data) || empty($service_data->id)) {
        return redirect("/");
    }
    $project_data = new stdClass();
    $project_data->id = $service_data->id;
    $project_data->Title = $service_data->type;
    $project_data->description = $service_data->content;
    $project_data->public_image = $service_data->image;
    $project_data->submission_date = explode("-", $service_data->updated_at)[0];
    $project_data->type_of_service = $service_data->category;
    $url_thing = "public_service";
    $team_members = $service_data->users;
    $display_team_members = !$team_members->isEmpty();
    return view("public_projects", compact("project_data", "url_thing", "team_members", "display_team_members"));
});


Route::get('/public_project/q/{type_of_service}', function($type_of_service){
    $projects_data = Project::where("is_visible", true);
    if($type_of_service != "all"){
        $projects_data->where('status', 'LIKE', '%'. $type_of_service . '%');
    }
    $projects_data = $projects_data->get();
    // if(empty($projects_data) || empty($projects_data->id)) {
    //     return redirect("/");
    // }
    $tags = ["All", "Completed", "Ongoing", "Research"];
    $show_details = false;
    $url_thing = "public_project";
    $type_of_public = "";
    return view("all_services", compact("projects_data", "show_details", "url_thing", "tags", "type_of_service", "type_of_public"));
});

Route::get('/public_project/{id}', function($id){
    $projectsMap = header_projects();
    $project_data = Project::where("is_visible", true)->find($id);
    if(empty($project_data) || empty($project_data->id)) {
        return redirect("/");
    }
    $url_thing = "public_project";
    $display_team_members = false;
    return view("public_projects", compact("project_data", "url_thing", "display_team_members"));
});


Route::post('/contact_us', function(Request $request){
    DB::table("contactus")->insert([
        "name" => $request->name,
        "email" => $request->email,
        "company_name" => empty($request->company_name)? " ": $request->company_name,
        "phone_number" => $request->phone_number,
        "info_related" => join(" ,", $request->info_related),
        "description" => $request->description,
    ]);
    return redirect("/contact");
});


Route::get('/send-test-mail', function () {
    Mail::to('harmonic@harmoniceng.com')->send(new MailableContact());
    return 'Test mail sent!';
});

Auth::routes(["register"=>false]);

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
    Route::post('/users', [App\Http\Controllers\HomeController::class, 'new_user'])->name('post_users');

    Route::get("/projects", [App\Http\Controllers\HomeController::class, 'all_projects'])->name('all_projects');
    Route::get("/project/{id}", [App\Http\Controllers\HomeController::class, 'project'])->name('single_project');
    Route::post("/project/{id}", [App\Http\Controllers\HomeController::class, 'new_project'])->name('single_project_post');
    Route::post('/project/{project_id}/upload', [App\Http\Controllers\HomeController::class, 'new_store']);
    Route::post('/project/{project_id}/delete', [App\Http\Controllers\HomeController::class, 'delete_file']);
    Route::post("/project/{project_id}/{file}/list", [App\Http\Controllers\HomeController::class, 'download_private_file'])->name('file_details_to_download');
    

    Route::post("/delete/service", [App\Http\Controllers\HomeController::class, 'delete_services'])->name('delete_services');
    Route::get("/services", [App\Http\Controllers\HomeController::class, 'all_services'])->name('all_services');
    Route::get("/service/{id}", [App\Http\Controllers\HomeController::class, 'service'])->name('single_service');
    Route::post("/service/{id}", [App\Http\Controllers\HomeController::class, 'new_service'])->name('single_service_post');


    Route::post('/delete_user', [App\Http\Controllers\HomeController::class, 'delete_user'])->name('delete_user');
    Route::get('/no-access', [App\Http\Controllers\HomeController::class, 'no_access'])->name('no_access');

    Route::get('/popup', [App\Http\Controllers\HomeController::class, 'popup'])->name('popup');
    Route::get('/updated_popup/{update}', [App\Http\Controllers\HomeController::class, 'updated_popup'])->name('updated_popup');
    Route::post('/popup', [App\Http\Controllers\HomeController::class, 'other_update_popup'])->name('other_update_popup');


    Route::get('/inqueries', [App\Http\Controllers\HomeController::class, 'inqueries'])->name('inqueries');
    Route::post('/mark_as_read_inquery', [App\Http\Controllers\HomeController::class, 'mark_as_read_inquery'])->name('mark_as_read_inquery');

});


