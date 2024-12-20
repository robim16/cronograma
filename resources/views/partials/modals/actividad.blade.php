<div class="modal fade" id="modal-actividad">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post">
                    @method('POST')
               
                    @csrf

                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" id="nombre" name="nombre" class="form-control"
                            value="">
                        <small class="form-text error-message" id="nombre-error"></small>
                        <input type="hidden" name="event_id" id="event_id">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        {{-- <input type="text" id="descripcion" name="descripcion" class="form-control"
                            value=""> --}}

                        <textarea name="descripcion" id="descripcion" cols="30" rows="5" class="form-control">
                        </textarea>
                        <small class="form-text error-message" id="descripcion-error"></small>
                    </div>

                    <div class="form-group">
                        <label for="fecha_inicio">Fecha de inicio</label>
                        <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control"
                            value="">
                        <small class="form-text error-message" id="fecha_inicio-error"></small>
                       
                    </div>
                    <div class="form-group">
                        <label for="fecha_fin">Fecha de fin</label>
                        <input type="date" id="fecha_fin" name="fecha_fin" class="form-control"
                            value="">
                        <small class="form-text error-message" id="fecha_fin-error"></small>
                        
                    </div>

                    <div class="form-group">
                        <label for="colaborador_id">Colaborador</label>
                        <select name="colaborador_id" id="colaborador_id" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                        <small class="form-text error-message" id="colaborador_id-error"></small>
                    </div>

                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select name="categoria_id" id="categoria_id" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                        <small class="form-text error-message" id="categoria_id-error"></small>
                    </div>

                    <div class="form-group">
                        <label for="fecha_fin">Observaciones</label>
                        <textarea name="observaciones" id="observaciones" cols="30" rows="5" class="form-control" @if (auth()->user()->role_id == 1)
                            disabled
                        @endif>
                            
                        </textarea>
                        <small class="form-text error-message" id="observaciones-error"></small>
                    </div>

                    <div class="form-group">
                        <label for="estado_id">Estado</label>
                        <select name="estado_id" id="estado_id" class="form-control">
                            <option value="">Seleccione</option>
                        </select>
                        <small class="form-text error-message" id="estado_id-error"></small>
                    </div>

                    <div class="form-group">
                        <label for="color">Color</label>
                        <input type="color" name="color" id="color" class="form-control">
                        <small class="form-text error-message" id="color-error"></small>
                    </div>
                </form>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal" onclick="cerrar_modal()">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="event_save()">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
