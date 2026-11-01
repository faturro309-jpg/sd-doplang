<?php

namespace App\Filament\Pages\Auth;

use Filament\Pages\Auth\Login as BaseLogin;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;

class Login extends BaseLogin
{
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label('Alamat Email')
                    ->email()
                    ->required()
                    ->autocomplete()
                    ->autofocus()
                    ->extraInputAttributes(['tabindex' => 1]),

                TextInput::make('password')
                    ->label('Kata Sandi')
                    ->password()
                    ->revealable(filament()->arePasswordsRevealable())
                    ->required()
                    ->extraInputAttributes(['tabindex' => 2]),
            ]);
    }

    public function getHeading(): string
    {
        return 'Masuk ke Akun Anda';
    }
}
