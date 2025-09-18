<?php
namespace App\Filament\Resources\Products\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'required' => 'El Nombre es obligatorio.',
                        'unique'   => 'Este nombre ya existe. Por favor, elige uno diferente.',
                    ]),
                Select::make('categories')
                    ->relationship('categories', 'name')
                    ->label('Categorías')
                    ->multiple()
                    ->preload()
                    ->required(),
                Toggle::make('is_active')
                    ->label('¿Activo?')
                    ->required(),
                Toggle::make('destacado')
                    ->label('Destacado?')
                    ->required(),
                TextInput::make('short_description')
                    ->label('Descripción Corta')
                    ->maxLength(255)
                    ->columnSpanFull(),
                RichEditor::make('description')
                    ->label('Descripción')
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'height: 70vh; overflow-y: auto;',
                    ]),

                TextInput::make('stock')
                    ->label('Existencia')
                    ->required()
                    ->numeric()
                    ->default(0),
                TextInput::make('price')
                    ->label('Precio')
                    ->required()
                    ->numeric()
                    ->prefix('$'),

                TextInput::make('link_name')
                    ->label('Nombre del Link')
                    ->maxLength(255),
                TextInput::make('link_url')
                    ->label('Url del Link')
                    ->maxLength(255),
                FileUpload::make('images')
                    ->label('Imágenes')
                    ->multiple()
                    ->reorderable()
                    ->image()
                    ->imageEditor()
                    ->imageEditorViewportWidth('200')
                    ->imageEditorViewportHeight('200')
                    ->acceptedFileTypes(['image/*'])
                    ->disk('public')
                    ->directory('products')
                    ->getUploadedFileNameForStorageUsing(function (TemporaryUploadedFile $file): string {
                        $originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $extension    = $file->getClientOriginalExtension();
                        return time() . '_' . $originalName . '.' . $extension;
                    }),

            ]);
    }
}
