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
                                        <form action="{{route('user-manger.make-admin')}}" id="form{{$user->id}}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{$user->id}}">
                                            <button type="button" class="btn btn-outline-primary" onclick="return askConfirm({{$user->id}})">Make Admin</button>
                                        </form>
                                        @else
                                            <button class="btn btn-primary disabled" >Make Admin</button>
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
                title: 'Are you sure to upgrade role?',
                text: "role change",
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
    </script>
    @endsection
