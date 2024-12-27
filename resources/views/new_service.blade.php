@extends('layouts.new_app')

@section('content')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">Category</span></label><select name="category" id="" class="select select-bordered w-full">
            @if($project->category)
                <option selected value="{{$project->category}}" id="">{{$project->category}}</option>
            @endif
            @foreach(["office_work", "field_work", "research"] as $status )
                @if($project->category != $status)
                    <option value="{{$status}}"  id="">{{str_replace("_"," ",$status)}}</option>
                @endif

            @endforeach
        </select>
    </div>
    <div class="form-control w-full undefined my-7"><label class="label"><span class="label-text text-base-content undefined">Title</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="title_service" required value="{{$project->type}}"></div>
    <div class="form-control w-full undefined my-7"><label class="label"><span class="label-text text-base-content undefined">Sub Category:</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="sub_category" required value="{{$project->sub_category}}"></div>
        <div contenteditable="true" class="textarea textarea-bordered w-full" style="min-height: 300px;" placeholder="" id="editable">@if($project->content) {!! $project->content !!} @endif</div>
        <input type="hidden" id="desc" name="desc">
    <div class="divider">Service Image</div>
    <div class="form-control w-full undefined">
        <div class="file-dnd">
            <input type="file" id="upload-image" name="file" accept="image/*"/>
            <div class="before-upload">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-primary size-36 ml-20">
                        <path d="M11.47 1.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72V7.5h-1.5V4.06L9.53 5.78a.75.75 0 0 1-1.06-1.06l3-3ZM11.25 7.5V15a.75.75 0 0 0 1.5 0V7.5h3.75a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h3.75Z" />
                    </svg>

                    <h4>Drag and Drop Image file or Browse</h4>
                    <p>Supports: Images</p>
                </div>
            </div>
            <div class="after-upload">
                <div class="clear-btn">&times;</div>
                <img src="/data/{{$project->image}}" />
            </div>
            <div class="text-center text-base-content" id="file_name"></div>
        </div>
    </div>

    <input type="hidden" @if($project->image) value="{{$project->image}}" @endif id="file_name_input" required name="file_name">

    <div class="divider">Team Members</div>
    <div class="btn px-6 btn-md normal-case btn-primary w-full" onclick="add_user()">Add Team</div>
    <table class="table w-full">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="selected_teams">
            


        </tbody>
    </table>
    

    <div class="mt-16"><button class="btn btn-primary float-right">Update</button></div>
</form>



