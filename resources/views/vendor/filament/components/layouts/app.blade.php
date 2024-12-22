@props([
    'maxContentWidth' => null,
])

<x-filament-panels::layouts.base :livewire="$livewire">
    <div class="filament-app-layout flex h-full w-full gap-x-3 overflow-x-clip">
        <div
            class="filament-app-layout-sidebar flex w-full max-w-[20rem] shrink-0 flex-col overflow-y-auto overflow-x-hidden bg-white shadow-sm transition-all dark:bg-gray-800 dark:border-gray-700 lg:z-0 lg:mr-0 lg:border-r rtl:lg:border-l rtl:lg:border-r-0"
        >
            @if (filament()->hasNavigation())
                <x-filament-panels::sidebar>
                    <x-slot name="header">
                        <div class="p-4">
                            <x-filament-panels::logo />
                        </div>
                    </x-slot>

                    @if (filament()->hasTenancy() && filament()->hasTenantMenu())
                        <x-filament-panels::tenant-menu />
                    @endif

                    <x-filament-panels::sidebar.nav />
                </x-filament-panels::sidebar>
            @endif
        </div>

        <div class="filament-app-layout-main-content flex-1 flex-col">
            <div @class([
                'filament-main-content flex-1 w-full px-4 mx-auto md:px-6 lg:px-8',
                match ($maxContentWidth ??= config('filament.layout.max_content_width')) {
                    null, '7xl', '' => 'max-w-7xl',
                    'xl' => 'max-w-xl',
                    '2xl' => 'max-w-2xl',
                    '3xl' => 'max-w-3xl',
                    '4xl' => 'max-w-4xl',
                    '5xl' => 'max-w-5xl',
                    '6xl' => 'max-w-6xl',
                    'full' => 'max-w-full',
                    default => $maxContentWidth,
                },
            ])>
                {{ $slot }}
            </div>
        </div>
    </div>

    @script
    <script src="https://maps.googleapis.com/maps/api/js?key={{ config('services.google.maps_api_key') }}&libraries=places"></script>
    @endscript
</x-filament-panels::layouts.base>
