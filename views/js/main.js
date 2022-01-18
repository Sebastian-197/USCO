
/*************** VARIABLES GLOBALES Y CONSTANTES ***************/
var dtAlumno;
var dtCursos;
var dtSalones;
var dtAgenda;
let idCurso;
let idEstudiante;
let idSalon;

/*************** FUNCION INICIAL ***************/
function init() { // FUNCION INICIAL PARA LA EJECUCION DE TODAS LAS FUNCIONES.
    viewsCursos(1);
    viewsSalones(1);
    listadoProfesor();
    selectCurso();
    listarAlumnos();
    listarCusos();
    listarSalones();
    
    $("#formCrearSalones").on('submit', function(e){
        crearSalon(e);
    });

    $("#formCrearCurso").on('submit', function(e){
        crearCurso(e);
    });

    $("#formAsignarAlumno").on('submit', function (e) {
        asignarAlumno(e);
    });

    $("#formCrearAgenda").on('submit', function (e) {
        crearAgenda(e);
    });

    idCurso = "";
    idSalon = ""
    
}

/*************** FUNCIONES PARA LIMPIAR ***************/

function limpiarCursos() {
    $("#nombreCurso").val("");
    $("#selectProfesor").selectpicker('val', 0);
}

function limpiarSalon() {
    $("#nombreSalon").val("");
}

function limpiarAgenda() {
    $("#nSalon").val("");
    $("#selectCurso").selectpicker('val', 0);
    $("#horaEntrada").selectpicker('val', 0);
    $("#horaSalida").selectpicker('val', 0);  
}


/*************** FUNCIONES DE VISTAS ***************/

 function viewsSalones(flag){
     if (flag == 1) {
         $("#listaSalones").show();
         $("#editarSalones").hide();
         $("#agendaSalones").hide();
        $("#listaAgenda").hide();
     }

     if (flag == 2) {
         $("#listaSalones").hide();
         $("#editarSalones").show();
          $("#agendaSalones").hide();
         $("#listaAgenda").hide();
     }

     if (flag == 3) {
         $("#listaSalones").hide();
         $("#crearSalones").hide();
         $("#agendaSalones").show();
         $("#listaAgenda").hide();
     }

     if (flag == 4) {
         $("#listaSalones").hide();
         $("#crearSalones").hide();
         $("#agendaSalones").hide();
         $("#listaAgenda").show();
     }
 }


function viewsCursos(flag) {
    if (flag == 1) {
        $("#editarCurso").hide();
        $("#asignarAlumno").hide();
         $("#listaCursos").show();
        // $("#btnCrearCurso").html("Crear Curso");
        // limpiarCursos();
        // idCurso = "";
    }

    if (flag == 2) {
        $("#editarCurso").show();
        $("#asignarAlumno").hide();
         $("#listaCursos").hide();
    }

    if (flag == 3) {
        $("#crearCurso").hide();
        $("#asignarAlumno").show();
        $("#listaCursos").hide();
    }

    if (flag == 4) {
        $("#crearCurso").show();
        $("#asignarAlumno").hide();
        $("#listaCursos").hide();   
        $("#btnCrearCurso").html("Actualizar Curso")     
    }

}

/*************** FNCION CREAR SALONES ***************/

function crearSalon(e) {
    e.preventDefault();

    console.log(idSalon);
    idD=idSalon;
    var nombreSalon = $("#nombreSalon").val();
    $.ajax({
        url: "./ajax/salonAjax.php",
        type: "POST",
        data: { nombreSalon:nombreSalon, idSalon : idD },
        success: function (data) {
            console.log(data);
            if (data == 1) {
                listarSalones.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Favor diligenciar los campos obligatorios',
                });
            }

            if (data == 2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Lo sentimos',
                    text: 'Este salón ya existe, por favor escriba otro nombre',
                });
            }

            if (data == 3) {
                Swal.fire({
                    icon: 'success',
                    title: 'El salón ha sido creado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                });
                limpiarSalon();
                dtSalones.ajax.reload();
                 
            }

            if (data == 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'No se pudo crear el salon, por favor intentelo más tarde',
                });
            }

            if (data == 5) {
                Swal.fire({
                    icon: 'success',
                    title: 'El salon se ha actualizado con éxito',
                    showConfirmButton: false,
                    timer: 1500
                });
                limpiarSalon();
                dtSalones.ajax.reload();
                viewsSalones(1);
                idSalon = "";
            }

            if (data == 6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'No se pudo actualizar el salon, por favor intentelo más tarde',
                });
            }
        }
    });    

    
}


