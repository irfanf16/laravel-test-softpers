<?php

namespace Database\Seeders;

use App\Models\File;
use App\Models\FileColumn;
use App\Models\FileData;
use Illuminate\Database\Seeder;

class FileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        File::factory()
            ->has(
                FileColumn::factory()
                    ->has(
                        FileData::factory()->count(10),
                            'datas'
                )->count(50),
            'columns'
            )->count(100)
            ->create();
    }
}
