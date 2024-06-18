<?php

namespace App\Filament\Resources\StatusListResource\Pages;

use App\Filament\Resources\StatusListResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListStatusLists extends ListRecords
{
    protected static string $resource = StatusListResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
