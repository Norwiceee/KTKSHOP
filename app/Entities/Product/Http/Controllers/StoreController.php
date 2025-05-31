<?php

namespace App\Entities\Product\Http\Controllers;

use App\Entities\Product\Models\Product;
use App\Entities\Product\Models\ProductImage;
use App\Entities\Product\Models\ProductTag;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Entities\Product\Http\Requests\StoreRequest;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images/products/', $data['preview_image']);

        if (isset($data['tags'])) {
            $tagsIds = $data['tags'];
            unset($data['tags']);
        }

        $data['vendor_code'] = Product::withTrashed()->max('vendor_code')+1;

        if (isset($data['product_images'])) {
            $productImages = $data['product_images'];
            unset($data['product_images']);
        }

        // === Исправленная обработка content для валидного JSON ===
        if (!isset($data['content']) || $data['content'] === null || $data['content'] === '' || $data['content'] === []) {
            $data['content'] = '{}';
        } elseif (is_array($data['content'])) {
            $data['content'] = json_encode($data['content'], JSON_UNESCAPED_UNICODE);
        } else {
            $tryDecode = json_decode($data['content']);
            if (json_last_error() !== JSON_ERROR_NONE) {
                $data['content'] = json_encode(['text' => $data['content']], JSON_UNESCAPED_UNICODE);
            }
            // если строка уже валидный JSON — оставляем как есть
        }
        // === Конец блока обработки content ===

        $product = Product::firstOrCreate([
            'vendor_code' => $data['vendor_code']
        ], $data);

        if (isset($productImages)) {
            foreach ($productImages as $productImage) {
                $productImage = Storage::disk('public')->put('/images/products/', $productImage);
                $currentImages = ProductImage::where('product_id', $product->id)->count();
                ProductImage::insert([
                    'file_path' => $productImage,
                    'product_id' => $product->id,
                ]);
            }
        }

        if (isset($tagsIds)) {
            foreach ($tagsIds as $tagsId) {
                ProductTag::firstOrCreate([
                    'product_id' => $product->id,
                    'tag_id' => $tagsId,
                ]);
            }
        }
        return redirect()->route('product.index');
    }
}
