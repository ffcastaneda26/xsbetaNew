<?php

namespace App\Filament\Resources\ProductCategories\Pages;

use App\Filament\Resources\ProductCategories\ProductCategoryResource;
use App\Models\ProductCategory;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateProductCategory extends CreateRecord
{
    protected static string $resource = ProductCategoryResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

        protected function mutateFormDataBeforeCreate(array $data): array
    {

        $data['slug'] = Str::slug($data['name']);

        if (isset($data['default']) && $data['default'] === true) {
            ProductCategory::query()->update(['default' => false]);
        }

        return $data;
    }
}
