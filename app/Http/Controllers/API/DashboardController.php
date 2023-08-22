<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\GaleryModel;
use App\Models\NewsModel;
use App\Models\PendaftaranModel;
use App\Models\SetupModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function countData()
    {
        $galery = GaleryModel::count();
        $news = NewsModel::count();
        $setup = SetupModel::count();
        $pendaftaran = PendaftaranModel::count();
        return response()->json([
            'code' => 200,
            'message' => 'success count',
            'data' => [
                'galery' => $galery,
                'news' => $news,
                'setup' => $setup,
                'pendaftaran' => $pendaftaran,
            ]
        ]);
    }
}
