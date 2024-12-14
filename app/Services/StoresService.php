<?php

namespace App\services;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class StoresService
{
    public function create()
    {
        return view('site.stores.create');
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $store = Store::create([
                'user_id' => Auth::user()->id,
                'name' => $request->name,
                'description' => $request->description,
                'video' => $request->video,
            ]);

            if ($request->hasFile('image')) {
                $path = $request->image->store('stores', 'public');
                $store->image()->create(['path' => $path]);
            }

            flash()->success('Store created successfully');
            DB::commit();

            return redirect()->route('stores.show', $store->slug);
        } catch (\Exception $e) {
            DB::rollBack();
            flash()->error($e->getMessage());
        }
    }

    public function show(Store $store)
    {
        $store->load(['image',]);

        $store->setRelation('products', $store->products()->paginate(16));
        return view('site.stores.show', compact('store'));
    }

    public function edit(Store $store)
    {
        return view('site.stores.edit', compact('store'));
    }

    public function update(Request $request, Store $store)
    {
        try {
            $store->update([
                'name' => $request->name ?? $store->name,
                'description' => $request->description ?? $store->description,
                'video' => $request->video ?? $store->video,
            ]);

            if ($request->hasFile('image')) {
                Storage::disk('public')->delete($store->image->path);
                $path = $request->image->store('stores', 'public');
                $store->image()->update(['path' => $path]);
            }

            flash()->success('Store updated successfully');
            return redirect()->intended(route('stores.show', $store->slug));
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }

    public function destroy(Store $store)
    {
        try {
            $store->delete();
            flash()->success('Store deleted successfully');
            return redirect()->route('stores.show', $store->slug);
        } catch (\Exception $e) {
            flash()->error($e->getMessage());
        }
    }
}