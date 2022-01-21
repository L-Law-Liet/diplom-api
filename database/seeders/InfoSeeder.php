<?php

namespace Database\Seeders;

use App\Models\Info;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Info::createMany([
            [
                'contacts.company.details' => 'БИН/ИИН: 191240029778
КБЕ: 17
Банк: АО ДБ «Альфа-Банк»
БИН Банка: 941240000341
БИК Банка: ALFAKZKA'
            ]
        ]);
    }
}
