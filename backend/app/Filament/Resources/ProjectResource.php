<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProjectResource\Pages;
use App\Models\Project;
use Filament\Forms;
use Filament\Schemas\Schema;
use Filament\Resources\Resource;
use Filament\Tables;
use UnitEnum;
use BackedEnum;
use Filament\Tables\Table;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Set;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;

    protected static BackedEnum|string|null $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static UnitEnum|string|null $navigationGroup = 'Portfolio Content';

    protected static ?int $navigationSort = 3;

    public static function form(Schema $form): Schema
    {
        return $form->schema([
            Section::make('Project Details')->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (string $state, Set $set) => $set('slug', str($state)->slug()))
                    ->maxLength(255),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\TextInput::make('tagline')
                    ->maxLength(255),
                Forms\Components\Textarea::make('description')
                    ->rows(3)
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('long_description')
                    ->rows(6)
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->directory('projects')
                    ->disk('public')
                    ->visibility('public')
                    ->imageEditor()
                    ->acceptedFileTypes([
                        'image/jpeg',
                        'image/png',
                        'image/webp',
                        'image/gif',
                    ])
                    ->maxSize(5120)
                    ->columnSpanFull(),
            ])->columns(2),

            Section::make('Links & Tech')->schema([
                Forms\Components\TextInput::make('github_url')->url(),
                Forms\Components\TextInput::make('live_url')->url(),
                Forms\Components\TagsInput::make('tech')
                    ->label('Tech Stack')
                    ->columnSpanFull(),
                Forms\Components\KeyValue::make('stats')
                    ->label('Stats (label => value)')
                    ->keyLabel('Stat name')
                    ->valueLabel('Value')
                    ->columnSpanFull(),
            ])->columns(2),

            Section::make('Display')->schema([
                Forms\Components\Toggle::make('is_featured')
                    ->label('Featured (shown large at top of Projects section)'),
                Forms\Components\TextInput::make('sort_order')
                    ->numeric()
                    ->default(0),
            ])->columns(2),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')->disk('public')->square(),
                Tables\Columns\TextColumn::make('title')->searchable()->sortable(),
                Tables\Columns\TextColumn::make('tagline')->limit(40),
                Tables\Columns\IconColumn::make('is_featured')->boolean(),
                Tables\Columns\TextColumn::make('sort_order')->sortable(),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->filters([
                Tables\Filters\TernaryFilter::make('is_featured'),
            ])
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
