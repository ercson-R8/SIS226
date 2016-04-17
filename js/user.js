$(function(){
    $('form input:not([type="submit"]').keyup(function(event){
        $('#userTable').hide();
        $('#here').show();
        var qstring = $('#search').val();
            $.ajax({
            type: 'GET',
            url: 'user_get_list.php',
            data:{q:qstring},
            success:function(data){
                $('#here').html(data);
            }
        });
    });

    /*
     * Delete User Record
     */
    
    $('input[name="del_user_record"]').on('click',function(){

        var _this = $(this);
        var user_id = _this.siblings('input[name="user_id"]').val();
        $.ajax({
                type: "GET",
                url: "user_delete.php?user_id=" + user_id,
                data: {
                    user_id: user_id
                },
                success: function( data ) {
                    window.setTimeout('location.reload()', 500);
                }
            });

    });

});