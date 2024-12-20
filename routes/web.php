<?php

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


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
    $projectsMap = header_projects();
    return view('welcome', compact("projectsMap"));
});

Route::get('/download', function (Request $request) {
    $projectsMap = header_projects();
    $s = $request->s;
    $files = [];

    $columns = ['title', 'description', 'file_name', 'client', 'submission_date', 'type_of_service', 'location'];
    $download_query = Project::where("is_visible", 1);
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
                "file_name" => $value->file_name,
                "soil_test" => $value->soil_test,
                "client" => $value->client,
                "submission_date"=> $value->submission_date,
                "type_of_service" => $value->type_of_service,
                "location" => $value->location,
                "status" => $value->status,
                "status" => "free",
                "link" => "/data/".$value->file_path,
            ]);
        }
        array_push($files, [
            "title" => $value->Title,
            "file_name" => $value->file_name,
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
    return view('download', compact("projectsMap", "files"));
});

Route::get('/about', function () {
    $projectsMap = header_projects();
    return view("about", compact("projectsMap"));
});

Route::get('/leadership', function(){
    $projectsMap = header_projects();
    $users = User::where("image_visible", true)->get();
    return view("leadership", compact("projectsMap", "users"));
});

Route::get('/contact', function(){
    $projectsMap = header_projects();
    return view("contact", compact("projectsMap"));
});


Route::get('/public_project/q/{type_of_service}', function($type_of_service){
    $projectsMap = header_projects();
    $projects_data = Project::where("is_visible", true);
    if($type_of_service != "all"){
        $projects_data->where('status', 'LIKE', '%'. $type_of_service . '%');
    }
    $projects_data = $projects_data->get();
    // if(empty($projects_data) || empty($projects_data->id)) {
    //     return redirect("/");
    // }
    return view("all_services", compact("projectsMap", "projects_data"));
});

Route::get('/public_project/{id}', function($id){
    $projectsMap = header_projects();
    $project_data = Project::where("is_visible", true)->find($id);
    if(empty($project_data) || empty($project_data->id)) {
        return redirect("/");
    }
    return view("public_projects", compact("projectsMap", "project_data"));
});

Auth::routes(["register"=>false]);

Route::middleware(['auth'])->group(function () {

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
    Route::post('/users', [App\Http\Controllers\HomeController::class, 'new_user'])->name('post_users');

    Route::get("/projects", [App\Http\Controllers\HomeController::class, 'all_projects'])->name('all_projects');
    Route::get("/project/{id}", [App\Http\Controllers\HomeController::class, 'project'])->name('single_project');
    Route::post("/project/{id}", [App\Http\Controllers\HomeController::class, 'new_project'])->name('single_project_post');


    Route::post("/delete/service", [App\Http\Controllers\HomeController::class, 'delete_services'])->name('delete_services');
    Route::get("/services", [App\Http\Controllers\HomeController::class, 'all_services'])->name('all_services');
    Route::get("/service/{id}", [App\Http\Controllers\HomeController::class, 'service'])->name('single_service');
    Route::post("/service/{id}", [App\Http\Controllers\HomeController::class, 'new_service'])->name('single_service_post');


    Route::post('/delete_user', [App\Http\Controllers\HomeController::class, 'delete_user'])->name('delete_user');
    Route::get('/no-access', [App\Http\Controllers\HomeController::class, 'no_access'])->name('no_access');



    Route::get('/inqueries', [App\Http\Controllers\HomeController::class, 'inqueries'])->name('inqueries');
    Route::post('/delete_inquery', [App\Http\Controllers\HomeController::class, 'delete_inquery'])->name('delete_inquery');

});


Route::post('/contact_us', [App\Http\Controllers\HomeController::class, 'contact_us'])->name('contact_us');
