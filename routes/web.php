<?php

use App\Models\Project;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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


Route::get('/about', function () {
    $projectsMap = header_projects();
    return view("about", compact("projectsMap"));
});

Route::get('/leadership', function(){
    $projectsMap = header_projects();
    return view("leadership", compact("projectsMap"));
});

Route::get('/contact', function(){
    $projectsMap = header_projects();
    return view("contact", compact("projectsMap"));
});


Route::get('/service/q/{type_of_service}', function($type_of_service){
    $projectsMap = header_projects();
    $projects_data = Project::where("is_visible", true);
    if($type_of_service != "all"){
        $projects_data->where('type_of_service', 'LIKE', '%'. $type_of_service . '%');
    }
    $projects_data = $projects_data->get();
    // if(empty($projects_data) || empty($projects_data->id)) {
    //     return redirect("/");
    // }
    return view("all_services", compact("projectsMap", "projects_data"));
});

Route::get('/service/{id}', function($id){
    $projectsMap = header_projects();
    $project_data = Project::where("is_visible", true)->find($id);
    if(empty($project_data) || empty($project_data->id)) {
        return redirect("/");
    }
    return view("services", compact("projectsMap", "project_data"));
});

Auth::routes(["register"=>false]);



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');
Route::post('/users', [App\Http\Controllers\HomeController::class, 'new_user'])->name('post_users');

Route::get("/projects", [App\Http\Controllers\HomeController::class, 'all_projects'])->name('all_projects');
Route::get("/project/{id}", [App\Http\Controllers\HomeController::class, 'project'])->name('single_project');
Route::post("/project/{id}", [App\Http\Controllers\HomeController::class, 'new_project'])->name('single_project_post');

Route::post('/delete_user', [App\Http\Controllers\HomeController::class, 'delete_user'])->name('delete_user');
Route::get('/no-access', [App\Http\Controllers\HomeController::class, 'no_access'])->name('no_access');


Route::post('/contact_us', [App\Http\Controllers\HomeController::class, 'contact_us'])->name('contact_us');
Route::get('/inqueries', [App\Http\Controllers\HomeController::class, 'inqueries'])->name('inqueries');
Route::post('/delete_inquery', [App\Http\Controllers\HomeController::class, 'delete_inquery'])->name('delete_inquery');
