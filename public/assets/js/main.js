// #variables
const url = $('#url').val()
const datatables = $('.datatable')
const create = $('#create')
const edit = $('#edit-dt')
const remove = $('#remove-dt')

const myModal = new bootstrap.Modal(document.getElementById("modal_content"), {
    backdrop: 'static'
})

function ajaxDT(params) {
    $.get(url + '?' + $.param(params.data)).then(function (res) {
        params.success(JSON.parse(res))
    })
}

$('#toolbar').find('select').change(function () {
    datatables.bootstrapTable('destroy').bootstrapTable({
        exportDataType: $(this).val()
    })
})
datatables.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
    remove.prop('disabled', !datatables.bootstrapTable('getSelections').length)
    edit.prop('disabled', !datatables.bootstrapTable('getSelections').length)
})

create.on('click', function (e) {
    e.preventDefault()
    $.ajax({
        url: $(this).attr('method'),
        type: 'GET',
        data: {
            num_of_row: $('#number-of-row').val()
        },
        dataType: "html",
        success: function (response) {
            var data = $.parseJSON(response)
            myModal.show()
            $('.modal-body').html(data.html)
            $('.modal-title').html(data.modal_title)
            $('#modal-size').addClass(data.modal_size)
            edit.attr('disabled', true)
            remove.attr('disabled', true)
        },
        error: function (jqXHR, exception, thrownError) {
            ajax_error_handling(jqXHR, exception, thrownError)
            edit.attr('disabled', true)
            remove.attr('disabled', true)
        }
    })
})

edit.on('click', function (e) {
    var ids = $.map(datatables.bootstrapTable('getSelections'), function (row) {
        return row.id
    })
    $.ajax({
        url: $(this).attr('method'),
        type: 'GET',
        data: {
            id: ids
        },
        dataType: "html",
        success: function (response) {
            var data = $.parseJSON(response)
            myModal.show()
            $('.modal-body').html(data.html)
            $('.modal-title').html(data.modal_title)
            $('#modal-size').addClass(data.modal_size)
            edit.attr('disabled', true)
            remove.attr('disabled', true)
        },
        error: function (jqXHR, exception, thrownError) {
            ajax_error_handling(jqXHR, exception, thrownError)
            edit.attr('disabled', true)
            remove.attr('disabled', true)
        }
    })
})

remove.on('click', function () {
    var ids = $.map(datatables.bootstrapTable('getSelections'), function (row) {
        return row.id
    })
    var name = $.map(datatables.bootstrapTable('getSelections'), function (row) {
        return row.name
    })
    Swal.fire({
        title: 'Hapus Data?',
        html: 'Anda Yakin Akan Menghapus Data <b>' + name + '</b>?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, Delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: $(this).attr('method'),
                type: 'post',
                data: {
                    id: ids,
                    action: 'delete'
                },
                dataType: 'json',
                success: function (data) {
                    Swal.fire({
                        title: data.title,
                        html: data.text,
                        icon: data.type,
                    })
                    $('.datatable').bootstrapTable('refresh')
                    edit.attr('disabled', true)
                    remove.attr('disabled', true)
                }, error: function (jqXHR, exception, thrownError) {
                    ajax_error_handling(jqXHR, exception, thrownError)
                    edit.attr('disabled', true)
                    remove.attr('disabled', true)
                }
            })
        } else {
            edit.attr('disabled', true)
            remove.attr('disabled', true)
        }
    })
})