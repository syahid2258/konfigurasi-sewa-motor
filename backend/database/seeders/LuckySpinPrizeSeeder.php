<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LuckySpinPrizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prizes = [
            ['title' => 'Gratis Sewa 1 Hari', 'icon' => 'moped_rounded'],
            ['title' => 'Diskon Sewa 50%', 'icon' => 'percent_rounded'],
            ['title' => 'Gratis Upgrade Unit', 'icon' => 'upgrade_rounded'],
            ['title' => 'Voucher Diskon Rp25k', 'icon' => 'confirmation_number_rounded'],
            ['title' => 'Gratis Helm Premium', 'icon' => 'sports_motorsports_rounded'],
            ['title' => 'Cashback 200 Poin', 'icon' => 'stars_rounded'],
            ['title' => 'Gratis Jas Hujan', 'icon' => 'umbrella_rounded'],
            ['title' => 'Coba Lagi Esok Hari', 'icon' => 'sentiment_dissatisfied_rounded'],
        ];

        foreach ($prizes as $prize) {
            \App\Models\LuckySpinPrize::create($prize);
        }
    }
}
