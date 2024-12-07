@extends('layouts.new_app')

@section('content')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
<form method="post" enctype="multipart/form-data">
    @csrf
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">Title</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="title" required @if($project->Title) value="{{$project->Title}}" @endif></div>
        <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">Language</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="language" required @if($project->language) value="{{$project->language}}" @else value="Nepali" @endif></div>
        <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">Client</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="client" required value="{{$project->client}}"></div>
        <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">Submission Date</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="submission_date" required value="{{$project->submission_date}}"></div>
        <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">Soil Test</span></label><select name="soil_test" id="" class="select select-bordered w-full">
                @if($project->soil_test)
                    <option value="yes" id="">Yes</option>
                    <option value="no" id="">No</option>
                @else
                    <option value="no" id="">No</option>
                    <option value="yes" id="">Yes</option>
                @endif
            </select>
        </div>
        <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">Visiblity</span></label><select name="is_visible" id="" class="select select-bordered w-full">
                @if($project->is_visible)
                    <option value="public" id="">Public (Project is visible to public)</option>
                    <option value="private" id="">Private (Only Harmonic Group has access)</option>
                @else
                    <option value="private" id="">Private (Only Harmonic Group has access)</option>
                    <option value="public" id="">Public (Project is visible to public)</option>
                @endif
            </select>
        </div>


    </div>
    <div class="divider">More Info</div>
    <div class="form-control w-full"><label class="label">
        <span class="label-text text-base-content undefined">Image Url: <small class="text-xs text-red-500 pl-3">(Public)</small></span>
    </label>
    @if($project->public_image)
        <span>Previous: </span><img src="/data/{{$project->public_image}}" alt="" class="max-w-xs my-2 rounded-md">
        <span class="mb-2">Upload New:</span>
    @endif
    <input type="file" placeholder="" class="input  input-bordered w-full pt-2.5" name="public_image" value="">
</div>
    <div class="form-control w-full undefined my-7"><label class="label"><span class="label-text text-base-content undefined">Type Of Service</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="type_of_service" required value="{{$project->type_of_service}}"></div>
    <div class="form-control w-full undefined my-7"><label class="label"><span class="label-text text-base-content undefined">Location</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="location" required value="{{$project->location}}"></div>
    <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">More Info: <small class="text-xs text-red-500 pl-3">(Public)</small></span></label>
        <div contenteditable="true" class="textarea textarea-bordered w-full" style="min-height: 300px;" placeholder="" id="editable">@if($project->description) {!! $project->description !!} @endif</div>
        <input type="hidden" id="desc" name="desc">
    </div>
    <div class="divider">Project Zip File</div>
    <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">Project File: <small class="text-xs text-green-500 pl-3">(Private)</small></span></label>
        <div class="file-dnd">
            <input type="file" id="upload-image" name="file" />
            <div class="before-upload">
                <div class="text-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="text-primary size-36 ml-20">
                        <path d="M11.47 1.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72V7.5h-1.5V4.06L9.53 5.78a.75.75 0 0 1-1.06-1.06l3-3ZM11.25 7.5V15a.75.75 0 0 0 1.5 0V7.5h3.75a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h3.75Z" />
                    </svg>

                    <h4>Drag and Drop Image file or Browse</h4>
                    <p>Supports: Zip, PDF, Images</p>
                </div>
            </div>
            <div class="after-upload">
                <div class="clear-btn">&times;</div>
                <img src="@if(explode('/', $project->mime_type)[0] == 'image') /data/{{$project->file_path}} @else /document.svg @endif" />
            </div>
            <div class="text-center text-base-content" id="file_name">{{$project->file_name}}</div>
        </div>
    </div>

    <input type="hidden" @if($project->file_name) value="{{$project->file_name}}" @endif id="file_name_input" required name="file_name">
    <input type="hidden" @if($project->mime_type) value="{{$project->mime_type}}" @endif id="mime_type" required name="mime_type">
    <input type="hidden" @if($project->file_path) value="{{$project->file_path}}" @endif id="file_path" required name="file_path">

    <div class="mt-16"><button class="btn btn-primary float-right">Update</button></div>
</form>

<script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
<script src="/imageupload.js"></script>
<script>
    const editableDiv = document.getElementById('editable');
    const desc = document.getElementById('desc');
    var editor = new MediumEditor('#editable');

    function contentChanged() {
        desc.value = editableDiv.innerHTML;

    }

    editableDiv.addEventListener('input', contentChanged);

    contentChanged()

    function go_back() {
        window.location.href = '/projects';
    }

    @if($project -> id)
    document.querySelector(".after-upload").style.display = "block";
    document.querySelector(".before-upload").style.display = "none";
    @endif
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