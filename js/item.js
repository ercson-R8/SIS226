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
})