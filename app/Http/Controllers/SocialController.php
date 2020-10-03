<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\User;
use App\Post;
use App\Comment;
use App\Like;

class SocialController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function member(){
        $profiles = User::all();
        return view('member',compact('profiles'));
    }

    public function store(Request $request){
        $request->validate([
            'body'=>'required',
        ]);
        $user_id = Auth::id();
        $post = new Post();
        $like = new Like();

        $post->body = $request['body'];
        $post->profil_id = $user_id;
        $post->photo_post = $request['photo'];
        $post->save();
        $like->post_id = $post->id;
        $like->timestamps = false;
        $like->save();
        return redirect('/index')->with('post_success','Your post has been posted!');
    }

    public function del_post(Request $request){
        $postid = $request['del'];
        $query = Post::where('id',$postid)->delete();
        return redirect('/index')->with('del_success', 'Post successfully deleted!');
    }

    public function edit_post($id){
        $post = Post::where('id',$id)->first();
        return view('post_edit', compact('post'));
    }

    public function update_post($id,Request $request){
        $request->validate([
            'body'=>'required'
        ]);
        $post = Post::where('id',$id)->update([
            'body'=>$request['body'],
            'photo_post'=>$request['photo']
        ]);
        return redirect('/index')->with('updatepost_success','Post successfully edited.');
    }

    public function post_like($id){
        $like = Like::where('post_id',$id)->increment("like",1);
        return redirect('/index')->with('like_success','Post successfully liked!');
    }

    public function photo(){
        $photos = Post::select('photo_post');
        return view('photo',compact('photos'));
    }

    public function profile(){
        $id_check = Auth::id();
        $posts = Post::select('body')->where('profil_id', $id_check)->get();
        return view('profile',compact('posts'));
    }

    public function index(){
        $user = User::all();
        $posts = Post::all();
        $likes = Like::all();
        $user_and_posts = User::join('posts', 'users.id', '=', 'posts.profil_id')->get();
        $post_likes = Post::join('post_like', 'posts.id','=','post_like.post_id')->get();
        return view('index',compact('posts','user','user_and_posts','likes','post_likes'));
    }

    public function edit_profile(){
        $id_check = Auth::id();
        $profile = User::where('id', $id_check)->first();
        return view('edit', compact('profile'));
    }

    public function update_profile(Request $request){
        $id_check = Auth::id();
        $request->validate([
            'name'=>'required',
            'birthdate'=>'required',
            'address'=>'required',
            'photo'=>'required'
        ]);
        $profile = User::where('id', $id_check)->update([
            'name'=>$request['name'],
            'birthdate'=>$request['birthdate'],
            'address'=>$request['address'],
            'photo'=>$request['photo'],
        ]);
        return redirect('/profile')->with('update_success','Profile successfully updated.');

    }

}
