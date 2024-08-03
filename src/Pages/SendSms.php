<?php

namespace Kwenziwa\FilamentSmsSender\Pages;

use Filament\Pages\Page;
use Filament\Forms;
use Kwenziwa\FilamentSmsSender\Services\SmsSenderService;

class SendSms extends Page
{
    protected static string $view = 'filament-sms-sender::send-sms';

    public $users;
    public $selectedUsers = [];
    public $message;
    public $from;

    public function mount()
    {
        $smsService = new SmsSenderService();
        $this->users = $smsService->getUserPhoneNumbers();
    }

    public function send()
    {
        $this->validate([
            'selectedUsers' => 'required|array',
            'message' => 'required|string',
            'from' => 'required|string'
        ]);

        $smsService = new SmsSenderService();
        $smsService->sendSms($this->selectedUsers, $this->from, $this->message);

        session()->flash('success', 'SMS messages sent successfully!');
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('selectedUsers')
                    ->options(fn() => (new SmsSenderService())->getUserPhoneNumbers())
                    ->multiple()
                    ->required(),

                Forms\Components\TextInput::make('from')
                    ->label('Sender Number')
                    ->required(),

                Forms\Components\Textarea::make('message')
                    ->label('Message')
                    ->required(),
            ]);
    }
}
