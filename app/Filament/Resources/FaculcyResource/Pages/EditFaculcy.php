<?php

namespace App\Filament\Resources\FaculcyResource\Pages;

use App\Filament\Resources\FaculcyResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditFaculcy extends EditRecord
{
    protected static string $resource = FaculcyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
