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

var lat = 0.6251351585163633
var lang = 122.98490935153842

const map = L.map('map').setView([lat, lang], 16);

const tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

var myIcon = L.icon({
    iconUrl: location.origin + '/assets/img/garuda.png',
    // shadowUrl: location.origin + '/assets/img/garuda.png',
    iconSize: [50, 50],
    iconAnchor: [22, 94],
    popupAnchor: [-3, -76],
    shadowSize: [68, 95],
    shadowAnchor: [22, 94]
})
var pertama = L.marker([lat, lang], { icon: myIcon, alt: 'Kyiv' }).addTo(map)
    .bindPopup('<b>Hello world!</b><br />I am a popup.').openPopup(),
kedua = L.marker([0.6247059484732148, 122.98301311198347], { icon: myIcon }).addTo(map),
ketiga = L.marker([0.6227890511494613, 122.98475787895867], { icon: myIcon }).addTo(map)
var layerGroups = L.layerGroup([pertama, kedua, ketiga])

const circle = L.circle([lat, lang], {
    color: 'red',
    fillColor: '#f03',
    fillOpacity: 0.5,
    radius: 250
}).addTo(map).bindPopup('I am a circle.');

const polygon = L.polygon([
    [lat, lang],
    [0.6252778204527564, 122.98332674708286],
    [0.6247119080247634, 122.98438085521424]
]).addTo(map).bindPopup('I am a polygon.');


const popup = L.popup()
// .setLatLng([0.6271588023080559, 122.97839023990555])
// .setContent('I am a standalone popup.')
// .openOn(map);

function onMapClick(e) {
    popup
        .setLatLng(e.latlng)
        .setContent(`You clicked the map at ${e.latlng.toString()}`)
        .openOn(map);
}

map.on('click', onMapClick);