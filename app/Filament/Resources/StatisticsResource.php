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
    protected static ?string $navigationGroup = 'About Us';
    protected static ?int $navigationSort = 11;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('statistics.view');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('statistics.edit'))
                    ->maxLength(255),

                Forms\Components\TextInput::make('count')
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->disabled(fn() => !auth()->user()?->can('statistics.edit'))
                    ->helperText('Enter the numeric count value'),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->maxLength(500)
                    ->disabled(fn() => !auth()->user()?->can('statistics.edit'))
                    ->helperText('A brief description of the statistic'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->sortable()->searchable()->limit(50),
                Tables\Columns\TextColumn::make('count')->sortable(),
                Tables\Columns\TextColumn::make('description')->limit(100),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated At')->sortable()->dateTime(),
            ])
            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('statistics.edit')),
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
