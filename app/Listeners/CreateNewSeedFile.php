<?php

namespace App\Listeners;

use App\Events\NewSeedDataCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class CreateNewSeedFile
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(NewSeedDataCreated $event)
    {
        $modelName = class_basename($event->model);
        $timestamp = date('YmdHis');
        $className = Str::studly($modelName) . $timestamp;
        $tableName = $event->model->getTable();

        // تحويل البيانات إلى مصفوفة واستثناء الحقول المطلوبة
        $data = collect($event->data->toArray())
                    ->except(['id', 'created_at', 'updated_at'])
                    ->toArray();

        $dataString = var_export($data, true); // تحويل البيانات إلى شكل نصّي

        $stub = file_get_contents(resource_path('templates/seed.stub'));

        $seedFileContent = str_replace(
            ['{{className}}', '{{tableName}}', '{{data}}'],
            [$className, $tableName, $dataString],
            $stub
        );

        $seedFileName = "{$className}.php";
        $seedFilePath = database_path("seeders/{$seedFileName}");

        if (!File::exists(dirname($seedFilePath))) {
            File::makeDirectory(dirname($seedFilePath), 0777, true, true);
        }

        File::put($seedFilePath, $seedFileContent);

        $this->appendToDatabaseSeeder($className);
    }


    protected function appendToDatabaseSeeder($className)
{
    $databaseSeederPath = database_path('seeders/DatabaseSeeder.php');

    if (File::exists($databaseSeederPath)) {
        $seederCall = "        \$this->call({$className}::class);";

        // قراءة محتوى DatabaseSeeder
        $content = File::get($databaseSeederPath);

        if (strpos($content, $seederCall) === false) {
            // العثور على القوس الأخير داخل دالة run فقط
            $position = strrpos($content, '    }'); // البحث عن نهاية دالة run

            if ($position !== false) {
                $content = substr_replace($content, "\n$seederCall", $position, 0);
            }

            File::put($databaseSeederPath, $content); // كتابة التعديلات
        }
    }
}


}
