<!-- Modal Choferes -->
<div class="modal fade" id="modalAddChoferes" tabindex="-1" role="dialog" aria-labelledby="modalAddChoferes" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><?= lang('choferes.createEdit') ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-choferes" class="form-horizontal">
                    <input type="hidden" id="idChoferes" name="idChoferes" value="0">


                    <div class="form-group row">
                        <label for="idEmpresa" class="col-sm-2 col-form-label">Empresa</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control idEmpresaChoferes form-controlVehiculos" name="idEmpresaChoferes" id="idEmpresaChoferes" style="width:80%;">
                                    <option value="0">Seleccione empresa</option>
                                    <?php
                                    foreach ($empresas as $key => $value) {

                                        echo "<option value='$value[id]'>$value[id] - $value[nombre] </option>  ";
                                    }
                                    ?>

                                </select>

                            </div>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label"><?= lang('choferes.fields.nombre') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="nombre" id="nombre" class="form-control datosChoferes <?= session('error.nombre') ? 'is-invalid' : '' ?>" value="<?= old('nombre') ?>" placeholder="<?= lang('choferes.fields.nombre') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="Apellido" class="col-sm-2 col-form-label"><?= lang('choferes.fields.Apellido') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="Apellido" id="Apellido" class="form-control datosChoferes <?= session('error.Apellido') ? 'is-invalid' : '' ?>" value="<?= old('Apellido') ?>" placeholder="<?= lang('choferes.fields.Apellido') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipoFigura" class="col-sm-2 col-form-label"><?= lang('choferes.fields.tipoFigura') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control tipoFigura form-controlVehiculos" name="tipoFigura" id="tipoFigura" style="width:80%;">
                                    <option value="0">Seleccione tipo figura</option>


                                    <option value="01">01 - Operador</option>
                                    <option value="02">02 - Propietario</option>
                                    <option value="03">03 - Arrendador</option>
                                    <option value="04">04 - Notificado</option>

                                </select>

                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="RFCFigura" class="col-sm-2 col-form-label"><?= lang('choferes.fields.RFCFigura') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="RFCFigura" id="RFCFigura" class="form-control datosChoferes <?= session('error.Apellido') ? 'is-invalid' : '' ?> RFCFigura" value="<?= old('RFCFigura') ?>" placeholder="<?= lang('choferes.fields.RFCFigura') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="numLicencia" class="col-sm-2 col-form-label"><?= lang('choferes.fields.numLicencia') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="numLicencia" id="numLicencia" class="form-control datosChoferes <?= session('error.numLicencia') ? 'is-invalid' : '' ?> numLicencia" value="<?= old('numLicencia') ?>" placeholder="<?= lang('choferes.fields.numLicencia') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="codigoPostalChofer" class="col-sm-2 col-form-label"><?= lang('choferes.fields.codigoPostalChofer') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <input type="text" name="codigoPostalChofer" id="codigoPostalChofer" class="form-control datosChoferes <?= session('error.codigoPostalChofer') ? 'is-invalid' : '' ?> numLicencia" value="<?= old('codigoPostalChofer') ?>" placeholder="<?= lang('choferes.fields.codigoPostalChofer') ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="pais" class="col-sm-2 col-form-label"><?= lang('choferes.fields.paisChofer') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control colonia form-control paisChofer" name="paisChofer" id="paisChofer" style="width:80%;">
                                    <option value="0">Seleccione el pais</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label"><?= lang('choferes.fields.estadoChofer') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>
                                <select class="form-control estado form-control estadoChofer" name="estadoChofer" id="estadoChofer" style="width:80%;">
                                    <option value="0">Seleccione el estado</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="municipioChofer" class="col-sm-2 col-form-label"><?= lang('choferes.fields.municipioChofer') ?></label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-pencil-alt"></i></span>
                                </div>

                                <select class="form-control estado form-control municipioChofer" name="municipioChofer" id="municipioChofer" style="width:80%;">
                                    <option value="0">Seleccione el municipio</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal"><?= lang('boilerplate.global.close') ?></button>
                <button type="button" class="btn btn-primary btn-sm" id="btnSaveChoferes"><?= lang('boilerplate.global.save') ?></button>
            </div>
        </div>
    </div>
</div>

<?= $this->section('js') ?>


<script>

    $(document).on('click', '.btnAddChoferes', function (e) {




        $("#idChoferes").val("0");

        $(".datosChoferes").val("");

        $("#idEmpresaChoferes").val("0");



        $("#idEmpresaChoferes").trigger("change");

        $("#btnSaveChoferes").removeAttr("disabled");
        
        $("#tipoFigura").val("0").trigger('change');
        $("#paisChofer").val(null).trigger('change');
        $("#estadoChofer").val(null).trigger('change');
        $("#municipioChofer").val(null).trigger('change');


    });

    /* 
     * AL hacer click al editar
     */



    $(document).on('click', '.btnEditChoferes', function (e) {


        var idChoferes = $(this).attr("idChoferes");

        //LIMPIAMOS CONTROLES
        $(".form-control").val("");

        $("#idChoferes").val(idChoferes);
        $("#btnGuardarChoferes").removeAttr("disabled");

    });


    $("#idEmpresaChoferes").select2();
    $("#tipoFigura").select2();
    
    
    
    $(".coloniaChofer").select2({
        ajax: {
            url: "<?= base_url('admin/ubicaciones/getColoniaSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var codigoPostal = $('.codigoPostalChofer').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    codigoPostal: codigoPostal // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },

            cache: true
        }
    });



    /**
     * Categorias por empresa
     */

    $(".estadoChofer").select2({
        ajax: {
            url: "<?= base_url('admin/ubicaciones/getEstadosSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var pais = $('.paisChofer').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    pais: pais // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },

            cache: true
        }
    });

    /**
     * Municipios
     */

    $(".municipioChofer").select2({
        ajax: {
            url: "<?= base_url('admin/ubicaciones/getMunicipiosSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var estado = $('.estadoChofer').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    estado: estado // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },

            cache: true
        }
    });
    
    
    
        /**
     * Municipios
     */

    $(".municipioChoferCartaPorte").select2({
        ajax: {
            url: "<?= base_url('admin/ubicaciones/getMunicipiosSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash
                var estado = $('.estadoChoferCartaPorte').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                    estado: estado // search term
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },

            cache: true
        }
    });
    
    
        /**
     * Categorias por empresa
     */

    $(".paisChofer").select2({
        ajax: {
            url: "<?= base_url('admin/ubicaciones/getPaisesSATAjax') ?>",
            type: "post",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                // CSRF Hash
                var csrfName = $('.txt_csrfname').attr('name'); // CSRF Token name
                var csrfHash = $('.txt_csrfname').val(); // CSRF hash

                return {
                    searchTerm: params.term, // search term
                    [csrfName]: csrfHash, // CSRF Token
                };
            },
            processResults: function (response) {

                // Update CSRF Token
                $('.txt_csrfname').val(response.token);

                return {
                    results: response.data
                };
            },

            cache: true
        }
    });

</script>


<?= $this->endSection() ?>
        