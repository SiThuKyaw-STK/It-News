@extends('layouts.app')

@section("title") Edit Category @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('category.index')}}">Category Manager</a></li>
        <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0">
                        <i class="feather-layers text-primary"></i>
                        Edit Category
                    </h4>
                    <hr>
                    <form action="{{route('category.update',$category->id)}}" method="post">
                        @csrf
                        @method('put')
                        <div class="form-inline">
                            <input value="{{old('title',$category->title)}}"
                                   class="form-control form-control-lg mr-2 @error('title') is-invalid @enderror"
                                   type="text" name="title" placeholder="Edit Category" required>
                            <button class="btn btn-lg btn-primary">Edit</button>
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
                    <hr>
                    @include('category.list')
                </div>
            </div>
        </div>
    </div>
@endsection
