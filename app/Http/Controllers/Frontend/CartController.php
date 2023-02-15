<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Service;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    protected $cart;

    public function __construct(CartRepository $cart)
    {
        $this->cart = $cart;
    }


    public function index()
    {
        ///dd($this->cart);
        return view('frontend.cart.show', [
            'cart' => $this->cart,
        ]);
    }


    public function store(Request $request)
    {

        $request->validate([
            'service_id' => ['required', 'int', 'exists:services,id'],
            'quantity' => ['nullable', 'int', 'min:1'],
            'addons'   =>  ['nullable','array'],
            'addons_price'   =>  ['nullable','int'],
        ]);



        $service = Service::findOrFail($request->post('service_id'));

        $this->cart->add($service, $request->post('quantity'),$request->addons,$request->addons_price);

        if ($request->expectsJson()) {

            return response()->json([
                'message' => 'Item added to cart!',
            ], 201);
        }

        return redirect()->route("show-cart")
            ->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => ['required', 'int', 'min:1'],
            'addons'   =>  ['nullable','array'],
        ]);

        $this->cart->update($id, $request->post('quantity'));


        if ($request->expectsJson()) {

            return response()->json([
                'message' => 'Item added to cart!',
                'cart' => $this->cart->where($id),
                //'html' => view('frontend.cart.total',['cart'=>$this->cart])->render(),
            ], 201);
        }
    }

    public function updateAddons(Request $request, $id)
    {
        //dd($request->all());

        $this->cart->updateAddons($id,$request->addons,$request->addons_price);
        $all_cart = $this->cart->get();


        if ($request->expectsJson()) {

            return response()->json([
                'message' => 'Item added to cart!',
                'cart' => $this->cart->where($id),

                //'html' => view('frontend.cart.total',['all_cart'=>$all_cart])->render(),

            ], 201);
        }
    }

    public function destroy($id)
    {
        $this->cart->delete($id);

        return [
            'message' => 'Item deleted!',
        ];
    }

}
