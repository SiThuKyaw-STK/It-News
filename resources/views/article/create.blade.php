@extends('layouts.app')

@section('title') Create Article @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{route('article.index')}}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Article</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0">
                        <i class="feather-plus-circle text-primary"></i>
                        Create Article
                    </h4>
                    <form action="{{route('article.store')}}" method="post" id="createArticle">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label class="h5">Select Category</label>
                        <select name="category" form="createArticle" class="custom-select custom-select-lg @error('category') is-invalid @enderror" id="">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option {{old('category') == $category->id ? 'selected' : ''}} class="custom-select custom-select-lg" value="{{$category->id}}">{{$category->title}}</option>
                            @endforeach
                        </select>
                        @error('category')
                        <p class="m-0 text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label class="h5">Article Title</label>
                        <input type="text" value="{{old('title')}}" class="form-control form-control-lg @error('title') is-invalid @enderror" form="createArticle" name="title">
                        @error('title')
                        <p class="m-0 text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label class="h5">Article Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" form="createArticle" id="" rows="15">{{old('description')}}</textarea>
                        @error('description')
                        <p class="m-0 text-danger">{{$message}}</p>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <button class="btn btn-lg btn-primary w-100" form="createArticle">Create Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
