<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClothResource\Pages;
use App\Filament\Resources\ClothResource\RelationManagers;
use App\Models\Cloth;
use App\Models\ClothType;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ClothResource extends Resource
{
    protected static ?string $model = Cloth::class;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';
    protected static ?string $navigationGroup = 'Clothes';
    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('type_id')
                    ->options(ClothType::all()->pluck('name', 'id'))
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
                    ->required()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('1:1')
                    ->imageEditor()
                    ->multiple()
                    ->imageResizeTargetWidth('500')
                    // ->columnSpanFull()
                    ->imageResizeTargetHeight('500')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $name = uniqid();
                        return (string) str('images/products/cloth/prod-' . $name . '.webp');
                    })->label('Product Image')
                    ->rules('image'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('type.name')
                    ->label('Dress Type')
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
            'index' => Pages\ListCloths::route('/'),
            'create' => Pages\CreateCloth::route('/create'),
            'view' => Pages\ViewCloth::route('/{record}'),
            'edit' => Pages\EditCloth::route('/{record}/edit'),
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
