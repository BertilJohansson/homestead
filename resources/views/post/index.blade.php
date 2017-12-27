@extends('layouts.master')

@section('content')
<p><h2>Posts</h2></p>
<table class="table table-bordered">
    @foreach($posts as $post)
    <tr>
        <td>{{ $post->title }}</td>
        <td>{{ $post->content }}</td>
        <td class="col-md-2"><a href="{{ route('post.post', ['id' => $post->id]) }}">Read more...</a></td>
    </tr>
    <p></p>
    @endforeach
</table>
@endsection


