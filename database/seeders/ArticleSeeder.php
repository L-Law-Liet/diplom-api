<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\ArticleType;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dir = 'articles/';
        Article::insert([
            [
                'title' => 'What is oil?',
                'image' => $dir.'about1.png',
                'body' => 'Oil is a combustible oily liquid with a specific odor, common in the sedimentary shell of the Earth, which is the most important mineral.

The advantages of oil and gas as energy sources include the relatively low cost of production, the possibility of waste-free processing to produce a variety of fuels and chemical raw materials.',
                'article_type_id' => ArticleType::where('name', 'About us')->first()->id,
            ],
            [
                'title' => 'How is oil extracted?',
                'image' => $dir.'about2.png',
                'body' => "Oil production is a process in which oil workers have to deal with enormous pressures, high temperatures, penetrate to great depths into the thickness of the earth's crust, and raise gigantic volumes of combustible explosive substances to the surface. Very powerful and massive equipment is used for this.

Oil is pumped out of the bowels by pumps, but there are other ways of extraction. The most promising is the development of deposits on the seabed, in the depths of which up to 70% of its world reserves are hidden.",
                'article_type_id' => ArticleType::where('name', 'About us')->first()->id,
            ],
            [
                'title' => 'What is oil produced for?',
                'image' => $dir.'about3.png',
                'body' => 'Oil is the most popular commodity. Oil is traded at retail, on stock exchanges and even for the future, through commodity futures.
According to research, the most common products from oil belong to the types of fuel. These are diesel fuel, fuel oil, jet fuel and, of course, the most popular petroleum product among the people - gasoline. It accounts for 50% of the total volume of petroleum products produced in the world.',
                'article_type_id' => ArticleType::where('name', 'About us')->first()->id,
            ],
            [
                'title' => 'Standard Oil Qazaqstan',
                'image' => $dir.'about4.png',
                'body' => 'The main sellers in the oil market are oil producing companies. One of them is Standard Oil Qazaqstan. The document contains the terms of reference for the development of a platform for wholesale and retail trade of petroleum products of Standard Oil Qazaqstan LLP. The company sells petroleum products. They have been actively selling since 2020 for 2 years.',
                'article_type_id' => ArticleType::where('name', 'About us')->first()->id,
            ],
            [
                'title' => 'Gasoline, diesel fuel',
                'image' => $dir.'mobile_slider1.png',
                'body' => 'Standard Oil Qazaqstan',
                'article_type_id' => ArticleType::where('name', 'Mobile slider')->first()->id,
            ],
            [
                'title' => 'Always ready to cooperate',
                'image' => $dir.'mobile_slider2.png',
                'body' => 'Standard Oil Qazaqstan',
                'article_type_id' => ArticleType::where('name', 'Mobile slider')->first()->id,
            ],
            [
                'title' => 'Oil Petroleum Products',
                'image' => $dir.'mobile_slider3.png',
                'body' => 'Standard Oil Qazaqstan',
                'article_type_id' => ArticleType::where('name', 'Mobile slider')->first()->id,
            ],
            [
                'title' => 'What Standard Oil Qazaqstan can do?',
                'image' => $dir.'partner1.png',
                'body' => 'Our company has been selling oil products that we use every day for more than 2 years: vehicles, cars, etc.',
                'article_type_id' => ArticleType::where('name', 'Partners')->first()->id,
            ],
            [
                'title' => 'GAS station',
                'image' => $dir.'home1.png',
                'body' => 'A gas station is a complex of equipment on a roadside territory intended for refueling vehicles.
The most common gas stations refueling vehicles with traditional grades of hydrocarbon fuel - gasoline and diesel fuel.',
                'article_type_id' => ArticleType::where('name', 'Home slider')->first()->id,
            ],
            [
                'title' => 'Petrol',
                'image' => $dir.'home2.png',
                'body' => 'A gas station is a complex of equipment on a roadside territory intended for refueling vehicles.
The most common gas stations refueling vehicles with traditional grades of hydrocarbon fuel - gasoline and diesel fuel.',
                'article_type_id' => ArticleType::where('name', 'Home slider')->first()->id,
            ],
            [
                'title' => 'The current state of oil',
                'image' => $dir.'news1.png',
                'body' => 'The oil market has largely recovered. Oil consumption in the countries that determine the global demand for hydrocarbons exceeded the indicator of April 2020.',
                'article_type_id' => ArticleType::where('name', 'News')->first()->id,
            ],
//            [
//                'title' => '',
//                'image' => $dir.'',
//                'body' => '',
//                'type' => '',
//            ],
        ]);
    }
}
