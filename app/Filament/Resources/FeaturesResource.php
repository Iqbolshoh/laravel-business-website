<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FeaturesResource\Pages;
use App\Models\Feature;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class FeaturesResource extends Resource
{
    protected static ?string $model = Feature::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 7;

    public static function canAccess(): bool
    {
        return auth()->user()?->can('feature.view');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Title')
                    ->disabled(fn() => !auth()->user()?->can('feature.edit')),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Description')
                    ->disabled(fn() => !auth()->user()?->can('feature.edit')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')->label('ID')->sortable(),
                Tables\Columns\TextColumn::make('title')->label('Title')->sortable(),
                Tables\Columns\TextColumn::make('description')->label('Description')->sortable()->limit(50),
                Tables\Columns\TextColumn::make('updated_at')->label('Updated At')->sortable()->dateTime(),
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('feature.edit')),
            ])
            ->headerActions([]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFeatures::route('/'),
            'edit' => Pages\EditFeatures::route('/{record}/edit'),
        ];
    }
}
