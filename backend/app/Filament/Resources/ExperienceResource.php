<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExperienceResource\Pages;
use App\Models\Experience;
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

class ExperienceResource extends Resource
{
    protected static ?string $model = Experience::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-briefcase';

    protected static UnitEnum|string|null $navigationGroup = 'Portfolio Content';

    protected static ?int $navigationSort = 2;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Forms\Components\TextInput::make('role')->required()->maxLength(255),
            Forms\Components\TextInput::make('company')->required()->maxLength(255),
            Forms\Components\TextInput::make('period')
                ->placeholder('2022 — Present')
                ->maxLength(255),
            Forms\Components\TextInput::make('duration_label')
                ->placeholder('3 YRS')
                ->maxLength(50),
            Forms\Components\TextInput::make('location')->maxLength(255),
            Forms\Components\Textarea::make('description')->rows(4)->columnSpanFull(),
            Forms\Components\TagsInput::make('tech')->label('Tech Used')->columnSpanFull(),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('role')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('company')->searchable(),
                Tables\Columns\TextColumn::make('period'),
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
            'index' => Pages\ListExperiences::route('/'),
            'create' => Pages\CreateExperience::route('/create'),
            'edit' => Pages\EditExperience::route('/{record}/edit'),
        ];
    }
}
