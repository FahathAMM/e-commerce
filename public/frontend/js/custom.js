$('.add-cart').click(function (e) {
    var productId = $('#product_id').val();
    var productQty = $('.qty-txt').val();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method: "POST",
        url: "/add-cart",
        data: {
            'product_id': productId,
            'product_qty': productQty,
        },
        success: function (response) {
            swal.fire(response.status)
        }
    });
});

$('document').ready(function () {
    $('.btn-decr').click(function () {
        var qtyTxt = $(this).closest('.product-data').find('.qty-txt').val();
        var value = parseInt(qtyTxt, 10);
        value = isNaN(value) ? 0 : value
        if (value > 0) {
            value--
            $(this).closest('.product-data').find('.qty-txt').val(value);

        }
    });

    $('.btn-incr').click(function () {
        var qtyTxt = $(this).closest('.product-data').find('.qty-txt').val();
        var value = parseInt(qtyTxt, 10);
        value = isNaN(value) ? 0 : value
        if (value < 10) {
            value++
            $(this).closest('.product-data').find('.qty-txt').val(value);

        }
    });

    $('.del-product').click(function () {
        var productId = $(this).closest('.product-data').find('.pro-id').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "DELETE",
            url: "/cart-delete",
            data: {
                'product_id': productId,
            },
            success: function (response) {
                window.location.reload();
                swal.fire(response.status)
            }
        });

    })

    // change qty
    $('.change-qty').click(function () {
        var productId = $(this).closest('.product-data').find('.pro-id').val();
        var qtyTxt = $(this).closest('.product-data').find('.qty-txt').val();


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            method: "PUT",
            url: "/update-quantity",
            data: {
                'product_id': productId,
                'product_qty': qtyTxt,
            },
            success: function (response) {
                window.location.reload();
            }
        });
 
    });


});


