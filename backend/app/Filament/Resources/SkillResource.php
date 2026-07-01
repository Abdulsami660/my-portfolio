<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SkillResource\Pages;
use App\Models\Skill;
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

class SkillResource extends Resource
{
    protected static ?string $model = Skill::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-cpu-chip';

    protected static UnitEnum|string|null $navigationGroup = 'Portfolio Content';

    protected static ?int $navigationSort = 1;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required()->maxLength(255),
            Forms\Components\TextInput::make('category')->maxLength(255),
            Forms\Components\Textarea::make('description')->rows(3)->columnSpanFull(),
            Forms\Components\TextInput::make('percentage')
                ->numeric()
                ->minValue(0)
                ->maxValue(100)
                ->suffix('%')
                ->required(),
            Forms\Components\TextInput::make('sort_order')->numeric()->default(0),
        ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('category'),
                Tables\Columns\TextColumn::make('percentage')->suffix('%')->sortable(),
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
            'index' => Pages\ListSkills::route('/'),
            'create' => Pages\CreateSkill::route('/create'),
            'edit' => Pages\EditSkill::route('/{record}/edit'),
        ];
    }
}
