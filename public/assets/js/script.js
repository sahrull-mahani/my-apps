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

const map = L.map('map').setView([lat, lang], 9);

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
const boundariesGorontalo = L.geoJson(gorontalo, {
    style: {
        fillColor: 'orange',
        weight: 2,
        opacity: 1,
        color: 'red',
        dashArray: '5',
        fillOpacity: 0.3
    }
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
// var pertama = L.marker([lat, lang], { icon: myIcon, alt: 'Kyiv' }).addTo(map)
//     // .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup(),
//     kedua = L.marker([0.6247059484732148, 122.98301311198347], { icon: myIcon }).addTo(map),
//     ketiga = L.marker([0.6227890511494613, 122.98475787895867], { icon: myIcon }).addTo(map)
// var layerGroups = L.layerGroup([pertama, kedua, ketiga])
// const singleMarker = L.marker([lat, lang], { icon: myIcon, draggable: true })
// const popup = singleMarker.bindPopup('This is my home. ' + singleMarker.getLatLng())
// popup.addTo(map)

const secondMarker = L.marker([lat, lang], { draggable: true })
const popup2 = secondMarker.bindPopup(`
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
        ${secondMarker.getLatLng()}
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
        ${secondMarker.getLatLng()}
    </td>
</tr>
</table>
`)
popup2.addTo(map)

var baseMap = {
    'Default': tiles,
    'Topo Map': OpenTopoMap,
    'Google Hybrid': googleHybrid,
    'Google Satellite': googleSatellite,
    'Google Streets': googleStreets,
    'Google Terain': googleTerain
}

var overlayMaps = {
    // 'First Marker': singleMarker,
    // 'Second Marker': secondMarker,
    'Boundaries': boundariesGorontalo,
}

L.control.layers(baseMap, overlayMaps).addTo(map)

function onMapClick(e) {
    const latlng = e.latlng
    L.popup()
        .setLatLng(e.latlng)
        .setContent(`You clicked the map at ${latlng.toString()}`)
        .openOn(map);
}
map.on('click', onMapClick)

map.on('mousemove', function (e) {
    $('#coordinate').html('Lat : ' + e.latlng.lat + ' lang : ' + e.latlng.lng)
})