$(function () {
    const lskey = 'pawafes';
    var cleanbtn = $('#storage-clean');
    var renewal = $('#renewal');
    cleanbtn.click(function(){
        $.removeCookie(lskey, { path: '/' });
    });

    renewal.click(function(){
        const players = JSON.parse(localStorage.getItem(lskey));
        $.cookie(lskey,JSON.stringify(players));
    });
});

