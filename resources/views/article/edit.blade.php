@extends('layouts.app')

@section('title') (Edit) {{$article->title}} @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item"><a href="{{route('article.index')}}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0">
                        <i class="fas fa-edit text-primary"></i>
                        Edit Article
                    </h4>
                    <form action="{{route('article.update',$article->id)}}" method="post" id="editArticle">
                        @csrf
                        @method('put')
                    </form>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card mt-3">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <label class="h5">Select Category</label>
                        <select name="category" form="editArticle" class="custom-select custom-select-lg @error('category') is-invalid @enderror" id="">
                            <option value="">Select Category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}" {{old('category',$article->category_id) == $category->id ? 'selected' : ''}} class="custom-select custom-select-lg" >{{$category->title}}</option>
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
                        <input type="text" value="{{old('title',$article->title)}}" class="form-control form-control-lg @error('title') is-invalid @enderror" form="editArticle" name="title">
                        @error('title')
                        <p class="m-0 text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group mb-0">
                        <label class="h5">Article Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" form="editArticle" id="" rows="15">{{old('description',$article->description)}}</textarea>
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
                        <button class="btn btn-lg btn-primary w-100" form="editArticle">Edit Article</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
