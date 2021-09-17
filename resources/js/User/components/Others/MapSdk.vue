<template>
  <div class="map-container">
    <input
      id="pac-input"
      ref="pacInput"
      class="controls form-control"
      type="text"
      placeholder="Search Box"
    />
    <div ref="googleMap" style="height: 400px"></div>
  </div>
</template>
<style scoped>
#map {
  height: 100%;
}
/* Optional: Makes the sample page fill the window. */

html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}
#description {
  font-family: Roboto;
  font-size: 15px;
  font-weight: 300;
}

#infowindow-content .title {
  font-weight: bold;
}

#infowindow-content {
  display: none;
}

#map #infowindow-content {
  display: inline;
}

.pac-card {
  margin: 10px 10px 0 0;
  border-radius: 2px 0 0 2px;
  box-sizing: border-box;
  -moz-box-sizing: border-box;
  outline: none;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
  background-color: #fff;
  font-family: Roboto;
}

#pac-container {
  padding-bottom: 12px;
  margin-right: 12px;
}

.pac-controls {
  display: inline-block;
  padding: 5px 11px;
}

.pac-controls label {
  font-family: Roboto;
  font-size: 13px;
  font-weight: 300;
}

#title {
  color: #fff;
  background-color: #4d90fe;
  font-size: 25px;
  font-weight: 500;
  padding: 6px 12px;
}

#target {
  width: 345px;
}
</style>
<script>
import GoogleMapsApiLoader from "google-maps-api-loader";
export default {
  data() {
    return {
      google: null,
      map: null,
      apiKey: "AIzaSyDuvMXKzcALqLVg1pmzDzNLpd5PWXlf31k",
      mapConfig: {
        zoom: 8,
        center: {
          lat: 17,
          lng: 107,
        },
      },
    };
  },
  props: ["dataCoordinate"],
  async mounted() {
    const googleMapApi = await GoogleMapsApiLoader({
      libraries: ['places'],
      apiKey: this.apiKey,
    });
    this.google = googleMapApi;
    this.initializeMap();
  },

  methods: {
    initializeMap() {
      var self = this;
      const mapContainer = this.$refs.googleMap;
      const input = this.$refs.pacInput;
      var map = (this.map = new this.google.maps.Map(
        mapContainer,
        this.mapConfig
      ));
      var marker = new google.maps.Marker({
        map,
        draggable: true,
        clickable: true,
        animation: google.maps.Animation.DROP,
        position: {
          lat: 17,
          lng: 107,
        },
      });
      google.maps.event.addListener(map, "click", function (event) {
        self.dataCoordinate.lat = event.latLng.lat();
        self.dataCoordinate.long = event.latLng.lng()
        marker.setPosition(event.latLng);
      });
      const searchBox = new google.maps.places.SearchBox(input);

      map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
      // Bias the SearchBox results towards current map's viewport.
      map.addListener("bounds_changed", () => {
        searchBox.setBounds(map.getBounds());
      });

      let markers = [];

      // Listen for the event fired when the user selects a prediction and retrieve
      // more details for that place.
      searchBox.addListener("places_changed", () => {
        const places = searchBox.getPlaces();

        if (places.length == 0) {
          return;
        }

        // Clear out the old markers.
        markers.forEach((marker) => {
          marker.setMap(null);
        });
        markers = [];

        // For each place, get the icon, name and location.
        const bounds = new google.maps.LatLngBounds();

        places.forEach((place) => {
          if (!place.geometry || !place.geometry.location) {
            console.log("Returned place contains no geometry");
            return;
          }

          const icon = {
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(25, 25),
          };

          // Create a marker for each place.
          markers.push(
            new google.maps.Marker({
              map,
              icon,
              title: place.name,
              position: place.geometry.location,
            })
          );
          if (place.geometry.viewport) {
            // Only geocodes have viewport.
            bounds.union(place.geometry.viewport);
          } else {
            bounds.extend(place.geometry.location);
          }
        });
        map.fitBounds(bounds);
      });
    },
  },
};
</script>