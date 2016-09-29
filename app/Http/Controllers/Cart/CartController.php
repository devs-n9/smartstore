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
        //dd($prodID);
        if(!$prodID) {
            return false;
        }
        $sesProdID = array();
        $product = Products::find($prodID)->getOriginal();
        
        if(Session::has('cart.'.$prodID)) {
            $ses = Session::get('cart.'.$prodID);
            $cntSes = count($ses);
            for($i = 0; $i < $cntSes; $i++) {
                $sesProdID[] = $ses[$i]['product']['id'];
            }
            if(Session::has('cart.'.$prodID) && array_search($prodID, $sesProdID) === false) {
                Session::put('cart.'.$prodID, $product);
                $cntProd = count(Session::get('cart'));
                Session::put('cntProd', $cntProd);
            } else {
                return false;
            }
            
        } else {
            Session::put('cart.'.$prodID, $product);
            $cntProd = count(Session::get('cart'));
            Session::put('cntProd', $cntProd);
        }
            
        return response()->json(['cntprod' => $cntProd, 'product' => $product]);
        
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
        dd($prodID);
        if(!$prodID) {
            return false;
        }
        Session::forget('cart.'.$prodID);
        $cntProd = count(Session::get('cart'));
        Session::put('cntProd', $cntProd);
        return response()->json(['cntprod' => $cntProd]);
    }
}
