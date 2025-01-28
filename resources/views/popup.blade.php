@extends('layouts.new_app')

@section('content')
<div class="overflow-x-auto w-full">
    @if(!$popup->enabled)
        <div role="alert" class="alert alert-warning">
            <svg
                xmlns="http://www.w3.org/2000/svg"
                class="h-6 w-6 shrink-0 stroke-current"
                fill="none"
                viewBox="0 0 24 24">
                <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
            </svg>
            <span class="text-sm"><div class="font-bold">Warning:</div> Popup is Disabled (Enable it by clicking the button above!)</span>
        </div>
    @endif

    <div class="font-bold mt-5">Be sure to upload only one!</div>
    <form method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-control w-full "><label class="label" for="youtube"><span class="label-text text-base-content">Youtube Link:</span></label>
            <input type="text" placeholder="" class="input  input-bordered w-full " id="youtube" name="youtube" @if($popup->type == 'youtube') value="{{$popup->url}}" @endif >
        </div>
        <div class="divider"></div>
        <div class="form-control w-full "><label class="label" for="Image"><span class="label-text text-base-content">Upload Image:</span></label>
            <input type="file" name="image" id="image" accept="image/*" class="input  input-bordered w-full pt-2">
        </div>
        @if($popup->type == 'image')
        <div class="form-control w-full "><label class="label" for="old_image">
            <a href="data/popup/{{$popup->url}}" class="underline" target="_blank"> /data/popup/{{$popup->url}} </a>
        </div>
        @endif 
        <div class="mt-16"><button class="btn btn-primary float-right">Submit</button></div>
    </form>
</div>

<script>


    async function disable_current_popup() {
        window.location = "/updated_popup/0";
    }

    async function enable_current_popup() {
        window.location = "/updated_popup/1";
    }

</script>
@endsection