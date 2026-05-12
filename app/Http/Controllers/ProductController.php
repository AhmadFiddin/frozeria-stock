<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Search nama barang
        if ($request->search) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        // Filter kategori
        if ($request->category) {
            $query->where('category_id', $request->category);
        }

        // Pagination
        $products = $query->latest()->paginate(10);

        // Keep query string pagination
        $products->appends($request->all());

        // Data kategori
        $categories = Category::all();

        // Statistik
        $totalProducts = Product::count();

        $totalCategories = Category::count();

        $lowStock = Product::whereColumn(
            'stock',
            '<',
            'minimum_stock'
        )->where('stock', '>', 0)->count();

        $outStock = Product::where('stock', 0)->count();

        return view('products.index', compact(
            'products',
            'categories',
            'totalProducts',
            'totalCategories',
            'lowStock',
            'outStock'
        ));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'unit' => 'required',
            'stock' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'selling_price' => 'required|numeric|min:0',
            'purchase_price' => 'required|numeric|min:0',
            'weight' => 'nullable|max:100',
            'storage_location' => 'nullable|max:255',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload Foto
        $photo = null;

        if ($request->hasFile('photo')) {

            $photo = $request->file('photo')
                ->store('products', 'public');
        }

        // Simpan Data
        Product::create([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'minimum_stock' => $request->minimum_stock,
            'selling_price' => $request->selling_price,
            'purchase_price' => $request->purchase_price,
            'weight' => $request->weight,
            'storage_location' => $request->storage_location,
            'description' => $request->description,
            'photo' => $photo,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Data barang berhasil ditambahkan');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();

        return view('products.edit', compact(
            'product',
            'categories'
        ));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required',
            'name' => 'required|max:255',
            'unit' => 'required',
            'stock' => 'required|integer|min:0',
            'minimum_stock' => 'required|integer|min:0',
            'selling_price' => 'required|numeric|min:0',
            'purchase_price' => 'required|numeric|min:0',
            'weight' => 'nullable|max:100',
            'storage_location' => 'nullable|max:255',
            'description' => 'nullable',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // Upload foto baru
        if ($request->hasFile('photo')) {

            // Hapus foto lama
            if ($product->photo && Storage::disk('public')->exists($product->photo)) {

                Storage::disk('public')->delete($product->photo);
            }

            // Simpan foto baru
            $photo = $request->file('photo')
                ->store('products', 'public');
        } else {

            $photo = $product->photo;
        }

        // Update data
        $product->update([
            'category_id' => $request->category_id,
            'name' => $request->name,
            'unit' => $request->unit,
            'stock' => $request->stock,
            'minimum_stock' => $request->minimum_stock,
            'selling_price' => $request->selling_price,
            'purchase_price' => $request->purchase_price,
            'weight' => $request->weight,
            'storage_location' => $request->storage_location,
            'description' => $request->description,
            'photo' => $photo,
        ]);

        return redirect()
            ->route('products.index')
            ->with('success', 'Data barang berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        // Hapus foto jika ada
        if (
            $product->photo &&
            Storage::disk('public')->exists($product->photo)
        ) {

            Storage::disk('public')->delete($product->photo);
        }

        // Hapus data product
        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Data barang berhasil dihapus');
    }
}
