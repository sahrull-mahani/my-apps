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