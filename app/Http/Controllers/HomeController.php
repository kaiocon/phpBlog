<?php

namespace App\Http\Controllers;

use App\blogPost;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
	
	public function newPost(Request $req)
	{
		$req->validate([
		'postTitle' => 'required',
		'postSummary' => 'required',
		'postBody' => 'required',
		]);
		
		$newPost = new blogPost();
		$newPost->postTitle = $req->input('postTitle');
		$newPost->postSummary = $req->input('postSummary');
		$newPost->postBody = $req->input('postBody');
		$newPost->postTime = now();
		$newPost->save();
		return redirect()->route('/')->with('status', 'Post created!');
	}
	
	public function deletePost($blogPost_id){
		
		$blogPost = blogPost::find($blogPost_id);
		$blogPost->delete();
		return redirect()->route('/')->with('status', 'Post Deleted!');
	}
	
	public function editPost($blogPost_id){
		
		$blogPost = blogPost::find($blogPost_id);
		return view('editPost', ['blogPost' => $blogPost]);
	}

	public function updatePost(Request $req, $blogPost_id){
		
		$blogPost = blogPost::find($blogPost_id);
		$blogPost->postTitle = $req->input('postTitle');
		$blogPost->postSummary = $req->input('postSummary');
		$blogPost->postBody = $req->input('postBody');
		$blogPost->save();
		return redirect()->route('/')->with('status', 'Post Updated!');
	}	
	
	
}
