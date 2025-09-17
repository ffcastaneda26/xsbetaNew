<?php
namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([

                // ImageColumn::make('images')
                //     ->label('Imágenes')
                //     ->imageWidth(200)
                //     ->imageHeight(200)
                //     ->getStateUsing(function ($record) {
                //         if (!is_null($record->images) && is_array($record->images) && count($record->images) > 0) {
                //             $firstImage = $record->images[0];

                //             if (!empty($firstImage) && Storage::disk('public')->exists($firstImage)) {
                //                 return Storage::disk('public')->url($firstImage);
                //             }
                //         }
                //         return asset('images/generico.jpeg');
                //     }),
                ImageColumn::make('images')
                    ->label('Imágenes')
                    ->getStateUsing(fn($record) => $record->images[0] ?? null) // Muestra la primera imagen o null
                    ->defaultImageUrl(asset('images/generico.jpeg'))           // Usa esta imagen si el valor es null
                    ->imageWidth(200)
                    ->imageHeight(200)
                    ->disk('public'),
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->label('Precio')
                    ->searchable()
                    ->numeric(decimalPlaces: 2, decimalSeparator: '.', thousandsSeparator: ','),
                ToggleColumn::make('is_active')
                    ->label('¿Activo?'),
                TextColumn::make('short_description')
                    ->label('Descripción Corta')
                    ->limit(50)
                    ->sortable()
                    ->searchable()
                    ->wrap()
                    ->toggleable(isToggledHiddenByDefault: true),

                // TextColumn::make('stock')
                //     ->label('Existencia')
                //     ->numeric()
                //     ->alignEnd(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('categories', 'name')
                    ->label('Categoría')
                    ->searchable()
                    ->preload(),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('')
                    ->icon('heroicon-o-pencil-square')
                    ->tooltip('Editar'),
                DeleteAction::make()
                    ->label('')
                    ->icon('heroicon-o-trash')
                    ->tooltip('Eliminar'),
            ]);
    }
}
