<!DOCTYPE html>
<html>

<head>
    <title>Simple Markers</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <!-- jsFiddle will insert css and js -->
</head>
<style>
/* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
    height: 100%;
    width: 100%
}

/* Optional: Makes the sample page fill the window. */
html,
body {
    height: 100%;
    margin: 0;
    padding: 0;
}
</style>

<body>
    <div id="map"></div>

    <!-- Async script executes immediately and must be after any DOM elements used in callback. -->
    <script async
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAmWJreJs9fLopVda-I58oItjMGw9GQep4&callback=initMap">
    </script>
    </script>
    <script>
    function initMap() {
        const myLatLng = {
            lat: 13.782807518868351,
            lng: 100.54208228580958
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 17,
            center: myLatLng,
        });
        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
        });
    }
    </script>
</body>

</html>