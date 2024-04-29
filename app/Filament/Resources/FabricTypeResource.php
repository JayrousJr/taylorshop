<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FabricTypeResource\Pages;
use App\Filament\Resources\FabricTypeResource\RelationManagers;
use App\Models\FabricType;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FabricTypeResource extends Resource
{
    protected static ?string $model = FabricType::class;

    protected static ?string $navigationIcon = 'heroicon-o-scissors';
    protected static ?string $navigationGroup = 'Fabrics';
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
                    ->default('fabric'),
                Section::make('Fabric Details')
                    ->description('Set the fabric cost, size and description that will appear to all of the products')
                    ->icon('heroicon-m-shopping-bag')
                    ->schema([
                        Forms\Components\TextInput::make('cost')
                            ->prefix('COST')
                            ->suffix('$')
                            ->required()
                            ->numeric()
                            ->maxLength(255),
                        Forms\Components\Select::make('size')
                            ->required()
                            ->prefix('Size')
                            ->suffix('Yards')
                            ->multiple()
                            ->searchable()
                            ->preload()
                            ->options([
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                                '9' => '9',
                                '10' => '10',
                            ]),
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
                // Tables\Columns\TextColumn::make('type')
                //     ->color('success')
                //     ->searchable(),
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
            'index' => Pages\ListFabricTypes::route('/'),
            'create' => Pages\CreateFabricType::route('/create'),
            'view' => Pages\ViewFabricType::route('/{record}'),
            'edit' => Pages\EditFabricType::route('/{record}/edit'),
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