$().ready(function () {

    //translit in aliases
    if ($('input[name="alias"]').val().length < 1) {
        $('input[data-translit="true"]').liTranslit({
            elAlias: $('input[name="alias"]')
        });
    }

    // bootstrap file load button
    $('input[type=file]').bootstrapFileInput();
    $('.file-inputs').bootstrapFileInput();


    //data table products
    var table = $('#products-table').DataTable({
        fixedHeader: true,
        "order": [[0, "desc"]]
    });

    //удаление товаров ajax'ом
    $('.product-delete').click(function () {
        var token = $('#products-table').data('token');
        var link = "/dashboard/product/delete";
        var id = $(this).data('id');
        var row = $(this).parent().parent();
        var text = $(row).find('.product').text();
        var message_block = $('#message');
        if (confirm(are_you_sure + ' ' + text + '?')) {
            $.ajax({
                url: link,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: token,
                    id: id,
                    product: text
                },
                success: function (e) {
                    if ($('.alert').is('.alert-success') || $('.alert').is('.alert-danger')) {
                        $('.alert').removeClass('alert-success');
                        $('.alert').removeClass('alert-danger');
                    }
                    $('.alert').addClass('alert-' + e.result);
                    $(message_block).text(e.message);
                }
            });
            $('.alert').slideDown(500);
            $(row).fadeOut(500);
            setTimeout(function () {
                $('.alert').slideUp(500);
            }, 5000)
        }
    });

    //удаление брендов ajax'ом
    $('.brand-delete').click(function () {
        var token = $('#products-table').data('token');
        var link = "/dashboard/brand/delete";
        var id = $(this).data('id');
        var row = $(this).parent().parent();
        var text = $(row).find('.brand').text();
        var message_block = $('#message');
        if (confirm(are_you_sure + ' ' + text + '?')) {
            $.ajax({
                url: link,
                type: 'POST',
                dataType: 'JSON',
                data: {
                    _token: token,
                    id: id,
                    brand: text
                },
                success: function (e) {
                    if ($('.alert').is('.alert-success') || $('.alert').is('.alert-danger')) {
                        $('.alert').removeClass('alert-success');
                        $('.alert').removeClass('alert-danger');
                    }
                    $('.alert').addClass('alert-' + e.result);
                    $(message_block).text(e.message);
                }
            });
            $('.alert').slideDown(500);
            $(row).fadeOut(500);
            setTimeout(function () {
                $('.alert').slideUp(500);
            }, 5000)
        }
    });


    var cropper = null;
    $('input[type="file"]').change(function (e) {
        var reader = new FileReader();
        reader.readAsDataURL(e.target.files[0]);
        reader.onload = function () {
            $('.img-container>img').attr('src', reader.result);
            var image = document.getElementById('image');
            cropper = new Cropper(image, {
                aspectRatio: 16 / 9,
                crop: function (e) {
                    $('input[name="x"]').val(Math.ceil(e.detail.x));
                    $('input[name="y"]').val(Math.ceil(e.detail.y));
                    $('input[name="width"]').val(Math.ceil(e.detail.width));
                    $('input[name="height"]').val(Math.ceil(e.detail.height));
                },
                dragMode: 'move'
            });
            cropper.setData(image);
        };

    });
    $('input[type="file"]').click(function () {
        if (cropper) {
            cropper.destroy();
        }
    });

    //// datetimepicker
    $.datetimepicker.setLocale('ru');
    $('[name*="date"]').datetimepicker({
        format: 'Y-m-d H:i'
    });
    //$('#products-table tbody').on('click', 'tr', function () {
    //var data = table.row( this ).data();
    //window.location.replace("/dashboard/product/edit/"+data[0]);
    //} );

});
