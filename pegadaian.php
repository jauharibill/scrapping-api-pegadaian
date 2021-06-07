<?php
namespace Jauharibill\Gold;

require __DIR__ . "/vendor/autoload.php";

use GuzzleHttp\Client;
use Carbon\Carbon;

class Pegadaian {

    private $client;
    private $two_month_before;
    private $year_before;
    private $startDate;

    function __construct()
    {
        $current_day = Carbon::now()->day;
        $current_month = Carbon::now()->month;
        $current_year = Carbon::now()->year;
        $two_month_before = ($current_month - 2);
        $this->year_before = $current_year;
        $this->two_month_before = ($two_month_before < 10) ? "0" . $two_month_before: $two_month_before;

        if ($two_month_before < 0) {
            $this->two_month_before = (($two_month_before = 12 + $two_month_before) < 10) ? "0" . $two_month_before: $two_month_before;
            $this->year_before = $current_year - 1;
        }

        $this->startDate = $this->year_before . "-" . $this->two_month_before . "-" . $current_day;

        $this->client = new Client([
            "headers" => [
                "Accept" => "*/*",
                "Content-Type" => "text/plain",
                "Referer" => "https://www.pegadaian.co.id/harga"
            ]
        ]);
    }

    public function getSellingPrice()
    {
        try {
            $payload = [
                "type" => "harga_jual",
                "startDate" => $this->startDate,
                "endDate" => date('Y-m-d')
            ];

            $response = $this->client->post("https://www.pegadaian.co.id//tabungan_emas", [
                "body" => json_encode($payload)
            ]);

            return $response->getBody();
        } catch (Exception $e) {
            echo $e->getTrace();
            return $e->getMessage();
        }
    }

    public function getBuyingPrice()
    {
        try {
            $payload = [
                "type" => "harga_beli",
                "startDate" => $this->startDate,
                "endDate" => date('Y-m-d')
            ];

            $response = $this->client->post("https://www.pegadaian.co.id//tabungan_emas", [
                "body" => json_encode($payload)
            ]);

            return $response->getBody();
        } catch (Exception $e) {
            echo $e->getTrace();
            return $e->getMessage();
        }
    }
}

