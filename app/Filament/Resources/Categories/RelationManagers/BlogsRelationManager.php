<?php

namespace App\Filament\Resources\Categories\RelationManagers;

use App\Filament\Resources\Blogs\BlogResource;
use Filament\Actions\CreateAction;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Table;

class BlogsRelationManager extends RelationManager
{
    protected static string $relationship = 'Blogs';

    protected static ?string $relatedResource = BlogResource::class;

    public function table(Table $table): Table
    {
        return $table
            ->headerActions([
                CreateAction::make(),
            ]);
    }
}
