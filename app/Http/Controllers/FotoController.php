<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use Exception;
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
        if($typeImage['perfil-or-cover'] === 'perfil') {
            $typeImage = 'perfil';
        } else if($typeImage['perfil-or-cover'] === 'cover') {
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
        $requestData = $r->only(['idUser', 'typeDelete']);


        $deleted = Fotos::where([['user_id','=', $requestData['idUser']], ['type_foto', '=', $requestData['typeDelete']]]);

        if(!$this->deleteOfServer($deleted->get()[0])){
            redirect()->route('profile');
            return response()->json('Error - Image does not exist');
        }

        redirect(route('profile'));

        return response()->json('sucess - success - successfully deleted image');
    }
    
    private function deleteOfServer(Fotos $ft) {
        try {
            $imagemPath = public_path('storage/images/' . $ft['caminho_imagem']);
        } catch (Exception $e) {
            return false;
        }

        if(file_exists($imagemPath)) {
            unlink($imagemPath);
            $ft->delete();
            return true;
        } 
        return false;
    }    
}
