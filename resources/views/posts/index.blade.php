<h1>Iformation is </h1>
<a href="{{route('posts.create')}}">Create</a><br><br>

<a href="{{route('deletedpost')}}">Show_Deleted_posts</a><br><br>
<a href="{{route('restoreall')}}">Restore All</a> <br><br>

@foreach($post as $p)
<li>{{$p->title}}</li>
<li>{{$p->body}}</li>

<a href="{{route('posts.edit',$p->id)}}">Edite</a>
<!-- <a href="{{route('posts.destroy',$p->id)}}">DE</a> -->

<form action="{{route('posts.destroy',$p->id)}}" method="post">
@method('DELETE')
@csrf
    <button type="submit">Soft Delete</button>
</form>

@endforeach