<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutItemResource\Pages;
use App\Models\AboutItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class AboutItemResource extends Resource
{
    protected static ?string $model = AboutItem::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';
    protected static ?string $navigationGroup = 'Biz haqimizda';
    protected static ?int $navigationSort = 10;

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
        return $form
            ->schema([
                Forms\Components\Select::make('about_id')
                    ->relationship('about', 'title')
                    ->required()
                    ->label('Bo‘lim (About)'),

                Forms\Components\RichEditor::make('bullet_point')
                    ->label('Matn')
                    ->extraAttributes($disableFileUploadButton)
                    ->required()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('about.title')
                    ->label('Bo‘lim nomi')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('bullet_point')
                    ->label('Matn')
                    ->sortable()
                    ->limit(50)
                    ->wrap(),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Yaratilgan sana')
                    ->sortable()
                    ->dateTime(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAboutItems::route('/'),
            'edit' => Pages\EditAboutItem::route('/{record}/edit'),
        ];
    }
}
