<?php

namespace App\Http\Controllers;

use App\Models\Fotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FotoController extends Controller
{
    public function uploadImg(Request $r)
    {
        $this->validate($r, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        /*A função recebe um objeto Request como parâmetro, que contém as informações da imagem a ser carregada. A primeira linha do código obtém o arquivo de imagem do objeto Request usando o método file().
        $image = $request->file('image');*/
        $image = $r->file('image'); //file('name of input')
        /* Em seguida, o código lê o conteúdo do arquivo usando a função file_get_contents() e codifica-o em base64 com a função base64_encode():
        $imageData = base64_encode(file_get_contents($image->path())); */
        $imageData = base64_encode(file_get_contents($image->path()));

        /* O nome original do arquivo é obtido usando o método getClientOriginalName(): */
        $imageName = $image->getClientOriginalName();

        $uniqueFileName = hash('sha256', time() . $imageName) . '.' . $image->getClientOriginalExtension();

        $path = $r->file('image')->storeAs('./images', $imageName);

        $imageModel = new Fotos();
        $imageModel->nome_arquivo = $uniqueFileName;
        $imageModel->type_foto = "perfil";
        $imageModel->data = $imageData;
        $imageModel->user_id = Auth::user()->id;
        $imageModel->save();

        return redirect(route('profile'));
    }
}
