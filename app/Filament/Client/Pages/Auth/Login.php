<?php

namespace App\Filament\Client\Pages\Auth;

use Filament\Auth\Pages\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class Login extends BaseLogin
{
    public function form(Schema $schema): Schema
    {
        return $schema->components([
            $this->getPhoneNumberFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getRememberFormComponent(),
        ]);
    }

    protected function getPhoneNumberFormComponent()
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


}
