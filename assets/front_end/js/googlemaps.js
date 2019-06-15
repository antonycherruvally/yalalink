var geocoder, map, maplatlng;
var markersArray = [];
var infowindow = new google.maps.InfoWindow();
var map_location = '';
var marker = null;
var mapOptions = {};
var zoom = 9;
var map_type_id = google.maps.MapTypeId.ROADMAP;
var map_lat, map_lng;

function initialize() {
    geocoder = new google.maps.Geocoder();
    maplatlng = new google.maps.LatLng();
    if (!addMarkerFromLatLngFields()) {
        mapOptions = {
            zoom: zoom,
            center: maplatlng,
            mapTypeId: map_type_id
        };
        map = new google.maps.Map(document.getElementById("map"), mapOptions);
    }
    // on map on click listener
    google.maps.event.addListener(map, 'click', function(event) {
        deleteOverlays();
        setLatLngIntoFields(event.latLng.lat(), event.latLng.lng());
        addEditMarker(event.latLng);
    });
}

function getLatLong(address) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            addEditMarker(results[0].geometry.location);
        }
    });
}

function addMarkerFromLatLngFields() {
    maplatlng = new google.maps.LatLng(map_lat, map_lng);
    marker = new google.maps.Marker({
        position: maplatlng,
        map: map,
        draggable: true
    });
    mapOptions = {
        zoom: zoom,
        center: maplatlng,
        mapTypeId: map_type_id
    }
    map = new google.maps.Map(document.getElementById("map"), mapOptions);
    addEditMarker(maplatlng)
    return true;
}

function addEditMarker(maplatlng) {
    if (!marker) {
        marker = new google.maps.Marker({
            position: maplatlng,
            map: map,
            draggable: true
        });
    } else {
        marker.setPosition(maplatlng);
    }
    setLatLngIntoFields(maplatlng.lat(), maplatlng.lng());
    marker.setMap(map);
    // on marker on drag listener
    google.maps.event.addListener(marker, 'drag', function(event) {
        deleteOverlays();
        setLatLngIntoFields(event.latLng.lat(), event.latLng.lng());
    });
    // on marker on dragend listener
    google.maps.event.addListener(marker, 'dragend', function(event) {
        deleteOverlays();
        setLatLngIntoFields(event.latLng.lat(), event.latLng.lng());
    });
    // on map on click listener
    google.maps.event.addListener(map, 'click', function(event) {
        deleteOverlays();
        setLatLngIntoFields(event.latLng.lat(), event.latLng.lng());
    });
    map.setCenter(maplatlng); // setCenter takes a LatLng object
}

function deleteOverlays() {
    if (markersArray) {
        for (i in markersArray) {
            markersArray[i].setMap(null);
        }
        markersArray.length = 0;
    }
}

function setLatLngIntoFields(lat, lng) {
    jQuery('#latitude').val(lat);
    jQuery('#longitude').val(lng);
}

function getLatLongNode(address) {
    var geocoder = new google.maps.Geocoder();
    geocoder.geocode({'address': address}, function(results, status) {
        if (status === google.maps.GeocoderStatus.OK) {
            setLatLngIntoFields(results[0].geometry.location.lat(), results[0].geometry.location.lng());
            refreshmapImg(results[0].geometry.location);
        }
    });
}
function refreshmapImg(latlng){
    $('.map_canvas_thumb img').attr('src' , 'https://maps.googleapis.com/maps/api/staticmap?center='+latlng.lat()+','+latlng.lng()+'&zoom=15&size=196x145&maptype=roadmap&markers=icon:' + window.location.hostname + '/public/img/cars-map.png%7C'+latlng.lat()+','+latlng.lng()+'&sensor=false');
    $('#map-lat').val(latlng.lat());
    $('#map-lng').val(latlng.lng());
}

jQuery(document).ready(function() {
    if ($('#map').length > 0) {
        map_lat = jQuery('#latitude').val();
        map_lng = jQuery('#longitude').val();
        initialize();
    }
    
    if (typeof(map) !== undefined && $('body').hasClass('user-form') && $('body').hasClass('rs')) {
        
        if (!$('#map').data('no-change') && !$('html').hasClass('ie8')) {
            //getLatLong($('#country').val() + " " + $('#location').val());
            //map.setZoom(9);
            if(map_lat === '' && map_lng === '') {                
                try {
                    navigator.geolocation.getCurrentPosition(function(data) {
                        if (typeof(data.coords) !== undefined) {
                            setTimeout(function(){
                                maplatlng = new google.maps.LatLng(data.coords.latitude, data.coords.longitude);
                                addEditMarker(maplatlng);
                                map.setZoom(16);
                            }, 1000);
                        }
                    });
                } catch (e) {
                    if(map_lat === '' && map_lng === ''){
                        getLatLong($('#country').val() + " " + $('#location').val());
                        map.setZoom(9);
                    }
                }
            }
        }
        
        $('#location').on('change', function() {
            getLatLong($('#country').val() + " " + $('#location').val());
            map.setZoom(9);
        });
        $('#location').trigger('change');
    }
    else{
        if (!$('#map').data('no-change') && !$('html').hasClass('ie8') && $('body').hasClass('user-form')) {
        $('#location').on('change', function() {
            getLatLong($('#country').val() + " " + $('#location').val());
            map.setZoom(9);
        });
        $('#location').trigger('change');
    }
    }




    //this code for the node display map.
    google.maps.visualRefresh = true;
    $("#maps-container").on('show.bs.modal', function() {
        setTimeout(function() {
            var mapOptions = {
                zoom: 15,
                center: new google.maps.LatLng(jQuery('#map-lat').val(), jQuery('#map-lng').val())
            };
            var map1 = new google.maps.Map(document.getElementById("real-map"), mapOptions);
            var marker = new google.maps.Marker({
                position: map1.getCenter(),
                map: map1,
                icon: jQuery('#map-icon').val()
            });
        }, 200);
    });
    
    
});
