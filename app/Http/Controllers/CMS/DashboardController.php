<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;
use App\Models\CoreManagementModal;
use App\Models\RegisterCaModel;
use App\Traits\HttpResponseTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    use HttpResponseTrait;
    public function dasboardChart(Request $request)
    {
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');

        $query = RegisterCaModel::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        $data = $query->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('Y-m-d');
        })->map(function ($group) {
            return $group->count();
        });


        if ($data->isEmpty()) {
            return $this->dataNotFound();
        } else {
            return $this->success($data);
        }
    }

    public function countRegisterByGeder()
    {
        $counts = RegisterCaModel::selectRaw('gender, COUNT(*) as count')
            ->groupBy('gender')
            ->pluck('count', 'gender');

        return response()->json([
            'woman' => $counts['female'] ?? 0,
            'man' => $counts['male'] ?? 0,
        ]);
    }

    public function totalRegister(){
        $count = CoreManagementModal::count();
        $register = RegisterCaModel::count();

        return response()->json([
            'pengurus' => $count ?? 0,
            'register' => $register ?? 0,
        ]);
    }
}