/*************** FUNCION PARA LISTAR LOS PROFESORES ***************/

function listadoProfesor() {
    $.post("./ajax/profesorAjax.php?op=1", function (data) {
        $("#selectProfesor").html(data);
        $("#selectProfesor").selectpicker('refresh');
    })
}

/*************** FUNCION PARA CREAR LOS CURSOS ***************/

function crearCurso(e) {
    e.preventDefault();
    
    var nombre = $("#nombreCurso").val();
    var idProfesor = $("#selectProfesor").val();
    
    $.ajax({
        url: "./ajax/cursoAjax.php",
        type: "POST",
        data: {nombreCurso : nombre, selectProfesor : idProfesor, idCurso : idCurso},
        success: function (data){
            
            if (data == 1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Favor diligenciar los campos obligatorios',
                });
            }

            if (data == 2) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Lo sentimos',
                    text: 'El nombre del curso ya ha sido registrado, por favor intente con otro nombre',
                });
            }

            if (data == 3) {
                Swal.fire({
                    icon: 'success',
                    title: 'Se ha creado el curso con éxito',
                    showConfirmButton: false,
                    timer: 1500
                });
                limpiarCursos();
                selectCurso();
                dtCursos.ajax.reload();
              
                $.post("./ajax/cursoAjax.php?op=1", function(data){
                    data = JSON.parse(data);
                    $("#nCurso").html(data.nombreCurso);
                    $("#nProfesor").html(data.nombreProfesor);
                    idCurso = data.id;
                });

                
                
            }

            if (data == 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'No se pudo crear el curso, por favor intentelo más tarde',
                });
            }

            if (data == 5) {
                Swal.fire({
                    icon: 'success',
                    title: 'Se ha actualizado el curso con éxito',
                    showConfirmButton: false,
                    timer: 1500
                });
                dtCursos.ajax.reload();
                viewsCursos(1);
                idCurso = "";
                limpiarCursos();
            }

            if (data == 6) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'No se pudo actualizar el curso, por favor intentelo más tarde',
                });
            }
        }
    });

}

/*************** FUNCIONES PARA LISTAR ALUMNOS ***************/

function listarAlumnos() {
    dtAlumno = $('#dtAlumnos').dataTable({
        
        "aProcessing": true,
        "aServerSide": true,
        "ordering": false, //quita las fechas de la cabecera
        "lengthChange": false, //quita la cantidad de filas a mostrar 

        "language": {
            search: "Buscar:",
            zeroRecords: "No se encontraron datos",
            infoEmpty: "No hay datos para mostrar",
            /* info: "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas", */
            info: "Del _START_ al _END_, de  _TOTAL_ entradas",
            paginate: {
                firts: "Primeros",
                last: "Ultimos",
                previous: "Anterior",
                next: "Siguinete"
            }
        },

       "ajax":{
            url: "ajax/estudiantesAjax.php?dt=1",
            type: "get",
            dataType: "JSON",
            error: function (e) {
                console.log(e.responseText);
            }
       },

        "bDestroy": true,
        

    }).DataTable();
}

/*************** ASIGNAR ALUMNO ***************/

