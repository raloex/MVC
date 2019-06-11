<!DOCTYPE html>
<html lang="es">  
  <head>    
    <meta charset="UTF-8">
    <?php 
        require 'views/header.php'; 
    ?>
    
            <!-- Data Tables -->
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/autofill/2.3.3/css/autoFill.bootstrap4.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/colreorder/1.5.0/css/colReorder.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedcolumns/3.2.5/css/fixedColumns.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/fixedheader/3.1.4/css/fixedHeader.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/keytable/2.5.0/css/keyTable.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.2/css/responsive.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowgroup/1.1.0/css/rowGroup.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/rowreorder/1.2.4/css/rowReorder.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/scroller/2.0.0/css/scroller.bootstrap4.min.css"/>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.0/css/select.bootstrap4.min.css"/>
 
        
        
        
  </head>  
  <body> 
      
        <?php require 'views/menu.php'; ?>
      
        <div class="container">
            <a href='#' data-remote="<?=constant('URL')?>modal/nuevo" data-toggle='modal' data-target='#myModal' data-remote='true' class="btn btn-secondary" >Nuevo</a>
            <h1 class="text-danger">Consulta</h1>
            <div class="alert alert-success show fade">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <span id="mensaje"></span>
            </div>
            <table class="table table-striped table-bordered table-hover " cellspacing="0" width="100%" id="dt_groups">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            </table>
        </div>
      
        <?php require 'views/footer.php'; ?>
      
        <!-- Data Tables -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.3/js/dataTables.autoFill.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/autofill/2.3.3/js/autoFill.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/colreorder/1.5.0/js/dataTables.colReorder.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/3.2.5/js/dataTables.fixedColumns.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/fixedheader/3.1.4/js/dataTables.fixedHeader.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/keytable/2.5.0/js/dataTables.keyTable.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/dataTables.responsive.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.2/js/responsive.bootstrap4.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.1.0/js/dataTables.rowGroup.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/rowreorder/1.2.4/js/dataTables.rowReorder.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.0/js/dataTables.scroller.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
        
        <script>

            $(document).ready(function() {
                table = $('#dt_groups').DataTable({
                    lengthMenu: [ [10, 25, 50, 100, -1], [10, 25, 50, 100, "Todo"] ],
                    columns: [
                        { data: "matricula" },
                        { data: "nombre" },
                        { data: "apellidos" },
                        { data: "actions" }
                    ],
                    responsive: true,
                    autoWidth: false,
                    columnDefs: [
                        {
                            targets: [3],
                            orderable: false
                        },
                        {
                            targets: "_all",
                            className: "text-center ",
                        }
                    ],
                    ajax: {
                        url: "<?=constant('URL').'alumno/allAlumno'?>",
                        type: "post",
                    },
                    language: {
                        sProcessing:         "Procesando...",
                            sLengthMenu:     "Mostrar _MENU_ registros",
                            sZeroRecords:    "No se encontraron resultados",
                            sEmptyTable:     "Ningún dato disponible en esta tabla",
                            sInfo:           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                            sInfoEmpty:      "Mostrando registros del 0 al 0 de un total de 0 registros",
                            sInfoFiltered:   "(filtrado de un total de _MAX_ registros)",
                            sInfoPostFix:    "",
                            sSearch:         "Buscar:",
                            sUrl:            "",
                            sInfoThousands:  ",",
                            sLoadingRecords: "Cargando... el proceso puede durar varios minutos",
                            paginate: {
                            sFirst:    "Primero",
                                sLast:     "Último",
                                sNext:     "Siguiente",
                                sPrevious: "Anterior"
                        },
                        aria: {
                            sSortAscending:  ": Activar para ordenar la columna de manera ascendente",
                            sSortDescending: ": Activar para ordenar la columna de manera descendente"
                        }
                    }
                });
            });
        </script>
  </body>  
</html>