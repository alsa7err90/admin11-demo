<?php

namespace App\Traits;

use App\Models\Image;

trait ImageableTrait
{

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
    // $myModel = MyModel::find(1);
    // $myModel->image()->create(['path' => 'path/to/image.jpg']);
}


