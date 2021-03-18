$(document).on('ready', function () {
    $('#Btn_guardarUs').click(function () {
        var url = "../php/Guardar_us.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#FormularioGuardarUs").serialize(),
            success: function (data) {
                console.log(data);
                if (data == "Ok") {
                    swal({
                        title: "Aviso de proceso!",
                        text: "Se ha guardado con exito!",
                        icon: "success",
                        button: "Aceptar!",
                    });
                }
                if (data == "Error") {
                    swal({
                        title: "Aviso de proceso!",
                        text: "El Nickname que eligio, ya esta ocupado!",
                        icon: "error",
                        button: "Aceptar!",
                    });
                }


            }
        });

    });
});

// function Genera_Reporte() {

//     var Opc1 = $('#Opcion1:checked').val();
//     var Opc2 = $('#Opcion2:checked').val();
//     var Opc3 = $('#Opcion3:checked').val();
//     var Opc4 = $('#Opcion4:checked').val();
//     var Opc5 = $('#Opcion5:checked').val();
//     var Dato = $("#FirmadoPor").val();
//     var Clasificacion = $("#Clasificacion").val();
//     var Mes = $("#Mes").val();
//     var Area = $("#Areas").val();
//     var Anio = $("#Anio").val();

//     var url = "../php/Reportes.php";
//     $.ajax({
//         type: "POST",
//         data: {
//             'Opcion1': Opc1,
//             'Opcion2': Opc2,
//             'Opcion3': Opc3,
//             'Opcion4': Opc4,
//             'Opcion5': Opc5,
//             'Clasificacion': Clasificacion,
//             'Areas': Area,
//             'Parametro': Dato,
//             'Parametro2': Anio,
//             'Parametro3': Mes
//         },
//         url: url,
//         success: function (data) {
//             console.log(data);
//             swal({
//                 title: "Aviso de proceso!",
//                 text: "El reporte se a realizado con exito!, de click sobre el boton 'Excel' para descargar",
//                 icon: "success",
//                 button: "Aceptar!",
//             })
//             $("#Reportes").dataTable().fnDestroy();
//             TablaReportes();
//             $('#Reporte').html(data)
//         }
//     });
// }

