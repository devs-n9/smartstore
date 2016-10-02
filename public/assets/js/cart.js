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
    $('.addCart').click(function () {
        var csrftoken = $('meta[name=_token]').attr('content');
        var prodID = $(this).data('id');
        $.post('/cart/addToCart', { prodID: prodID, _token: csrftoken })
            .done(function(data) {
                $('.badge').removeClass('hide');
                $('.badge').text(data.cntprod);
                var html = '<div class="cart-item clearfix" data-id="'+data.product['id']+'">';
                html += '<div class="img"><img src="'+data.product['preview']+'" alt="img" class="img-responsive"></div>';
                html += '<div class="description"><a href="product/'+data.product['alias']+'">'+data.product['product']+'</a><strong class="price">1 x $'+data.product['price']+'</strong></div>';
                html += '<div class="buttons delCart" data-id="'+data.product['id']+'"><a href="#" class="fa fa-trash-o"></a></div>';
                html += '</div>';
                $('.content-scroll').children().children().append(html);
            }, "json");

        return false;
    });

    // При изменении кол-ва продукта в инпуте QUANTITY меняем TOTAL этого продукта
    $('.product-quantity input[name=quantity]').change(function(){
        var price = $(this).parent().siblings('.product-price').text();
        price = parseFloat(price.slice(1));
        var quantity = $(this).val();
        var total = price * quantity;
        total = total.toFixed(2);
        $(this).parent().siblings('.product-total').text('$'+total);
        productTotal();
    });

    // Если корзина пустая, то скрыть индикатор кол-ва продуктов в корзине
    var badge = $('.badge').text();
    if(badge == 0) {
        $('.badge').addClass('hide');
    }


    /**
     *
     * Удаление товара из корзины
     *
     * @param integer prodId ID продукта
     * @return в случае успеха обновятся данные корзины на странице
     *
     */
    $(document).on('click', '.delCart', function () {
        var csrftoken = $('meta[name=_token]').attr('content');
        var prodID = $(this).data('id');
        $.post('/cart/delToCart', { prodID: prodID, _token: csrftoken })
            .done(function(data) {
                $('.badge').html(data.cntprod);
                $('div.cart-item[data-id="'+ prodID +'"]').remove();
                $('tr[data-id="'+ prodID +'"]').remove();
                productTotal();
            }, "json");

        return false;

    });

    productTotal();


});

// Ф-ция для console.log()
function pr(val) {
    console.log(val);
}

// Ф-ция подсчета TOTAL в корзине
function productTotal() {
    var sum = 0;
    $('.product-total').each(function () {
        var res = parseFloat($(this).text().slice(1));
        sum += +res;
    });
    $('.subtotal').text('$'+sum);
    $('.total').text('$'+sum);
}
