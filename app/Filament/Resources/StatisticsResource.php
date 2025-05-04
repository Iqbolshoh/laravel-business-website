<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatisticsResource\Pages;
use App\Filament\Resources\StatisticsResource\RelationManagers;
use App\Models\Statistics;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class StatisticsResource extends Resource
{
    protected static ?string $model = Statistics::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationGroup = 'Biz haqimizda';
    protected static ?int $navigationSort = 10;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('icon')
                    ->required()
                    ->maxLength(255)
                    ->disabled()
                    ->helperText('Enter the icon name or class (e.g., "heroicon-o-chart-bar")'),

                Forms\Components\TextInput::make('count')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->helperText('Enter the numeric count value'),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(500)
                    ->helperText('A brief description of the statistic'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->searchable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('icon')
                    ->sortable()
                    ->limit(50),

                Tables\Columns\TextColumn::make('count')
                    ->sortable(),

                Tables\Columns\TextColumn::make('description')
                    ->limit(100),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime('Y-m-d H:i')
                    ->sortable(),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ]);
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
            'index' => Pages\ListStatistics::route('/'),
            'edit' => Pages\EditStatistics::route('/{record}/edit'),
        ];
    }
}