function Genera_Reporte() {

    var Opc1 = $('#Opcion1:checked').val();
    var Opc2 = $('#Opcion2:checked').val();
    var Opc3 = $('#Opcion3:checked').val();
    var Opc4 = $('#Opcion4:checked').val();
    var Opc5 = $('#Opcion5:checked').val();
    var Dato = $("#FirmadoPor").val();
    var Clasificacion = $("#Clasificacion").val();
    var Mes = $("#Mes").val();
    var Area = $("#Areas").val();
    var Anio = $("#Anio").val();

    var url = "../php/Reportes.php";
    $.ajax({
        type: "POST",
        data: {
            'Opcion1': Opc1,
            'Opcion2': Opc2,
            'Opcion3': Opc3,
            'Opcion4': Opc4,
            'Opcion5': Opc5,
            'Clasificacion': Clasificacion,
            'Areas': Area,
            'Parametro': Dato,
            'Parametro2': Anio,
            'Parametro3': Mes
        },
        url: url,
        success: function (data) {
            console.log(data);

            class XlsExport {
                // data: array of objects with the data for each row of the table
                // name: title for the worksheet
                constructor(data, title = 'Worksheet') {
                  // input validation: new xlsExport([], String)
                  if (!Array.isArray(data) || (typeof title !== 'string' || Object.prototype.toString.call(title) !== '[object String]')) {
                    throw new Error('Invalid input types: new xlsExport(Array [], String)');
                  }
              
                  this._data = data;
                  this._title = title;
                }
              
                set setData(data) {
                  if (!Array.isArray(data)) throw new Error('Invalid input type: setData(Array [])');
              
                  this._data = data;
                }
              
                get getData() {
                  return this._data;
                }
              
                exportToXLS(fileName = 'export.xls') {
                  if (typeof fileName !== 'string' || Object.prototype.toString.call(fileName) !== '[object String]') {
                    throw new Error('Invalid input type: exportToCSV(String)');
                  }
              
                  const TEMPLATE_XLS = `
                      <html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40">
                      <meta http-equiv="content-type" content="application/vnd.ms-excel; charset=UTF-8"/>
                      <head><!--[if gte mso 9]><xml>
                      <x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{title}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml>
                      <![endif]--></head>
                      <body>{table}</body></html>`;
                  const MIME_XLS = 'application/vnd.ms-excel;base64,';
              
                  const parameters = {
                    title: this._title,
                    table: this.objectToTable(),
                  };
                  const computeOutput = TEMPLATE_XLS.replace(/{(\w+)}/g, (x, y) => parameters[y]);
              
                  const computedXLS = new Blob([computeOutput], {
                    type: MIME_XLS,
                  });
                  const xlsLink = window.URL.createObjectURL(computedXLS);
                  this.downloadFile(xlsLink, fileName);
                }
              
                exportToCSV(fileName = 'export.csv') {
                  if (typeof fileName !== 'string' || Object.prototype.toString.call(fileName) !== '[object String]') {
                    throw new Error('Invalid input type: exportToCSV(String)');
                  }
                  const computedCSV = new Blob([this.objectToSemicolons()], {
                    type: 'text/csv;charset=utf-8',
                  });
                  const csvLink = window.URL.createObjectURL(computedCSV);
                  this.downloadFile(csvLink, fileName);
                }
              
                downloadFile(output, fileName) {
                  const link = document.createElement('a');
                  document.body.appendChild(link);
                  link.download = fileName;
                  link.href = output;
                  link.click();
                }
              
                toBase64(string) {
                  return window.btoa(unescape(encodeURIComponent(string)));
                }
              
                objectToTable() {
                  // extract keys from the first object, will be the title for each column
                  const colsHead = `<tr>${Object.keys(this._data[0]).map(key => `<td>${key}</td>`).join('')}</tr>`;
              
                  const colsData = this._data.map(obj => [`<tr>
                              ${Object.keys(obj).map(col => `<td>${obj[col] ? obj[col] : ''}</td>`).join('')}
                          </tr>`]) // 'null' values not showed
                    .join('');
              
                  return `<table>${colsHead}${colsData}</table>`.trim(); // remove spaces...
                }
              
                objectToSemicolons() {
                  const colsHead = Object.keys(this._data[0]).map(key => [key]).join(';');
                  const colsData = this._data.map(obj => [ // obj === row
                    Object.keys(obj).map(col => [
                      obj[col], // row[column]
                    ]).join(';'), // join the row with ';'
                  ]).join('\n'); // end of row
              
                  return `${colsHead}\n${colsData}`;
                }
              }
            let json = JSON.parse(data);
            const xls = new XlsExport(json, "Concentrado");
            xls.exportToXLS('export.xls');
            swal({
                title: "Aviso de proceso!",
                text: "El reporte se a realizado con exito!",
                icon: "success",
                button: "Aceptar!",
            })
            $("#Reportes").dataTable().fnDestroy();
            TablaReportes();
            $('#Reporte').html(data)
        }
    });
}

function Genera_ReporteB() {

    var Dato = $("#FirmadoPor").val();
    var Anio = $("#Anio").val();
    var url = "../php/ReportesB.php";
    $.ajax({
        type: "POST",
        data: {
            'Parametro': Dato,
            'Parametro2': Anio
        },
        url: url,
        success: function (data) {
            console.log(data);
            swal({
                title: "Aviso de proceso!",
                text: "El reporte se a realizado con exito!, de click sobre el boton 'Excel' para descargar",
                icon: "success",
                button: "Aceptar!",
            })
            // $("#Reportes").dataTable().fnDestroy();
            // TablaReportes();
            $('#Reporte').html(data)
        }
    });
 
}

