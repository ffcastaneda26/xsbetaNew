<?php

namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;

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
                //         if (!is_null($record->images) && is_array($record->images)) {
                //             return collect($record->images)->map(function ($imagePath) {
                //                 return Storage::disk('public')->url($imagePath);
                //             })->filter()->toArray(); // Filtra valores nulos o vacíos
                //         }
                //         return [];
                //     }),
                ImageColumn::make('images')
                    ->label('Imágenes')
                    ->imageWidth(200)
                    ->imageHeight(200)
                    ->getStateUsing(function ($record) {
                        // Valida que el campo 'images' sea un array no nulo y que contenga al menos una imagen.
                        if (!is_null($record->images) && is_array($record->images) && count($record->images) > 0) {
                            $firstImage = $record->images[0];

                            // Valida que el primer elemento no sea nulo y que el archivo exista en el disco público.
                            if (!empty($firstImage) && Storage::disk('public')->exists($firstImage)) {
                                return Storage::disk('public')->url($firstImage);
                            }
                        }

                        // Si no hay imágenes, el array está vacío o la imagen no existe en el disco,
                        // regresa la imagen genérica.
                        return asset('images/generico.jpeg');
                    }),
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
