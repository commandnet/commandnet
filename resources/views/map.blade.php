@once
    @push('endscripts')
    <script>
      document.onreadystatechange = function () {
	      const map = L.map('map').setView([52.8, 8.8], 10);
         const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,   
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);
            L.control.mousePosition().addTo(map);
      }

    </script>
    @endpush
@endonce

@extends('layouts.app')

@section('content')
   <div class="row">
   <div class="col-md-6 col-sm-12 map-container rounded flex-fill" id="map"></div>
   <div class="col-md-1"></div>

   </div>
@endsection