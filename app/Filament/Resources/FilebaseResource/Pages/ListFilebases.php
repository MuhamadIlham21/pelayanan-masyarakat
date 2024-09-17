<?php

namespace App\Filament\Resources\FilebaseResource\Pages;

use App\Filament\Resources\FilebaseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFilebases extends ListRecords
{
    protected static string $resource = FilebaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
