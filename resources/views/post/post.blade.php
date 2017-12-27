@extends('layouts.master')

@section('content')
<p><h2>Post</p></h2>
<table class="table table-bordered">
<tr>
    <td>{{ $post->title }}</td>
</tr>
<tr>
    <td>{{ $post->content }}</td>
</tr>
</table>
@endsection