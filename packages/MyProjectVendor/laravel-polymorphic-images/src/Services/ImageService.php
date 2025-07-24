<?php

namespace MyProjectVendor\PolymorphicImages\Services;

use Illuminate\Support\Facades\Storage;
use MyProjectVendor\PolymorphicImages\Models\Image;

class ImageService
{
    public function storeImage(string $filePath, string $imageableType, int $imageableId): Image
    {
        return Image::create([
            'path' => $filePath,
            'imageable_type' => $imageableType,
            'imageable_id' => $imageableId,
        ]);
    }

    public function deleteImage(Image $image): void
    {
        Storage::disk('public')->delete($image->path);
        $image->delete();
    }

    public function getImages(string $imageableType, int $imageableId)
    {
        return Image::where([
            'imageable_type' => $imageableType,
            'imageable_id' => $imageableId,
        ])->get();
    }
}
