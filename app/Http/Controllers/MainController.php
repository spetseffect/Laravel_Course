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

    public function isAdmin($id): bool{
        return User::isAdmin($id);
    }

    public function addImg(Request $request) {
        $request->validate([
            'file' => 'required|mimes:jpg,png,gif|max:1024',
        ]);
        $file = $request->file('file');
        $origExtension=$file->getClientOriginalExtension();
        $newFName=time().'_'.uniqid().'.'.$origExtension;
        Storage::putFileAs('public', new File($file->getPathname()), $newFName);
//        $answer=array("mes"=>'',"tempFile"=>'article_'.$time.'.jpg');
//        $outW=500;//максимальная ширина
//        $outH=500;//максимальная высота
//        $max_size=1024*1024*1;//максимальный размер загружаемого изображения в байтах
//        if($_FILES['f']['size']==0){$answer['mes']='Файл не загружен. Повторите попытку';}
//        else{
//            if($_FILES['f']['size']>$max_size){$answer['mes']='Файл превысил допустимый размер. Выберите файл размером до 2 Мб и повторите попытку.';}
//            else{
//                $imsize=getimagesize($_FILES['f']['tmp_name']);
//                if($imsize[2]!=1 && $imsize[2]!=2 && $imsize[2]!=3){$answer['mes']='Этот тип файлов не поддерживается.';}
//                else{
//                    if($imsize[2]==2){
//                        $im=imagecreatefromjpeg($_FILES['f']['tmp_name']);}
//                    if($imsize[2]==1){
//                        $im=imagecreatefromgif($_FILES['f']['tmp_name']);}
//                    if($imsize[2]==3){
//                        $im=imagecreatefrompng($_FILES['f']['tmp_name']);}
//                    //получаем высоту и ширину загруженного изображения
//                    $w=$imsize[0]; $h=$imsize[1];
//                    //вычисляем будущие размеры изображения
//                    if($h>$w && $h>$outH){$H=$outH; $W=ceil($w/($h/$outH));}
//                    elseif($w>$h && $w>$outW){$W=$outW; $H=ceil($h/($w/$outW));}
//                    else{$H=$h; $W=$w;}
//
//                    $newimg=imagecreatetruecolor($W,$H);
//                    imagecopyresampled($newimg,$im,0,0,0,0,$W,$H,$w,$h);
//                    imagejpeg($newimg,$path);
//                    imagedestroy($newimg);
//                }
//            }
//        }
//        echo json_encode($answer);
        $result = [
            'fileName' => '/storage/'. $newFName,
        ];
        return json_encode($result);
    }
}
