<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Helpers\UrlValidator;

class UrlController extends Controller
{
    /**
     * Undocumented function
     *
     * @param Request $request
     * @return array
     */
    public function postUrl(Request $request)
    {

        $validador = Validator::make($request->all(), [
            'url' => 'required'
        ]);

        if($validador->fails()){
            $errors = $validador->errors();
            return response()->json([
                'message' => 'Ocurrio un error',
                'data' => $errors->all()
            ], 401);
        }

        if(!UrlValidator::validateUrl($request->input('url'))){
            return response()->json([
                'message' => 'Url inexistente'
            ], 401);
        }
        
        $hash = hash('sha256', $request->input('url')."@".date('Y-m-d H:i:s'));
        $urlEncoded = 'http://localhost:8000/api/url/'.$hash;

        DB::table('urls')->insert([
            'hash' => $hash,
            'url' => $request->input('url'),
            'urlEncoded' => $urlEncoded
        ]);

        return response()->json([
            'message' => 'Ok',
            'urlEncoded' => $urlEncoded
        ]);
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getUrl($hash)
    {

        $urlArray = DB::table('urls')->where('hash', $hash)->first();

        if(!$urlArray){
            return response()->json([
                'message' => 'Resource not found'
            ], 404);
        }

        return response()->json([
            'message' => 'Ok',
            'originalUrl' => $urlArray->url
        ]);
    }
}
