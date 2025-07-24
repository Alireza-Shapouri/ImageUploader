<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

use MyProjectVendor\PolymorphicImages\Services\ImageService;

class UserController extends Controller
{
    protected ImageService $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:4096',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        $path = $request->file('image')->store('images', 'public');
        $this->imageService->storeImage($path, User::class, $user->id);

        return response()->json($user->load('images'));
    }

    public function getUserImages($userId)
    {
        $product = User::findOrFail($userId);
        $images = $this->imageService->getImages(User::class, $product->id);

        return response()->json($images);
    }

    public function index()
    {
        $users = User::all();

        return response()->json($users->load('images'));
    }

}
