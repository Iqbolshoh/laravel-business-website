<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OurServicesResource\Pages;
use App\Filament\Resources\OurServicesResource\RelationManagers;
use App\Models\OurServices;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OurServicesResource extends Resource
{
    protected static ?string $model = OurServices::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';
    protected static ?string $navigationGroup = 'Bizning xizmatlarimiz';
    protected static ?int $navigationSort = 14;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('service_name')
                    ->required()
                    ->maxLength(255)
                    ->label('Xizmat nomi'),

                Forms\Components\Select::make('skill_level')
                    ->label('Ko‘nikma darajasi (%)')
                    ->required()
                    ->options(collect(range(0, 100, 1))->mapWithKeys(fn($v) => [$v => $v . '%'])->toArray())
            ]);
    }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('service_name')
                    ->label('Xizmat nomi')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('skill_level')
                    ->label('Ko‘nikma (%)')
                    ->sortable(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOurServices::route('/'),
            'edit' => Pages\EditOurServices::route('/{record}/edit'),
        ];
    }
}
