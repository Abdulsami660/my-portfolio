<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ContactMessageResource\Pages;
use App\Models\ContactMessage;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Table;
use UnitEnum;
use BackedEnum;

class ContactMessageResource extends Resource
{
    protected static ?string $model = ContactMessage::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-inbox';

    protected static UnitEnum|string|null $navigationGroup = 'Inbox';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Contact Messages';

    // Submissions come in only via the public contact form.
    public static function canCreate(): bool
    {
        return false;
    }

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->disabled(),
            Forms\Components\TextInput::make('email')->disabled(),
            Forms\Components\Textarea::make('message')->disabled()->rows(6)->columnSpanFull(),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('email')->searchable()->copyable(),
                Tables\Columns\TextColumn::make('message')->limit(60),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime()
                    ->sortable(),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                ViewAction::make(),
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListContactMessages::route('/'),
            'view' => Pages\ViewContactMessage::route('/{record}'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
}
