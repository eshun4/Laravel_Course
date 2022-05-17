<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PostsController extends Controller
{

   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('posts.index', ['posts' =>BlogPost::all()]);
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
    public function store(StorePost $request)
    {
        $validated = $request->validated();
        $post = BlogPost::create($validated);
        // $post = new BlogPost();
        // $post->title = $validated['title'];
        // $post->content = $validated['content'];
        // $post->save();
    //Difference between create and make is that create will create the model
    // fill all of its properties with its input and immediately try to save the properties to the database
    // however make will not save the properties of the model to the database.
    //if you call make(), you have to call the save()  method on it, but
    // not on save().
        BlogPost::create();

        $request->session()->flash('status', 'The blog post was created!');

        return redirect()->route('posts.show', ['post'=>$post->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    public function show($id)
    {
        // abort_if(!isset($this->posts[$id]), 404);
       
        $nftdata = Http::get('https://eth-mainnet.alchemyapi.io/v2/f2C-HgTnCZZYVcTBabNBDpMpmap0DFx4/getNFTs/?owner=0xfAE46f94Ee7B2Acb497CEcAFf6Cff17F621c693D');
        return view('posts.show', 
        [
            'post' => BlogPost::findOrfail($id),
            'NFT' => $nftdata
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //This will help you update your model
        return view('posts.edit',['post' => BlogPost::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StorePost $request, $id)
    {
        //
        $post = BlogPost::findOrFail($id);
        $validated = $request->validated();
        $post->fill($validated);
        $post->save();

        $request->session()->flash('status', 'Blog post was updated!');
        return redirect()->route('posts.show', ['post'=> $post->id]);

        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = BlogPost::findOrFail($id);
        $post->delete();

        session()->flash('status', 'Blog post was deleted!');
        return redirect()->route('posts.index');
    }
}
