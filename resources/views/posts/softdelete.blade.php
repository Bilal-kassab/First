<h1>Soft delete </h1>

<a href="{{route('posts.index')}}">index view</a>

@foreach($post as $p)
<li>{{$p->title}}</li>
<li>{{$p->body}}</li>

<a href="{{route('restore',$p->id)}}">Restore</a>
<form action="{{route('delete',$p->id)}}" method="post">
@method('POST')
@csrf
    <button type="submit">Delete</button>
</form>

@endforeach