$(function () {
    const selector_search_condition = $('#search-condition');
    const selector_sw = $('#input-sw');
    const selector_area = $('#select-area');
    selector_sw.click(function () {
        selector_sw.focus();
    });

    selector_area.change(function () {
        const area = selector_area.val();
        const sw = selector_search_condition.data('sw');
        const position = selector_search_condition.data('position');
        const target = '/list?sw=' + sw + '&a=' + area + '&p=' + position;
        window.location.href = target;
    });
});
