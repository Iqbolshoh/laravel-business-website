<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductsResource\Pages;
use App\Models\Product;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductsResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationGroup = 'Products';
    protected static ?int $navigationSort = 16;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Select::make('category_id')
                ->label('Kategoriya')
                ->options(Category::pluck('name', 'id'))
                ->searchable()
                ->required(),

            Forms\Components\TextInput::make('product_name')
                ->label('Mahsulot nomi')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('description')
                ->label('Tavsif')
                ->required(),

            Forms\Components\TextInput::make('price')
                ->label('Narx')
                ->numeric()
                ->required(),

            Forms\Components\FileUpload::make('images')
                ->label('Mahsulot rasmlari')
                ->multiple()
                ->maxFiles(10)
                ->directory('product-images')
                ->reorderable()
                ->image()
                ->preserveFilenames()
                ->columnSpanFull()
                ->helperText('10 tagacha rasm yuklashingiz mumkin.')
                ->dehydrated(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('product_name')->label('Nomi'),
                Tables\Columns\TextColumn::make('category.name')->label('Kategoriya'),
                Tables\Columns\TextColumn::make('price')->label('Narx')->money('USD', true),
                Tables\Columns\TextColumn::make('created_at')->label('Qo‘shilgan vaqti')->since(),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProducts::route('/create'),
            'edit' => Pages\EditProducts::route('/{record}/edit'),
        ];
    }
}
