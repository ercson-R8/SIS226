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
});