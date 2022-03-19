<?php

namespace App\Modules\API\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CurrencyService
{
    private array $currencies = [
        'USD' => 0,
        'EUR' => 0,
        'RUB' => 0,
    ];
    /**
     * @param string $from
     * @param string $to
     * @return mixed
     */
    public function getCurrency(string $from = 'USD', string $to = 'KZT')
    {
        return Cache::remember('currency'.$from.$to,
            now()->addMinute(),
            fn() => $this->currencyResponse($from, $to)
        );
    }

    /**
     * @param string $from
     * @param string $to
     * @return mixed
     */
    private function currencyResponse(string $from, string $to)
    {
        $response = Http::get($this->getFreecurrencyAPI($from));
        return $response->json()['data'][$to];
    }

    /**
     * @param string $curr
     * @return string
     */
    private function getFreecurrencyAPI(string $curr): string
    {
        $currency = '?base_currency=' . $curr;
        $key = '&apikey=' . config('app.freecurrency_api_key');
        return config('app.freecurrency_api') . $currency . $key;
    }

    /**
     * @return mixed
     */
    public function getCurrencies()
    {
        $base = config('app.base_currency');
        return Cache::remember('currencies'.$base,
            now()->addMinute(),
            fn() => $this->currenciesResponse($base)
        );
    }

    /**
     * @param string $base
     * @return mixed
     */
    private function currenciesResponse(string $base)
    {
        $response = Http::get($this->getFreecurrencyAPI($base));
        $data = $response->json()['data'];
        foreach ($this->currencies as $key => $val) {
            $this->currencies[$key] = round(1 / $data[$key], 2);
        }
        return response()->json($this->currencies);
    }
}