function asignarAlumno(e, id) {

    e.preventDefault();
        
    if (idEstudiante == 1) {
        let valores = [];
        $("input:checkbox").each(function(){
            valores.push(this.value);
        });
        $.post('./ajax/cursoEstudianteAjax.php?op=2', {idCurso : idCurso, idEstudiante : valores}, function(data){
            if (data == 1) {
                let valoresChek = [];
                $("input:checked").each(function(){
                    valoresChek.push(this.value);
                });

                $.post('./ajax/cursoEstudianteAjax.php', {idCursos : idCurso, idEstudiante : valoresChek}, function(data) {
                    if (data == 1) {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Oops...',
                            text: 'Por Favor asigne estudiantes al curso',
                        });
                    }
        
                    if (data == 2) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Los estudiantes han sido asignados con éxito',
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $("#alumno:checked").each(function() {
                            $(this).prop("checked", false);
                        });
                        viewsCursos(1);    
                        idCurso = "";
                        idEstudiante = 0;
                        
                    }
        
                    if (data == 4) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Opss',
                            text: 'No se pudo crear el curso, por favor intentelo más tarde',
                        });
                    }
                })
            }
        });
    }else{

        let valoresCheck = [];
        $("#alumno:checked").each(function(){
            valoresCheck.push(this.value);
        });

        $.post('./ajax/cursoEstudianteAjax.php', {idCursos : idCurso, idEstudiante : valoresCheck}, function(data) {
            if (data == 1) {
                Swal.fire({
                    icon: 'warning',
                    title: 'Oops...',
                    text: 'Favor seleccione los estudiantes para ser asignados al curso',
                });
            }

            if (data == 2) {
                Swal.fire({
                    icon: 'success',
                    title: 'Los estudiantes han sido asignados con éxito',
                    showConfirmButton: false,
                    timer: 1500
                });
                $("#alumno:checked").each(function() {
                    $(this).prop("checked", false);
                });
                viewsCursos(1);    
                idCurso = "";
                
            }

            if (data == 4) {
                Swal.fire({
                    icon: 'error',
                    title: 'Opss',
                    text: 'No se pudo crear el curso, por favor intentelo más tarde',
                });
            }
        })
    }
}

/*************** LISTAR CURSOS ***************/

function listarCusos() {
    
    dtCursos = $('#dtCursos').dataTable({
        
        "aProcessing": true,
        "aServerSide": true,
        "ordering": false, //quita las fechas de la cabecera
        "lengthChange": false, //quita la cantidad de filas a mostrar 

        "language": {
            search: "Buscar:",
            zeroRecords: "No se encontraron datos",
            infoEmpty: "No hay datos para mostrar",
            /* info: "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas", */
            info: "Del _START_ al _END_, de  _TOTAL_ entradas",
            paginate: {
                firts: "Primeros",
                last: "Ultimos",
                previous: "Anterior",
                next: "Siguinete"
            }
        },

       "ajax":{
            url: "ajax/cursoAjax.php?dt=1",
            type: "get",
            dataType: "JSON",
            error: function (e) {
                console.log(e.responseText);
            }
       },

        "bDestroy": true,
        

    }).DataTable();
}

/*************** DATA DE LOS CURSOS ***************/

function dataCursos(id) {
    
    viewsCursos(2);
    
    $.post('./ajax/cursoAjax.php', {idCurso : id}, function (data) {
        data = JSON.parse(data);
        $("#nombreCurso").val(data.nombreCurso);
        $("#selectProfesor").selectpicker('val', data.idProfesor);
        idCurso = data.id;
    })
}

/*************** EDITAR ALUMNOS ***************/

function editarAlumnos(id, curso, profesor) {
    idCurso = id
    idEstudiante = 1;
    $("#nCurso").html(curso);
    $("#nProfesor").html(profesor);
    $.post("./ajax/cursoEstudianteAjax.php?op=1", {idCurso : id}, function(data) {
        data = JSON.parse(data);
        $.each(data, function (iten) {
            $('input[name=alumno'+data[iten]+']').prop("checked", true);
        })
    });
    viewsCursos(3);


}

/*************** LISTAR SALONES ***************/

function listarSalones() {
    dtSalones = $('#dtSalones').dataTable({
        
        "aProcessing": true,
        "aServerSide": true,
        "ordering": false, //quita las fechas de la cabecera
        "lengthChange": false, //quita la cantidad de filas a mostrar 

        "language": {
            search: "Buscar:",
            zeroRecords: "No se encontraron datos",
            infoEmpty: "No hay datos para mostrar",
            /* info: "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas", */
            info: "Del _START_ al _END_, de  _TOTAL_ entradas",
            paginate: {
                firts: "Primeros",
                last: "Ultimos",
                previous: "Anterior",
                next: "Siguinete"
            }
        },

       "ajax":{
            url: "ajax/salonAjax.php?dt=1",
            type: "get",
            dataType: "JSON",
            error: function (e) {
                console.log(e.responseText);
            }
       },

        "bDestroy": true,
        

    }).DataTable();
}


/*************** DATA DE LOS SALONES ***************/

function dataSalon(id) {
    
    
    $.post('./ajax/salonAjax.php?op=1', {idSalon : id}, function(data){
        data = JSON.parse(data);
        
        $("#nombreSalon").val(data.nombre);
    })
    idSalon = id;
    console.log(idSalon);
     viewsSalones(2);
    
}

/*************** SELECT CURSOS ***************/

