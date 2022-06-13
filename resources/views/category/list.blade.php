<table class="table table-bordered table-hover">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Owner</th>
        <th>Control</th>
        <th>Created Date</th>
    </tr>
    </thead>
    <tbody>
    @foreach(\App\Category::with('user')->get() as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->title}}</td>
            <td>{{$category->user->name}}</td>
            <td>
                <a class="btn btn-outline-primary" href="{{route('category.edit',$category->id)}}">
                    <i class="feather-edit"></i>
                </a>
                <form class="d-inline-block" action="{{route('category.destroy',$category->id)}}" method="post">
                    @csrf
                    @method('delete')
                    <button class="btn btn-outline-danger" onclick="return confirm('Are you sure to delete {!! $category->title !!} category?')"><i class="feather-trash"></i></button>
                </form>
            </td>
            <td>
                <span class="small"><i class="feather-calendar"></i>{{$category->created_at->format('d-m-Y')}}</span><br>
                <span class="small"><i class="feather-clock"></i>{{$category->created_at->format('h : i A')}}</span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
