@extends('layouts.new_app')

@section('content')
<div class="overflow-x-auto w-full">
    <table class="table w-full">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email Id</th>
                <th>Created At</th>
                <th>Visible</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($all_users as $loop_user)
            <tr>
                <td>
                    <div class="flex items-center space-x-3">
                        <div class="avatar">
                            <div class="mask mask-squircle w-12 h-12"><img
                                    src="/data/users/{{ $loop_user->id }}.jpg" 
                                    alt="Image" 
                                    onerror="this.src='https://ui-avatars.com/api/?name={{ $loop_user->name }}';"
                                    alt="Avatar"></div>
                        </div>
                        <div>
                            <div class="font-bold capitalize">{{$loop_user->name}}</div>
                            <div class="text-sm opacity-50">{{$loop_user->is_admin? "Admin": "User"}} @if($user->id == $loop_user->id) (You) @endif</div>
                        </div>
                    </div>
                </td>
                <td>{{$loop_user->email}}</td>
                <td>

                    {{ date('d M y', strtotime($loop_user->created_at)) }}
                </td>
                <td>
                    <div class="text-sm opacity-50">{{$loop_user->image_visible? "Public": "Private"}} </div>
                </td>
                <td>
                    @if($loop_user->is_admin)
                    <div class="badge badge-secondary">Admin</div>
                    @else
                    <div class="badge badge-accent">User</div>
                    @endif
                </td>
                <td><button class="btn btn-square btn-ghost" onclick="delete_user({{$loop_user->id}})"><svg
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
            <form action="/delete_user" method="post">
                @csrf
                <input type="hidden" name="id" id="delete_user_id" value="">
                <h3 class="font-semibold text-2xl pb-6 text-center">Confirmation</h3>
                <p class=" text-xl mt-8 text-center">Are you sure you want to delete this User?</p>
                <div class="modal-action mt-12">
                    <div class="btn btn-outline cursor-pointer" onclick="hide_add_user()">Cancel</div><button type="submit" class="btn btn-primary w-36">Yes</button>
                </div>
            </form>
        </div>
        <div class="add_user hidden" id="add_user_child">
            <form action="/users" method="post" enctype="multipart/form-data">
                @csrf
                <h3 class="font-semibold text-2xl pb-6 text-center">Add New User</h3>
                <div class="form-control w-full mt-4"><label class="label"><span
                            class="label-text text-base-content undefined">Full Name</span></label><input required type="text"
                        placeholder="" class="input  input-bordered w-full " name="name" value=""></div>
                <div class="form-control w-full mt-4"><label class="label"><span
                            class="label-text text-base-content undefined">Description</span></label><input required type="text"
                        placeholder="" class="input  input-bordered w-full " name="description" value=""></div>
                <div class="form-control w-full mt-4"><label class="label"><span
                            class="label-text text-base-content undefined">Phone</span></label><input required type="text"
                        placeholder="" class="input  input-bordered w-full " name="phone" value=""></div>
                <div class="form-control w-full mt-4"><label class="label"><span
                            class="label-text text-base-content undefined">Email Id</span></label><input required name="email" type="email"
                        placeholder="" class="input  input-bordered w-full " value=""></div>
                <div class="form-control w-full mt-4"><label class="label"><span
                            class="label-text text-base-content undefined">Password</span></label><input required name="password" type="text"
                        placeholder="" class="input  input-bordered w-full " value=""></div>
                <div class="form-control w-full mt-4"><label class="label"><span
                        class="label-text text-base-content undefined">Working Since</span></label><input required type="text"
                    placeholder="" class="input  input-bordered w-full " name="since" value=""></div>
                <div class="form-control w-full mt-4"><label class="label"><span
                    class="label-text text-base-content undefined">Image</span></label>
                    <input type="file" placeholder="" class="input  input-bordered w-full pt-2.5" name="public_image" value="">
                </div>
                
                <div class="form-control w-full mt-4 text-start"><label class="label"><span
                    class="label-text text-base-content undefined">Is Visible to Public</span></label>
                    <select name="is_visible" id="" class="select select-bordered w-full">
                        <option value="yes" id="">Yes</option>
                        <option value="no" id="">No</option>
                    </select>
                </div>
                <div class="form-control w-full mt-4"><label class="label"><span
                            class="label-text text-base-content undefined">Type</span></label>
                    <select name="type_of_user" id="" class="select select-bordered w-full">
                        <option value="user" id="">User (Cannot Make or Delete User)</option>
                        <option value="admin" id="">Admin (Can Make and Delete User)</option>
                    </select>
                </div>
                <p class="text-center  text-error mt-16"></p>
                <div class="modal-action"><button class="btn btn-ghost">Cancel</button><button
                        class="btn btn-primary px-6">Save</button></div>
            </form>
        </div>
    </div>
</div>


<script>
    add_user_div = document.getElementById("add_user")
    add_user_div_inner = document.getElementById("add_user_child")
    delete_user_div_inner = document.getElementById("delete_container")
    delete_user_div_input = document.getElementById("delete_user_id")


    function delete_user(id) {
        add_user_div_inner.classList.add("hidden")
        delete_user_div_inner.classList.remove("hidden")
        delete_user_div_input.value = id
        add_user_div.classList.add("modal-open")
    }

    function add_user() {
        add_user_div_inner.classList.remove("hidden")
        delete_user_div_inner.classList.add("hidden")
        add_user_div.classList.add("modal-open")
    }

    function hide_add_user() {
        add_user_div.classList.remove("modal-open")
    }
</script>
@endsection