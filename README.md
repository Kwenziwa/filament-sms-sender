Here's the README file based on the information you provided:

# Filament SMS Sender Plugin

A Filament plugin for sending SMS messages using Vonage (formerly Nexmo). This package allows you to select users from a dropdown, configure SMS settings, and send messages directly from your Laravel application.

## Features

- Select multiple users from a dropdown list
- Send SMS messages using Vonage
- Configurable table and column names for user phone numbers
- Easy integration with Filament admin panel

## Installation

1. **Install the Package**

   Add the package to your Laravel project using Composer:

   ```bash
   composer require kwenziwa/filament-sms-sender
   ```

2. **Publish the Configuration**

   Publish the package configuration file:

   ```bash
   php artisan vendor:publish --provider="Kwenziwa\FilamentSmsSender\Providers\SmsSenderServiceProvider" --tag=config
   ```

3. **Configure Environment Variables**

   Add the following entries to your `.env` file:

   ```
   SMS_SENDER_TABLE_NAME=users
   SMS_SENDER_PHONE_COLUMN=phone_number
   VONAGE_API_KEY=your_api_key
   VONAGE_API_SECRET=your_api_secret
   ```

   Replace `your_api_key` and `your_api_secret` with your Vonage API credentials.

4. **Run Database Migrations**

   Ensure your database has a table with the appropriate phone number column. For example, add a phone number column to the `users` table:

   ```bash
   php artisan make:migration add_phone_number_to_users_table --table=users
   ```

   In the migration file:

   ```php
   public function up()
   {
       Schema::table('users', function (Blueprint $table) {
           $table->string('phone_number')->nullable();
       });
   }
   ```

   Run the migration:

   ```bash
   php artisan migrate
   ```

## Usage

1. **Add the SMS Sending Page to Filament**

   Register the SMS sending page in your Filament admin panel. Typically, this is done in a service provider:

   ```php
   use Kwenziwa\FilamentSmsSender\Pages\SendSms;

   public function boot()
   {
       Filament::registerPages([
           SendSms::class,
       ]);
   }
   ```

2. **Access the SMS Sending Page**

   Navigate to the SMS sending page in your Filament admin panel. You should see a form where you can:
   - Select users from a multi-select dropdown
   - Enter the sender number
   - Write your SMS message
   - Click "Send SMS" to send messages to the selected users

## Configuration

You can configure the table and column names for phone numbers by editing the `config/filament-sms-sender.php` file:

```php
return [
    'table_name' => env('SMS_SENDER_TABLE_NAME', 'users'),
    'phone_column' => env('SMS_SENDER_PHONE_COLUMN', 'phone_number'),
    'api_key' => env('VONAGE_API_KEY'),
    'api_secret' => env('VONAGE_API_SECRET'),
];
```

## Development

1. **Clone the Repository**

   Clone this repository to your local machine:

   ```bash
   git clone https://github.com/yourusername/filament-sms-sender.git
   ```

2. **Navigate to the Package Directory**

   ```bash
   cd filament-sms-sender
   ```

3. **Install Dependencies**

   ```bash
   composer install
   ```

4. **Run Tests**

   Ensure everything works as expected:

   ```bash
   phpunit
   ```

## License

This package is licensed under the MIT License. See the LICENSE file for details.

## Contributing

Contributions are welcome! Please submit issues or pull requests on GitHub. Make sure to follow the contributing guidelines.

## Contact

For support or inquiries, please contact <kwenziwa@live.com>.
