<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartModelRepository implements CartRepository
{
    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }

    public function get() : Collection
    {
        if (!$this->items->count()) {
            $this->items = Cart::with('service')->latest()->get();
        }

        return $this->items;
    }

    public function where($id) : Collection
    {
        if (!$this->items->count()) {
            $this->items = Cart::where('id',$id)->with('service')->latest()->get();
        }

        return $this->items;
    }

    public function add(Service $service, $quantity = 1, $addons,$addons_price)
    {
        $item =  Cart::where('service_id', '=', $service->id)
            ->first();

        //dd(json_encode($addons));

        if (!$item) {

            $cart             = new Cart;

            $cart->user_id    = Auth::id();
            $cart->service_id = $service->id;
            $cart->quantity   = $quantity;
            $cart->addons_price   = $addons_price;
            $cart->addons     = json_encode($addons);

            $cart->save();

            $this->get()->push($cart);

        }

        //return $item->increment('quantity', $quantity);
    }

    public function update($id, $quantity)
    {
        $cart = Cart::where('id', '=', $id)

            ->update([
                'quantity' => $quantity,
        ]);

    }

    public function updateAddons($id,$addons,$addons_price)
    {

            $cart = Cart::where('id', '=', $id)
            ->update([
                'addons'  =>  json_encode($addons),
                'addons_price' =>$addons_price
            ]);

    }

    public function delete($id)
    {
        Cart::where('id', '=', $id)
            ->delete();
    }

    public function empty()
    {
        Cart::query()->delete();
    }

    public function total()
    {
        return $this->get()->sum(function($item) {
            return ($item->quantity * $item->service->price) + ($item->quantity*$item->addons_price);
        });

        return $this;
    }
}
