<!DOCTYPE html>
<html>
    <head> 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Simple Serverside jQuery Datatable</title>
    <link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.min.css')?>" rel="stylesheet">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head> 
<body>
    <div class="container">
        <h1 style="font-size:20pt">Simple Serverside Datatable Codeigniter Bootstrap</h1>

        <h3>Customers Data</h3>
        <br>
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th class="text-center col-md-2">Judul buletin</th>
                    <!-- <th>Judul paper</th> -->
                    <!-- <th>Sumber</th> -->
                    <th class="text-center">Penulis paper</th>
                    <th class="text-center">Edisi terbit paper</th>
                    <th class="text-center col-md-4">Teks Ringkasan</th>
                    <th class="text-center">Periode</th>
                </tr>
            </thead>
            <tbody>
            </tbody>

            <tfoot>
                <tr>
                    <th>No</th>
                    <th class="text-center col-md-2">Judul buletin</th>
                    <!-- <th>Judul paper</th> -->
                    <!-- <th>Sumber</th> -->
                    <th class="text-center">Penulis paper</th>
                    <th class="text-center">Edisi terbit paper</th>
                    <th class="text-center col-md-4">Teks Ringkasan</th>
                    <th class="text-center">Periode</th>
                </tr>
            </tfoot>
        </table>
    </div>

<script src="<?php echo base_url('assets/jquery/jquery-2.2.3.min.js')?>"></script>
<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js')?>"></script>


<script type="text/javascript">

var table;

$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('customers/ajax_list')?>",
            "type": "POST",
            data: {
            func: 'getNewLocations',
            '<?php echo $this->security->get_csrf_token_name(); ?>' : '<?php echo $this->security->get_csrf_hash(); ?>'
        },
        success: function(data) {
        }
        },
        "columns": [
            { "data": "judul_buletin" },
            { "data": "penulis_paper" },
            { "data": "edisi_terbit_paper" },
            { "data": "teks_ringkasan" },
            { "data": "periode" }
        ],

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ 0 ], //first column / numbering column
            "orderable": false, //set not orderable
        },
        ],

    });

});

</script>

</body>
</html>