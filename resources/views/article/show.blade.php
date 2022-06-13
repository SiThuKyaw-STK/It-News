@extends('layouts.app')

@section('title') {{$article->title}} @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page"><a href="{{route('article.index')}}">Article List</a></li>
        <li class="breadcrumb-item active" aria-current="page">{{$article->title}}</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0">
                        <i class="fas feather-file"></i>
                        Article Detail
                    </h4>
                    <hr>
                    <h3>{{$article->title}}</h3>
                    <div class="my-3">
                        <small class="text-info"><i class="fas fa-user mr-1"></i>{{$article->user->name}}</small>
                        <small class="text-primary mx-2"><i class="fas fa-calendar mr-1"></i>{{$article->created_at->format('d-m-Y')}}</small>
                        <small class="text-secondary"><i class="fas fa-layer-group mr-1"></i>{{$article->category->title}}</small>
                    </div>
                    <p class="m-0">{{$article->description}}</p>
                    <hr>
                    <a class="btn btn-outline-primary" href="{{route('article.edit',$article->id)}}">
                        <i class="feather-edit"></i>
                    </a>
{{--                    <form class="d-inline-block" action="{{route('article.destroy',$article->id)}}" method="post">--}}
{{--                        @csrf--}}
{{--                        @method('delete')--}}
{{--                        <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete {!! $article->title !!} category?')"><i class="feather-trash"></i></button>--}}
{{--                    </form>--}}
                    <a href="{{route('article.index')}}" class="btn btn-outline-dark">
                        All Article
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
