@extends('layouts.new_app')

@section('content')
<div class="overflow-x-auto w-full">
    <div class="flex justify-end text-sm mt-2 mb-5">
        <div class="mt-4 mr-4">Conversion rate:</div>
        <div class="radial-progress text-success" style="--value:{{$conversionRate}}; --size:3rem; " role="progressbar">{{intval($conversionRate)}}%      </div>
        <div class="mt-4 ml-4">Total: {{$count_of_total}}</div>
        <div class="mt-4 ml-4">Accepted: {{$count_of_read}}</div>
    </div>
    <table class="table w-full">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email Id</th>
                <th>Category</th>
                <th>Company Name</th>
                <th>Phone Number</th>
                <th>Created At</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_inqueries as $loop_inq)
            <tr>
                <td>
                    <div class="flex items-center space-x-3">
                        <div>
                            <div class="font-bold capitalize">{{$loop_inq->name}}</div>
                        </div>
                    </div>
                </td>
                <td>{{$loop_inq->email}}</td>
                <td>{!! join("<br/>", explode(" ,",$loop_inq->info_related)) !!}</td>
                <td>{{$loop_inq->company_name}}</td>
                <td>{{$loop_inq->phone_number}}</td>
                <td>

                    {{ date('d M y', strtotime($loop_inq->created_at)) }}
                </td>
                <td>
                   {{$loop_inq->description}}
                </td>
                <td><button class="btn btn-square btn-ghost" onclick="delete_user({{$loop_inq->id}}, {{$loop_inq->is_read}})"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" class="w-5">
                            @if($loop_inq->is_read)
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            @else
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            @endif
                        </svg></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @if(count($all_inqueries) == 0)
        <div class="text-xl text-center font-bold my-5">Noting to see here</div>
    @endif
</div>


<div class="modal" id="add_user">
    <div class="modal-box  "><button class="btn btn-sm btn-circle absolute right-2 top-2" onclick="hide_add_user()">✕</button>
        <div class="delete" id="delete_container">
            <form action="/mark_as_read_inquery" method="post">
                @csrf
                <input type="hidden" name="id" id="delete_user_id" value="">
                <input type="hidden" name="forward" id="forward_user" value="">
                <h3 class="font-semibold text-2xl pb-6 text-center">Confirmation</h3>
                <p class=" text-xl mt-8 text-center">Are you sure you want to move this inquery <span id="forward_or_backward">forward</span>?</p>
                <div class="modal-action mt-12">
                    <div class="btn btn-outline cursor-pointer" onclick="hide_add_user()">Cancel</div><button type="submit" class="btn btn-primary w-36">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
    add_user_div = document.getElementById("add_user")
    delete_user_div_inner = document.getElementById("delete_container")
    delete_user_div_input = document.getElementById("delete_user_id")
    forward_user = document.getElementById("forward_user")
    forward_or_backward = document.getElementById("forward_or_backward")


    function delete_user(id, is_read) {
        if(is_read) {
            value = 0
            forward_or_backward.innerText = "backwards"
        }else {
            value = 1
            forward_or_backward.innerText = "foward"
        }
        delete_user_div_inner.classList.remove("hidden")
        delete_user_div_input.value = id
        forward_user.value = value
        add_user_div.classList.add("modal-open")
    }

    function view_marked(){
        location.href = "/inqueries?read=1"
    }

    function view_unmarked(){
        location.href = "/inqueries?read=0"
    }


    function hide_add_user() {
        add_user_div.classList.remove("modal-open")
    }
</script>
@endsection