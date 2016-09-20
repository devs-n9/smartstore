<?php

/*
 * Контроллер для работы с корзиной (/cart/)
 */

namespace App\Http\Controllers\Cart;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    /**
     *
     * Action to cart page
     * Переход на страницу корзины
     *
     */
    public function cart()
    {
        return view('cart.index');
    }

    /**
     *
     * Action to checkout page
     * Переход на оформление товара
     *
     */
    public function checkout()
    {
        return view('cart.checkout');
    }

    /**
     * Добавлени продукта в корзину
     *
     * @param integer $id GET параметр - ID добавляемого продукта
     * @return json информация об операции (успех, кол-во элементов в корзине)
     */
    public function addToCart(Request $request)
    {
        return $request;
    }
}
