<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WebsiteInfo;

class WebsiteInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebsiteInfo::create(
            [
                "website_name" => "TRAN PHUONG NAM",
                "short_desc" => "PHP Developer & Trainer",
                "avatar" => "",
                "file_url" => ""
            ]
        );
    }
}
