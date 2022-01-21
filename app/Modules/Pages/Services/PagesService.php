<?php

namespace App\Modules\Pages\Services;

class PagesService
{
    /**
     * @return mixed|string
     */
    public function parseOilPrice()
    {
        $html = file_get_contents('https://ru.investing.com/commodities/brent-oil');
        $hrefs = explode('data-test="instrument-price-last">', $html);
        $val = explode('</span>', $hrefs[1])[0];
        $replacedVal = str_replace(',', '.', $val);
        return ['Brent' =>  floatval($replacedVal)];
    }
}
