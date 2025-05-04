<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MessagesResource\Pages;
use App\Filament\Resources\MessagesResource\RelationManagers;
use App\Models\Message;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MessagesResource extends Resource
{
    protected static ?string $model = Message::class;

    protected static ?string $navigationIcon = 'heroicon-o-envelope';
    protected static ?string $navigationGroup = 'Aloqa';
    protected static ?int $navigationSort = 18;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('sender_name')
                    ->required(),

                Forms\Components\TextInput::make('sender_email')
                    ->email()
                    ->required(),

                Forms\Components\TextInput::make('subject')
                    ->required(),

                Forms\Components\Textarea::make('body')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'new' => 'New',
                        'read' => 'Read',
                    ])
                    ->required()
                    ->default('new'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sender_name')->searchable(),
                Tables\Columns\TextColumn::make('sender_email')->searchable(),
                Tables\Columns\TextColumn::make('subject')->limit(20)->tooltip(fn($record) => $record->subject),
                Tables\Columns\TextColumn::make('body')->limit(50)->tooltip(fn($record) => $record->body),
                Tables\Columns\BadgeColumn::make('status')
                    ->colors([
                        'primary' => 'new',
                        'success' => 'read',
                    ]),
                Tables\Columns\TextColumn::make('created_at')->dateTime('Y-m-d H:i'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMessages::route('/'),
            'edit' => Pages\EditMessages::route('/{record}/edit'),
        ];
    }
}
