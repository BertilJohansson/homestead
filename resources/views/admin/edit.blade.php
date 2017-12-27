@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Edit</div>
                <div class="panel-body">
                    <form action="{{ route('admin.update') }}" method="post">
                        <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $post->title }}">
                            
                            @if ($errors->has('title'))
                            <span class="help-block">
                                <strong>{{ $errors->first('title') }}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                            <label for="content">Content</label>
                            <input type="text" class="form-control" id="content" name="content" value="{{ $post->content }}">

                            @if ($errors->has('content'))
                            <span class="help-block">
                                <strong>{{ $errors->first('content') }}</strong>
                            </span>
                            @endif
                        </div>
                        <input type="hidden" name="id" value="{{ $postId }}">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        {{ csrf_field()}}        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

