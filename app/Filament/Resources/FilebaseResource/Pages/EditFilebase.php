<?php

namespace App\Filament\Resources\FilebaseResource\Pages;

use App\Filament\Resources\FilebaseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFilebase extends EditRecord
{
    protected static string $resource = FilebaseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
