/**
 * Created by Дмитрий on 20.09.2016.
 */
/*
 *  Скрипты для работы с корзиной
 */

$(document).ready(function() {
//    $.ajaxSetup({
//        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
//    });
    
    /**
     *
     * Добавления товара в корзину
     *
     * @param integer prodId ID продукта
     * @return в случае успеха обновятся данные корзины на странице
     *
     */
    $('#addCart').click(function () {
        var csrftoken = $('meta[name=_token]').attr('content');
        var prodID = $(this).data('id');
        pr(prodID);
        $.post('/cart/addToCart', { prodID: prodID, _token: csrftoken })
            .done(function(data) {
                $('.badge').html(data.cntprod);
                var html = '<div class="cart-item clearfix">';
                html += '<div class="img"><img src="'+data.product['preview']+'" alt="img" class="img-responsive"></div>';
                html += '<div class="description"><a href="product/'+data.product['alias']+'">'+data.product['product']+'</a><strong class="price">1 x $'+data.product['price']+'</strong></div>';
                html += '<div class="buttons" id="delCart" data-id="'+data.product['id']+'"><a href="#" class="fa fa-trash-o"></a></div>';
                html += '</div>';
                $('.content-scroll').children().children().append(html);
            }, "json");

        return false;
    });

    // При изменении кол-ва продукта в инпуте QUANTITY меняем TOTAL этого продукта
    $('.product-quantity input[name=quantity]').change(function(){
        var price = $('.product-price').text();
        price = parseFloat(price.slice(1));
        var quantity = $(this).val();
        var total = price * quantity;
        total = total.toFixed(2);
        $(this).parent().siblings('.product-total').text('$'+total);
        $('.product-total').each(function(){
            var alltotal = parseFloat($(this).text().slice(1));
        });
    });

    // Считает значение TOTAL напротив каждого товара при загрузке корзины
    total();

    /**
     *
     * Удаление товара из корзину
     *
     * @param integer prodId ID продукта
     * @return в случае успеха обновятся данные корзины на странице
     *
     */
    $('#delCart').click(function () {
        var csrftoken = $('meta[name=_token]').attr('content');
        var prodID = $(this).data('id');
        $.post('/cart/delToCart', { prodID: prodID, _token: csrftoken })
            .done(function(data) {
                $('.badge').html(data.cntprod);
                $('#delCart').parent().remove();
                //location.reload();
            }, "json");

        return false;
    });
});

// Ф-ция для console.log()
function pr(val) {
    console.log(val);
}

// Ф-ция считает значение TOTAL напротив каждого товара при загрузке корзины
function total() {
    var price = $('.product-price').text();
    price = parseFloat(price.slice(1));
    var quantity = $('.product-quantity input[name=quantity]').val();
    var total = price * quantity;
    total = total.toFixed(2);
    $('.product-total').text('$'+total);
}
