<?php

namespace App\Http\Controllers;
use App\User;
use App\blogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


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
	
	public function users()
    {
        $users = User::orderBy('id', 'ASC')->get();
        return view('users', ['users' => $users]);
    }
	
	public function newPost(Request $req)
	{
		$req->validate([
		'postTitle' => 'required',
		'postSummary' => 'required',
		'postBody' => 'required',
		'postImage'     =>  'image|mimes:jpeg,png,jpg,gif|max:2048',
		]);
		
		
		$newPost = new blogPost();
		$newPost->postTitle = $req->input('postTitle');
		$newPost->postSummary = $req->input('postSummary');
		$newPost->postBody = $req->input('postBody');
		$newPost->postTime = now();
		$newPost->postAuthor = Auth::user()->name;

		
		if($req->hasFile('postImage')){
			$img = $req->file('postImage');
			$imgName = time().'.'.$img->extension();
			$destination = public_path('/img');
			$img->move($destination, $imgName);
			$newPost->postImage = $imgName;
		}
		
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
		
		if($req->hasFile('postImage')){

			$img = $req->file('postImage');
			$imgName = time().'.'.$img->extension();
			$destination = public_path('/img');
			$img->move($destination, $imgName);
			$blogPost->postImage = $imgName;
		}
		
		$blogPost->save();
		return redirect()->route('/')->with('status', 'Post Updated!');
	}	
	
	public function newUser(Request $req)
	{
		$req->validate([
		'userName' => 'required',
		'userEmail' => 'required',
		'userPassword' => 'required',
		'confirmPassword'     =>  'required',
		]);
		 $check = User::where('email', $req->input('userEmail'))->first(); 
		if($req->input('userPassword') == $req->input('confirmPassword') && ! $check ){
			$newUser = new User();
			$newUser->name = $req->input('userName');
			$newUser->email = $req->input('userEmail');
			$newUser->password = bcrypt($req->input('userPassword'));
			
			$newUser->save();
			return redirect()->route('users')->with('status', 'User created!');
		}
		else{
			return redirect()->route('users')->with('redStatus', 'User not created!');
		}

	}
	
		public function deleteUser($user_id){
			$user = User::find($user_id);
		
			if($user->id != Auth::user()->id){
				$user->delete();
				return redirect()->route('users')->with('status', 'User Deleted!');
			}
			else{
				return redirect()->route('users')->with('redStatus', 'Invalid - Cannot delete current user!');
			}
	}
	
}