function TablaReportes() {
    $(document).ready(function () {
        $('#Reportes').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            "ordering": false,
            "searching": false,
            "paging": false,
            dom: 'Bfrtip',
            buttons: [
                'excel'
            ]
        });
    });
}

function Seguimiento(id) {
    var url = "../php/IdDetalle.php";
    $.ajax({
        type: "POST",
        data: {
            'IdRep': id
        },
        url: url,
        success: function (data) {
            $("#IdDetalle").val(data);
        }
    });
}

function VerSeguimiento(id) {

    var folio = id;
    $.post("../php/VerSeguimiento.php", {
        Fo: folio
    }, function (resp) {
        $("#data").html(resp);
    });

}


$(document).on('ready', function () {
    $('#SeguimientoBtn').click(function () {
        var url = "../php/Guardar_seguimiento.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#FormSeguimiento").serialize(),
            success: function (data) {
                console.log(data);
                swal({
                    title: "Aviso de proceso!",
                    text: "Se ha guardado con exito!",
                    icon: "success",
                    button: "Aceptar!",
                })
            }
        });
    });
});

function SumarFolio() {
    var url = "../php/SumarFolio.php";
    $.ajax({
        type: "POST",
        url: url,
        success: function (data) {
            console.log(data);
            $("#TNumero").val(data);
        }
    });
}


$(document).on('ready', function () {
    $('#Btn_guardarArea').click(function () {
        var url = "../php/Guardar_area.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#FormularioGuardarArea").serialize(),
            success: function (data) {
                swal({
                    title: "Aviso de proceso!",
                    text: "Se ha guardado con exito!",
                    icon: "success",
                    button: "Aceptar!",
                }).then((result) => {
                    $("#NuevoArea").modal("hide");
                });
            }
        });

    });
});


function VerTurno(id) {
    $.ajax({
            type: 'POST',
            url: '../php/Informacion_turno.php',
            data: {
                'IdRep': id
            }
        })

        .done(function (listas_rep) {
            $('#Editar_informacion').html(listas_rep)
        })

        .fail(function () {
            swal({
                title: "Error al cargar la información!",
                text: "Vuelva a intentarlo",
                icon: "error",
                timer: 3000,
                buttons: false,
            }).then((result) => {
                $("#EditarReporte").modal("hide");
            });
            $('#Editar_informacion').html("<h3 style='color:red;margin:auto;'>No se cargo la información!</h3>")
        })
}

function VerTurnoB(id) {
    $.ajax({
            type: 'POST',
            url: '../php/Informacion_turnoB.php',
            data: {
                'IdRep': id
            }
        })

        .done(function (listas_rep) {
            $('#Editar_informacionB').html(listas_rep)
        })

        .fail(function () {
            swal({
                title: "Error al cargar la información!",
                text: "Vuelva a intentarlo",
                icon: "error",
                timer: 3000,
                buttons: false,
            }).then((result) => {
                $("#EditarReporte").modal("hide");
            });
            $('#Editar_informacionB').html("<h3 style='color:red;margin:auto;'>No se cargo la información!</h3>")
        })
}

function TunarV(id) {
    var Dato = id;
    $("#NumTurno").val(Dato);

}

function AdjuntarV(id) {
    var Dato = id;
    $("#ArchivoTurno").val(Dato);
}


function Editar_user(id) {
    $.ajax({
            type: 'POST',
            url: '../php/Informacion_user.php',
            data: {
                'IdRep': id
            }
        })

        .done(function (listas_rep) {
            $('#Editar_informacion').html(listas_rep)
        })

        .fail(function () {
            swal({
                title: "Error al cargar la información!",
                text: "Vuelva a intentarlo",
                icon: "error",
                timer: 3000,
                buttons: false,
            });
        })
}


$(document).on('ready', function () {
    $('#Btn_EditarUser').click(function () {
        var url = "../php/EditarUser.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#FormularioEditarUser").serialize(),
            success: function (data) {
                console.log(data);
                swal({
                    title: "Aviso de proceso!",
                    text: "Se ha guardado con exito!",
                    icon: "success",
                    button: "Aceptar!",
                }).then((result) => {
                    $("#EditarUser").modal("hide");
                });
            }
        });

    });
});

