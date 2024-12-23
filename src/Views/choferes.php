<?= $this->include('julio101290\boilerplate\Views\load\select2') ?>
<?= $this->include('julio101290\boilerplate\Views\load\datatables') ?>
<?= $this->include('julio101290\boilerplate\Views\load\nestable') ?>
<!-- Extend from layout index -->
<?= $this->extend('julio101290\boilerplate\Views\layout\index') ?>

<!-- Section content -->
<?= $this->section('content') ?>

<?= $this->include('julio101290\boilerplatedrivers\Views\modulesChoferes/modalCaptureChoferes') ?>

<!-- SELECT2 EXAMPLE -->
<div class="card card-default">
    <div class="card-header">
        <div class="float-right">
            <div class="btn-group">

                <button class="btn btn-primary btnAddChoferes" data-toggle="modal" data-target="#modalAddChoferes"><i class="fa fa-plus"></i>

                    <?= lang('choferes.add') ?>

                </button>

            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="tableChoferes" class="table table-striped table-hover va-middle tableChoferes">
                        <thead>
                            <tr>

                                <th>#</th>
                                <th><?= lang('choferes.fields.idEmpresa') ?></th>
                                <th><?= lang('choferes.fields.nombre') ?></th>
                                <th><?= lang('choferes.fields.Apellido') ?></th>
                                <th><?= lang('choferes.fields.created_at') ?></th>
                                <th><?= lang('choferes.fields.updated_at') ?></th>
                                <th><?= lang('choferes.fields.deleted_at') ?></th>

                                <th><?= lang('choferes.fields.actions') ?> </th>

                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.card -->

<?= $this->endSection() ?>


