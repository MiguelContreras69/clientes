<?=
$this->Form->create(null, [
    'type' => 'post'
])
?>


<div class="form-group row">
    <div class="col-md-6 mb-3">
        <label>Alias</label>
        <?= $this->Form->input('alias', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'id' => 'alias', 'placeholder' => 'Escriba un alias para la asignacion de este usuario']) ?>
    </div>
</div>

<div class="form-group row">
    <div class="col-md-3 mb-3">
        <label>Nombre(s)</label>     
        <?= $this->Form->input('nombre', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'id' => 'nombre']) ?>
    </div>
    <div class="col-md-3 mb-3">
        <label>Apellido Paterno</label>
        <?= $this->Form->input('apellidoPaterno', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'id' => 'apellidoPaterno']) ?>
    </div>
    <div class="col-md-3 mb-3">
        <label>Apellido Materno</label>
        <?= $this->Form->input('apellidoMaterno', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'id' => 'apellidoMaterno']) ?>
    </div>
    <div class="col-md-3 mb-3">
        <label>Fecha de Nacimiento</label>
        <?= $this->Form->input('fechaNacimiento', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'id' => 'datepicker', 'placeholder' => 'Seleccione fecha', 'required', 'readonly']) ?>
    </div>
</div>
<div id='replicaDireccion' class="hidden">
    <div class="col-md-6 mb-3">
        <label>Dirección</label>
        <?= $this->Form->input('direccion', ['label' => false, 'type' => 'text', 'class' => 'form-control', 'id' => 'direccion', 'placeholder' => 'Escriba la direccion (Calle,Numero,Colonia)', 'required']) ?>
    </div>
    <div class="col-md-3 mb-3">
        <label>Categoria</label>
        <?php echo $this->Form->input('dir_categoriaid', ['label' => false, 'class' => 'form-control', 'options' => array('Casa', 'Trabajo'), 'empty' => 'Seleccione categoria', 'id' => 'dir_categoriaid', 'required']); ?>
    </div>
    <div class="col-md-1 mb-1">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-primary btn-md" id='agregar'>Agregar</button>
    </div>
    <div class="col-md-1 mb-1">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger btn-md" id='eliminar'>Eliminar</button>
    </div>

    <!--    <div class="form-group row"> -->
    <div class="col-md-6 mb-3">
        <label>Ciudad</label>
        <?php echo $this->Form->input('ciudad', ['label' => false, 'class' => 'form-control', 'options' => array('Monterrey', 'San Nicolas de los Garza'), 'empty' => 'Seleccione ciudad', 'id' => 'ciudad', 'required']); ?>
    </div>
    <div class="col-md-3 mb-3">
        <label>Estado</label>
        <?php echo $this->Form->input('estado', ['label' => false, 'class' => 'form-control', 'options' => array('Nuevo Leon'), 'empty' => 'Seleccione estado', 'id' => 'estado', 'required']); ?>
    </div>
</div>


<div id='replicaEmail' class="hidden">
    <!--<div class="form-group row">-->
    <div class="col-md-6 mb-3">
        <label>Email</label>
        <?= $this->Form->input('email', ['label' => false, 'type' => 'email', 'class' => 'form-control', 'id' => 'email', 'placeholder' => 'Escriba su cuenta de correo electronico']) ?>
    </div>
    <div class="col-md-3 mb-3">
        <label>Categoria</label>
        <?php echo $this->Form->input('email_categoriaid', ['label' => false, 'class' => 'form-control', 'options' => array('Casa', 'Trabajo'), 'empty' => 'Seleccione categoria', 'id' => 'email_categoriaid', 'required']); ?>
    </div>
    <div class="col-md-1 mb-1">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-primary btn-md" id='agregarEmail'>Agregar</button>
    </div>
    <div class="col-md-1 mb-1">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger btn-md" id='eliminarEmail'>Eliminar</button>
    </div>
</div>

<div id='replicaTelefono' class="hidden">
    <!--<div class="form-group row">-->
    <div class="col-md-6 mb-3">
        <label>Telefono</label>
        <?= $this->Form->input('telefono', ['label' => false, 'type' => 'phone', 'class' => 'form-control', 'id' => 'telefono', 'placeholder' => 'Escriba su numero telefonico']) ?>
    </div>
    <div class="col-md-3 mb-3">
        <label>Categoria</label>
        <?php echo $this->Form->input('tel_categoriaid', ['label' => false, 'class' => 'form-control', 'options' => array('Casa', 'Trabajo'), 'empty' => 'Seleccione categoria', 'id' => 'tel_categoriaid', 'required']); ?>
    </div>
    <div class="col-md-1 mb-1">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-primary btn-md" id='agregarTelefono'>Agregar</button>
    </div>
    <div class="col-md-1 mb-1">
        <label>&nbsp;</label>
        <button type="button" class="btn btn-danger btn-md" id='eliminarTelefono'>Eliminar</button>
    </div>
