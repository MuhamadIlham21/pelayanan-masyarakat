<?php

namespace App\Filament\Pegawai\Resources\PelayananResource\Pages;

use App\Filament\Pegawai\Resources\PelayananResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPelayanan extends EditRecord
{
    protected static string $resource = PelayananResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}