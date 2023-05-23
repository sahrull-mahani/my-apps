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

let copyText = document.querySelector(".copy-text")
copyText.querySelector("#btn-copy-clip").addEventListener("click", function () {
    let input = copyText.querySelector("#copy-text");
    input.select()
    document.execCommand("copy")
    copyText.classList.add("active")
    toastr.info('Di salin ke papan klip', 'Salin')
    window.getSelection().removeAllRanges()
    setTimeout(function () {
        copyText.classList.remove("active")
    }, 2500)
})
$('#copy-text').on('click', function () {
    $(this).select()
    document.execCommand("copy")
    $(this).addClass('active')
    toastr.info('Di salin ke papan klip', 'Salin')
    window.getSelection().removeAllRanges()
    setTimeout(function () {
        $(this).removeClass('active')
    }, 2500)
})

$('#to').on('change', function () {
    let val = $(this).val()

    switch (val) {
        case 'kadis':
            $('#nip').show()
            break
        case 'thl':
            $('#nip').hide()
            break
        case 'pns':
            $('#nip').show()
            break
        default:
            alert('other')
            break
    }
})