$('.wrapper').on('click', '.remove', function () {
    if ($('.element').length == 2) {
        $('.remove').attr('disabled', true)
    }
    $('.remove').closest('.wrapper').find('.element').not(':first').last().remove();
})
$('.wrapper').on('click', '.clone', function () {
    $('.remove').removeAttr('disabled')
    $('.clone').closest('.wrapper').find('.element').first().clone().appendTo('.results');
})

var d = new Date($.now());
var strDate = ('0' + (d.getMonth() + 1)).slice(-2) + "-" + ('0' + d.getDate()).slice(-2) + "-" + d.getFullYear()
$('.date-range').daterangepicker({
    ranges: {
        // 'Hari Ini': [moment(), moment()],
        // 'Kemarin': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
        // '7 Hari Terakhir': [moment().subtract(6, 'days'), moment()],
        // '30 Hari Terakhir': [moment().subtract(29, 'days'), moment()],
        'Bulan Ini': [moment().startOf('month'), moment().endOf('month')],
        // 'Bulan Kemarin': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
    },
    // minDate: strDate,
    alwaysShowCalendars: true,
    locale: {
        customRangeLabel: "Jangka Waktu Yang Dipilih",
        cancelLabel: "Batal",
        applyLabel: "Pilih",
        fromLabel: "Dari",
        toLabel: "Sampai",
        daysOfWeek: [
            "Min",
            "Sen",
            "Sel",
            "Rab",
            "Kam",
            "Jum",
            "Sab"
        ],
    }
})

const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

$('#to').on('change', function () {
    let val = $(this).val()

    switch (val) {
        case 'kadis':
            $('#nip').show()
            $('#nip').find('input').attr('required')
            break
        case 'thl':
            $('#nip').hide()
            $('#nip').find('input').removeAttr('required')
            break
        case 'pns':
            $('#nip').show()
            $('#nip').find('input').attr('required')
            break
        default:
            alert('other')
            break
    }
})

var on = 1
$('#null-tanggal').on('click', function () {
    if (on == 1) {
        $('#jumlah').addClass('bg-disabled')
        $('#jumlah').val('kosong')
        $('#jumlah').attr('disabled', true)
        on = 0
    } else {
        $('#jumlah').removeClass('bg-disabled')
        on = 1
    }
})
$('#my-table').DataTable()



// #LEAFLET
var lat = 0.714093
var lang = 122.330017

const map = L.map('map', {
    fullscreenControl: true,
    zoomControl: false,
    fullscreenControlOptions: {
        position: 'topleft'
    }
}).setView([lat, lang], 9);

// disabled scroll zoom
map.scrollWheelZoom.disable()

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
})

// https://leaflet-extras.github.io/leaflet-providers/preview/
const OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    maxZoom: 17,
    attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
})

// Note that difference in the "lyrs" parameter in the URL:
// Hybrid: s,h;
// Satellite: s;
// Streets: m;
// Terrain: p;
const googleHybrid = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
})
const googleSatellite = L.tileLayer('http://{s}.google.com/vt?lyrs=s&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
})
const googleStreets = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
})
const googleTerain = L.tileLayer('http://{s}.google.com/vt?lyrs=p&x={x}&y={y}&z={z}', {
    maxZoom: 20,
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
})

// MAP STYLE DEFAULT
tiles.addTo(map);
function getColor(p) {
    return p > 250000 ? '#BD0026' :
        p > 200000 ? '#E31A1C' :
            p > 180000 ? '#FC4E2A' :
                p > 140000 ? '#FD8D3C' :
                    p > 120000 ? '#FEB24C' :
                        p > 100000 ? '#FED976' :
                            '#FFF';
}
function style(feature) {
    return {
        fillColor: getColor(feature.properties.Populasi),
        weight: 2,
        opacity: 1,
        color: 'white',
        dashArray: '3',
        fillOpacity: 0.7
    };
}
function highlightFeature(e) {
    var layer = e.target;

    layer.setStyle({
        weight: 5,
        color: '#666',
        dashArray: '',
        fillOpacity: 0.7
    });

    layer.bringToFront();
    info.update(layer.feature.properties);
}
function resetHighlight(e) {
    boundariesGorontalo.resetStyle(e.target);
    info.update();
}
function zoomToFeature(e) {
    let populasi = e.target.feature.properties.Populasi
    map.fitBounds(e.target.getBounds())
}
function onEachFeature(feature, layer) {
    layer.on({
        mouseover: highlightFeature,
        mouseout: resetHighlight,
        click: zoomToFeature
    });
}
const boundariesGorontalo = L.geoJson(gorontalo, {
    style: style,
    onEachFeature: onEachFeature,
}).addTo(map)

