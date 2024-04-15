<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\Imageslider;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ImagesliderResource\Pages;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use App\Filament\Resources\ImagesliderResource\RelationManagers;

class ImagesliderResource extends Resource
{
    protected static ?string $model = Imageslider::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationGroup = 'Media';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('subtitle')
                    ->required()
                    ->maxLength(50),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->maxLength(100),
                Forms\Components\FileUpload::make('image')
                    ->label('Slider image')
                    ->required()
                    ->image()
                    ->imageResizeMode('cover')
                    ->imageCropAspectRatio('3:2')
                    ->imageResizeTargetWidth('1920')
                    ->imageResizeTargetHeight('1281')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file,callable $get): string {
                        $fileName = $get('title');
                        return (string) str('images/sliders/' . $fileName . '.webp');
                    }),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Slider Image'),
                Tables\Columns\TextColumn::make('subtitle')
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

            ])->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListImagesliders::route('/'),
            'create' => Pages\CreateImageslider::route('/create'),
            'view' => Pages\ViewImageslider::route('/{record}'),
            'edit' => Pages\EditImageslider::route('/{record}/edit'),
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
