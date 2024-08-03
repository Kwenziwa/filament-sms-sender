<?php

namespace Kwenziwa\FilamentSmsSender\Services;

use Illuminate\Support\Facades\DB;
use Vonage\Client;
use Vonage\Client\Credentials\Basic;

class SmsSenderService
{
    protected $client;
    protected $tableName;
    protected $phoneColumn;

    public function __construct()
    {
        $this->tableName = config('filament-sms-sender.table_name');
        $this->phoneColumn = config('filament-sms-sender.phone_column');

        $apiKey = config('filament-sms-sender.api_key');
        $apiSecret = config('filament-sms-sender.api_secret');

        $basic = new Basic($apiKey, $apiSecret);
        $this->client = new Client($basic);
    }

    public function sendSms(array $numbers, string $from, string $text)
    {
        foreach ($numbers as $number) {
            $this->client->message()->send([
                'to' => $number,
                'from' => $from,
                'text' => $text,
            ]);
        }
    }

    public function getUserPhoneNumbers()
    {
        return DB::table($this->tableName)
            ->pluck($this->phoneColumn, 'id');
    }
}
