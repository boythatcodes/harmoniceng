@extends('layouts.new_app')

@section('content')
<main class="flex-1 overflow-y-auto md:pt-4 pt-4 px-6">
    <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6">
        @foreach($all_projects as $project)
        <a href="/service/{{$project->id}}" class="card  w-full p-6 shadow-xl mt-2 bg-base-200 hover:bg-base-300">
            <div class="min-h-14 text-xl font-semibold truncate">{{$project->type}}
                <br>
                <small class="text-xs">Category: {{$project->category}}</small>
            </div>
            <div class="divider mt-2"></div>
            <div class="h-full w-full pb-6 ">
                <p class="flex"><img alt="icon" src="/data/public_path/{{$project->image}}" class="w-12 h-12 inline-block mr-4">
                {{substr(strip_tags($project->content), 0, 150)}}
            </p>
                <div class="mt-8 text-sm ">
                    <span class="mt-1.5 flex justify-between gap-3" style="z-index: 1000;">
                      <div class=""></div>
                    
                    {{ date('d M y', strtotime($project->updated_at)) }}
                    </span>
                </div>
            </div>
            <div class="flex w-full gap-2">
                <button class="btn btn-primary  flex-1 -mt-3">Edit Project</button>
                <form action="/delete/service" method="post" style="z-index: 1;">
                    @csrf
                    <input type="hidden" value="{{$project->id}}" name="id">
                    <button class="btn btn-error  -mt-3">Delete</button>
                </form>
            </div>
        </a>
        @endforeach
    </div>
    <div class="h-16"></div>
</main>


<script>
    function create_service(){
        window.location.href = '/service/0';
    }
</script>
@endsection