<?php

namespace App\Libs;

use App\Models\Player;

class PawafesLib
{
    /**
     * DBから選手データを取得する(件数も取得)
     * @return array
     */
    public function getPlayers($search_word = null, $position = 0)
    {
        // 全ての選手を対象
        $query = Player::where('id', '>=', 0);
        // 検索ワード
        if (!empty($search_word)) {
            $query = $query->whereFullText(['name', 'position', 'condition', 'area', 'type'], $search_word);
        }
        // ポジション
        if (!empty($position)) {
            $query = $this->addQueryPosition($query, $position);
        }

        return array($query->get(), $query->count());
    }

    /**
     * クエリー条件追加
     * @param $query
     * @param $position
     * @return mixed
     */
    public function addQueryPosition($query, $position)
    {
        $target = '';
        switch ($position) {
            case 1:
                $target = '投手';
                break;
            case 2:
                $target = '捕手';
                break;
            case 3:
                $target = '一塁手';
                break;
            case 4:
                $target = '二塁手';
                break;
            case 5:
                $target = '三塁手';
                break;
            case 6:
                $target = '遊撃手';
                break;
            case 7:
                $target = '外野手';
                break;
            default:
                break;
        }
        if(!empty($target)){
            $query = $query->where('position', $target);
        }
        return $query;
    }

    public function getPlayersCountAll(){
        return Player::where('id', '>', 0)->count();
    }

    public function getPlayersCountCondition(){

    }
}
