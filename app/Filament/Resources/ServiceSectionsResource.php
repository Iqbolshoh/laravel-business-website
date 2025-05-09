<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceSectionsResource\Pages;
use App\Models\ServiceSection;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Forms\Components\FileUpload;

class ServiceSectionsResource extends Resource
{
    protected static ?string $model = ServiceSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationGroup = 'Our Services';
    protected static ?int $navigationSort = 13;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('text_1')
                    ->label('Text 1')
                    ->required()
                    ->maxLength(1000),

                FileUpload::make('image')
                    ->label('Image')
                    ->image()
                    ->disk('public')
                    ->nullable()
                    ->required(),

                Forms\Components\TextInput::make('sub_title')
                    ->label('Sub Title')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('text_2')
                    ->label('Text 2')
                    ->required()
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('sub_title')
                    ->label('Sub Title')
                    ->limit(50),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->rounded()
                    ->width(50)
                    ->height(50),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
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
            'index' => Pages\ListServiceSections::route('/'),
            'edit' => Pages\EditServiceSections::route('/{record}/edit'),
        ];
    }
}
