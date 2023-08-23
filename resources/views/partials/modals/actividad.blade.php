<div class="modal fade" id="modal-actividad">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar actividad</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('actividades.store') }}" method="post">
                    @method('POST')
               
                    @csrf

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" id="descripcion" name="descripcion" class="form-control"
                            value="">
                    </div>

                    <div class="form-group">
                        <label for="colaborador_id">Colaborador</label>
                        <select name="colaborador_id" id="colaborador_id" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
