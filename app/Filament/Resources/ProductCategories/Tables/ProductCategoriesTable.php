<?php
namespace App\Filament\Resources\ProductCategories\Tables;

use App\Models\ProductCategory;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class ProductCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('products_count')
                    ->counts('products')
                    ->label('Productos')
                    ->alignCenter(),
                IconColumn::make('is_active')
                    ->label('¿Activa?')
                    ->sortable()
                    ->searchable()
                    ->boolean()
                    ->alignCenter(),
                IconColumn::make('default')
                    ->label('Por Defecto?')
                    ->alignCenter()
                    ->boolean(),

            ])
            ->filters([
                //
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
                    ->tooltip('Eliminar')
                    ->requiresConfirmation()
                    ->action(function (Model $record, array $data) {
                        if ($record->products()->count() > 0) {
                            $defaultCategory = ProductCategory::where('default', true)->first();
                            if ($defaultCategory && $defaultCategory->id !== $record->id) {
                                $products = $record->products;
                                foreach ($products as $product) {
                                    if (! $product->categories->contains($defaultCategory->id)) {
                                        $product->categories()->attach($defaultCategory->id);
                                    }
                                }
                            }
                        }
                        // Procede con la eliminación del registro
                        $record->delete();
                    })
                    ->disabled(fn(Model $record) => $record->default),
            ])->actionsColumnLabel('Acciones');
    }
}
