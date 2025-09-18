<?php
namespace App\Filament\Resources\Categories\Tables;

use App\Models\Category;
use Filament\Actions\DeleteAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;

class CategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('blogs_count')
                    ->counts('blogs')
                    ->label('Blogs'),
                IconColumn::make('default')
                    ->label('Por Defecto?')
                    ->alignCenter()
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make()
                    ->label('')
                    ->icon('heroicon-o-trash')
                    ->tooltip('Eliminar')
                    ->action(function (Model $record, array $data) {
                        // Verifica si la categoría tiene blogs asociados
                        if ($record->blogs()->count() > 0) {
                            // Busca la categoría por defecto
                            $defaultCategory = Category::where('default', true)->first();

                            // Asegúrate de que existe una categoría por defecto y no sea la misma que se está borrando
                            if ($defaultCategory && $defaultCategory->id !== $record->id) {
                                // Reasigna los blogs a la categoría por defecto
                                $blogs = $record->blogs;
                                foreach ($blogs as $blog) {
                                    // Verifica si el blog ya tiene la categoría por defecto asociada antes de adjuntarla
                                    if (! $blog->categories->contains($defaultCategory->id)) {
                                        $blog->categories()->attach($defaultCategory->id);
                                    }
                                }
                            }
                        }
                        // Procede con la eliminación del registro
                        $record->delete();
                    })
                    ->disabled(fn(Model $record) => $record->default),
            ]);
    }
}
