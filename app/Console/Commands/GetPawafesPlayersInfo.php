<?php

namespace App\Console\Commands;

use App\Exceptions\PawafesException;
use App\Models\Pawafescharacters;
use App\Models\Player;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Symfony\Component\DomCrawler\Crawler;

class GetPawafesPlayersInfo extends Command
{
    protected $signature = 'pawafes:get';

    protected $description = 'パワフェスデータを取得しDB格納';

    public function handle()
    {
        $client = new Client();
        $url = 'https://game8.jp/pawapuro2024-2025/625623';
        $res = $client->request('GET', $url);
        $html = $res->getBody()->getContents();
        $crawler = new Crawler($html);

        $crawler->filter('.scroll--table table tbody tr')->each(function ($node) {
            if (count($node->filter("td")) !== 0) {
                $tds = $node->filter('td');

                // 次のIDを取得
                $next = Player::max('id') + 1;
                // no値と一致しない場合、空データを必要な個数分保存する
                if($this->getPlayerNumber($tds->eq(0)) - $next > 0){
                    $diff = $this->getPlayerNumber($tds->eq(0)) - $next;
                    for($i = 0; $i < $diff; $i++){
                        $p = new Player();
                        $p->no = $next;
                        $p->name = null;
                        $p->img = null;
                        $p->position = null;
                        $p->condition = null;
                        $p->area = null;
                        $p->type = null;
                        $p->save();
                        $next += 1;
                    }
                }

                $p = new Player();
                $p->no = $this->getPlayerNumber($tds->eq(0));
                $p->name = $this->getPlayerName($tds->eq(1));
                $p->img = $this->getPlayerImage($tds->eq(1));
                $p->position = $this->getPlayerPosition($tds->eq(2));
                $p->condition = $this->getPlayerCondition($tds->eq(3));
                $p->area = $this->getPlayerArea($tds->eq(4));
                $p->type = $this->getPlayerType($tds->eq(5));
                $p->save();
            }
        });
    }

    /**
     * 1枠目ノードからNO情報を取得する
     * @param $node
     * @return int
     */
    private function getPlayerNumber($node): int
    {
        $ret = !empty($node->text()) ? intval($node->text()) : 0;
        return $ret;
    }

    /**
     * 2枠目ノードから名前情報を取得する
     * @param $node
     * @return string
     */
    private function getPlayerName($node): string
    {
        return $node->text();
    }

    /**
     * 2枠目ノードから画像情報を取得する
     * @param $node
     * @return string
     */
    private function getPlayerImage($node): string
    {
        if (count($node->filter("img")) == 0) {
            return "";
        }
        return $node->filter("img")->attr("data-src");
    }

    /**
     * 3枠目ノードからポジション情報を取得する
     * @param $node
     * @return string|null
     * @throws PawafesException
     */
    private function getPlayerPosition($node): ?string
    {
        if (count($node->filter("img")) == 0) {
            return null;
        }

        $positionImages = [
            '投手' => 'https://img.game8.jp/10227161/0af6e02df6c71297c768d743da2b9cd9.png/show',
            '二塁手' => 'https://img.game8.jp/10227165/254d6a18f2dded6a70dc557d420f4030.png/show',
            '外野手' => 'https://img.game8.jp/10227637/be38d62b150b7bd875e8146e7a519c88.jpeg/show',
            '一塁手' => 'https://img.game8.jp/10227163/50953e3c21fd91aa7be83c2cb0a21d12.png/show',
            '遊撃手' => 'https://img.game8.jp/10227162/737bd17cf6562a67d3953223602d3ec6.png/show',
            '捕手' => 'https://img.game8.jp/10227168/d57d7433b53d7caa51b0f4764e517018.png/show',
            '三塁手' => 'https://img.game8.jp/10227164/31122fd4eae9cf95e17d48047a26a196.png/show'
        ];

        $text = $node->filter("img")->attr('data-src');
        $imageToPosition = array_flip($positionImages);

        if (!isset($imageToPosition[$text])) {
            throw new PawafesException();
        }

        return $imageToPosition[$text];
    }


    /**
     * 4枠目ノードから獲得条件情報を取得する
     * @param $node
     * @return string|null
     */
    private function getPlayerCondition($node): ?string
    {
        if (empty($node->text())) {
            return null;
        }
        return $node->text();
    }

    /**
     * 5枠目ノードからエリア情報を取得する
     * @param $node
     * @return string|null
     */
    private function getPlayerArea($node): ?string
    {
        if (empty($node->text())) {
            return null;
        }
        return $node->text();
    }

    /**
     * 6枠目ノードからタイプ情報を取得する
     * @param $node
     * @return string|null
     */
    private function getPlayerType($node): ?string
    {
        if (empty($node->text())) {
            return null;
        }
        return $node->text();
    }
}