function selectCurso() {
    $.post("./ajax/cursoAjax.php?op=2", function (data) {
        $("#selectCurso").html(data);
        $("#selectCurso").selectpicker('refresh');
    })
}


/*************** AGENDAR DE SALONES ***************/

function ajendaSalones(id, nombre) {
    viewsSalones(3);
    $("#nSalon").val(nombre);
    idSalon = id;
}


/*************** CREAR AGENDA PARA LOS SALONES ***************/

function crearAgenda(e) {
    
    e.preventDefault();

    console.log("entro");
    var idCurso = $("#selectCurso").val();
    var horaEntrada = $("#horaEntrada").val();
    var horaSalida = $("#horaSalida").val();
    var fecha = $("#fecha").val();

    $.ajax({
        url: "./ajax/salonCursoAjax.php",
        type: "POST",
        data: {idCurso: idCurso, idSalon : idSalon,  horaEntrada : horaEntrada, horaSalida : horaSalida, fecha:fecha},
        success : function(data){
            console.log(data);
            if (data == 1) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'Por Favor diligencie los campos obligatorios',
                    });
                }

                if (data == 2) {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Oops...',
                        text: 'El horario para este salón ya está ocupado, por favor seleccione otro horario',
                    });
                }
    
                if (data == 3) {
                    Swal.fire({
                        icon: 'success',
                        title: 'Se ha agendado con éxito',
                        showConfirmButton: false,
                        timer: 1500
                    });
                    viewsSalones(1);
                    limpiarAgenda();
                    idSalon = "";
                    
                }
    
                if (data == 4) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Opss',
                        text: 'No se pudo crear la agenda, por favor intentelo más tarde',
                    });
                }  
        }
    });
}

/*************** AGENDA ***************/


function agenda(id) {
    console.log('idSalon : '+ id);
    viewsSalones(4);  
    listaAgenda(id);
}


/*************** LISTADO DE AGENDA ***************/

function listaAgenda(id) {

    var hoy = new Date();
    var hora = hoy.getHours()+':'+hoy.getMinutes()+':'+hoy.getSeconds();
    console.log(hora);
    var fecha = hoy.getDate()+'-'+(hoy.getMonth() + 1)+'-'+hoy.getFullYear();
    dtAgenda = $('#dtAgendaSalones').dataTable({
        

        "aProcessing": true,
        "aServerSide": true,
        "ordering": false, //quita las fechas de la cabecera
        "lengthChange": false, //quita la cantidad de filas a mostrar 

        "language": {
            search: "Buscar:",
            zeroRecords: "No se encontraron datos",
            infoEmpty: "No hay datos para mostrar",
            /* info: "Mostrando del _START_ al _END_, de un total de _TOTAL_ entradas", */
            info: "Del _START_ al _END_, de  _TOTAL_ entradas",
            paginate: {
                firts: "Primeros",
                last: "Ultimos",
                previous: "Anterior",
                next: "Siguinete"
            }
        },

        "rowCallback": function (row, data, index) {
            if (data[3] < fecha) {
                    $(row).css('color', 'White');
                    $('td', row).css('background-color', '#41BA2F');
                }
            if (data[3] > fecha) {
                $(row).css('color', 'black');
                $('td', row).css('background-color', 'red');
            }

        },

        "rowCallback": function (row, data, index) {
            if (data[3] < fecha) {
                    $(row).css('color', 'White'); //CAMBIO DEL COLOR DE LETRA
                    $('td', row).css('background-color', '#41BA2F'); // CAMBIO DE BACKGROUND DE LA FILA
                }
            if (data[3] > fecha) {
                $(row).css('color', 'black'); //CAMBIO DEL COLOR DE LA LETRA
                $('td', row).css('background-color', 'red');// CAMBIO DE BACKGROUND DE LA FILA
            }
            if (data[3] == fecha) {
                $(row).css('color', 'White'); //CAMBIO DEL COLOR DE LA LETRA
                $('td', row).css('background-color', 'yellow');// CAMBIO DE BACKGROUND DE LA FILA
            }
        },

       "ajax":{
            url: "ajax/salonCursoAjax.php?dt=1",
            type: "get",
            data: {idSalon : id},
            dataType: "JSON",
            error: function (e) {
                console.log(e.responseText);
            }
       },

        "bDestroy": true,
        

    }).DataTable();  
}



init(); //INICIALIZAR EVENTOS