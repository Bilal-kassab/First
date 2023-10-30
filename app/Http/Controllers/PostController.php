<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Client\ResponseSequence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$post=DB::table('posts')->get();

        $post=Post::all();
        return view('posts.index',compact('post'));

        // Scope query 
        // $post=Post::Index()->first();

        // return $post;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $post=new Post();
        // $post->title=$request->title;
        // $post->body=$request->body;
        // $post->save();
        
        Post::create([
            'title'=>$request->title,
            'body'=>$request->body

        ]);
        return redirect()->route('posts.index');

        // DB::table('posts')->insert([
        //     'title'=>$request->title,
        //     'body'=>$request->body
        // ]);
        // return redirect()->route('posts.create');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $post=Post::onlyTrashed()->get();
        return view('posts.softdelete',compact('post'));
    }
    public function showDeletedPost()
    {
        $post=Post::onlyTrashed()->get();
        return view('posts.softdelete',compact('post'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $post=DB::table('posts')->where('id',$id)->first();
        // return view('posts.edite',compact('post'));
        $post=Post::findorfail($id);
        return view('posts.edite',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        // DB::table('posts')->where('id',$id)->update([
        //     'title'=>$request->title,
        //     'body'=>$request->body

        // ]);

                $post=Post::findorfail($id);
                $post->title=$request->title;
                $post->body=$request->body;
                $post->save();
            return redirect()->route('posts.index');

           
    }

    /**
     * Remove the specified resource from storage.
     */
   

    public function destroy($id)
    {
       Post::destroy($id);
       return redirect()->route('posts.index');
    }

    public function restore($id){
        Post::withTrashed()->where('id', '=' ,$id)->restore();
        return redirect()->route('posts.index');
    }
    public function restoreAll(){
        Post::withTrashed()->restore();
        return redirect()->route('posts.index');
    }

    public function delete($id){
        Post::withTrashed()->where('id','=',$id)->forceDelete();
         return redirect()->route('deletedpost');
         
    }
}