$(document).on('ready', function () {
    $('#Btn_EditarTurno').click(function () {
        var url = "../php/EditarTurno.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#FormularioEditarTurno").serialize(),
            success: function (data) {
                console.log(data);
                swal({
                    title: "Aviso de proceso!",
                    text: "Se ha guardado con exito!",
                    icon: "success",
                    button: "Aceptar!",
                }).then((result) => {
                    $("#TurnarV").modal("hide");
                });
            }
        });

    });
});

$(document).on('ready', function () {
    $('#Btn_EditarTurnoB').click(function () {
        var url = "../php/EditarTurnoB.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#FormularioEditarTurnob").serialize(),
            success: function (data) {
                console.log(data);
                swal({
                    title: "Aviso de proceso!",
                    text: "Se ha guardado con exito!",
                    icon: "success",
                    button: "Aceptar!",
                }).then((result) => {
                    $("#TurnarV").modal("hide");
                });
            }
        });

    });
});


$(document).on('ready', function () {
    $('#Btn_Turnar').click(function () {
        var url = "../php/Turnar.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#TurnarVolante").serialize(),
            success: function (data) {
                if (data == "") {
                    swal({
                        title: "Aviso de proceso!",
                        text: "Se ha guardado con exito!",
                        icon: "success",
                        button: "Aceptar!",
                    }).then((result) => {
                        $("#TurnarV").modal("hide");
                    });
                } else {
                    swal({
                        title: "No se puede turnar a la misma area dos veces!",
                        text: "Las siguientes areas fueron " + data,
                        icon: "error",
                        timer: 3000,
                        buttons: false,
                    });
                }
            }
        });

    });
});

$(document).on('ready', function () {
    $('#Btn_Turnado').click(function () {
        var url = "../php/Turnado.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#TurnadoVolante").serialize(),
            success: function (data) {
                console.log(data);
                swal({
                        title: "Aviso de proceso",
                        text: "Se ha guardado con exito, ¿Desea imprimir el volante?",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $("#TurnarV").modal("hide");
                            window.open("../Pdf/print.php?Id=" + data, '_blank');
                        }
                    });
            }
        });
        document.getElementById("TurnadoVolante").reset();
        $('#NuevoReporte').modal('hide');


    });
});





function Editar_area(id) {
    $.ajax({
            type: 'POST',
            url: '../php/Informacion_Area.php',
            data: {
                'IdRep': id
            }
        })

        .done(function (listas_rep) {
            $('#Editar_informacion').html(listas_rep)
        })

        .fail(function () {
            swal({
                title: "Error al cargar la información!",
                text: "Vuelva a intentarlo",
                icon: "error",
                timer: 3000,
                buttons: false,
            });
            $('#Editar_informacion').html("<h3 style='color:red;margin:auto;'>No se cargo la información!</h3>")
        })
}


function NuevoResp(id) {
    var Dato = id;

    document.getElementById("IdArea").value = Dato;
}

function Tabla() {
    $(document).ready(function () {
        $('#Tablainfo').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json"
            },
            dom: 'Bfrtip',
            buttons: [
              'excel'
        ],
            "initComplete": function () {
                var api = this.api();
                api.$('#f').click(function () {
                    api.search(this.innerHTML).draw();
                });
            }
        });
    });
}


$(document).on('ready', function () {
    $('#BtnFiltro').click(function () {
        $('#InfoFiltro').html('<div class="loading"><img src="../Img/loader.gif" alt="loading" /><br/>Un momento, por favor...</div>');

        var url = "../php/InfoFiltro.php";

        $.ajax({
                type: "POST",
                url: url,
                data: $("#Filtro").serialize()
            })
            .done(function (listas_rep) {
                $("#Tablainfo").dataTable().fnDestroy();
                Tabla();
                $('#InfoFiltro').html(listas_rep)

            })
    });
});


