@extends('layouts.app')

@section('title') User Manger @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Users</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0">
                        <i class="feather-users"></i>
                        Users List
                    </h4>
                    <hr>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Control</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->id}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->role}}</td>
                                    <td>
                                        @if($user->role > 0)
                                        <form class="d-inline-block" action="{{route('user-manger.makeAdmin')}}" id="form{{$user->id}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button type="button" class="btn btn-outline-primary" onclick="return askConfirm({{$user->id}})">Make Admin</button>
                                        </form>
                                        @if($user->isBanded == 1)
                                                <form class="d-inline-block" action="{{route('user-manger.restoreUser')}}" id="restoreForm{{$user->id}}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="id" value="{{$user->id}}">
                                                    <button type="button" class="btn btn-outline-success" onclick="return restoreConfirm({{$user->id}})">Restore User</button>
                                                </form>
                                            <p class="m-0 text-danger">this user is baned!!!</p>
                                        @else
                                            <form class="d-inline-block" action="{{route('user-manger.banUser')}}" id="banForm{{$user->id}}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{$user->id}}">
                                                <button type="button" class="btn btn-outline-danger" onclick="return banConfirm({{$user->id}})">Ban User</button>
                                            </form>
                                        @endif
{{--                                        @else--}}
{{--                                            <h5 class="mb-0 fw-bolder text-primary">This is Admin</h5>--}}
                                        @endif
                                    </td>
                                    <td>{{$user->created_at}}</td>
                                    <td>{{$user->updated_at}}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('foot')
        <script>

            function askConfirm(id){
                Swal.fire({
                    title: 'Admin role ပြောင်းမှာသေချာပါသလား?',
                    text: "Admin ပြောင်းလိုက်ရင် အကုန်လုပ်လို့ ရသွားမှာပါ။",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Updated!',
                            'Role is Updated',
                            'success'
                        )
                        setTimeout(function (){
                            $("#form"+id).submit();
                        },1500);
                    }
                })
            }


            function banConfirm(id){
                Swal.fire({
                    title: 'Are You Sure to ban?',
                    text: "Ban this User",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'User Baned!',
                            'User is Baned',
                            'success'
                        )
                        setTimeout(function (){
                            $("#banForm"+id).submit();
                        },1500);
                    }
                })
            }

            function restoreConfirm(id){
                Swal.fire({
                    title: 'Are You Sure to restore this user?',
                    text: "Restore this User",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Confirm'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'User Restored!',
                            'User is Restored',
                            'success'
                        )
                        setTimeout(function (){
                            $("#restoreForm"+id).submit();
                        },1500);
                    }
                })
            }
        </script>
    @endsection
