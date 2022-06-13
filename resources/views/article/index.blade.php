@extends('layouts.app')

@section('title') Sample @endsection

@section('content')
    <x-bread-crumb>
        <li class="breadcrumb-item active" aria-current="page">Articles List</li>
    </x-bread-crumb>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="m-0">
                        <i class="fa-solid fa-list text-primary"></i>
                        Article List
                    </h4>
                    <hr>
                    <div class="d-flex align-items-center justify-content-between mb-3">
                       <div class="">
                           <a href="{{route('article.create')}}" class="btn btn-lg btn-outline-primary">
                               <i class="fas fa-plus-circle"></i>
                               Create Article
                           </a>
                           <a href="{{route('article.index')}}" class="btn btn-lg btn-outline-dark">
                               <i class="fas fa-list"></i>
                               All Article
                           </a>
                       </div>
                        <form action="{{route('article.index')}}" method="get">
                            <div class="form-inline">
                                <input value="{{request()->search}}"
                                       class="form-control form-control-lg mr-2"
                                       type="text" name="search" placeholder="Search" required>
                                <button class="btn btn-lg btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    @if(session("articleAddStatus"))
                        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                            <strong>{{session("articleAddStatus")}}</strong> is added.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session("articleUpdateStatus"))
                        <div class="alert alert-success alert-dismissible fade show my-2" role="alert">
                            <strong>{{session("articleUpdateStatus")}}</strong> is updated.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if(session("articleDeleteStatus"))
                        <div class="alert alert-danger alert-dismissible fade show my-2" role="alert">
                            <strong>{{session("articleDeleteStatus")}}</strong> is deleted.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <table class="table table-bordered table-hover table-responsive-lg">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Article</th>
                            <th>Owner</th>
                            <th>Category</th>
                            <th>Control</th>
                            <th>Created Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td class="text-nowrap">{{$article->id}}</td>
                                <td class="text-nowrap">
                                    <b class="">{{\Illuminate\Support\Str::words($article->title,5)}}</b><br>
                                    <small class="text-black-50">{{\Illuminate\Support\Str::words($article->description,5)}}</small>
                                </td>
                                <td class="text-nowrap">{{$article->user->name}}</td>
                                <td class="text-nowrap">{{$article->category->title}}</td>
                                <td class="text-nowrap">
                                    <a class="btn btn-outline-primary" href="{{route('article.edit',$article->id)}}">
                                        <i class="feather-edit"></i>
                                    </a>
                                    <a class="btn btn-outline-info" href="{{route('article.show',$article->id)}}">
                                        <i class="fas fa-file"></i>
                                    </a>
                                    <form class="d-inline-block" action="{{route('article.destroy',$article->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete this article?')"><i class="feather-trash"></i></button>
                                    </form>
                                </td >
                                <td class=text-nowrap>
                                    <span class="small"><i class="feather-calendar"></i>{{$article->created_at->format('d-m-Y')}}</span><br>
                                    <span class="small"><i class="feather-clock"></i>{{$article->created_at->format('h : i A')}}</span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center h1 text-danger">There is no data.</td>
                            </tr>

                        @endforelse
                        </tbody>
                    </table>

                    <div>
                        {{$articles->appends(request()->all())->links()}}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
