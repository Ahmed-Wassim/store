<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Cart\CartModelRepository;
use App\Repositories\Cart\CartRepository;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct(
        protected CartRepository $cart,
    ) {}

    public function index()
    {
        return view('site.carts.index', [
            'cart' => $this->cart
        ]);
    }

    public function store(Request $request)
    {
        $request->merge([
            'quantity' => $request->quantity ?? 1
        ]);

        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $product = Product::findOrFail($request->product_id);
        $this->cart->add($product, $request->quantity);

        flash()->success('Product Added To Cart!');

        return redirect()->route('cart.index');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1'
        ]);

        $this->cart->update($id, $request->quantity);
    }
    public function destroy($id)
    {
        $this->cart->delete($id);

        return response()->json([
            'message' => 'Product Deleted From Cart!'
        ]);
    }
}
