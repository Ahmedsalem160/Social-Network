<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddComController extends Controller
{
    public function AddCom(Request $request,$id){

        $validatedData = $request->validate([
            'body' => 'required',
        ]);
        //$request['user_id']=Auth::id();
        //$request['post_id']=$id;
        $comment=new Comment();
        $comment->comment=$request->body;
        $comment->user_id=Auth::id();
        $comment->post_id=$id;
        //Comment::create($request->all());
        $comment->save();

        return redirect()->back();
    }

    public function destroy($id){
        Comment::findOrFail($id)->delete();
        return redirect()->back();
    }
}
