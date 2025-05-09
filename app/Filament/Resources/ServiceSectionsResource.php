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

    public static function canAccess(): bool
    {
        return auth()->user()?->can('service-section.view');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->label('Title')
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit'))
                    ->maxLength(255),

                Forms\Components\Textarea::make('text_1')
                    ->label('Text 1')
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit'))
                    ->maxLength(1000),

                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->required()
                    ->directory('services-images')
                    ->label('Image')
                    ->imageEditor()
                    ->imageEditorMode(2)
                    ->openable()
                    ->downloadable()
                    ->previewable()
                    ->acceptedFileTypes(['image/jpeg', 'image/png'])
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit')),

                Forms\Components\TextInput::make('sub_title')
                    ->label('Sub Title')
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit'))
                    ->maxLength(255),

                Forms\Components\Textarea::make('text_2')
                    ->label('Text 2')
                    ->required()
                    ->disabled(fn() => !auth()->user()?->can('service-section.edit'))
                    ->maxLength(1000),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->label('Image')->circular(),
                Tables\Columns\TextColumn::make('title')->label('Title')->searchable(),
                Tables\Columns\TextColumn::make('sub_title')->label('Sub Title')->limit(50),
                Tables\Columns\TextColumn::make('created_at')->label('Created at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->visible(fn() => auth()->user()?->can('service-section.edit')),
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
