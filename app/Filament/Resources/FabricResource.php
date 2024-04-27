<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FabricResource\Pages;
use App\Filament\Resources\FabricResource\RelationManagers;
use App\Models\Fabric;
use App\Models\FabricType;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FabricResource extends Resource
{
    protected static ?string $model = Fabric::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Fabrics';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type_id')
                    ->options(FabricType::all()->pluck('name', 'id'))
                    ->searchable()
                    ->preload()
                    ->hidden(fn (string $operation): bool => $operation === 'edit')
                    ->hidden(fn (string $operation): bool => $operation === 'view')
                    ->required(),
                Toggle::make('status')
                    ->label('Cloth Availability')
                    ->required()
                    ->onColor('success')
                    ->offColor('danger'),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageEditor()
                    ->required()
                    ->multiple()
                    ->imageResizeTargetWidth('500')
                    // ->columnSpanFull()
                    ->rules('image')
                    ->imageResizeTargetHeight('500')
                    ->getUploadedFileNameForStorageUsing(function (): string {
                        $name = uniqid();
                        return (string) str('images/products/fabric/prod-' . $name . '.webp');
                    })->label('Produc Image'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type.name')
                    ->label('Fabric Type')
                    ->color('primary'),
                Tables\Columns\ImageColumn::make('image')
                    ->label('Clothes Images')
                    ->circular()
                    ->stacked()
                    ->limit(3)
                    ->limitedRemainingText(),
                Tables\Columns\TextColumn::make('type.cost')
                    ->color('success')
                    ->money('USD')
                    ->searchable()
                    ->color('primary'),
                ToggleColumn::make('status')
                    ->label('Cloth Available'),
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
            'index' => Pages\ListFabrics::route('/'),
            'create' => Pages\CreateFabric::route('/create'),
            'view' => Pages\ViewFabric::route('/{record}'),
            'edit' => Pages\EditFabric::route('/{record}/edit'),
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
