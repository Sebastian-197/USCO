<?php 

    class viewsModel
    {
        protected function get_views($vista){
            $listaBlanca = [
                'crearSalones',
                'crearCurso',
                'asignarAlumnos',
                'listarCurso',
                'listarSalones'
            ];

            if (in_array($vista, $listaBlanca)) {
                if (is_file("./views/modules/".$vista."_view.php")) {
                    $respuesta = "./views/modules/".$vista."_view.php";
                }else {
                    $respuesta = "crearCurso";
                }
            }elseif ($vista == "crearCurso") {
                $respuesta = "crearCurso";
            }elseif ($vista == "index") {
                $respuesta = "crearCurso";
            }elseif ($vista == "crearCurso") {
                $respuesta = "crearCurso";
            }elseif ($vista == "login") {
                $respuesta = "login";
            }
            else {
                $respuesta = "page404";
            }

            return $respuesta;
        }
    }
    