<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Prefecture;

class PrefectureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prefectures = [
            ['name' => '北海道', 'code' => '01'],
            ['name' => '青森', 'code' => '02'],
            ['name' => '岩手', 'code' => '03'],
            ['name' => '宮城', 'code' => '04'],
            ['name' => '秋田', 'code' => '05'],
            ['name' => '山形', 'code' => '06'],
            ['name' => '福島', 'code' => '07'],
            ['name' => '茨城', 'code' => '08'],
            ['name' => '栃木', 'code' => '09'],
            ['name' => '群馬', 'code' => '10'],
            ['name' => '埼玉', 'code' => '11'],
            ['name' => '千葉', 'code' => '12'],
            ['name' => '東京', 'code' => '13'],
            ['name' => '神奈川', 'code' => '14'],
            ['name' => '新潟', 'code' => '15'],
            ['name' => '富山', 'code' => '16'],
            ['name' => '石川', 'code' => '17'],
            ['name' => '福井', 'code' => '18'],
            ['name' => '山梨', 'code' => '19'],
            ['name' => '長野', 'code' => '20'],
            ['name' => '岐阜', 'code' => '21'],
            ['name' => '静岡', 'code' => '22'],
            ['name' => '愛知', 'code' => '23'],
            ['name' => '三重', 'code' => '24'],
            ['name' => '滋賀', 'code' => '25'],
            ['name' => '京都', 'code' => '26'],
            ['name' => '大阪', 'code' => '27'],
            ['name' => '兵庫', 'code' => '28'],
            ['name' => '奈良', 'code' => '29'],
            ['name' => '和歌山', 'code' => '30'],
            ['name' => '鳥取', 'code' => '31'],
            ['name' => '島根', 'code' => '32'],
            ['name' => '岡山', 'code' => '33'],
            ['name' => '広島', 'code' => '34'],
            ['name' => '山口', 'code' => '35'],
            ['name' => '徳島', 'code' => '36'],
            ['name' => '香川', 'code' => '37'],
            ['name' => '愛媛', 'code' => '38'],
            ['name' => '高知', 'code' => '39'],
            ['name' => '福岡', 'code' => '40'],
            ['name' => '佐賀', 'code' => '41'],
            ['name' => '長崎', 'code' => '42'],
            ['name' => '熊本', 'code' => '43'],
            ['name' => '大分', 'code' => '44'],
            ['name' => '宮崎', 'code' => '45'],
            ['name' => '鹿児島', 'code' => '46'],
            ['name' => '沖縄', 'code' => '47'],
        ];

        foreach ($prefectures as $prefecture) {
            Prefecture::create($prefecture);
        }
    }
}
