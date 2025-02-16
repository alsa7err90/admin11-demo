<?php

namespace App\Services;

use App\Repositories\ArchiveRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ArchiveService
{
    protected $archiveRepository;

    public function __construct(ArchiveRepository $archiveRepository)
    {
        $this->archiveRepository = $archiveRepository;
    }

    public function archiveData($table, $fromDate, $toDate, $beforeDate)
    {
        DB::beginTransaction();
        try {
            $archiveTableName = $this->getArchiveTableName($table);
            $this->archiveRepository->createArchiveTable($archiveTableName, $table);

            $dataToArchive = $this->archiveRepository->getDataToArchive($table, $fromDate, $toDate, $beforeDate);
            if ($dataToArchive->isNotEmpty()) {
                $this->archiveRepository->insertIntoArchive($archiveTableName, $dataToArchive);
                $this->archiveRepository->deleteArchivedData($table, $fromDate, $toDate, $beforeDate);
            }

            DB::commit();
            return "تمت الأرشفة بنجاح!";
        } catch (\Exception $e) {
            DB::rollBack();
            throw new \Exception("حدث خطأ أثناء الأرشفة: " . $e->getMessage());
        }
    }

    public function getArchiveTableName($table)
    {
        return $table . '_archive';
    }

    public function getModels()
    {
        $models = [];
        $modelPath = app_path('Models');

        if (is_dir($modelPath)) {
            $files = scandir($modelPath);
            foreach ($files as $file) {
                if ($file !== '.' && $file !== '..' && pathinfo($file, PATHINFO_EXTENSION) === 'php') {
                    $className = pathinfo($file, PATHINFO_FILENAME);
                    if (class_exists("App\\Models\\$className")) {
                        $tableName = Str::plural(Str::snake($className));
                        $models[] = [
                            'model' => $className,
                            'table' => $tableName,
                        ];
                    }
                }
            }
        }

        return $models;
    }
}
