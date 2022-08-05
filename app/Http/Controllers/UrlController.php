<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return response()->json(
            [
                'message' => 'Todo ok'
            ]
        );
    }

    /**
     * Undocumented function
     *
     * @return array
     */
    public function getUrl($hash)
    {
        return response()->json([
            'message' => 'Todo ok'
        ]);
    }
}
