<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class ProductController extends Controller
{
    public function index()
    {
        $products =  Product::all();
        return view('product', ['products' => $products]);
    }
    public function detail($id)
    {
        $product = Product::find($id);
        return view('detail', ['details' => $product]);
    }
    public function addToCArt(Request $req)
    {
        if (Cart::where(['user_id' => session('user')['id'], 'product_id' => $req->product_id])->exists()) {
            $cart = Cart::where([['user_id', session('user')['id']], ['product_id', $req->product_id]])->update(['count' => $req->count]);
            return redirect('/cart');
        }
        $cart = new Cart;
        $cart->product_id = $req->product_id;
        $cart->user_id = session('user')['id'];
        $cart->count = $req->count;
        $cart->save();
        return redirect('/cart');
        // return redirect()->route('showCart');
    }
    public static function cartItem()
    {
        $totalCount = 0;
        $totalPrice = 0;
        if (session()->has('user')) {
            $userId = session()->get('user')['id'];
            $carts = Cart::where('user_id', $userId)->join('products', 'cart.product_id', '=', 'products.id')->select('cart.*', 'products.price')->get();
            foreach ($carts as $cart) {
                $totalCount = $totalCount + $cart->count;
                $totalPrice = $totalPrice + $cart->count * $cart->price;
            }
        }
        $total = [$totalCount, $totalPrice];
        return $total;
    }

    public function showCart()
    {
        $carts = Cart::where(['user_id' => session()->get('user')['id']])->join('products', 'cart.product_id', '=', 'products.id')->select('cart.*', 'products.name', 'products.price', 'products.description', 'products.category', 'products.gallery')->get();
        // $carts = json_encode($carts);
        return view('/cart', ['carts' => $carts]);
    }

    function deleteCart($cartId)
    {
        // header("Content-Type: application/json; charset=UTF-8");
        // $cartId = $_POST('q');
        
        $cart = Cart::where('id', $cartId);
        $count = $cart->value('count');
        Cart::destroy($cartId);
        // return $count;
    }

    function updateCart(Cart $id, Cart $count)
    {
        Cart::where('id',$id )->update(['count'=>$count]);
        return redirect('/cart');
    }


    // function updateCart()
    // {
        //    

        //     $contentType = isset($_SERVER["CONTENT_TYPE"]) ? trim($_SERVER["CONTENT_TYPE"]) : '';

        //     if ($contentType === "application/json") {
        //         //Receive the RAW post data.
        //         $content = trim(file_get_contents("php://input"));

        //         $decoded = json_decode($content, true);

        //         if (!is_array($decoded)) {
        //             $id = $decoded[1];
        //             $count = $decoded[2];
        //             Cart::where('id', $id)->update(['count' => $count]);
        //             // return json_encode(Cart::where('id',$id )->first());
        //             echo json_encode(['success' => true]);
        //         } else {
        //             echo json_encode(['fail' => false]);
        //         }
        // $id = $_POST['id'];
        // $count = $_POST['newCount'];
        // Cart::where('id', $id)->update(['count' => $count]);
        //     }
    // }
}
