<?php

namespace App\Filament\Client\Pages\Auth;

use App\Enums\UserRole;
use App\Models\User;
use Filament\Auth\Pages\Register as BaseRegister;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Component;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Register extends BaseRegister
{
    public function form(Schema $schema): Schema
    {
        return $schema->schema([
            $this->getFirstNameFormComponent(),
            $this->getLastNameFormComponent(),
            $this->getPhoneNumberFormComponent(),
            $this->getPasswordFormComponent(),
            $this->getPasswordConfirmationFormComponent(),
        ]);
    }

    protected function getFirstNameFormComponent(): Component
    {
        return TextInput::make('first_name')
            ->label('Ism')
            ->required()
            ->maxLength(255)
            ->autofocus();
    }

    protected function getLastNameFormComponent(): Component
    {
        return TextInput::make('last_name')
            ->label('Familiya')
            ->required()
            ->maxLength(255);
    }

    protected function getPhoneNumberFormComponent(): Component
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

    protected function handleRegistration(array $data): Model
    {
        // Telefon raqamni tozalaymiz
        $phone = preg_replace('/\D/', '', $data['phone_number']);
        if (!str_starts_with($phone, '998')) {
            $phone = '998' . $phone;
        }

        $user = User::query()->create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone_number' => $phone,
            'password' => Hash::make($data['password']),
            'role' => UserRole::CLIENT,
        ]);

        return $user;
    }
}
