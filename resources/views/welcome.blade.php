@extends('blog.master')
@section('content')
<div class="article-list">
    @forelse($articles as $article)
        <div class="border-bottom mb-4 pb-4 article-preview">
            <div class="p-0 p-md-3">
                <a class="fw-bold h4 d-block text-decoration-none"
                   href="{{route('detail',$article->id)}}">
                    {{$article->title}} </a>

                <div class="small post-category my-3">
                    <a href="{{route('baseOnCategory',$article->category->slug)}}" rel="category tag">{{$article->category->title}}</a>
                </div>


                <div class="text-black-50 the-excerpt">
                    <p>{{$article->excerpt}}</p>
                </div>

                <div class=" d-flex justify-content-between align-items-center see-more-group">
                    <div class="d-flex align-items-center">
                        @if($article->user->photo)
                            <img alt="" src="{{asset('storage/profile/'.$article->user->photo)}}"
                                 class="avatar avatar-50 photo rounded-circle" height="50" width="50">
                        @else
                            <img alt="" src="{{asset('dashboard/img/user-default-photo.png')}}"
                                 class="avatar avatar-50 photo rounded-circle" height="50" width="50">
                        @endif

                        <div class="ms-2">
                                    <span class="small fw-bolder text-primary">
                                        <i class="fas fa-user"></i>
                                        {{$article->user->name}}
                                    </span>
                            <br>
                            <span class="small fw-bolder text-secondary">{{$article->created_at->format('d-F-Y')}}</span>
                        </div>
                    </div>

                    <a href="{{route('detail',$article->slug)}}" class="btn btn-outline-primary rounded-pill px-3">Read More</a>
                </div>
            </div>
        </div>
    @empty

        <div class="mb-4 pb-4">
            <div class="py-5 my-5 text-center text-lg-start">
                <p class="fw-bold text-primary">Dear Viewer</p>
                <h1 class="fw-bold">
                    There is no article 😔 ...
                </h1>
                <p>Please go back to Home Page</p>
                <a class="btn btn-outline-primary rounded-pill px-3" href="{{route('index')}}">
                    <i class="feather-home"></i>
                    Blog Home
                </a>

            </div>
        </div>
    @endforelse
</div>

<div class="d-block d-lg-none my-5" id="pagination">
        {{$articles->onEachSide(1)->links()}}
    </div>

@endsection

@section('pagination-place')
    <div class="d-none d-lg-block" id="pagination">
        {{$articles->onEachSide(1)->links()}}
    </div>
@endsection
