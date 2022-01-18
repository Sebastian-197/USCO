<!-- LISTA DE CURSOS -->
<div class="content_ListaCursos margen1" id="listaCursos">
<h2>Listado de Cursos con sus Profesores Asignados</h2>
    <table class="table table-hover table-bordered  text-center" id="dtCursos" style="width:100%">
        <thead class="bg-warning text-center">
            <tr>
                <th>Nombre</th>
                <th>Profesor</th>
                <th>Opcion</th>
            </tr>
        </thead>
    </table>
    <div class="col-12 btnFormIzquierda">
            <a href="<?php echo SERVERURL;?>crearCurso" type="button" class="btn btn-danger" >Regresar</a>
    </div>
</div>


<!-- EDITAR CUROS -->

<div class="content_crearCurso" id="editarCurso">
    <h2>Editar Cursos</h2>
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
                    <button type="submit" id="btnCrearCurso" class="btn btn-success">Editar</button>
                    <button type="button" id="btnCrearCurso" onclick="viewsCursos(1)" class="btn btn-danger">Cancelar</button>
                </div>
            </div>
        </div>
    </form>
</div>


 <!-- ASIGNAR ALUMNOS -->
 <div class="content_asignarAlumno" id="asignarAlumno">
     <h2>Asignar Estudiantes</h2>
            <div class="titulosAsignarAlumno margen1">
                <h4>Curso: <spna id="nCurso"></spam></h4>
                <h4>Profesor: <span id="nProfesor"></span></h4>
            </div>
            <form id="formAsignarAlumno" class="formAsignarAlumno">
                <div class="row">
                    <div class="col-12">
                        <table class="table table-hover table-bor  text-center margen1" id="dtAlumnos" style="width:100%">
                            <thead class="bg-warning text-center ">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Identificacion</th>
                                    <th>Codigo</th>
                                    <th>Agregar</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12 btnFormIzquierda">
                        <div class="form-group">
                            <button type="submit" class="btn btn-success">Asignar</button>
                            <button type="button"  onclick="viewsCursos(1)" class="btn btn-danger">Cancelar</button>
                        </div>
                    </div>
                </div>
            </form>
        </div> 






<script src="<?php echo SERVERURL; ?>views/js/main.js"></script>