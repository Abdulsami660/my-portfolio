<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TestimonialResource\Pages;
use App\Models\Testimonial;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use UnitEnum;
use BackedEnum;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;

class TestimonialResource extends Resource
{
    protected static ?string $model = Testimonial::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-chat-bubble-left-right';

    protected static UnitEnum|string|null $navigationGroup = 'Portfolio Content';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Forms\Components\Textarea::make('quote')->required()->rows(4)->columnSpanFull(),
            Forms\Components\TextInput::make('author')->required()->maxLength(255),
            Forms\Components\TextInput::make('role')->maxLength(255),
            Forms\Components\TextInput::make('avatar')
                ->label('Avatar Image URL')
                ->url()
                ->columnSpanFull(),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('avatar')->circular(),
                Tables\Columns\TextColumn::make('author')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('role'),
                Tables\Columns\TextColumn::make('quote')->limit(60),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
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
            'index' => Pages\ListTestimonials::route('/'),
            'create' => Pages\CreateTestimonial::route('/create'),
            'edit' => Pages\EditTestimonial::route('/{record}/edit'),
        ];
    }
}
