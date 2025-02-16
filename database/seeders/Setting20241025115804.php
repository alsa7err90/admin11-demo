<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Setting20241025115804 extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        try {
            DB::table('settings')->insert(array (
  'key' => 'test',
  'value' => '1',
  'desc' => 'tesssssst',
  'category' => '1',
));
        } catch (\Throwable $th) {
            //throw $th;
        }

    }
}
