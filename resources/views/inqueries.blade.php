@extends('layouts.new_app')

@section('content')
<div class="overflow-x-auto w-full">
    <table class="table w-full">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email Id</th>
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
                <td>{{$loop_inq->company_name}}</td>
                <td>{{$loop_inq->phone_number}}</td>
                <td>

                    {{ date('d M y', strtotime($loop_inq->created_at)) }}
                </td>
                <td>
                   {{$loop_inq->description}}
                </td>
                <td><button class="btn btn-square btn-ghost" onclick="delete_user({{$loop_inq->id}})"><svg
                            xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" class="w-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0">
                            </path>
                        </svg></button></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


<div class="modal" id="add_user">
    <div class="modal-box  "><button class="btn btn-sm btn-circle absolute right-2 top-2" onclick="hide_add_user()">✕</button>
        <div class="delete" id="delete_container">
            <form action="/delete_inquery" method="post">
                @csrf
                <input type="hidden" name="id" id="delete_user_id" value="">
                <h3 class="font-semibold text-2xl pb-6 text-center">Confirmation</h3>
                <p class=" text-xl mt-8 text-center">Are you sure you want to delete this Inquery?</p>
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


    function delete_user(id) {
        delete_user_div_inner.classList.remove("hidden")
        delete_user_div_input.value = id
        add_user_div.classList.add("modal-open")
    }

    function hide_add_user() {
        add_user_div.classList.remove("modal-open")
    }
</script>
@endsection