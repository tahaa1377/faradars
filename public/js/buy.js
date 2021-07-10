$(function () {

    $('#park').html("<span id=\"togglecart\"></span>");
    $('#togglecart').hide();


    $(document).on('click','.addTobtn',function () {

        var product_id=$(this).data('id');

        $.ajax('/add_to_cart', {
                type: 'post',
                data:{
                    productId:product_id
                },
                success: function (data) {
                    $('#productCount').text(data);
                }
            }
        );

    });

    $( ".btn_basket" ).hover(
        function() {
            $('#togglecart').toggle();
            $.ajax('/show_cart', {
                    type: 'post',
                    data:{

                    },
                    success: function (data) {
                        $('#togglecart').html(data);
                    }
                }
            );

            $( "#togglecart" ).hover(
                function() {
                    $('#togglecart').show();
                }, function() {
                    $('#togglecart').hide();
                }
            );


        }, function() {
            $('#togglecart').toggle();        }
    );
    // $(document).on('click','.btn_basket',function () {
    //     $('#togglecart').toggle();
    //
    //     $.ajax('/show_cart', {
    //             type: 'post',
    //             success: function (data) {
    //                 $('#togglecart').html(data);
    //             }
    //         }
    //     );
    //
    // });




});