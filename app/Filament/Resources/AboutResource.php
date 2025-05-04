<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\RichEditor;

class AboutResource extends Resource
{
    protected static ?string $model = About::class;
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';
    protected static ?string $navigationGroup = 'Biz haqimizda';
    protected static ?int $navigationSort = 8;

    public static function form(Form $form): Form
    {
        $disableFileUploadButton = [
            'x-init' => <<<JS
                setTimeout(() => {
                    document.querySelectorAll('trix-toolbar [data-trix-action="attachFiles"]')
                        .forEach(btn => btn.remove());
                }, 500);
            JS,
        ];

        return $form->schema([
            Forms\Components\TextInput::make('title')
                ->required()
                ->label('Sarlavha'),

            RichEditor::make('text_1')
                ->required()
                ->label('Matn 1')
                ->extraAttributes($disableFileUploadButton),

            RichEditor::make('text_2')
                ->required()
                ->label('Matn 2')
                ->extraAttributes($disableFileUploadButton),

            Forms\Components\FileUpload::make('image')
                ->image()
                ->directory('about-images')
                ->label('Rasm'),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('Sarlavha'),
                Tables\Columns\TextColumn::make('text_1')->label('Matn 1')->limit(50),
                Tables\Columns\TextColumn::make('text_2')->label('Matn 2')->limit(50),
                Tables\Columns\ImageColumn::make('image')->label('Rasm'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ])
            ->headerActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAbouts::route('/'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
