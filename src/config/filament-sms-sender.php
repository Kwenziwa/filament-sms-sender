<?php

return [
    'table_name' => env('SMS_SENDER_TABLE_NAME', 'users'),
    'phone_column' => env('SMS_SENDER_PHONE_COLUMN', 'phone_number'),
    'api_key' => env('VONAGE_API_KEY'),
    'api_secret' => env('VONAGE_API_SECRET'),
];
