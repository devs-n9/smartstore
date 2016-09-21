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
     * @param integer $prodID POST параметр - ID добавляемого продукта
     * @return json информация об операции (продукт, кол-во элементов в корзине)
     */
    public function addToCart(Request $request)
    {
        $prodID = (int)$request['prodID'];
        if(!$prodID) {
            return false;
        }
        $sesProdID = array();
        $sesArr = array();
        $product = Products::find($prodID)->getOriginal();
        $sesArr['product'] = $product;
        $sesArr['count'] = 1;
        
        if(Session::has('cart')) {
            $ses = Session::get('cart');
            $cntSes = count($ses);
            for($i = 0; $i < $cntSes; $i++) {
                $sesProdID[] = $ses[$i]['product']['id'];
            }
            if(Session::has('cart') && array_search($prodID, $sesProdID) === false) {
                Session::push('cart', $sesArr);
                $cntProd = count(Session::get('cart'));
                Session::put('cntProd', $cntProd);
            } else {
                return false;
            }
            
        } else {
            Session::push('cart', $sesArr);
            $cntProd = count(Session::get('cart'));
            Session::put('cntProd', $cntProd);
        }
            
        return response()->json(['cntprod' => $cntProd, 'product' => $product]);
        
    }
}
