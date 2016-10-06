<?php

/*
 * Контроллер для работы с корзиной (/cart/)
 */

namespace App\Http\Controllers\Cart;

use App\Models\Products;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Session;

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
        //dd(Session::get('cart'));
        return view('cart.index');
    }
    
    /**
     * Добавлени продукта в корзину
     *
     * @param integer $prodID POST параметр - ID добавляемого продукта
     * @return json информация об операции (продукт, кол-во элементов в корзине)
     */
    public function addToCart(Request $request)
    {
        $prodID = (int)$request['prodID']; // принимаем id продукта, который передали AJAX(POST)
        //dd($prodID);
        if(!$prodID) { // проверяем есть ли id (на всякий случай)
            return false;
        }
        $sesProdID = array(); // создаем массив, в который будем записывать id выбранного товара
        $product = Products::find($prodID)->getOriginal(); // получаем все данные по продукту (ищем продукт по id)
        
        if(Session::has('cart')) { // проверяем наличие сессии
            if(!Session::has('cart.'.$prodID)) { // если нет товара с таким id (ключ сессии соответсвует id товара)
                Session::put('cart.'.$prodID, $product); // добавляем данные по новому товару в сессию с ключем равным id этого товара
                $cntProd = count(Session::get('cart')); // считаем сколько товаров в сессии
                Session::put('cntProd', $cntProd); // записываем кол-во товаров в отдельную сессию
            } else { // если продукт с таким id уже есть в сессии, то... всё :)
                return false;
            }
            
        } else { // если сессии еще нет, то создаём её и считаем кол-во продуктов в ней
            Session::put('cart.'.$prodID, $product);
            $cntProd = count(Session::get('cart'));
            Session::put('cntProd', $cntProd);
        }
            
        return response()->json(['cntprod' => $cntProd, 'product' => $product]); // возвращаем данные в AJAX
        
    }

    /**
     * Удаление продукта из корзины
     *
     * @param integer $id GET параметр - ID удаляемого продукта
     * @return json информация об операции (продукт, кол-во элементов в корзине)
     */
    public function delToCart(Request $request)
    {
        $prodID = (int)$request['prodID'];
        if(!$prodID) {
            return false;
        }
        Session::forget('cart.'.$prodID);
        $cntProd = count(Session::get('cart'));
        Session::put('cntProd', $cntProd);
        return response()->json(['cntprod' => $cntProd]);
    }

    /**
     * Запись данных из корзины в таблицу orders
     *
     */
    public function order()
    {
        dd(Session::get('cart'));
    }
}
