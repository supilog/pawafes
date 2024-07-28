$(function () {
    const sc = $('#search-condition');
    const clicktarget = $('#switch-earned');
    clicktarget.click(function () {
        const flg = sc.data('disp');
        if (flg === 0) {
            // 未獲得を表示
            $('.player-wrap').each(function () {
                $(this).parent().removeClass('disp-none');
                if ($(this).hasClass('founded')) {
                    $(this).parent().addClass('disp-none');
                }
            });
            // flg -> 1
            sc.data('disp', 1);
            clicktarget.removeClass('red');
            clicktarget.addClass('green');
        }

        if (flg === 1) {
            // 獲得済みを表示
            $('.player-wrap').each(function () {
                $(this).parent().removeClass('disp-none');
                if (!$(this).hasClass('founded')) {
                    $(this).parent().addClass('disp-none');
                }
            });
            // flg -> 2
            sc.data('disp', 2);
            clicktarget.removeClass('green');
            clicktarget.addClass('red');
        }

        if (flg === 2) {
            // 全て表示
            $('.player').each(function () {
                $(this).removeClass('disp-none');
            });
            // flg -> 0
            sc.data('disp', 0);
            clicktarget.removeClass('green');
            clicktarget.removeClass('red');
        }

        const list = $('.player-wrap');
    });
});

