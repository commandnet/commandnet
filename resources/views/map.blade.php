@once
    @push('endscripts')
    <script>

      var layerControl;
      var map;

      document.onreadystatechange = function () {
         map = L.map('map').setView([52.8, 8.8], 10);
         L.control.mousePosition().addTo(map);
         const addressSearchResults = new L.LayerGroup().addTo(map);

         const osmGeocoder = new L.Control.geocoder({
            collapsed: false,
            position: 'topright',
            text: 'Address Search',
            placeholder: 'Enter street address',
            defaultMarkGeocode: false
         }).addTo(map);    
         osmGeocoder.on('markgeocode', e => {
            console.log(e);
            // coordinates for result
            const coords = [e.geocode.center.lat, e.geocode.center.lng];
            // center map on result
            map.setView(coords, 16);
            // popup for location
            // todo: use custom icon
            const resultMarker = L.marker(coords).addTo(map);
            // add popup to marker with result text
            resultMarker.bindPopup(e.geocode.name).openPopup();
         });


         loadmap();
      }

     
      function loadmap()
      {
         axios.get("/api/map/baselayer").then(response => {
         console.debug(response);

         var baseMaps = [];
         var overlayMaps = {};

         response.data.forEach((layer) => {
            if(layer["type"] == "TMS")
            {
               var maplayer = L.tileLayer(layer["url"], {
                  maxZoom: layer["maxzoom"],
                  attribution: layer["attribution"]
               });
               baseMaps[layer["name"]] = maplayer
            }
            if(layer["type"] == "WMS")
            {
               var maplayer = L.tileLayer.wms(layer["url"], {
                  layers: layer["wmslayername"],
               });
               baseMaps[layer["name"]] = maplayer
            }

         });
         layerControl = L.control.layers(baseMaps, overlayMaps).addTo(map);


      });
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