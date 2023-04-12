<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FotoController extends Controller
{
    public function uploadImg(Request $r){
        //dd($r->only(['perfil-or-cover'])); confere -- tudo ok!
        $this->validate($r, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        /*A função recebe um objeto Request como parâmetro, que contém as informações da imagem a ser carregada. A primeira linha do código obtém o arquivo de imagem do objeto Request usando o método file().
        $image = $request->file('image');*/
        $typeImage = $r->only(['perfil-or-cover']);
        $image = $r->file('image'); //file('name of input')

        /* O nome original do arquivo é obtido usando o método getClientOriginalName(): */
        $imageName = $image->getClientOriginalName();

        $uniqueFileName = hash('sha256', time() . $imageName) . '.' . $image->getClientOriginalExtension();//generate at unique name

        $path = $r->file('image')->storeAs('public/images', $uniqueFileName);//salve the image in the repository setted, and returns the path of image

        $imageModel = new Fotos();
        $imageModel->caminho_imagem = $uniqueFileName;
        if($typeImage === 'profile-foto') {
            $typeImage = 'perfil';
        } else if($typeImage === 'cover') {
            $typeImage = 'cover';
        } else {
            $typeImage = 'post';
        }
        $imageModel->type_foto = $typeImage;
        $imageModel->user_id = Auth::user()->id;
        $imageModel->save();

        return redirect(route('profile'));
    }
    public function deleteImg(Request $r) {
        dd("delete!");
    }
    
}
