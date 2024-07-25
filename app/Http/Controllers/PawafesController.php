<?php

namespace App\Http\Controllers;

use App\Http\Requests\PawafesListRequest;
use App\Libs\PawafesLib;
use Illuminate\Http\Request;

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
        $sw = $request->s;
        $position = $request->p;

        list($players, $count_condition) = $this->pfl->getPlayers($sw, $position);
        $data = [
            'count' => [
                'all' => $this->pfl->getPlayersCountAll(),
                'condition' => $count_condition
            ],
            'current' => url()->full(),
            'players' => $players
        ];

        return view('list', $data);
    }
}
