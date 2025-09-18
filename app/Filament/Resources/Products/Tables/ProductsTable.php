<?php
namespace App\Filament\Resources\Products\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn; // Importar la clase Filter
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

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
                    ->verticallyAlignStart()
                    ->sortable(),
                TextColumn::make('categories.name')
                    ->label('Categorías')
                    ->listWithLineBreaks()
                    ->limit(50)
                    ->sortable()
                    ->verticallyAlignStart()
                    ->searchable(),
                TextColumn::make('price')
                    ->label('Precio')
                    ->searchable()
                    ->verticallyAlignStart()
                    ->numeric(decimalPlaces: 2, decimalSeparator: '.', thousandsSeparator: ','),
                ToggleColumn::make('is_active')
                    ->label('¿Activo?')
                    ->verticallyAlignStart(),
                ToggleColumn::make('destacado')
                    ->label('¿Destacado?')
                    ->verticallyAlignStart(),
                TextColumn::make('short_description')
                    ->label('Descripción Corta')
                    ->limit(50)
                    ->sortable()
                    ->searchable()
                    ->wrap()
                    ->verticallyAlignStart()
                    ->toggleable(isToggledHiddenByDefault: true),

                // TextColumn::make('stock')
                //     ->label('Existencia')
                //     ->numeric()
                //     ->alignEnd(),

                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->verticallyAlignStart()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->verticallyAlignStart()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->relationship('categories', 'name')
                    ->label('Categoría')
                    ->searchable()
                    ->preload(),

                // Filtro para 'is_active'
                SelectFilter::make('is_active')
                    ->label('Estado')
                    ->options([
                        true  => 'Activo',
                        false => 'Inactivo',
                    ]),

                // Filtro para 'destacado'
                SelectFilter::make('destacado')
                    ->label('Destacado')
                    ->options([
                        true  => 'Sí',
                        false => 'No',
                    ]),

                // Filtro para 'price' (Rango de precio)
                Filter::make('price_range')
                    ->label('Rango de Precio')
                    ->form([
                        TextInput::make('min_price')
                            ->label('Precio Mínimo')
                            ->numeric()
                            ->placeholder('Ej. 50.00'),
                        TextInput::make('max_price')
                            ->label('Precio Máximo')
                            ->numeric()
                            ->placeholder('Ej. 200.00'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['min_price'] ?? null,
                                fn(Builder $query, $min_price): Builder => $query->where('price', '>=', $min_price),
                            )
                            ->when(
                                $data['max_price'] ?? null,
                                fn(Builder $query, $max_price): Builder => $query->where('price', '<=', $max_price),
                            );
                    }),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('')
                    ->icon('heroicon-o-pencil-square')
                    ->tooltip('Editar')
                    ->size('large'),
                DeleteAction::make()
                    ->label('')
                    ->icon('heroicon-o-trash')
                    ->tooltip('Eliminar'),
            ]);
    }
}
