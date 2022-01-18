<!-- LISTADO SALONES -->


<div class="content_ListaSalones margen1" id="listaSalones">
<h2>Listado de Salones</h2>
    <table class="table table-hover table-bordered  text-center margen1" id="dtSalones" style="width:100%">
        <thead class="bg-warning text-center">
            <tr>
                <th>Nombre Del Salon</th>
                <th>Opcion</th>
            </tr>
        </thead>
    </table>
    <div class="col-12 btnFormIzquierda">
            <a href="<?php echo SERVERURL;?>crearSalones" type="button" class="btn btn-danger" >Regresar</a>
    </div>
</div>

<!-- EDITAR SALONES-->

<div class="content_crearSalones margen1" id="editarSalones">
    <form id="formCrearSalones">
        <h2>Editar Salón</h2>
        <div class="row margen1">
            <div class="col-12">
                <div class="form-group">
                    <p>Ingrese nombre del salón</p>
                    <input type="text" name="nombreSalon" id="nombreSalon" class="form-control">

                </div>
            </div>
        </div>

        <div class="row margen1">
            <div class="col-12 btnFormCenter">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" onclick="viewsSalones(1)">Cancelar</button>
                </div>
            </div>
        </div>
    </form>
</div>


<!-- AGENDAR SALON -->


<div class="content_agendarSalones" id="agendaSalones">
    <form id="formCrearAgenda">
        <h2>Programar Horarios de Salones</h2>
        <div class="row margen1">
            <div class="col-6">
                <div class="form-group">
                    <input type="text" name="nSalon" id="nSalon" class="form-control" disabled>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <select name="selectCurso" id="selectCurso" class="selectpicker form-control " data-size="5" title="* Seleccione el curso" data-show-subtext="true" data-live-search="true" data-none-results-text="No se encontraron resultados"></select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <select name="horaEntrada" id="horaEntrada" class="selectpicker form-control " data-size="5" title="* Hora ingreso" data-show-subtext="true" data-live-search="true" data-none-results-text="No se encontraron resultados">
                        <option value="07:00">07:00</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                    </select>
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <select name="horaSalida" id="horaSalida" class="selectpicker form-control " data-size="5" title="* Hora salida" data-show-subtext="true" data-live-search="true" data-none-results-text="No se encontraron resultados">
                        <option value="07:00">07:00</option>
                        <option value="08:00">08:00</option>
                        <option value="09:00">09:00</option>
                        <option value="10:00">10:00</option>
                        <option value="11:00">11:00</option>
                        <option value="12:00">12:00</option>
                        <option value="13:00">13:00</option>
                        <option value="14:00">14:00</option>
                        <option value="15:00">15:00</option>
                        <option value="16:00">16:00</option>
                        <option value="17:00">17:00</option>
                        <option value="18:00">18:00</option>
                        
                    </select>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input type="date" name="fecha" id="fecha" class="form-control" placeholder="Fecha">
                </div>
            </div>
        </div>
        <div class="row margen1">
            <div class="col-12 btnFormCenter">
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <button type="button" class="btn btn-danger" onclick="viewsSalones(1)">Cancelar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<!-- HISTORICO DE SALONES-->

<div class="content_listaAgenda margen1" id="listaAgenda">
    <h2>Hsitorial de Salones</h2>
    <table class="table table-hover table-bordered  text-center margen1" id="dtAgendaSalones" style="width:100%">
        <thead class="bg-warning text-center">
            <tr>
                <th>Salon</th>
                <th>Curso</th>
                <th>Profesor</th>
                <th>Fecha</th>
                <th>Hora Ingreso</th>
                <th>Hora Salida</th>
            </tr>
        </thead>
    </table>
    <div class="col-12 btnFormIzquierda">
            <button type="button" class="btn btn-danger" onclick="viewsSalones(1)">Regresar</button>
    </div>
</div>



<script src="<?php echo SERVERURL; ?>views/js/main.js"></script>