$(function(){

	 $('#dataTables-items').DataTable({
        responsive: true,
        order: [[ 0, "asc" ]],
    });

	$('#dataTables-requisitions').DataTable({
        responsive: true,
        columnDefs: [{ orderable: false, targets: -1 }],
        order: [[ 5, "desc" ]],
        iDisplayLength: 25
    });

    $('#dataTables-stock-requisitions').DataTable({
        responsive: true,
        columnDefs: [{ orderable: false, targets: -1 }],
        order: [[ 5, "desc" ]],
        iDisplayLength: 25
    });
    
    //If Item not on list
    $('select[name="rq_item"]').on('change', function() {
        var _this = $(this);
        alert( _this.value ); // or $(this).val()
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

    var btn_grant = $('input[name="rq_grant"]');
    btn_grant.on('click',function(){

        var _this = $(this);
        var rq_id = _this.siblings('input[name="rq_id"]').val();
        $.ajax({
                type: "GET",
                url: "item_requisition_grant.php?rq_id=" + rq_id,
                data: {
                    rq_id: rq_id
                },
                success: function( data ) {
                    window.setTimeout('location.reload()', 500);

                }
            });
    });


    //Stock Requisition Actions
    var btn_deny = $('input[name="deny"]');
    btn_deny.on('click', function(){
        var _this = $(this);
        var transaction_id = _this.siblings('input[name="transaction_id"]').val();
        $.ajax({
            type: "GET",
            url: "stock_requisition_deny.php?transaction_id=" + transaction_id,
            data: {
                transaction_id: transaction_id
            },
            success: function( data ) {
                window.setTimeout('location.reload()', 500);

            }
        });
    });

    var btn_grant = $('input[name="s_grant"]');
    btn_grant.on('click', function(){
        var _this = $(this);
        var transaction_id = _this.siblings('input[name="transaction_id"]').val();
        $.ajax({
            type: "GET",
            url: "stock_requisition_grant.php?transaction_id=" + transaction_id,
            data: {
                transaction_id: transaction_id
            },
            success: function( data ) {
                window.setTimeout('location.reload()', 500);

            }
        });
    });

})
