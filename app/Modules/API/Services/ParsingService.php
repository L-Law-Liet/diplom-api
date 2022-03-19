<?php

namespace App\Modules\API\Services;

use Illuminate\Support\Facades\Cache;

class ParsingService
{

    public function getOilPrice()
    {
        return Cache::remember(
            'oilPrice',
            now()->addMinute(),
            fn() => $this->parseOilPrice()
        );
    }
    /**
     * @return mixed|string
     */
    private function parseOilPrice()
    {

        $link = 'https://ru.investing.com/commodities/brent-oil';
        $sep1 = 'data-test="instrument-price-last">';
        $sep2 = '</span>';
        $val = $this->parsing($link, $sep1, $sep2);
        $replacedVal = str_replace(',', '.', $val);
        return ['Brent' =>  floatval($replacedVal)];
    }

    private function parsing(string $link, string $sep1, string $sep2)
    {
        $html = file_get_contents($link);
        $hrefs = explode($sep1, $html);
        $val = explode($sep2, $hrefs[1])[0];
        return $val;
    }
}
