<x-dynamic-component
    :component="$getFieldWrapperView()"
    :field="$field"
>
    <div
        x-data="{
            state: $wire.entangle('{{ $getStatePath() }}'),
            lat: @js($getState()['latitude'] ?? 25.9155),
            lng: @js($getState()['longitude'] ?? 13.9180),
            init() {
                // Load Leaflet CSS
                if (!document.getElementById('leaflet-css')) {
                    const link = document.createElement('link');
                    link.id = 'leaflet-css';
                    link.rel = 'stylesheet';
                    link.href = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.css';
                    document.head.appendChild(link);
                }

                // Load Leaflet JS
                if (!window.L) {
                    const script = document.createElement('script');
                    script.src = 'https://unpkg.com/leaflet@1.9.4/dist/leaflet.js';
                    script.onload = () => this.initMap();
                    document.head.appendChild(script);
                } else {
                    this.initMap();
                }
            },
            updateCoordinates(lat, lng) {
                this.lat = lat;
                this.lng = lng;
                this.$wire.set('data.latitude', lat);
                this.$wire.set('data.longitude', lng);
            },
            initMap() {
                setTimeout(() => {
                    const map = L.map(this.$refs.map).setView([this.lat, this.lng], 13);
                    
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                        maxZoom: 19,
                        attribution: ' OpenStreetMap contributors'
                    }).addTo(map);

                    const marker = L.marker([this.lat, this.lng], {
                        draggable: true
                    }).addTo(map);

                    marker.on('dragend', (event) => {
                        const position = event.target.getLatLng();
                        this.updateCoordinates(position.lat, position.lng);
                    });

                    map.on('click', (e) => {
                        marker.setLatLng(e.latlng);
                        this.updateCoordinates(e.latlng.lat, e.latlng.lng);
                    });

                    // Add search control
                    const script = document.createElement('script');
                    script.src = 'https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js';
                    script.onload = () => {
                        const link = document.createElement('link');
                        link.rel = 'stylesheet';
                        link.href = 'https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css';
                        document.head.appendChild(link);

                        const geocoder = L.Control.geocoder({
                            defaultMarkGeocode: false,
                            position: 'topleft',
                            placeholder: 'ابحث عن موقع...',
                            errorMessage: 'لم يتم العثور على الموقع'
                        }).addTo(map);

                        geocoder.on('markgeocode', (e) => {
                            const { center } = e.geocode;
                            marker.setLatLng(center);
                            map.setView(center, 16);
                            this.updateCoordinates(center.lat, center.lng);
                        });
                    };
                    document.head.appendChild(script);
                }, 100);
            }
        }"
        wire:ignore
        class="w-full"
        dir="ltr"
    >
        <div x-ref="map" class="w-full h-96 rounded-lg"></div>
        <style>
            .leaflet-control-geocoder {
                direction: rtl;
            }
            .leaflet-control-geocoder-form input {
                text-align: right;
                padding-right: 10px;
            }
        </style>
    </div>
</x-dynamic-component>
