<?php

namespace App\Http\Controllers;

use App\Models\Test;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
//     Display a listing of the resource.
//     @return \Illuminate\Http\Response
    public function index()
    {
        $tests=Test::all();
        $isAdmin=Auth::user() ? $this->isAdmin(Auth::user()->getAuthIdentifier()) : false;
        return view('welcome',compact('tests','isAdmin'));
    }

//      Show the form for creating a new resource.
//      @return \Illuminate\Http\Response
    public function create()
    {
        return view('test.create');
    }

//      Store a newly created resource in storage.
//      @param  \Illuminate\Http\Request  $request
//      @return Response
    public function store(Request $request)
    {
        //
    }

//     Display the specified resource.
//     @param  int  $id
//     @return Response
    public function show($id)
    {
        //
    }

//      Show the form for editing the specified resource.
//      @param  int  $id
//      @return Response
    public function edit($id)
    {
        //
    }

//     Update the specified resource in storage.
//     @param  \Illuminate\Http\Request  $request
//     @param  int  $id
//     @return Response
    public function update(Request $request, $id)
    {
        //
    }

//     Remove the specified resource from storage.
//     @param  int  $id
//     @return Response
    public function destroy($id)
    {
        //
    }

//      Return is current user in role "Admin"
//      @param  int  $id
    public function isAdmin($id): bool{
        return User::isAdmin($id);
    }

//      Store a newly created resource in storage.
//      @param  \Illuminate\Http\Request  $request
//      @return JSON-string with name of stored file
    public function addImage(Request $request) {
        //если админ    !!!!!!!!!!!!!!!
        $request->validate([
            'file' => 'required|mimes:jpg,png,gif|max:1024',
        ]);
        $file = $request->file('file');
        $origExtension=$file->getClientOriginalExtension();
        $newFName=time().'_'.uniqid().'.'.$origExtension;
        Storage::putFileAs('public', new File($file->getPathname()), $newFName);
        $result = [
            'fileName' => '/storage/'. $newFName,
        ];
        return json_encode($result);
    }
//      Delete a newly created resource in storage.
//      @param  \Illuminate\Http\Request  $request
//      @return boolean value about deleting file
    public function deleteImage(Request $request) {
        //если админ    !!!!!!!!!!!!!!!

        return $request->src;
    }
}
