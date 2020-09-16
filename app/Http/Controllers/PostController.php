<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostData;
use App\Models\Post;
use App\Models\User;
use App\Traits\PostTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    use PostTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts=Post::all();
        return view('posts/show',compact('posts'));
        //return view('home');
    }
    public function userPosts(){
        $id=Auth::id();
        $posts = User::find($id)->posts;
        //$user = DB::table('users')->where('id',$id)->first();

        //dd($posts);

        return view('userPages.posts',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(PostData $request)
    {

        //Trait
        $file_name=$this->SaveImage($request->img,'images/posts');
        $id=Auth::user()->id;
        // store
        $post=new Post();
        $post->user_id=$id;
        $post->title=$request->title;
        $post->body=$request->body;
        $post->img=$file_name;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::findOrFail($id);
        return view('posts/showPost',compact('post'));
        //return view('posts/show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::findOrFail($id);
        return view('posts/edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostData $request, $id)
    {
        //$id=Auth::user()->id;
        //dd($id);
        $post=Post::findOrFail($id);
        $post->title=$request->title;
        $post->body=$request->body;
        //$post->user_id=$id;
        $post->save();

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::find($id)->delete();
        return redirect()->route('posts.index');
        /*if (!$post)
            return redirect()->route('posts.index');
        $post->delete();
*/
       //return redirect()->route('posts.index');
    }
}
