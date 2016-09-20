/**
 * Created by Дмитрий on 20.09.2016.
 */
/*
 *  Скрипты для работы с корзиной
 */

$(document).ready(function() {
    $.ajaxSetup({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
    });
    
    /**
     *
     * Добавления товара в корзину
     *
     * @param integer itemId ID продукта
     * @return в случае успеха обновятся данные корзины на странице
     *
     */
    $('#addCart').click(function () {
        var csrftoken = $('meta[name=_token]').attr('content');
        var prodID = $(this).data('id');
        $.post('/cart/addToCart', { prodID: prodID, _token: csrftoken })
            .done(function(data) {
                $('.badge').html(data.cntprod);
            }, "json");

        return false;
    });

});

// Ф-ция для console.log()
function pr(val) {
    console.log(val);
}
