<?php

namespace App\Filament\Resources\WasteReportResource\Pages;

use App\Filament\Resources\WasteReportResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWasteReports extends ListRecords
{
    protected static string $resource = WasteReportResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
