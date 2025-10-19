<?php

namespace App\Filament\Organization\Resources\Applications\Infolists;

use Filament\Infolists\Components\TextEntry;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;

class ApplicationInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Section::make('Ota-ona ma\'lumotlari')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('user.first_name')
                                    ->label('Ismi'),
                                TextEntry::make('user.last_name')
                                    ->label('Familiyasi'),
                                TextEntry::make('user.phone_number')
                                    ->label('Telefon raqami'),
                            ]),
                    ]),

                Section::make('Farzand ma\'lumotlari')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('child_first_name')
                                    ->label('Ismi'),
                                TextEntry::make('child_last_name')
                                    ->label('Familiyasi'),
                                TextEntry::make('child_father_name')
                                    ->label('Otasining ismi'),
                                TextEntry::make('child_birth_date')
                                    ->label('Tug\'ilgan sanasi')
                                    ->date('d.m.Y'),
                                TextEntry::make('child_birth_certificate_number')
                                    ->label('Tug\'ilganlik guvohnomasi raqami'),
                                TextEntry::make('child_gender')
                                    ->label('Jinsi')
                                    ->badge(),
                            ]),
                    ]),

                Section::make('Ariza ma\'lumotlari')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextEntry::make('kindergarten.name')
                                    ->label('Bog\'cha'),
                                TextEntry::make('status')
                                    ->label('Holat')
                                    ->badge(),
                                TextEntry::make('created_at')
                                    ->label('Yuborilgan sana')
                                    ->dateTime('d.m.Y H:i'),
                                TextEntry::make('updated_at')
                                    ->label('Yangilangan sana')
                                    ->dateTime('d.m.Y H:i'),
                                TextEntry::make('rejection_reason')
                                    ->label('Rad etish sababi')
                                    ->columnSpanFull()
                                    ->visible(fn ($record) => $record->rejection_reason !== null),
                            ]),
                    ]),
            ]);
    }
}
