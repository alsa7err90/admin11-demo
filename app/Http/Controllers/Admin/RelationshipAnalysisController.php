<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class RelationshipAnalysisController extends Controller
{
    public function index()
    {
        $models = $this->getModels();
        $relationships = $this->getRelationships($models);

        return view('admin.relationships.index', compact('relationships'));
    }

    private function getModels()
    {
        $models = [];
        $modelPath = app_path('Models');

        foreach (File::allFiles($modelPath) as $file) {
            $modelName = Str::replace('.php', '', $file->getFilename());
            $models[] = "App\\Models\\$modelName";
        }

        return $models;
    }

    private function getRelationships($models)
    {
        $relationships = [];

        foreach ($models as $model) {
            $instance = new $model;
            $className = class_basename($model);

            // استخدام Reflection للحصول على طرق العلاقات
            $reflection = new \ReflectionClass($instance);
            $methods = $reflection->getMethods();
            $relationMethods = [];

            foreach ($methods as $method) {
                if ($method->class === get_class($instance) && $method->getNumberOfParameters() === 0) {
                    // استدعاء الطريقة للحصول على العلاقة
                    try {
                        $relation = $instance->{$method->name}();
                        if ($relation instanceof \Illuminate\Database\Eloquent\Relations\Relation) {
                            $relationMethods[] = $method->name;
                        }
                    } catch (\BadMethodCallException $e) {
                        // تجاهل الأخطاء الناتجة عن الطرق غير المعرفة
                    }
                }
            }

            $relationships[$className] = $relationMethods;
        }

        return $relationships;
    }



}
