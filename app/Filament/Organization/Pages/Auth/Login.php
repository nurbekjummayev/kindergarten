<?php

namespace App\Filament\Organization\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Validation\ValidationException;

class Login extends BaseLogin
{
    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            $this->getPhoneFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getRememberFormComponent(),
        ]);
    }

    protected function getPhoneFormComponent(): Component
    {
        return TextInput::make('phone_number')
            ->label('Telefon raqam')
            ->tel()
            ->prefix('+998')
            ->placeholder('93 895 16 02')
            ->mask('99 999 99 99')
            ->required()
            ->autocomplete()
            ->autofocus()
            ->extraInputAttributes(['tabindex' => 1]);
    }

    protected function getCredentialsFromFormData(array $data): array
    {
        // +998 prefiksini olib tashlaymiz va faqat raqamlarni qoldiramiz
        $phone = preg_replace('/\D/', '', $data['phone_number']);

        // Agar 998 bilan boshlanmasa, qo'shamiz
        if (! str_starts_with($phone, '998')) {
            $phone = '998'.$phone;
        }

        return [
            'phone_number' => $phone,
            'password' => $data['password'],
        ];
    }

    protected function throwFailureValidationException(): never
    {
        throw ValidationException::withMessages([
            'data.phone_number' => __('filament-panels::pages/auth/login.messages.failed'),
        ]);
    }
}
