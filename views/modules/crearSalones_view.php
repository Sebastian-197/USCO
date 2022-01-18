<!-- SALONES -->


<!-- CREAR SALON -->
<div class="content_crearSalon" id="crearSalones">
    <h2>SALONES</h2>
    <div class="content_menuSalones">
        <ul>
            <li><a href="<?php echo SERVERURL; ?>listarSalones" class="btn btn-warning">Listar Salones</a></li>
        </ul>
    </div>
    <form id="formCrearSalones">

        <div class="contenidoForm">
            <div class="row margen1">
                <div class="col-12">
                    <div class="form-group">
                        <input type="text" name="nombreSalon" id="nombreSalon" placeholder="* Nombre del salón" class="form-control">
            
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-12 btnFormCenter">
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<script src="<?php echo SERVERURL; ?>views/js/main.js"></script>