</div>


<div class="form-group">
    <?=
    $this->Form->submit('Guardar', [
        'class' => 'btn btn-primary'
    ])
    ?>
</div>
<?= $this->Form->end() ?>



<script type="text/javascript">
    var numero = 0;
    var lineaTelefono = 0;
    var lineaEmail = 0;
    var error = '';
    $(document).ready(function () {

        $('#datepicker').datepicker({
            dateFormat: "dd-mm-yy",
            autoclose: true,
            showTodayButton: true,
        });
        $('#eliminar').click(function () {
            eliminarLinea($('#eliminar').val());
        });
        $('#agregar').click(function () {
            nuevaLinea();
        });
        
        
        
        $('#eliminarTel').click(function () {
            eliminarTel($('#eliminarTelefono').val());
        });
        $('#agregarTelefono').click(function () {
            nuevoTelefono();
        });
        
        
        
        $('#eliminarEmail').click(function () {
            deleteEmail($('#eliminarEmail').val());
        });
        $('#agregarEmail').click(function () {
            nuevoEmail();
        });
        // para que añada la linea la primera linea clonada en la forma
        nuevaLinea();
        nuevoEmail();
        nuevoTelefono();
    });

    function eliminarLinea(num) {
        $('#self' + num).slideUp(300, function () {
            $(this).remove();
        });
    }
    function nuevaLinea(num) {
        // esto replica el contenido html del div
        $('#replicaDireccion').before('<div class="form-group row" id="self' + numero + '" valor="' + numero + '" style="display:none;">' + $('#replicaDireccion').html());
        $('#self' + numero).slideDown(300);
        // funcion que añade las lineas simliar al clonado de jquery
        programaLinea(numero);
        numero++;
    }
    function programaLinea(num) {
        $('#self' + num + ' #direccion').attr('name', '[Direccion][' + num + '][direccion]');
        $('#self' + num + ' #dir_categoriaid').attr('name', '[Direccion][' + num + '][dir_categoriaid]');
        $('#self' + num + ' #ciudad').attr('name', '[Direccion][' + num + '][ciudad]');
        $('#self' + num + ' #estado').attr('name', '[Direccion][' + num + '][estado]');
        $('#self' + num + ' #agregar').attr('onclick', 'nuevaLinea(' + numero + ')');
        $('#self' + num + ' #eliminar').attr('onclick', 'eliminarLinea(' + numero + ')');
    }
    function eliminarTel(num) {
        $('#tel' + num).slideUp(300, function () {
            $(this).remove();
        });
    }
    function nuevoTelefono(num) {
        // esto replica el contenido html del div
        $('#replicaTelefono').before('<div class="form-group row" id="tel' + lineaTelefono + '" valor="' + lineaTelefono + '" style="display:none;">' + $('#replicaTelefono').html());
        $('#tel' + lineaTelefono).slideDown(300);
        // funcion que añade las lineas simliar al clonado de jquery
        programaTelefono(lineaTelefono);
        lineaTelefono++; 
    }
    function programaTelefono(num)
    {
        $('#tel' + num + ' #telefono').attr('name', '[Telefono][' + num + '][telefono]');
        $('#tel' + num + ' #tel_categoriaid').attr('name', '[Telefono][' + num + '][tel_categoriaid]');
        $('#tel' + num + ' #agregarTelefono').attr('onclick', 'nuevoTelefono(' + lineaTelefono + ')');
        $('#tel' + num + ' #eliminarTelefono').attr('onclick', 'eliminarTel(' + lineaTelefono + ')');
    }
       
    function deleteEmail(num) {
        $('#mail' + num).slideUp(300, function () {
            $(this).remove(); 
        });
    }
    function nuevoEmail(num) {
        // esto replica el contenido html del div
        $('#replicaEmail').before('<div class="form-group row" id="mail' + lineaEmail + '" valor="' + lineaEmail + '" style="display:none;">' + $('#replicaEmail').html());
        $('#mail' + lineaEmail).slideDown(300);
        // funcion que añade las lineas simliar al clonado de jquery
        programaEmail(lineaEmail);
        lineaEmail++;
    }
 
    function programaEmail(num) {
        $('#mail' + num + ' #email').attr('name', '[Email][' + num + '][email]');
        $('#mail' + num + ' #email_categoriaid').attr('name', '[Email][' + num + '][dir_categoriaid]');
        $('#mail' + num + ' #agregarEmail').attr('onclick', 'nuevoEmail(' + lineaEmail + ')');
        $('#mail' + num + ' #eliminarEmail').attr('onclick', 'deleteEmail(' + lineaEmail + ')');
    }
  
</script>