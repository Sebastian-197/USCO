<?php

if ($peticionesAjax) {
    require_once '../config/conexion.php';
} else {
    require_once './config/conexion.php';
}

class salonCursoModel extends mainModelConexion
{
    protected function set_createSalonCurso($idSalon, $idCurso, $fecha, $horaIngreso, $horaSalida)
    {

        $sql = "INSERT INTO salon_curso (id_salon, id_curso, fecha, hora_ingreso, hora_salida, estado)
                    VALUES ('$idSalon', '$idCurso', '$fecha', '$horaIngreso', '$horaSalida',  '1')";

        return $this->runQuery($sql);
    }

    protected function get_existeSalon($nombre)
    {
        $sql = "SELECT id_salones FROM salones WHERE nombre_salon = '$nombre'";

        return $this->runQuery($sql);
    }

    protected function get_existeHora($idSalon, $idCurso, $fecha, $horaIngreso)
    {

        $respuesta = 0;
        $respuesta2 = 0;
        $respu = 0;

        /* RETORNA EL ID DEL PROFESOR SEGUN EL ID DEL CURSO */
        
        $sql1 = "SELECT  
                    id_profesor AS idProfesor 
                FROM 
                    cursos 
                WHERE 
                    id_cursos = '$idCurso' LIMIT 1";

        $ResProfesor = $this->runQuery($sql1);
        $idProfesores = $ResProfesor->fetchObject();
        
        /* RETORNA EL ID SALON CURSO SEGUN ID DEL PROFESOR PREVIAMENTE OBTENIDO */
        $sql2 = "SELECT 
                        s.id_salon_curso 
                    FROM 
                        salon_curso s 
                        INNER JOIN cursos c ON c.id_cursos = s.id_curso 
                        INNER JOIN profesor p ON p.id_profesor = c.id_profesor
                    WHERE 
                        p.id_profesor = '$idProfesores->idProfesor'
                        AND s.fecha = '$fecha'
                        AND s.hora_ingreso = '$horaIngreso'";

        $respuesta = $this->runQuery($sql2);

        if ($respuesta->rowCount() > 0) {
            $respu = 1;
        } else {
            /* RETORNA EL ID DEL SALON CURSO SEGUN EL ID DEL SALON */
            $sql3 = "SELECT 
                        s.id_salon_curso 
                    FROM 
                        salon_curso s 
                    WHERE 
                        s.id_salon = '$idSalon' 
                        AND s.fecha = '$fecha' 
                        AND s.hora_ingreso = '$horaIngreso'";

            $respuesta2 = $this->runQuery($sql3);

            if ($respuesta2->rowCount() > 0) {
                $respu = 1;
            }
        }

        return $respu;
    }

    protected function get_listAgenda($salon)
    {
        $sql = "SELECT sc.id_salon_curso AS id, s.nombre_salon AS nombreSalon, c.nombre_curso AS nombreCurso, p.nombre_profesor AS nombreProfesor, sc.hora_ingreso AS horaIngreso, sc.hora_salida AS horaSalida, DATE_FORMAT(sc.fecha, '%e-%c-%Y') AS fecha
                    FROM salon_curso sc
                    INNER JOIN salones s ON sc.id_salon = s.id_salones
                    INNER JOIN cursos c ON sc.id_curso = c.id_cursos
                    INNER JOIN profesor p ON c.id_profesor = p.id_profesor
                    WHERE s.id_salones = '$salon'
                    ORDER BY sc.id_salon_curso ASC";
        return $this->runQuery($sql);
    }

    protected function set_updateSalon($idSalon, $nombre)
    {
        $sql = "UPDATE salones SET nombre_salon = '$nombre' WHERE id_salones = '$idSalon'";
        return $this->runQuery($sql);
    }

    protected function get_dataSalon($idSalon)
    {
        $sql = "SELECT nombre_salon AS nombre, id_salones AS id FROM salones WHERE id_salones = '$idSalon'";

        return $this->runSimpleQuery($sql);
    }
}
