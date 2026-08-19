<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // عرض قائمة المنتجات للمشترين
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    // لوحة تحكم الأدمن (إضافة + عرض المنتجات للحذف)
    public function create()
    {
        $products = Product::all();
        return view('products.create', compact('products'));
    }

    // حفظ المنتج والصورة
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        Product::create([
            'name'  => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.create')->with('success', 'تم إضافة المنتج بنجاح');
    }

    // صفحة تعديل المنتج
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // تحديث بيانات المنتج والصورة
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $imagePath = $product->image;

        if ($request->hasFile('image')) {
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $product->update([
            'name'  => $request->name,
            'price' => $request->price,
            'image' => $imagePath,
        ]);

        return redirect()->route('products.create')->with('success', 'تم تعديل المنتج بنجاح');
    }

    // حذف المنتج مع صورته
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.create')->with('success', 'تم حذف المنتج بنجاح');
    }
}