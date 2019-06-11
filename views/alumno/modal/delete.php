<div class="modal-header">
    <h3 class="text-danger">¿Deseas eliminar el registro: <?=$this->matricula?>?</h3>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
</div>
<div class="modal-body">
    
    <p>Estos cambios no podrán deshacerse...</p>
</div>
<div class="modal-footer clearfix">
    <a id="delete" type="button" class="btn btn-primary">Eliminar</a>
    <a type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</a>
</div>

<script>
    $(document).ready(function() {
        $('body').on('click', '#delete', function() {
            var xhttp = new XMLHttpRequest();
            xhttp.responseType = 'json';
            xhttp.open("POST", "<?=constant('URL').'alumno/eliminarAlumno/'.$this->matricula?>", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            
            xhttp.onreadystatechange = function () {  
                if (xhttp.readyState === 4) {  
                    if (xhttp.status === 200) { 
                        if(xhttp.response.result === true){
                            $('#mensaje').html(xhttp.response.mensaje);
                            $(".alert").removeClass('alert-danger'); 
                            $(".alert").addClass('alert-success'); 
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

            xhttp.send();
               
            $('#dt_groups').DataTable().ajax.reload( null, false );    
            $('#myModal').modal('hide');
        });
    });
</script>





