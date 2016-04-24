$(function(){

    $('#dataTables-user').DataTable({
            responsive: true,
            order: [[ 1, "asc" ]],
            columnDefs: [{ orderable: false, targets: 0 }],
            iDisplayLength: 25
    });

    /*
     * Delete User Record
     */
    
    $('input[name="del_user_record"]').on('click',function(){

        var _this = $(this);
        var id = _this.siblings('input[name="user_id"]').val();
        $.ajax({
                type: "GET",
                url: "user_delete.php?user_id=" + id,
                data: {
                    id: id
                },
                success: function( data ) {
                    window.setTimeout('location.reload()', 500);
                }
            });

    });

});