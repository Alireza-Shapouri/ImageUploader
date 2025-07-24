<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use MyProjectVendor\PolymorphicImages\Models\Image;
use MyProjectVendor\PolymorphicImages\Services\ImageService;

class ProductController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
            'name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $product = Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
        ]);

        $path = $request->file('image')->store('images', 'public');

        $this->imageService->storeImage($path, Product::class, $product->id);

        return response()->json($product->load('images'));
    }

    public function addImageToProduct($productId, Request $request)
    {
        $product = Product::findOrFail($productId);

        $path = $request->file('image')->store('images', 'public');

        $this->imageService->storeImage($path, Product::class, $productId);

        return response()->json($product->load('images'));
    }

    public function getProductImages($productId)
    {
        $product = Product::findOrFail($productId);

        $images = $this->imageService->getImages(Product::class, $product->id);

        return response()->json($images);
    }

    public function deleteProductImage($imageId)
    {
        $image = Image::findOrFail($imageId);
        $this->imageService->deleteImage($image);

        return response()->json(['message' => 'Image deleted']);
    }


}
