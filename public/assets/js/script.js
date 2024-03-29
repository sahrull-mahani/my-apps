$('.wrapper').on('click', '.remove', function () {
    if ($('.element').length == 2) {
        $('.remove').attr('disabled', true)
    }
    $('.remove').closest('.wrapper').find('.element').not(':first').last().remove()
})
$('.wrapper').on('click', '.clone', function () {
    $('.remove').removeAttr('disabled')
    let element = $('.clone').closest('.wrapper').find('.element').last()
    element.clone().appendTo('.results')
    element.next().find('input').val('')
})

var d = new Date($.now())
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

function pad(str, max) {
    str = str.toString();
    return str.length < max ? pad("0" + str, max) : str;
}

var on = 1
$('#null-tanggal').on('click', function () {
    if (on == 1) {
        $('#jumlah').addClass('bg-disabled')
        $('#jumlah').val('kosong')
        $('#jumlah').attr('disabled', true)
        on = 0
    } else {
        $('#jumlah').data('daterangepicker').setStartDate(moment().format("MM-DD-YYYY"))
        $('#jumlah').data('daterangepicker').setEndDate(moment().format("MM-DD-YYYY"))
        $('#jumlah').removeClass('bg-disabled')
        $('#jumlah').removeAttr('disabled')
        on = 1
    }
})

$('.numeric').on('input, keyup', function (event) {
    if (this.value <= 0) {
        this.value = 1
    }
    this.value = this.value.replace(/[^0-9]/g, '');
})

$.get({
    url: 'get-pimpinan/' + $('#to').val() + '/' + $('#to').data('tipe'),
    dataType: 'json',
    success: function (res) {
        $.map(res, (val) => {
            $('#ttd').append(new Option(val.nama, val.id))
        })
    }
})
$('#to').on('change', function () {
    $.get({
        url: 'get-pimpinan/' + $('#to').val() + '/' + $('#to').data('tipe'),
        dataType: 'json',
        success: function (res) {
            $('#ttd').empty()
            $.map(res, (val) => {
                $('#ttd').append(new Option(val.nama, val.id))
            })
        }
    })
})