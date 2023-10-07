<form action="save-pimpinan" method="post" accept-charset="utf-8" class="row g-3 needs-validation" novalidate>
    <?php foreach ($form_input as $form) :
        echo $form;
    endforeach;
    ?>
    <div class="border-top pt-3 d-flex flex-row-reverse">
        <?= csrf_field() ?>
        <input type='hidden' name='action' value='<?= $action; ?>' />
        <button type='submit' class='btn btn-primary pull-right'><?= $btn; ?></a></button>
    </div>
</form>

<script type='text/javascript'>
    var needsValidation = document.querySelectorAll('.needs-validation')

    Array.prototype.slice.call(needsValidation)
        .forEach(function(form) {
            form.addEventListener('submit', function(event) {
                if (!form.checkValidity()) {
                    event.preventDefault()
                    event.stopPropagation()
                } else {
                    event.preventDefault()
                    event.stopPropagation()
                    $.ajax({
                        url: $(this).attr('action'),
                        type: 'POST',
                        data: $('form').serialize(),
                        dataType: 'json',
                        success: function(data) {
                            toastr[data.type](data.text, data.title)
                            $('#modal_content').modal('hide')
                            $('.datatable').bootstrapTable('refresh');
                        },
                        error: function(jqXHR, exception, thrownError) {
                            Swal.fire({
                                title: 'Error code' + jqXHR.status,
                                html: thrownError + ', ' + exception,
                                type: 'error'
                            }).then(function() {
                                $('#spinner').hide()
                            });
                        }
                    });
                }

                form.classList.add('was-validated')
            }, false)
        })
</script>