<?php

namespace App\Filament\Forms\Components;

use Filament\Forms\Components\Field;

class LocationPicker extends Field
{
    protected string $view = 'filament.forms.components.location-picker';

    protected function setUp(): void
    {
        parent::setUp();

        $this->afterStateHydrated(function (LocationPicker $component, $state) {
            if (is_string($state)) {
                $state = json_decode($state, true);
            }

            $component->state([
                'latitude' => $state['latitude'] ?? null,
                'longitude' => $state['longitude'] ?? null,
            ]);
        });

        $this->dehydrateStateUsing(function ($state) {
            return [
                'latitude' => $state['latitude'] ?? null,
                'longitude' => $state['longitude'] ?? null,
            ];
        });
    }

    public function getLatitudeKey(): string
    {
        return $this->getName() . '_lat';
    }

    public function getLongitudeKey(): string
    {
        return $this->getName() . '_lng';
    }
}
