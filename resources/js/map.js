import L from 'leaflet/dist/leaflet';
import 'leaflet-mouse-position/src/L.Control.MousePosition';
import 'leaflet-control-geocoder/dist/Control.Geocoder';

var map;
var baselayer;
var overlaylayer = [];

document.onreadystatechange = function () {
   loadBaseLayers();
   initMap();
   loadOverlayLayers();
}

let selector = document.getElementById("basemapselector"); 
selector.addEventListener("change", () => {
   setBaseLayeractive(selector.value);
});

export function initMap() {
   map = L.map('map').setView([52.8, 8.8], 10);
   L.control.mousePosition().addTo(map);

   // geocoder
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
      const coords = [e.geocode.center.lat, e.geocode.center.lng];
      map.setView(coords, 16);
      const resultMarker = L.marker(coords).addTo(map);
      resultMarker.bindPopup(e.geocode.name).openPopup();
   });
}
export function loadOverlayLayers()
{
   axios.get("/map/overlaylayer").then(response => {
      $('#mapoverlaylayerselector').empty();
      response.data.forEach((layer) => {
         $('#mapoverlaylayerselector').append(
            '<div class="overlaylayer_elem">' + 
            '<input id="overlaylayer_cb_' + layer["id"] + '" type="checkbox"/> ' + layer["name"] + '<br />' + 
            '<input type="range" id="overlaylayer_opac_' + layer["id"] + '" value="100" min="10" max="100" /></div>'
         );

         let selector = document.getElementById('overlaylayer_cb_' + layer["id"]); 
         selector.addEventListener("change", e  => {
            setOverlayLayeractive(layer["id"],e.target.checked);
         });
         let slider = document.getElementById('overlaylayer_opac_' + layer["id"]); 
         slider.addEventListener("change", e  => {
            setOverlayLayerOpac(layer["id"],e.target.value);
         });  
      });
   });
   setBaseLayeractive(1);
}

export function setOverlayLayerOpac(id, value)
{
   console.debug(Window.overlaylayer[id]);
   if (typeof Window.overlaylayer[id] !== 'undefined')
   {
      Window.overlaylayer[id].setOpacity(value / 100);
   }
}

export function loadBaseLayers()
{
   axios.get("/map/baselayer").then(response => {
      $('#basemapselector').empty();
      response.data.forEach((layer) => {
         $('#basemapselector').append($('<option>', {
            value: layer["id"],
            text: layer["name"]
         }));
      });
   });
}

export function setBaseLayeractive(id)
      {
         if (typeof baselayer !== 'undefined')
         {
            map.removeLayer(baselayer);
         }

         axios.get(`/map/baselayer/${id}` ).then(response => {
         console.debug(`Loading Layer ${response["data"]["name"]}` );
            if(response["data"]["type"] == "TMS")
            {  
               baselayer = L.tileLayer(response["data"]["url"], {
                  maxZoom: response["data"]["maxzoom"],
                  attribution: response["data"]["attribution"]
               });
               baselayer.addTo(map);
               baselayer.bringToBack();
            }
            if(response["data"]["type"] == "WMS")
            {  
               baselayer = L.tileLayer.wms(response["data"]["url"], {
                  layers: response["data"]["wmslayername"],
                  attribution: response["data"]["attribution"]
               });
               baselayer.addTo(map);
               baselayer.bringToBack();
            }
      });
}

export function setOverlayLayeractive(id, active)
{
         if (typeof overlaylayer[id] !== 'undefined')
         {
            map.removeLayer(overlaylayer[id]);
         }
   
   if (active) {
      axios.get(`/map/overlaylayer/${id}`).then(response => {
         console.debug(`Loading Overlaylayer ${response["data"]["name"]}`);
         if (response["data"]["type"] == "TMS") {
            overlaylayer[id] = L.tileLayer(response["data"]["url"], {
               maxZoom: response["data"]["maxzoom"],
               attribution: response["data"]["attribution"],
            });
            overlaylayer[id].addTo(map);
         }
         if (response["data"]["type"] == "WMS") {
            overlaylayer[id] = L.tileLayer.wms(response["data"]["url"], {
               layers: response["data"]["wmslayername"],
               format: 'image/png',
               transparent: true
            });
            overlaylayer[id].addTo(map);
         }
      
      });
   }
}

Window.setBaseLayeractive = setBaseLayeractive;
Window.setOverlayLayeractive = setOverlayLayeractive;
Window.setOverlayLayerOpac = setOverlayLayerOpac;
Window.overlaylayer = overlaylayer;
Window.baselayer = baselayer;
Window.map = map;