<div class="modal" id="add_user">
    <div class="modal-box  "><button class="btn btn-sm btn-circle absolute right-2 top-2" onclick="hide_add_user()">✕</button>
        <div class="" id="">
            <h3>Select a user</h3>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="add_team">
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
<script src="/imageupload.js"></script>
<script>
    add_user_div = document.getElementById("add_user")
    add_team_div = document.getElementById("add_team")
    selected_teams_div = document.getElementById("selected_teams")
    const editableDiv = document.getElementById('editable');
    const desc = document.getElementById('desc');
    var editor = new MediumEditor('#editable');

    var selected_users = new Set(@json($associated_users_id));


    view_able_users = @json($viewable_users);


    function display_members_of_team(){
        var string_to_append = ""
        selected_users.forEach( user_id => {
            view_able_users.forEach(element => {
                if(element["id"] == user_id) {
                    string_to_append += `<tr>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12"><img
                                            src="/data/users/${element['id']}.jpg" 
                                            alt="Image" 
                                            onerror="this.src='https://ui-avatars.com/api/?name=${element['name']}';"
                                            alt="Avatar"></div>
                                </div>
                                <div>
                                    <div class="font-bold capitalize">${element['name']}</div>
                                    <div class="text-sm opacity-50">${element['is_admin']? 'Admin': 'User'}</div>
                                </div>
                            </div>
                        </td>
                        <td>${element['email']}</td>
                        <td><button class="btn btn-square btn-ghost" onclick="add_or_remove_from_service(${element['id']})"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true" class="w-5">
                                    ${selected_users.has(element['id'])?'<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />': '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />'}
                                </svg></button></td>
                        <input type="hidden" name="user_id[]" value="${user_id}" />
                    </tr>`
                }
            });
        });

        selected_teams_div.innerHTML = string_to_append
    }
    
    

    function update_viewable_user() {
        var string_to_append = ""
        view_able_users.forEach(element => {
            string_to_append += `<tr>
                        <td>
                            <div class="flex items-center space-x-3">
                                <div class="avatar">
                                    <div class="mask mask-squircle w-12 h-12"><img
                                            src="/data/users/${element['id']}.jpg" 
                                            alt="Image" 
                                            onerror="this.src='https://ui-avatars.com/api/?name=${element['name']}';"
                                            alt="Avatar"></div>
                                </div>
                                <div>
                                    <div class="font-bold capitalize">${element['name']}</div>
                                    <div class="text-sm opacity-50">${element['is_admin']? 'Admin': 'User'}</div>
                                </div>
                            </div>
                        </td>
                        <td>${element['email']}</td>
                        <td><button class="btn btn-square btn-ghost" onclick="add_or_remove_from_service(${element['id']})"><svg
                                    xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    aria-hidden="true" class="w-5">
                                    ${selected_users.has(element['id'])?'<path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />': '<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />'}
                                </svg></button></td>
                    </tr>`
        });

        add_team_div.innerHTML = string_to_append
        display_members_of_team()
    }


    function add_or_remove_from_service(id){
        if(selected_users.has(id)){
            selected_users.delete(id)
        }else{
            selected_users.add(id)
        }

        update_viewable_user()
    }


    function contentChanged() {
        desc.value = editableDiv.innerHTML;

    }

    editableDiv.addEventListener('input', contentChanged);

    contentChanged()

    function go_back() {
        window.location.href = '/services';
    }

    function add_user() {
        add_user_div.classList.add("modal-open")
        update_viewable_user()
    }

    function hide_add_user() {
        add_user_div.classList.remove("modal-open")
    }

    @if($project->id)
    document.querySelector(".after-upload").style.display = "block";
    document.querySelector(".before-upload").style.display = "none";
    @endif

    display_members_of_team()
</script>

<style>
    .medium-editor-toolbar,
    .medium-editor-toolbar-anchor-preview,
    .medium-editor-toolbar-input {
        color: black !important;
        background-color: white !important;
        border-radius: 20px;
    }

    .medium-editor-anchor-preview a {
        color: black !important;
    }

    h2 {
        font-size: 32px;
        /* or 2em */
    }

    h3 {
        font-size: 18px;
        /* or 1.17em */
    }


    .file-dnd {
        width: 100%;
        height: 320px;
        border-radius: 10px;
        border: 1px solid #ddd;
        padding: 15px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        margin: 0 auto;
        gap: 10px;
        box-shadow: 0px 2px 10px 2px rgba(0, 0, 0, 0.05);
    }

    .file-dnd input {
        display: none;
    }

    .file-dnd h2 {
        text-align: left;
    }

    .file-dnd .before-upload {
        border: 1px dashed #888;
        width: 100%;
        height: 100%;
        flex: 1;
        border-radius: 5px;
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .file-dnd .before-upload:hover {
        background-color: rgba(100, 100, 100, 0.4);
    }


    .file-dnd .before-upload h4 {
        font-size: 18px;
        margin-bottom: 5px;
    }

    .file-dnd .before-upload p {
        font-size: 14px;
    }


    .file-dnd .after-upload {
        display: none;
        position: relative;
    }

    .file-dnd .after-upload img {
        width: 100%;
        border-radius: 5px;
        max-height: 260px;
        object-fit: cover;
    }

    .file-dnd .after-upload .clear-btn {
        position: absolute;
        top: 5px;
        right: 5px;
        background: rgba(0, 0, 0, 0.5);
        width: 15px;
        height: 15px;
        text-align: center;
        line-height: 15px;
        border-radius: 50%;
        color: #fff;
        font-size: 12px;
        cursor: pointer;
    }
</style>
@endsection