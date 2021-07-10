$(function () {
    $(document).on('click','.pageination',function () {

        var searchbox = $('#searchbox').val();
        var page=$(this).data('pageination');

        $.ajax('/pagination_search', {
                type: 'post',
                data:{
                    pageination:page,
                    searchboxx:searchbox
                },
                success: function (data) {
                    $('#ajax_search').html(data);

                }
            }
        );

    });

});