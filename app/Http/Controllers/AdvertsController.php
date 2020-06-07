<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Advert;
use \App\Image;
use \App\User;

class AdvertsController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth')->except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverts = Advert::where('user_id', auth()->id())->get();
        return view('my-ads.index', ['adverts' => $adverts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('my-ads.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ad = new Advert();
        $ad->title = request('title'); 
        $ad->description = request('description'); 
        $ad->user_id = auth()->id(); 
        $ad->save(); 

        return redirect('/adverts');
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $advert = Advert::findOrFail($id);
        $this->authorize('view', $advert);
        $images = Image::where('advert_id', $advert->id)->get();
        return view('my-ads.show', ['advert' => $advert, 'images'=>$images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $advert = Advert::findOrFail($id);
        $this->authorize('update', $advert);
        $images = Image::where('advert_id', $advert->id)->get();
        $user = User::findOrFail(auth()->id());

        return view('my-ads.edit', ['advert' => $advert, 'images'=>$images, 'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd(request()->all());

        $ad = Advert::findOrFail($id);
        $this->authorize('update', $ad);
        $ad->title = request('title'); 
        $ad->description = request('description'); 

        $user = User::findOrFail(auth()->id());
        if($user->isAdmin()){
            if($request->has('approved') && request('approved')==='true'){
                $ad->approved = 1;
            }else{
                $ad->approved = 0;
            }
        }

        $ad->save(); 

        return redirect('/adverts/'.$id.'/edit');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $ad = Advert::findOrFail($id);
        $this->authorize('delete', $ad);

        $ad->delete();
        return redirect('/adverts');
    }
}
