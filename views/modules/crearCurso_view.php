<!-- CREAR CURSO -->
<div class="content_crearCurso" id="crearCurso">
    <h2>Crear Cursos</h2>
    <div class="content_menuCursos">
        <ul>
            <li><a href="<?php echo SERVERURL; ?>listarCurso" type="button" class="btn btn-warning" >Listado Curso</a></li>
        </ul>
    </div>
    <form class="margen1" id="formCrearCurso">
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    <input type="text" name="nombreCurso" id="nombreCurso" placeholder="* Nombre del curso" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <select name="selectProfesor" id="selectProfesor" class="selectpicker form-control " data-size="5" title="* Seleccione profesor para el curso" data-show-subtext="true" data-live-search="true" data-none-results-text="No se encontraron resultados"></select>
                </div>
            </div>
        </div>
        <div class="row ">
            <div class="col-12 btnFormIzquierda">
                <div class="form-group">
                    <button type="submit" id="btnCrearCurso" class="btn btn-success">Crear Curso</button>
                </div>
            </div>
        </div>
    </form>
</div>





<script src="<?php echo SERVERURL; ?>views/js/main.js"></script>