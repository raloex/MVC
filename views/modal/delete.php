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
            xhttp.open("POST", "<?=constant('URL').'consulta/eliminarAlumno/'.$this->matricula?>", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhttp.send();
            $('#dt_groups').DataTable().ajax.reload( null, false );        
            $('#myModal').modal('hide');
        });
    });
</script>





