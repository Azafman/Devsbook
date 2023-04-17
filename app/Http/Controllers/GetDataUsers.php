<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserRelation;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class GetDataUsers extends Controller
{
    static $user;

    //functions normatials
    public static function getProfilePhoto(User $user, string $type = "perfil")
    {
        $getPhotoProfile = DB::table('fotos')
            ->select('caminho_imagem')
            ->where([['type_foto', '=', $type], ['user_id', '=', $user->id]])
            ->get();

        try {
            $getPhotoProfile = 'storage/images/' . $getPhotoProfile[0]->caminho_imagem;
        } catch (Exception $e) {
            $getPhotoProfile = 'media/avatars/avatar.jpg';
        }
        return $getPhotoProfile;
    }
    public static function getUserAuth()
    {
        if (!self::$user) {
            //self::nome variavel => é o que uso para acessar a variável estática dessa classe.
            self::$user = Auth::user();
        }
        return self::$user;
    }
    public static function closeUser()
    {

        self::$user = null;
        return true;
    }
    public static function getRelations()
    {
        $followers = [
            UserRelation::where([['user_id', '=', self::getUserAuth()->id]])->count(),
            UserRelation::where([['seguindo', '=', self::getUserAuth()->id]])->count(),
        ];

        return $followers;
    }
}
