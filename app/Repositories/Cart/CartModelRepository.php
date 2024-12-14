<?php

namespace App\Repositories\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CartModelRepository implements CartRepository
{
    protected $items;

    public function __construct()
    {
        $this->items = collect([]);
    }
    public function get(): Collection
    {
        if (!$this->items->count()) return Cart::where('cookie_id', $this->getCookieId())
            ->with('product')->get();

        return $this->items;
    }

    public function add($product, $quantity = 1)
    {
        $item = Cart::where('product_id', $product->id)
            ->where('cookie_id', $this->getCookieId())
            ->first();

        if (!$item) {
            $cart = Cart::create([
                'cookie_id' => $this->getCookieId(),
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
            $this->get()->push($cart);
            return $cart;
        }

        return $item->increment('quantity', $quantity);
    }

    public function update($id, int $quantity)
    {

        Cart::where('id', $id)
            ->where('cookie_id', $this->getCookieId())
            ->update([
                'quantity' => $quantity
            ]);
    }

    public function delete($id)
    {
        return Cart::where('id', $id)
            ->where('cookie_id', $this->getCookieId())
            ->delete();
    }

    public function empty()
    {
        Cart::where('cookie_id', $this->getCookieId())->delete();
    }

    public function total(): float
    {
        // return (float) Cart::where('cookie_id', $this->getCookieId())
        //     ->join('products', 'carts.product_id', '=', 'products.id')
        //     ->selectRaw('sum(carts.quantity * products.price) as total')
        //     ->value('total');
        // user - orders - products - brand

        return $this->get()->sum(function ($item) {
            return $item->quantity * $item->product->price;
        });
    }

    protected function getCookieId()
    {
        $cookie_id = Cookie::get('cart_id');
        if (!$cookie_id) {
            $cookie_id = Str::uuid();
            Cookie::queue('cart_id', $cookie_id, Carbon::now()->diffInMinutes(Carbon::now()->addDays(30)));
        }

        return $cookie_id;
    }
}
