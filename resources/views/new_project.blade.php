@extends('layouts.new_app')

@section('content')
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/css/medium-editor.min.css" type="text/css" media="screen" charset="utf-8">
<link href="https://releases.transloadit.com/uppy/v3.8.0/uppy.min.css" rel="stylesheet">

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
            <span class="label-text text-base-content undefined">Public File: <small class="text-xs text-red-500 pl-3">(Public)</small></span>
        </label>
        @if($project->public_image)
        <span class=" mb-3 text-sm">Download Previous:
            <a href="{{ asset('data/public_path/'.$project->public_image) }}" download="{{ $project->public_image }}" class="underline text-primary">
            {{ $project->public_image }}
            </a>
        </span>
        <span class="mb-2">Upload New:</span>
        @endif
        <input type="file" placeholder="" class="input  input-bordered w-full pt-2.5" name="public_image" value="">
    </div>
    <div class="form-control w-full undefined">
        <label class="label">
            <span class="label-text text-base-content undefined">Status</span>
        </label>
        <select name="status" id="" class="select select-bordered w-full capitalize">
            @if(!empty($project->status))
            <option selected value="{{$project->status}}" id="">{{$project->status}}</option>
            @endif
            @foreach(["completed", "ongoing", "research"] as $status )
            @if($project->status != $status)
            <option value="{{$status}}" id="">{{$status}}</option>
            @endif

            @endforeach
        </select>
    </div>
    <div class="form-control w-full undefined my-7"><label class="label"><span class="label-text text-base-content undefined">Type Of Service</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="type_of_service" required value="{{$project->type_of_service}}"></div>
    <div class="form-control w-full undefined my-7"><label class="label"><span class="label-text text-base-content undefined">Location</span></label><input type="text" placeholder="" class="input  input-bordered w-full " name="location" required value="{{$project->location}}"></div>
    <div class="form-control w-full undefined"><label class="label"><span class="label-text text-base-content undefined">More Info: <small class="text-xs text-red-500 pl-3">(Public)</small></span></label>
        <div contenteditable="true" class="textarea textarea-bordered w-full" style="min-height: 300px;" placeholder="" id="editable">@if($project->description) {!! $project->description !!} @endif</div>
        <input type="hidden" id="desc" name="desc">
    </div>
    <div class="divider">Project Private File</div>


    @if($project->id != 0)
    <div id="dashboard"></div>

    <script src="https://releases.transloadit.com/uppy/v3.8.0/uppy.min.js"></script>
    <script src="https://releases.transloadit.com/uppy/v3.8.0/@uppy/xhr-upload.min.js"></script>
    <script src="https://releases.transloadit.com/uppy/v3.8.0/@uppy/dashboard.min.js"></script>

    <script>
        const uppy = new Uppy.Uppy({
                restrictions: {
                    maxFileSize: 120000000, // 120MB per file
                    allowedFileTypes: null, // All file types
                    maxNumberOfFiles: null // Unlimited files
                },
                autoProceed: false
            })
            .use(Uppy.Dashboard, {
                inline: true,
                target: '#dashboard',
                showProgressDetails: true,
                proudlyDisplayPoweredByUppy: false,
                note: 'Maximum file size 120MB, unlimited files'
            })
            .use(Uppy.XHRUpload, {
                endpoint: '/project/{{$project->id}}/upload', // Replace with actual project ID
                method: 'post',
                formData: true,
                fieldName: 'file',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content'),
                    'Accept': 'application/json'
                }
            });

        uppy.on('complete', (result) => {
            console.log('Successful uploads:', result.successful);
            console.log('Failed uploads:', result.failed);
        });

        uppy.on('error', (error) => {
            console.error('Upload error:', error);
        });
    </script>

    <div class="mt-4 mb-2">Existing Private files:</div>
    <table class="table w-full">
        <thead>
            <tr>
                <th>File Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($project->files as $file)
            <tr>
                <td>
                    <div class="w-full">{{$file->original_name}}</div>
                </td>
                <td class="flex gap-2">
                    <a class="btn btn-square btn-primary text-white" download="{{ $file->original_name }}" href="{{ asset($file->stored_path) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
                        </svg>

                    </a>
                    <a class="btn btn-square btn-error text-white" onclick='add_user("{{$file->original_name}}", "{{ number_format($file->size / 1048576,2)}} mb", "{{$file->id}}" )'>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </a>
                </td>
                @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-warning">Create Project First To Upload Private Files</div>
    @endif

    <div class="mt-16"><button class="btn btn-primary float-right">@if($project->id != 0) Update @else Create @endif</button></div>
</form>



<div class="modal" id="add_user">
    <div class="modal-box  "><button class="btn btn-sm btn-circle absolute right-2 top-2" onclick="hide_add_user()">✕</button>
        <form action="/project/{{$project->id}}/delete" method="post" class="" id="">
            @csrf
            <h3>Delete File</h3>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Size</th>
                    </tr>
                </thead>
                <tbody id="add_team">
                    <td id="name"></td>
                    <td id="size"></td>
                </tbody>
            </table>
            <input type="hidden" name="file_id" id="file_id">
            <div class="modal-action"><button class="btn btn-ghost" oncanplay="hide_add_user()">Cancel</button><button
                    class="btn btn-error px-6">Delete</button></div>
        </form>
    </div>
</div>

<script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
<script>
    add_user_div = document.getElementById("add_user")
    name_delete = document.getElementById("name")
    size_delete = document.getElementById("size")
    file_id = document.getElementById("file_id")
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


    function add_user(name, size, id) {
        name_delete.innerHTML = name
        size_delete.innerHTML = size
        file_id.value = id
        add_user_div.classList.add("modal-open")
        update_viewable_user()
    }

    function hide_add_user() {
        add_user_div.classList.remove("modal-open")
    }
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
</style>
@endsection