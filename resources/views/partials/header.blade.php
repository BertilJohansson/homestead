<li><a href="{{ route('other.about') }}">About</a></li>
<li><a href="{{ route('post.index') }}">Posts</a></li>
@if(Auth::check())
<li><a href="{{ route('admin.index') }}">Admin</a></li>
@endif