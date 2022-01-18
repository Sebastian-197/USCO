
<!-- ASIGNAR ALUMNOS -->

<div class="content_asignarAlumno" id="asignarAlumno">
    <div class="titulosAsignarAlumno">
        <h3>Curso: <spna id="nCurso">
                </spam>
        </h3>
        <h3>Profesor: <span id="nProfesor"></span></h3>
    </div>
    <form id="formAsignarAlumno" class="formAsignarAlumno">
        <div class="row">
            <div class="col-12">
                <table class="table table-hover table-bor  text-center" id="dtAlumnos" style="width:100%">
                    <thead class="bg-primary text-center">
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
                    <button type="submit" class="btn btn-success">Asignar Estudiante</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script src="<?php echo SERVERURL; ?>views/js/main.js"></script>