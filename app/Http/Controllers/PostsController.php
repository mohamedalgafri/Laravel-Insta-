<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Rules\contentRule;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts= post::all();
        return view('posts.index',[
            'posts'=>$posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',[
            'post'=>new post(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new post();

        $this->validatee($request);
        


         
        
        //  $post->content = $request->input('content'); // $request->post('content);
        //  $post->user_id = null;
        //  $post->save();

         $post->create( $request->all() );

        return redirect('/posts')->with('status','Post Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=post::find($id); // down findOrFail badal find()

    return view('posts.edit',compact('post'));
    }
    /*
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=post::findOrFail($id);

        $this->validatee($request);
        // $request->validate([
        //     'content'=> 'required|min:10|max:255|string',
        //     'image'=> 'required|image|max:1024|dimensions:max_width=500,max_height=800'
        // ]);
        
        // $post->content = $request->input('content');
        // $post->save();

        $post->update($request->all());

        return redirect('/posts')->with('status','Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id','=',$id)->delete();

        // $post = post::findOrFail($id);
        // $post->delete();

        return redirect('/posts')->with('status','Post deleted!');
    }

    public function trash(){

        return view('posts.index',[
            'posts'=> post::onlyTrashed()->get(),
        ]);
    }

    public function restore(Request $request ,$id){
        $post = post::onlyTrashed()->findOrFail($id);
        $post->restore();

        return redirect('/posts')->with('status','Post restored!');
    }

    public function forceDelete($id){
        $post = post::onlyTrashed()->findOrFail($id);
        $post->forceDelete();  
        
        return redirect('/posts')->with('status','Post deleted permanently');
    }


    protected function validatee($request){
        $request->validate([
            

            'content'=> 
            [
                'required',
                'min:10',
                'max:255',
                'string',

                new contentRule(['god','allah','laravel']),

                // function($attribute,$vale,$fail){
                //     if(strpos($vale,'god') !== false){
                //         $fail('You can not use this word "god" ');
                //     }
                // }
            ],

            'title'=>'required',
            // 'image'=> 'required|image|max:1024|dimensions:max_width=500,max_height=800'
        ],[
            'required'=>'مطلوب :attribute حقل',
            'min'=> ':min الحقل اقل من '
        ]);
    }
}

