! function(t) {
    function n(t, n) {
        var o = new google.maps.Map(t, n),
            e = new google.maps.Marker({
                position: new google.maps.LatLng(54.19335, -3.92695),
                map: o,
                title: "Drag Me",
                draggable: n.draggable,
                icon: void 0 !== n.markerIcon ? n.markerIcon : void 0
            });
        return {
            map: o,
            marker: e,
            circle: null,
            location: e.position,
            radius: n.radius,
            locationName: n.locationName,
            addressComponents: {
                formatted_address: null,
                addressLine1: null,
                addressLine2: null,
                streetName: null,
                streetNumber: null,
                city: null,
                district: null,
                state: null,
                stateOrProvince: null
            },
            settings: n.settings,
            domContainer: t,
            geodecoder: new google.maps.Geocoder
        }
    }

    function o(t) {
        return void 0 != e(t)
    }

    function e(n) {
        return t(n).data("locationpicker")
    }

    function i(t, n) {
        if (t) {
            var o = s.locationFromLatLng(n.location);
            t.latitudeInput && t.latitudeInput.val(o.latitude).change(), t.longitudeInput && t.longitudeInput.val(o.longitude).change(), t.radiusInput && t.radiusInput.val(n.radius).change(), t.locationNameInput && t.locationNameInput.val(n.locationName).change()
        }
    }

    function a(n, o) {
        if (n) {
            if (n.radiusInput && n.radiusInput.on("change", function(n) {
                    n.originalEvent && (o.radius = t(this).val(), s.setPosition(o, o.location, function(t) {
                        t.settings.onchanged.apply(o.domContainer, [s.locationFromLatLng(t.location), t.radius, !1])
                    }))
                }), n.locationNameInput && o.settings.enableAutocomplete) {
                var e = !1;
                o.autocomplete = new google.maps.places.Autocomplete(n.locationNameInput.get(0)), google.maps.event.addListener(o.autocomplete, "place_changed", function() {
                    e = !1;
                    var t = o.autocomplete.getPlace();
                    return t.geometry ? void s.setPosition(o, t.geometry.location, function(t) {
                        i(n, t), t.settings.onchanged.apply(o.domContainer, [s.locationFromLatLng(t.location), t.radius, !1])
                    }) : void o.settings.onlocationnotfound(t.name)
                }), o.settings.enableAutocompleteBlur && (n.locationNameInput.on("change", function(t) {
                    t.originalEvent && (e = !0)
                }), n.locationNameInput.on("blur", function(a) {
                    a.originalEvent && setTimeout(function() {
                        var a = t(n.locationNameInput).val();
                        a.length > 5 && e && (e = !1, o.geodecoder.geocode({
                            address: a
                        }, function(t, e) {
                            e == google.maps.GeocoderStatus.OK && t && t.length && s.setPosition(o, t[0].geometry.location, function(t) {
                                i(n, t), t.settings.onchanged.apply(o.domContainer, [s.locationFromLatLng(t.location), t.radius, !1])
                            })
                        }))
                    }, 1e3)
                }))
            }
            n.latitudeInput && n.latitudeInput.on("change", function(n) {
                n.originalEvent && s.setPosition(o, new google.maps.LatLng(t(this).val(), o.location.lng()), function(t) {
                    t.settings.onchanged.apply(o.domContainer, [s.locationFromLatLng(t.location), t.radius, !1])
                })
            }), n.longitudeInput && n.longitudeInput.on("change", function(n) {
                n.originalEvent && s.setPosition(o, new google.maps.LatLng(o.location.lat(), t(this).val()), function(t) {
                    t.settings.onchanged.apply(o.domContainer, [s.locationFromLatLng(t.location), t.radius, !1])
                })
            })
        }
    }

    function l(t) {
        google.maps.event.trigger(t.map, "resize"), setTimeout(function() {
            t.map.setCenter(t.marker.position)
        }, 300)
    }

    function r(n, o, e) {
        var i = t.extend({}, t.fn.locationpicker.defaults, e),
            l = i.location.latitude,
            r = i.location.longitude,
            c = i.radius,
            u = n.settings.location.latitude,
            d = n.settings.location.longitude,
            g = n.settings.radius;
        (l != u || r != d || c != g) && (n.settings.location.latitude = l, n.settings.location.longitude = r, n.radius = c, s.setPosition(n, new google.maps.LatLng(n.settings.location.latitude, n.settings.location.longitude), function(t) {
            a(n.settings.inputBinding, n), t.settings.oninitialized(o)
        }))
    }
    var s = {
        drawCircle: function(n, o, e, i) {
            return null != n.circle && n.circle.setMap(null), e > 0 ? (e *= 1, i = t.extend({
                strokeColor: "#0000FF",
                strokeOpacity: .35,
                strokeWeight: 2,
                fillColor: "#0000FF",
                fillOpacity: .2
            }, i), i.map = n.map, i.radius = e, i.center = o, n.circle = new google.maps.Circle(i), n.circle) : null
        },
        setPosition: function(t, n, o) {
            t.location = n, t.marker.setPosition(n), t.map.panTo(n), this.drawCircle(t, n, t.radius, {}), t.settings.enableReverseGeocode ? t.geodecoder.geocode({
                latLng: t.location
            }, function(n, e) {
                e == google.maps.GeocoderStatus.OK && n.length > 0 && (t.locationName = n[0].formatted_address, t.addressComponents = s.address_component_from_google_geocode(n[0].address_components)), o && o.call(this, t)
            }) : o && o.call(this, t)
        },
        locationFromLatLng: function(t) {
            return {
                latitude: t.lat(),
                longitude: t.lng()
            }
        },
        address_component_from_google_geocode: function(t) {
            for (var n = {}, o = t.length - 1; o >= 0; o--) {
                var e = t[o];
                e.types.indexOf("postal_code") >= 0 ? n.postalCode = e.short_name : e.types.indexOf("street_number") >= 0 ? n.streetNumber = e.short_name : e.types.indexOf("route") >= 0 ? n.streetName = e.short_name : e.types.indexOf("locality") >= 0 ? n.city = e.short_name : e.types.indexOf("sublocality") >= 0 ? n.district = e.short_name : e.types.indexOf("administrative_area_level_1") >= 0 ? n.stateOrProvince = e.short_name : e.types.indexOf("country") >= 0 && (n.country = e.short_name)
            }
            return n.addressLine1 = [n.streetNumber, n.streetName].join(" ").trim(), n.addressLine2 = "", n
        }
    };
    t.fn.locationpicker = function(c, u) {
        if ("string" == typeof c) {
            var d = this.get(0);
            if (!o(d)) return;
            var g = e(d);
            switch (c) {
                case "location":
                    if (void 0 == u) {
                        var m = s.locationFromLatLng(g.location);
                        return m.radius = g.radius, m.name = g.locationName, m
                    }
                    u.radius && (g.radius = u.radius), s.setPosition(g, new google.maps.LatLng(u.latitude, u.longitude), function(t) {
                        i(t.settings.inputBinding, t)
                    });
                    break;
                case "subscribe":
                    if (void 0 == u) return null;
                    var p = u.event,
                        f = u.callback;
                    if (!p || !f) return console.error('LocationPicker: Invalid arguments for method "subscribe"'), null;
                    google.maps.event.addListener(g.map, p, f);
                    break;
                case "map":
                    if (void 0 == u) {
                        var v = s.locationFromLatLng(g.location);
                        return v.formattedAddress = g.locationName, v.addressComponents = g.addressComponents, {
                            map: g.map,
                            marker: g.marker,
                            location: v
                        }
                    }
                    return null;
                case "autosize":
                    return l(g), this
            }
            return null
        }
        return this.each(function() {
            var l = t(this);
            if (o(this)) return void r(e(this), t(this), c);
            var u = t.extend({}, t.fn.locationpicker.defaults, c),
                d = new n(this, {
                    zoom: u.zoom,
                    center: new google.maps.LatLng(u.location.latitude, u.location.longitude),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                    mapTypeControl: !1,
                    disableDoubleClickZoom: !1,
                    scrollwheel: u.scrollwheel,
                    streetViewControl: !1,
                    radius: u.radius,
                    locationName: u.locationName,
                    settings: u,
                    draggable: u.draggable,
                    markerIcon: u.markerIcon
                });
            l.data("locationpicker", d), google.maps.event.addListener(d.marker, "dragend", function(t) {
                s.setPosition(d, d.marker.position, function(t) {
                    var n = s.locationFromLatLng(d.location);
                    t.settings.onchanged.apply(d.domContainer, [n, t.radius, !0]), i(d.settings.inputBinding, d)
                })
            }), s.setPosition(d, new google.maps.LatLng(u.location.latitude, u.location.longitude), function(t) {
                i(u.inputBinding, d), a(u.inputBinding, d), t.settings.oninitialized(l)
            })
        })
    }, t.fn.locationpicker.defaults = {
        location: {
            latitude: 40.7324319,
            longitude: -73.82480777777776
        },
        locationName: "",
        radius: 500,
        zoom: 15,
        scrollwheel: !0,
        inputBinding: {
            latitudeInput: null,
            longitudeInput: null,
            radiusInput: null,
            locationNameInput: null
        },
        enableAutocomplete: !1,
        enableAutocompleteBlur: !1,
        enableReverseGeocode: !0,
        draggable: !0,
        onchanged: function(t, n, o) {},
        onlocationnotfound: function(t) {},
        oninitialized: function(t) {},
        markerIcon: void 0
    }
}(jQuery);