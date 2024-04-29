<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClothTypeResource\Pages;
use App\Filament\Resources\ClothTypeResource\RelationManagers;
use App\Models\ClothType;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ClothTypeResource extends Resource
{
    protected static ?string $model = ClothType::class;

    protected static ?string $navigationIcon = 'heroicon-o-scissors';
    protected static ?string $navigationGroup = 'Clothes';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('type')
                    ->required()
                    ->readOnly()
                    ->maxLength(255)
                    ->default('cloth'),
                Section::make('Clothes Details')
                    ->icon('heroicon-m-shopping-bag')
                    ->description('Set the cloth cost, size and description that will appear to all of the products')
                    ->schema([

                        Forms\Components\Select::make('size')
                            ->required()
                            ->prefix('SIZE')
                            ->suffix('US')
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->columnSpan(1)
                            ->options([
                                'S' => 'S',
                                'M' => 'M',
                                'L' => 'L',
                                'XL' => 'XL',
                                'XXL' => 'XXL',
                            ]),
                        Forms\Components\TextInput::make('cost')
                            ->prefix('COST')
                            ->suffix('$')
                            ->required()
                            ->columnSpan(1)
                            ->numeric()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])
                    ->collapsible()
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->color('success')
                    ->grow()
                    ->searchable(isIndividual: true, isGlobal: false),
                Tables\Columns\TextColumn::make('cost')
                    ->color('success')
                    ->money('USD')
                    ->searchable(),
                Tables\Columns\TextColumn::make('size')
                    ->color('success')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListClothTypes::route('/'),
            'create' => Pages\CreateClothType::route('/create'),
            'view' => Pages\ViewClothType::route('/{record}'),
            'edit' => Pages\EditClothType::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}