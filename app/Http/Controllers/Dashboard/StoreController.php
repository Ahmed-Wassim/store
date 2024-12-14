<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Store;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StoreController extends Controller
{
    public function index()
    {
        $stores = Store::with('user', 'image')->get();

        return view('dashboard.stores.index', compact('stores'));
    }

    public function edit(Store $store) {}

    public function destroy(Store $store)
    {
        try {
            $store->delete();
            flash()->success('Store deleted successfully');
            return redirect()->route('dashboard.stores.index');
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    public function updateStatus(Request $request)
    {
        $store = Store::find($request->id);

        if (!$store) {
            return response()->json([
                'success' => false,
                'message' => 'Store not found'
            ], 404);
        }

        $store->status = $request->status;
        $store->save();

        return response()->json([
            'success' => true,
            'message' => 'Store status updated successfully'
        ]);
    }
}