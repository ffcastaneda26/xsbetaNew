<?php

namespace App\Filament\Resources\Blogs\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Illuminate\Http\UploadedFile;

class BlogForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Select::make('author_id')
                    ->relationship('author', 'name')
                    ->label('Autor')
                    ->required(),
                TextInput::make('title')
                    ->label('Título')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->validationMessages([
                        'required' => 'El título es obligatorio.',
                        'unique' => 'Este título ya existe. Por favor, elige uno diferente.',
                    ]),




                Toggle::make('is_published')
                    ->label('¿Publicado?')
                    ->required(),
                DateTimePicker::make('published_at')
                    ->label('Fecha de Publicación')
                    ->requiredIf('is_published', true)
                    ->validationMessages([
                        'requiredIf' => 'La fecha de publicación es obligatoria cuando el contenido está marcado como publicado.'
                    ]),


                RichEditor::make('description')
                    ->label('Intro')
                    ->maxLength(255)
                    ->extraAttributes([
                        'style' => 'height: 200px; overflow-y: auto;',
                    ])
                    ->columnSpanFull(),

                RichEditor::make('content')
                    ->label('Contenido')
                    ->columnSpanFull()
                    ->extraAttributes([
                        'style' => 'height: 200px; overflow-y: auto;',
                    ]),
                Section::make()->schema([
                    FileUpload::make('image')
                        ->label('-Imagen')
                        ->image()
                        ->directory('blogs')
                        ->getUploadedFileNameForStorageUsing(
                            fn(UploadedFile $file): string => time() . '_' . $file->getClientOriginalName(),
                        ),
                ])->columnSpanFull(),








            ]);
    }
}
