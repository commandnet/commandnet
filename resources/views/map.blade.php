@once
    @push('head')
    @vite('resources/js/map.js')
    @endpush
@endonce

@extends('layouts.app')

@section('content')
   <div class="row">
   <div class="col-md-6 col-sm-12 map-container rounded flex-fill" id="map"></div>
   <div class="col-md-2">
      Karte:
      <div id=container-mapbasemapselector>
         <select id="basemapselector">
            <option>OpenStreetMap</option>
         </select>
      </div>
      <div id=container-mapoverlaylayerselector>
         Overlays:
         <div id=mapoverlaylayerselector>
         </div>
      </div>
   </div>

   <script>
      var overlaylayer;
   </script>

   </div>
@endsection