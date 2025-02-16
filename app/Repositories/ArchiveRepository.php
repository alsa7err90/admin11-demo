<?php

namespace App\Repositories;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ArchiveRepository
{
    public function createArchiveTable($archiveTableName, $originalTable)
    {
        if (!Schema::hasTable($archiveTableName)) {
            Schema::create($archiveTableName, function ($tableBlueprint) use ($originalTable) {
                $tableBlueprint->increments('id');
                $tableBlueprint->timestamps();
                $columns = Schema::getColumnListing($originalTable);

                foreach ($columns as $column) {
                    if (in_array($column, ['id', 'created_at', 'updated_at'])) {
                        continue;
                    }

                    $type = Schema::getColumnType($originalTable, $column);
                    switch ($type) {
                        case 'bigint':
                            $tableBlueprint->bigInteger($column)->nullable();
                            break;
                        case 'integer':
                            $tableBlueprint->integer($column)->nullable();
                            break;
                        case 'string':
                            $tableBlueprint->string($column)->nullable();
                            break;
                        case 'text':
                            $tableBlueprint->text($column)->nullable();
                            break;
                        case 'boolean':
                            $tableBlueprint->boolean($column)->nullable();
                            break;
                        case 'uuid':
                            $tableBlueprint->uuid($column)->nullable();
                            break;
                        case 'array':
                            $tableBlueprint->json($column)->nullable(); // أو يمكنك استخدام نوع آخر حسب المتطلبات
                            break;
                        case 'json':
                            $tableBlueprint->json($column)->nullable();
                            break;
                        case 'decimal':
                            $tableBlueprint->decimal($column, 8, 2)->nullable(); // يمكن تعديل الدقة حسب الحاجة
                            break;
                        case 'float':
                            $tableBlueprint->float($column, 8, 2)->nullable(); // يمكن تعديل الدقة حسب الحاجة
                            break;
                        case 'date':
                            $tableBlueprint->date($column)->nullable();
                            break;
                        case 'datetime':
                            $tableBlueprint->dateTime($column)->nullable();
                            break;
                        case 'timestamp':
                            $tableBlueprint->timestamp($column)->nullable();
                            break;
                        default:
                            $tableBlueprint->string($column)->nullable();
                            break;
                    }

                }
            });
        }
    }

    public function getDataToArchive($table, $fromDate, $toDate, $beforeDate)
    {
        $query = DB::table($table);
        if ($fromDate && $toDate) {
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        } elseif ($beforeDate) {
            $query->where('created_at', '<', $beforeDate);
        }
        return $query->get();
    }

    public function insertIntoArchive($archiveTableName, $data)
    {
        DB::table($archiveTableName)->insert(json_decode(json_encode($data), true));
    }

    public function deleteArchivedData($table, $fromDate, $toDate, $beforeDate)
    {
        $query = DB::table($table);
        if ($fromDate && $toDate) {
            $query->whereBetween('created_at', [$fromDate, $toDate]);
        } elseif ($beforeDate) {
            $query->where('created_at', '<', $beforeDate);
        }
        $query->delete();
    }
}
