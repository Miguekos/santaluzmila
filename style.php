<link rel="stylesheet" href="bootstrap.min.css">
<link rel="stylesheet" href="jquery.dataTables.min.css">
<script src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<script src="jquery-1.12.4.js"></script>
<script src="jquery.dataTables.min.js"></script>


<script type="text/javascript">
	$(document).ready(function() {
    $('#example').DataTable( {
        "language": {
        	"order": [[ 1, "asc" ]],
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    } );
} );
</script>