<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    <h1 class="text-danger">Editar registro</h1>
    <form id="form-edit" method="POST">
        <p>
            <label for="matricula">Matrícula</label>
            <input type="text" name="matricula"  value="<?=$this->alumno->matricula?>" id="" required>
        </p>
        <p>
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" id="" value="<?=$this->alumno->nombre?>" required>
        </p>
        <p>
            <label for="apellidos">Apellidos</label>
            <input type="text" name="apellidos"  value="<?=$this->alumno->apellidos?>" id="" required>
        </p>
    </form>
</div>
<div class="modal-footer clearfix">
    <a id="edit" type="button" class="btn btn-primary">Editar</a>
    <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
</div>

<script>
    $(document).ready(function() {
        $('body').on('click', '#edit', function() {
            var xhttp = new XMLHttpRequest();
            xhttp.responseType = 'json';
            xhttp.open("POST", "<?=constant('URL').'consulta/actualizarAlumno/'?>", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xhttp.onreadystatechange = function (oEvent) {  
                if (xhttp.readyState === 4) {  
                    if (xhttp.status === 200) {  
                        if(xhttp.response.result == true){
                            $('#mensaje').html(xhttp.response.mensaje);
                            $(".alert").css('display', 'block');
                        } else {
                            $('#mensaje').html(xhttp.response.mensaje);
                            $(".alert").removeClass('alert-success'); 
                            $(".alert").addClass('alert-danger'); 
                            $(".alert").css('display', 'block');
                        }
                    } else {  
                        $('#mensaje').html('Error MVC');
                        $(".alert").removeClass('alert-success'); 
                        $(".alert").addClass('alert-danger'); 
                        $(".alert").css('display', 'block');
                    }  
                }  
            }; 

            xhttp.send($('#form-edit').serialize());
               
            $('#dt_groups').DataTable().ajax.reload( null, false );    
            $('#myModal').modal('hide');
        });
    });
</script>





