<?php

namespace App\Http\Controllers;

use App\Post;
use Auth;
use Gate;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function getIndex()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();        
        return view('post.index', ['posts' => $posts]);
    }

    public function getPost($id)
    {
        $post = Post::find($id);
        return view('post.post', ['post' => $post]);
    }
    
    public function getAdminIndex()
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $posts = Post::orderBy('title', 'asc')->get();       
        return view('admin.index', ['posts' => $posts]);
    } 
    
    public function getAdminCreate()
    {
        return view('admin.create');
    }

    public function postAdminCreate(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $user = Auth::user();
        if (!$user)
        {
            return redirect()->back();      
        }
        $post = new Post([
            'title' => $request->input('title'),
            'content' => $request->input('content')
        ]);
        $user->posts()->save($post);
        return redirect()->route('admin.index')->with('info', 'Post created, Title is: ' . $request->input('title'));
    }

    public function getAdminEdit($id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $post = Post::find($id);
        return view('admin.edit', ['post' => $post, 'postId' => $id]);
    }

     public function postAdminUpdate(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        $post = Post::find($request->input('id'));
        if (Gate::denies('update-post', $post)) {
            return redirect()->back();
        }
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();
        return redirect()->route('admin.index')->with('info', 'Post edited, Editetd title is: ' . $request->input('title'));
    }

    public function getAdminDelete($id)
    {
        if (!Auth::check()) {
            return redirect()->back();
        }
        $post = Post::find($id);
        if (Gate::denies('update-post', $post)) {
            return redirect()->back();
        }
        $post->delete();
        return redirect()->route('admin.index')->with('info', 'Post deleted');
    }
 }
