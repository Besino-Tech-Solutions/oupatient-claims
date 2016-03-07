
<script src="/bootstrap/js/jquery.min.js"></script>
<script src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/DataTables-1.10.2/media/js/jquery.js"></script>

<script type="text/javascript" src="/DataTables-1.10.2/media/js/jquery.dataTables.js"></script>   
<script type="text/javascript" src="/DataTables-1.10.2/extensions/TableTools/js/dataTables.tableTools.js"></script>



<script type="text/javascript">
        
    $(document).ready(function() {

        var table = $('#tablelist').DataTable( {
                

            dom: 'T<"clear">lfrtip',
            tableTools: {
                "sSwfPath": "../DataTables-1.10.2/extensions/TableTools/swf/copy_csv_xls_pdf.swf"
            },
            "scrollX": true,
            "iDisplayLength": 10,
            "stateSave": true,
            "stateDuration": 60 * 60 * 9,


        } );

        var table = $('#tablelist1').DataTable( {
                

            "scrollX": true,
            "iDisplayLength": 10


        } );

        var table = $('#tablelist2').DataTable( {
                

            "scrollX": true,
            "iDisplayLength": 10


        } );


    } );
    
        

</script>