var myIcon = L.icon({
    iconUrl: location.origin + '/assets/img/garuda.png',
    // shadowUrl: location.origin + '/assets/img/garuda.png',
    iconSize: [50, 50],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76],
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
})

const marker = L.marker([lat, lang], { name: 'marker', draggable: true })
const popup = marker.bindPopup(`
<strong class="d-block mb-3">This is my home</strong>
<table class="table table-bordered table-striped">
<tr>
    <td>
        <b>This is my office</b>
    </td>
    <td>
        <b>:</b>
    </td>
    <td>
        ${marker.getLatLng()}
    </td>
</tr>
<tr>
    <td>
        <b>This is my office 2</b>
    </td>
    <td>
        <b>:</b>
    </td>
    <td>
        ${marker.getLatLng()}
    </td>
</tr>
</table>
`)
popup.addTo(map)

marker.on('dragend', function (e) {
    const position = marker.getLatLng()
    marker.setLatLng(position, {
        draggable: 'true'
    }).bindPopup(position).update()
    $('#lat').val(position.lat).keyup()
    $('#long').val(position.lng).keyup()
})

$('#lat, #long').on('change', function () {
    const position = [parseInt($('#lat').val()), parseInt($('#long').val())]
    marker.setLatLng(position, {
        draggable: 'true'
    }).bindPopup(position).update()
    map.panTo(position)
})

var baseMap = {
    'Default': tiles,
    'Topo Map': OpenTopoMap,
    'Google Hybrid': googleHybrid,
    'Google Satellite': googleSatellite,
    'Google Streets': googleStreets,
    'Google Terain': googleTerain
}

var overlayMaps = {
    'Marker': marker,
    'Boundaries': boundariesGorontalo,
}
L.control.layers(baseMap, overlayMaps, { position: 'bottomleft' }).addTo(map)

const info = L.control()
info.onAdd = function (map) {
    this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
    this.update();
    return this._div;
}
info.update = function (props) {
    this._div.innerHTML = '<h4>Populasi Provinsi Gorontalo</h4>' + (props ?
        '<b>' + props.Kind + ' ' + props.Name + '</b><br />' + props.Populasi + ' people / mi<sup>2</sup>'
        : 'Arahkan mouse ke daerah provinsi gorontalo');
};
info.addTo(map);
var legend = L.control({ position: 'bottomright' });

legend.onAdd = function (map) {

    var div = L.DomUtil.create('div', 'info legend'),
        grades = [0, 100000, 120000, 140000, 180000, 200000, 250000, 300000],
        labels = [];

    // loop through our density intervals and generate a label with a colored square for each interval
    for (var i = 0; i < grades.length; i++) {
        div.innerHTML +=
            '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
            grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
    }

    return div;
};

legend.addTo(map);

