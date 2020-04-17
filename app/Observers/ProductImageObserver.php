<?php

namespace App\Observers;

use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class ProductImageObserver
{
    /**
     * Handle the product image "created" event.
     *
     * @param ProductImage $productImage
     * @return void
     */
    public function created(ProductImage $productImage)
    {
        //
    }

    /**
     * Handle the product image "updated" event.
     *
     * @param ProductImage $productImage
     * @return void
     */
    public function updated(ProductImage $productImage)
    {
        //
    }

    /**
     * Handle the product image "deleted" event.
     *
     * @param ProductImage $productImage
     * @return void
     */
    public function deleted(ProductImage $productImage)
    {
        Storage::delete('images/product/'.$productImage->image);
    }

    /**
     * Handle the product image "restored" event.
     *
     * @param ProductImage $productImage
     * @return void
     */
    public function restored(ProductImage $productImage)
    {
        //
    }

    /**
     * Handle the product image "force deleted" event.
     *
     * @param ProductImage $productImage
     * @return void
     */
    public function forceDeleted(ProductImage $productImage)
    {
        //
    }
}
