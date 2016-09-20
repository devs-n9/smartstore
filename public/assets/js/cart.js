/**
 * Created by Дмитрий on 20.09.2016.
 */
/*
 *  Скрипты для работы с корзиной
 */

$(document).ready(function() {
    /**
     *
     * Добавления товара в корзину
     *
     * @param integer itemId ID продукта
     * @return в случае успеха обновятся данные корзины на странице
     *
     */
    $('#addCart').click(function () {
        var itemID = $(this).data('id');
        $.post('/cart/addToCart', { itemID: itemID });

        return false;
    });

});

// Ф-ция для console.log()
function pr(val) {
    console.log(val);
}
