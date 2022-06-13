@extends('layouts.app')

@section("title") Category Manager @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Category Manager</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0">
                        <i class="feather-layers text-primary"></i>
                        Category Lists
                    </h4>
                    <hr>
                    <form action="{{route('category.store')}}" method="post">
                        @csrf
                        <div class="form-inline">
                            <input value="{{old('title')}}"
                                   class="form-control form-control-lg mr-2 @error('title') is-invalid @enderror"
                                   type="text" name="title" placeholder="Add Category" required>
                            <button class="btn btn-lg btn-primary">Add</button>
                        </div>
                        @error('title')
                        <p class="m-0 text-danger">{{$message}}</p>
                        @enderror

                    </form>
                    @if(session("categoryAddStatus"))
                        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                            <strong>{{session("categoryAddStatus")}}</strong> is added.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session("categoryUpdateStatus"))
                        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                            <strong>{{session("categoryUpdateStatus")}}</strong> is updated.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session("categoryDeleteStatus"))
                        <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                            <strong>{{session("categoryDeleteStatus")}}</strong> is deleted.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <hr>
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
@endsection
