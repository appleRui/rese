<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use \SplFileObject;

class ShopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $file = new SplFileObject('database/data/shops.csv');
        $file->setFlags(
            \SplFileObject::READ_CSV |
                \SplFileObject::READ_AHEAD |
                \SplFileObject::SKIP_EMPTY |
                \SplFileObject::DROP_NEW_LINE
        );
        $list = [];
        $now = Carbon::now();
        foreach ($file as $line) {
            $list[] = [
                "name" => $line[0],
                "description" => $line[1],
                "image_url" => $line[2],
                "created_at" => $now,
                "updated_at" => $now,
            ];
        }
        DB::table("shops")->insert(array_slice($list, 1));
    }
}
