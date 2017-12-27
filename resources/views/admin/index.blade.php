@extends('layouts.master')

@section('content')
<p><h2>Admin</p></h2>
<p>
@if(Session::has('info'))
{{Session::get('info')}}
@endif
</p>
<div>
    <table class="table table-bordered">
        @foreach($posts as $post)
        <tr>
            @if (Gate::denies('update-post', $post))
            <td>{{ $post->title }}</td>
            <td class="col-md-1">Edi</td>
            <td class="col-md-1">Remove</td>
            @else
            <td>{{ $post->title }}</td>
            <td class="col-md-1"><a href="{{ route('admin.edit', ['id' => $post->id]) }}">Edit</a></td>
            <td class="col-md-1"><a href="{{ route('admin.delete', ['id' => $post->id]) }}">Remove</a></td>
            @endif
        </tr>
        <p></p>
        @endforeach
    </table>
</div>
<div class="panel-footer">
    <a href="{{ route('admin.create') }}">Create</a>
</div>
@endsection