<?= $this->section('js') ?>
<script>

    /**
     * Cargamos la tabla
     */

    var tableChoferes = $('#tableChoferes').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        autoWidth: false,
        order: [[1, 'asc']],

        ajax: {
            url: '<?= base_url('admin/choferes') ?>',
            method: 'GET',
            dataType: "json"
        },
        columnDefs: [{
                orderable: false,
                targets: [7],
                searchable: false,
                targets: [7]

            }],
        columns: [{
                'data': 'id'
            },

            {
                'data': 'nombreEmpresa'
            },

            {
                'data': 'nombre'
            },

            {
                'data': 'Apellido'
            },

            {
                'data': 'created_at'
            },

            {
                'data': 'updated_at'
            },

            {
                'data': 'deleted_at'
            },

            {
                "data": function (data) {
                    return `<td class="text-right py-0 align-middle">
                         <div class="btn-group btn-group-sm">
                             <button class="btn btn-warning btnEditChoferes" data-toggle="modal" idChoferes="${data.id}" data-target="#modalAddChoferes">  <i class=" fa fa-edit"></i></button>
                             <button class="btn btn-danger btn-delete" data-id="${data.id}"><i class="fas fa-trash"></i></button>
                         </div>
                         </td>`
                }
            }
        ]
    });



    $(document).on('click', '#btnSaveChoferes', function (e) {


        var idChoferes = $("#idChoferes").val();
        var idEmpresa = $("#idEmpresaChoferes").val();
        var nombre = $("#nombre").val();
        var Apellido = $("#Apellido").val();
        var tipoFigura = $("#tipoFigura").val();
        var RFCFigura = $("#RFCFigura").val();
        var numLicencia = $("#numLicencia").val();

        var codigoPostalChofer = $("#codigoPostalChofer").val();
        var paisChofer = $("#paisChofer").val();
        var estadoChofer = $("#estadoChofer").val();
        var municipioChofer = $("#municipioChofer").val();

        if (idEmpresa == 0 || idEmpresa == null) {

            Toast.fire({
                icon: 'error',
                title: "Tiene que seleccionar la empresa"
            });
            return;
        }

        $("#btnSaveChoferes").attr("disabled", true);

        var datos = new FormData();
        datos.append("idChoferes", idChoferes);
        datos.append("idEmpresa", idEmpresa);
        datos.append("nombre", nombre);
        datos.append("Apellido", Apellido);
        datos.append("tipoFigura", tipoFigura);
        datos.append("RFCFigura", RFCFigura);
        datos.append("numLicencia", numLicencia);

        datos.append("CodigoPostalFigura", codigoPostalChofer);
        datos.append("PaisFigura", paisChofer);
        datos.append("EstadoFigura", estadoChofer);
        datos.append("MunicipioFigura", municipioChofer);


        $.ajax({

            url: "<?= base_url('admin/choferes/save') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            success: function (respuesta) {
                if (respuesta.match(/Correctamente.*/)) {

                    Toast.fire({
                        icon: 'success',
                        title: "Guardado Correctamente"
                    });

                    tableChoferes.ajax.reload();
                    $("#btnSaveChoferes").removeAttr("disabled");


                    $('#modalAddChoferes').modal('hide');
                } else {

                    Toast.fire({
                        icon: 'error',
                        title: respuesta
                    });

                    $("#btnSaveChoferes").removeAttr("disabled");


                }

            }

        }

        )

    });



    /**
     * Carga datos actualizar
     */


    /*=============================================
     EDITAR Choferes
     =============================================*/
    $(".tableChoferes").on("click", ".btnEditChoferes", function () {

        var idChoferes = $(this).attr("idChoferes");

        var datos = new FormData();
        datos.append("idChoferes", idChoferes);

        $.ajax({

            url: "<?= base_url('admin/choferes/getChoferes') ?>",
            method: "POST",
            data: datos,
            cache: false,
            contentType: false,
            processData: false,
            dataType: "json",
            success: function (respuesta) {
                $("#idChoferes").val(respuesta["id"]);

                $("#idEmpresaChoferes").val(respuesta["idEmpresa"]);
                $("#idEmpresaChoferes").trigger("change");
                $("#nombre").val(respuesta["nombre"]);
                $("#Apellido").val(respuesta["Apellido"]);
                $("#tipoFigura").val(respuesta["tipoFigura"]);
                $("#tipoFigura").trigger("change");
                $("#RFCFigura").val(respuesta["RFCFigura"]);
                $("#numLicencia").val(respuesta["numLicencia"]);

                $("#codigoPostalChofer").val(respuesta["CodigoPostalFigura"]);

                var newOption = new Option(respuesta["PaisFigura"] + ' ' + respuesta["nombrePais"], respuesta["PaisFigura"], true, true);
                $('#paisChofer').append(newOption).trigger('change');
                $("#paisChofer").val(respuesta["paisFigura"]);

                var newOption = new Option(respuesta["EstadoFigura"] + ' ' + respuesta["nombreEstado"], respuesta["EstadoFigura"], true, true);
                $('#estadoChofer').append(newOption).trigger('change');
                $("#estadoChofer").val(respuesta["EstadoFigura"]);

                var newOption = new Option(respuesta["MunicipioFigura"] + ' ' + respuesta["nombreMunicipio"], respuesta["MunicipioFigura"], true, true);
                $('#municipioChofer').append(newOption).trigger('change');
                $("#municipioChofer").val(respuesta["MunicipioFigura"]);


            }

        })

    })


    /*=============================================
     ELIMINAR choferes
     =============================================*/
    $(".tableChoferes").on("click", ".btn-delete", function () {

        var idChoferes = $(this).attr("data-id");

        Swal.fire({
            title: '<?= lang('boilerplate.global.sweet.title') ?>',
            text: "<?= lang('boilerplate.global.sweet.text') ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '<?= lang('boilerplate.global.sweet.confirm_delete') ?>'
        })
                .then((result) => {
                    if (result.value) {
                        $.ajax({
                            url: `<?= base_url('admin/choferes') ?>/` + idChoferes,
                            method: 'DELETE',
                        }).done((data, textStatus, jqXHR) => {
                            Toast.fire({
                                icon: 'success',
                                title: jqXHR.statusText,
                            });


                            tableChoferes.ajax.reload();
                        }).fail((error) => {
                            Toast.fire({
                                icon: 'error',
                                title: error.responseJSON.messages.error,
                            });
                        })
                    }
                })
    })

    $(function () {
        $("#modalAddChoferes").draggable();

    });


</script>
<?= $this->endSection() ?>
        