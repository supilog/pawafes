$(function () {
    // ローカルストレージから、取得済み選手データを取得
    const lskey = 'pawafes';

    if(localStorage.getItem(lskey)){
        // 現在の取得済みカウント
        const players = JSON.parse(localStorage.getItem(lskey));
        console.log(players);
        // 取得済みカウントを更新
        $('.count_founded').html(players.length);
        // クラス付与
        for (var i = 0; i < players.length; i++) {
            $('.pawafes' + players[i]).addClass("founded");
        }
    }else{
        // console.log(false);
        // console.log(localStorage.getItem(lskey));
        // const array = [4, 6, 8];
        // const serializedArray = JSON.stringify(array);
        // localStorage.setItem(lskey, serializedArray);
    }


    // 選手をクリックしたら取得切り替え

    // 切り替え時に、ローカルストレージを更新し、取得済みカウントを更新


    // ローカルストレージデータを配列にして取得
    var getPlayersData = function(){
        return JSON.parse(localStorage.getItem(lskey));
    }

    var savePlayerData = function(array){
        array = Array.from(new Set(array));
        localStorage.setItem(lskey, JSON.stringify(array));
    }

    // ユーザー追加
    var addPlayer = function(no){
        var players = getPlayersData();
        if(!players){
            players = [];
        }
        players.push(no);
        savePlayerData(players)
    };
    // ユーザー削除
    var removePlayer = function(no){
        var players = getPlayersData();
        players = players.filter((item) => {
            return (item != no);
        });
        savePlayerData(players)
    };

    $('.player').click(function () {
        const no = $(this).data('playerno');
        if($(this).hasClass("founded")){
            // 削除
            $(this).removeClass("founded");
            removePlayer(no);
        }else{
            // 追加
            $(this).addClass("founded");
            addPlayer(no);
        }
    });

    // test
    $('.count_founded').click(function () {
        console.log('test');
        localStorage.removeItem(lskey);
    });
});