// custom zoom bar control that includes a Zoom Home function
L.Control.zoomHome = L.Control.extend({
    options: {
        position: 'topleft',
        zoomInText: '<i class="fa fa-plus" style="line-height:1.65;"></i>',
        zoomInTitle: 'Zoom in',
        zoomOutText: '<i class="fa fa-minus" style="line-height:1.65;"></i>',
        zoomOutTitle: 'Zoom out',
        zoomHomeText: '<i class="fa fa-home" style="line-height:1.65;"></i>',
        zoomHomeTitle: 'Zoom home'
    },

    onAdd: function (map) {
        var controlName = 'gin-control-zoom',
            container = L.DomUtil.create('div', controlName + ' leaflet-bar'),
            options = this.options;

        this._zoomInButton = this._createButton(options.zoomInText, options.zoomInTitle,
            controlName + '-in', container, this._zoomIn);
        this._zoomHomeButton = this._createButton(options.zoomHomeText, options.zoomHomeTitle,
            controlName + '-home', container, this._zoomHome);
        this._zoomOutButton = this._createButton(options.zoomOutText, options.zoomOutTitle,
            controlName + '-out', container, this._zoomOut);

        this._updateDisabled();
        map.on('zoomend zoomlevelschange', this._updateDisabled, this);

        return container;
    },

    onRemove: function (map) {
        map.off('zoomend zoomlevelschange', this._updateDisabled, this);
    },

    _zoomIn: function (e) {
        this._map.zoomIn(e.shiftKey ? 3 : 1);
    },

    _zoomOut: function (e) {
        this._map.zoomOut(e.shiftKey ? 3 : 1);
    },

    _zoomHome: function (e) {
        map.setView([lat, lang], 9);
    },

    _createButton: function (html, title, className, container, fn) {
        var link = L.DomUtil.create('a', className, container);
        link.innerHTML = html;
        link.href = '#';
        link.title = title;

        L.DomEvent.on(link, 'mousedown dblclick', L.DomEvent.stopPropagation)
            .on(link, 'click', L.DomEvent.stop)
            .on(link, 'click', fn, this)
            .on(link, 'click', this._refocusOnMap, this);

        return link;
    },

    _updateDisabled: function () {
        var map = this._map,
            className = 'leaflet-disabled';

        L.DomUtil.removeClass(this._zoomInButton, className);
        L.DomUtil.removeClass(this._zoomOutButton, className);

        if (map._zoom === map.getMinZoom()) {
            L.DomUtil.addClass(this._zoomOutButton, className);
        }
        if (map._zoom === map.getMaxZoom()) {
            L.DomUtil.addClass(this._zoomInButton, className);
        }
    }
});
var zoomHome = new L.Control.zoomHome();
zoomHome.addTo(map);

var theMarker = {};
function onMapClick(e) {
    const latlng = e.latlng
    L.popup()
        .setLatLng(e.latlng)
        .setContent(`You clicked the map at ${latlng.toString()}`)
    // .openOn(map)
    if (theMarker != undefined) {
        map.removeLayer(theMarker);
    }
    if (marker) {
        map.removeLayer(marker)
    }

    //Add a marker to show where you clicked.
    theMarker = L.marker([latlng.lat, latlng.lng], { draggable: 'true' })
        .bindPopup(`
            <strong class="d-block mb-3">This is my home</strong>
            <table class="table table-bordered table-striped">
                <tr>
                    <td>
                        <b>This is my office</b>
                    </td>
                    <td>
                        <b>:</b>
                    </td>
                    <td>
                        ${latlng.toString()}
                    </td>
                </tr>
                <tr>
                    <td>
                        <b>This is my office 2</b>
                    </td>
                    <td>
                        <b>:</b>
                    </td>
                    <td>
                        ${latlng.toString()}
                    </td>
                </tr>
            </table>
            <button class="zoom-in-to btn btn-sm btn-primary" data-lat="${latlng.lat}" data-long="${latlng.lng}">zoom to</button>
            `)
        .addTo(map)

    $('#lat').val(latlng.lat)
    $('#long').val(latlng.lng)
    theMarker.on('dragend', function (e) {
        const position = theMarker.getLatLng()
        theMarker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update()
        $('#lat').val(position.lat).keyup()
        $('#long').val(position.lng).keyup()
    })

    $('#lat, #long').on('change', function () {
        const position = [parseInt($('#lat').val()), parseInt($('#long').val())]
        theMarker.setLatLng(position, {
            draggable: 'true'
        }).bindPopup(position).update()
        map.panTo(position)
    })
}
map.on('click', onMapClick)

map.on('mousemove', function (e) {
    $('#coordinate').html('Lat : ' + e.latlng.lat + ' lang : ' + e.latlng.lng)
})
let isShift = false;
$('#map').on('keydown keyup', function (e) {
    if (e.which === 16) {
        isShift = e.type === 'keydown' ? true : false;
    }
}).on('mousewheel', function (e) {
    let zoom = e.originalEvent.deltaY
    if (isShift) {
        if (zoom == -100) {
            map.zoomIn()
        } else {
            map.zoomOut()
        }
    }
})

L.Control.geocoder().addTo(map)

$('#map').on('click', '.zoom-in-to', function () {
    let zoomlevel = map.getZoom()
    let lat = $(this).data('lat')
    let long = $(this).data('long')
    map.setView([lat, long], zoomlevel + 2)
})