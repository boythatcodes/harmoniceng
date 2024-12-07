@extends('layouts.new_app')

@section('content')
<main class="flex-1 overflow-y-auto md:pt-4 pt-4 px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($all_projects as $project)
        <a href="/project/{{$project->id}}" class="card  w-full p-6 shadow-xl mt-2 bg-base-200 hover:bg-base-300">
            <div class="min-h-14 text-xl font-semibold truncate">{{$project->Title}}
                <br>
                <small class="text-xs">file: {{$project->file_name}}</small>
            </div>
            <div class="divider mt-2"></div>
            <div class="h-full w-full pb-6 ">
                <p class="flex"><img alt="icon" src="@if(explode('/', $project->mime_type)[0] == 'image') /data/{{$project->file_path}} @else /document.svg @endif" class="w-12 h-12 inline-block mr-4">
                {{substr(strip_tags($project->description), 0, 150)}}
            </p>
                <div class="mt-8 text-sm ">
                    <span class="mt-1.5 flex justify-between gap-3" style="z-index: 1000;">
                        @if($project->is_visible)
                            <div class="flex gap-2">
                                Access: <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                                <div class="text-xs mt-1">(Public)</div>
                            </div>
                        @else
                        <div class="flex gap-2">
                                Access: <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"  class="size-5 text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                                </svg>
                                <div class="text-xs mt-1">(Private)</div>
                            </div>
                        @endif
                    
                    {{ date('d M y', strtotime($project->updated_at)) }}
                    </span>
                </div>
            </div>
            <button class="btn btn-primary  w-full -mt-3">Edit Project</button>
        </a>
        @endforeach
    </div>
    <div class="h-16"></div>
</main>


<script>
    function create_project(){
        window.location.href = '/project/0';
    }
</script>
@endsection