<?php

namespace App\Filament\Resources\FaculcyResource\Pages;

use App\Filament\Resources\FaculcyResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListFaculcies extends ListRecords
{
    protected static string $resource = FaculcyResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
