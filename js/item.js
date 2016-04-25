$(function(){

	 $('#dataTables-items').DataTable({
        responsive: true,
        order: [[ 0, "asc" ]],
    });

	$('#dataTables-requisitions').DataTable({
        responsive: true,
        columnDefs: [{ orderable: false, targets: -1 }],
        order: [[ 3, "asc" ]],
        iDisplayLength: 25
    });

    var btn_reject = $('input[name="rq_reject"]');

    btn_reject.on('click',function(){

        var _this = $(this);
        var rq_id = _this.siblings('input[name="rq_id"]').val();
        $.ajax({
                type: "GET",
                url: "item_requisition_reject.php?rq_id=" + rq_id,
                data: {
                    rq_id: rq_id
                },
                success: function( data ) {
                    window.setTimeout('location.reload()', 500);

                }
            });

    });
})