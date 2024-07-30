$(function () {
    // ローカルストレージから、取得済み選手データを取得
    const lskey = 'pawafes';
    const selector_count = $('.count_founded');
    const selector_count_left = $('.count_left');
    const count_all = $('#search-condition').data('countall');

    // Cookieデータを配列にして取得
    var getPlayersData = function () {
        return JSON.parse($.cookie(lskey));
    }

    // Cookieに選手データを格納
    var savePlayerData = function (array) {
        array = Array.from(new Set(array));
        $.cookie(lskey, JSON.stringify(array), {expires: 365, path: '/'});
    }

    if ($.cookie(lskey)) {
        // 現在の取得済みカウント
        const players = JSON.parse($.cookie(lskey));
        // 取得済みカウントを更新
        selector_count.html(players.length);
        selector_count_left.html(count_all - players.length);
        // クラス付与
        for (var i = 0; i < players.length; i++) {
            $('.pawafes' + players[i]).addClass("founded");
        }
    } else {
        // 空の配列をCookieにセットする
        const init = [];
        savePlayerData(init);
    }

    // ユーザー追加
    var addPlayer = function (no) {
        var players = getPlayersData();
        if (!players) {
            players = [];
        }
        players.push(no);
        // データ保存
        savePlayerData(players)
        // 表示カウントアップ
        selector_count.html(parseInt(selector_count.html()) + 1);
        selector_count_left.html(parseInt(selector_count_left.html()) - 1);
    };
    // ユーザー削除
    var removePlayer = function (no) {
        var players = getPlayersData();
        players = players.filter((item) => {
            return (item !== no);
        });
        // データ保存
        savePlayerData(players)
        // 表示カウントダウン
        selector_count.html(parseInt(selector_count.html()) - 1);
        selector_count_left.html(parseInt(selector_count_left.html()) + 1);
    };

    $('.player-wrap').click(function () {
        const no = $(this).data('playerno');
        if ($(this).hasClass("founded")) {
            // 削除
            $(this).removeClass("founded");
            removePlayer(no);
        } else {
            // 追加
            $(this).addClass("founded");
            addPlayer(no);
        }
    });

});
