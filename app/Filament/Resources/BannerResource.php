<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BannerResource\Pages;
use App\Filament\Resources\BannerResource\RelationManagers;
use App\Models\Banner;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BannerResource extends Resource
{
    protected static ?string $model = Banner::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'Bosh sahifa';
    protected static ?int $navigationSort = 6;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->label('Title'),

                Forms\Components\TextInput::make('button_text')
                    ->nullable()
                    ->label('Button Text'),

                Forms\Components\TextInput::make('button_link')
                    ->nullable()
                    ->label('Button Link'),

                Forms\Components\Textarea::make('description')
                    ->required()
                    ->label('Description'),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->label('Image')
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->openable()
                    ->downloadable()
                    ->previewable()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),

                Tables\Columns\ImageColumn::make('image')
                    ->label('Image')
                    ->circular()
                    ->sortable(),

                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('button_text')
                    ->label('Button Text')
                    ->default('-')
                    ->sortable(),

                Tables\Columns\TextColumn::make('button_link')
                    ->label('Button Link')
                    ->default('-')
                    ->sortable(),
            ])

            ->filters([
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBanners::route('/'),
            'create' => Pages\CreateBanner::route('/create'),
            'edit' => Pages\EditBanner::route('/{record}/edit'),
        ];
    }
}
