<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FotoController extends Controller
{
    public function uploadImg(Request $r){
        $this->validate($r, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        /*A função recebe um objeto Request como parâmetro, que contém as informações da imagem a ser carregada. A primeira linha do código obtém o arquivo de imagem do objeto Request usando o método file().
        $image = $request->file('image');*/
        $image = $r->file('image'); //file('name of input')

        /* O nome original do arquivo é obtido usando o método getClientOriginalName(): */
        $imageName = $image->getClientOriginalName();

        $uniqueFileName = hash('sha256', time() . $imageName) . '.' . $image->getClientOriginalExtension();//generate at unique name

        $path = $r->file('image')->storeAs('public/images', $uniqueFileName);//salve the image in the repository setted, and returns the path of image

        $imageModel = new Fotos();
        $imageModel->caminho_imagem = $path;
        $imageModel->type_foto = "perfil";
        $imageModel->user_id = Auth::user()->id;
        $imageModel->save();

        return redirect(route('profile'));
    }
    public static function getProfilePicture() {
        return DB::table('fotos')
        ->select('caminho_imagem')
        ->where('type_foto', '=', 'perfil')
        ->where('user_id', '=', UserController::$idUser)
        ->get();
    }
}
