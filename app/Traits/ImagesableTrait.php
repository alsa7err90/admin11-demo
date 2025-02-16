<?php

namespace App\Traits;

use App\Models\Image;

trait ImagesableTrait
{

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }
// $myModel = MyModel::find(1);
// $myModel->images()->create(['path' => 'path/to/image.jpg']);
}


