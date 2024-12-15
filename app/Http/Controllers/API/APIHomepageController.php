<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Phim;
use Carbon\Carbon;
use Illuminate\Http\Request;

class APIHomepageController extends Controller
{
    public function getIdFilmDetail(Request $request)
    {
        $data = Phim::find($request->id);

        return response()->json([
            'data'   => $data,
        ]);
    }
}
