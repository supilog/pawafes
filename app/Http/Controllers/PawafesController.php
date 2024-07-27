<?php

namespace App\Http\Controllers;

use App\Http\Requests\PawafesListRequest;
use App\Libs\PawafesLib;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PawafesController extends Controller
{
    protected $pfl;
    function __construct(){
        $this->pfl = new PawafesLib();
    }

    public function index()
    {
        return view('index');
    }

    public function list(PawafesListRequest $request)
    {
        $sw = $request->sw;
        $position = !empty($request->p) ? $request->p : 0;
        $area = !empty($request->a) ? $request->a : 0;
        Log::info($sw . " " . $position . " " . $area);

        list($players, $count_condition) = $this->pfl->getPlayers($sw, $position, $area);
        $data = [
            'count' => [
                'all' => $this->pfl->getPlayersCountAll(),
                'condition' => $count_condition
            ],
            'current' => url()->full(),
            'players' => $players,
            'area' => $area,
            'sw' => $sw,
            'position' => $position
        ];

        return view('list', $data);
    }
}