$(document).on('ready', function () {
    $('#Btn_GuardarResp').click(function () {
        var url = "../php/GuardarResp.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#FormGuardarResp").serialize(),
            success: function (data) {
                swal({
                    title: "Aviso de proceso!",
                    text: "Se ha guardado con exito!",
                    icon: "success",
                    button: "Aceptar!",
                })
            }
        });
    });
});

function ImprTurno() {

    var valor = document.getElementById("IdTurno").value;
    window.open("../Pdf/print.php?Id=" + valor, '_blank');

}

$(document).on('ready', function () {
    $('#Btn_EditarArea').click(function () {
        var url = "../php/Editar_area.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#FormularioEditarArea").serialize(),
            success: function (data) {
                swal({
                    title: "Aviso de proceso!",
                    text: "Se ha guardado con exito!",
                    icon: "success",
                    button: "Aceptar!",
                });


            }
        });

    });
});

function ImpresionPrincipal() {
    var filtro = "";
    var cont = 0;
    var Informacion = "";
    var Parametro = "";

    $('input[name="FilImprimir[]"]:checked').each(function () {
        cont++;
        var dato = $(this).prop("id");
        if (cont > 1) {
            filtro += "&Id" + cont + "=" + dato;
        } else {
            filtro += "Id" + cont + "=" + dato;
        }
    });

    if (filtro == "") {

        swal({
            title: "Error de proceso!",
            text: "Necesita elegir al menos un registro.",
            icon: "error",
            buttons: false,
        });
    } else {
        window.open("../Pdf/print2.php?" + filtro + "&Cantidad=" + cont, '_blank');
    }
}

function uploadAjax() {
    var inputFileImage = document.getElementById("archivoImage");
    var file = inputFileImage.files[0];
    var data = new FormData();
    data.append('archivo', file);
    var Idt = document.getElementById("ArchivoTurno").value;
    var AT = document.getElementById("ATipo").value;
    data.append('TurnoN', Idt);
    data.append('AT', AT);
    var url = "../php/AOrigen.php";
    $.ajax({
        url: url,
        type: 'POST',
        contentType: false,
        data: data,
        processData: false,
        cache: false,
        success: function (data) {
            console.log(data);
            if (data == "Si") {
                swal({
                    title: "Aviso de proceso!",
                    text: "Se ha guardado con exito!",
                    icon: "success",
                    button: "Aceptar!",
                })
            } else {
                swal({
                    title: "Aviso de proceso!",
                    text: "Necesita elegir un archivo!",
                    icon: "error",
                    timer: 3000,
                    buttons: false,
                });
            }
        }
    });

}


function Cambiar() {

    $('#TurnadoA').show(); //muestro mediante id
    $('#Captura').hide(); //muestro mediante id

}

function Cambiar2() {

    $('#TurnadoA').hide(); //muestro mediante id
    $('#Captura').show(); //muestro mediante id
}

$(document).on('ready', function () {
    $('#Btn_Turnado_Otro_Anyo').click(function () {
        var url = "../php/Turnado.php";
        $.ajax({
            type: "POST",
            url: url,
            data: $("#TurnadoVolanteOtroAnyo").serialize(),
            success: function (data) {
                console.log(data);
                swal({
                        title: "Aviso de proceso",
                        text: "Se ha guardado con exito, ¿Desea imprimir el volante?",
                        icon: "success",
                        buttons: true,
                        dangerMode: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            $("#TurnarV").modal("hide");
                            window.open("../Pdf/print.php?Id=" + data, '_blank');
                        }
                    });
            }
        });
        document.getElementById("TurnadoVolanteOtroAnyo").reset();
        $('#NuevoReporteAnyoOtro').modal('hide');
    });
});

function asignaFolio(date) {
    let url = "../php/SumarFolioAnyoOtro.php";
    let fecha = date.substring(0,4);
     $.ajax({
         type: "POST",
         url: url,
         data: {'fecha': fecha},
         success: function (data) {
             $("#TNumeroOtro").val(data);
         }
     });
}