<?php

namespace App\Filament\Resources;

use App\Filament\Resources\EducationResource\Pages;
use App\Models\Education;
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

class EducationResource extends Resource
{
    protected static ?string $model = Education::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-academic-cap';

    protected static UnitEnum|string|null $navigationGroup = 'Portfolio Content';

    protected static ?int $navigationSort = 4;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Forms\Components\TextInput::make('year')->required()->maxLength(10),
            Forms\Components\TextInput::make('degree')->required()->maxLength(255),
            Forms\Components\TextInput::make('school')->required()->maxLength(255),
            Forms\Components\TextInput::make('subtitle')->maxLength(255),
            Forms\Components\Textarea::make('note')->rows(3)->columnSpanFull(),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('year')->sortable(),
                Tables\Columns\TextColumn::make('degree')->searchable(),
                Tables\Columns\TextColumn::make('school')->searchable(),
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
            'index' => Pages\ListEducation::route('/'),
            'create' => Pages\CreateEducation::route('/create'),
            'edit' => Pages\EditEducation::route('/{record}/edit'),
        ];
    }
}
