$(document).ready(function () {
    var table = $('#myTable').DataTable({
        
        processing: true,
        ordering: true,
        //serverSide: true,
        responsive: true,
        autoWidth: false,
        destroy: true,
        className: 'dt-center',
        backgroundColor: 'transparent',
        fontSize: 'large',
        
        
        
        /*
         order: [
            [0, 'desc']
        ], */
        "language": {
            "lengthMenu": "Mostrar " +
                '<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option><option value="-1">All</option></select>' +
                " registros por página",
            "zeroRecords": "No existe registros - disculpa",
            "info": "Mostrando la pagina _PAGE_ de _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtrado de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate": {
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
    });
    new $.fn.dataTable.Buttons(table, {
        buttons: [{
            extend: 'pdfHtml5',
            pageSize: 'TABLOID',
            text: '<i class="fa fa-file-pdf-o fa-lg" style="color: red"></i> PDF',
            download: 'open',
            className: 'bt-center',
            messageTop: 'Parque automotriz del taller:',
            title: 'Taller ENDESYC Oruro',
            orientation: 'portrait',
            pageSize: 'LETTER',
            alignment:'Center',
            autoWidth:'true',
            
            
            exportOptions: {
                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8 ,9]
            },
            customize: function (doc) {
                                                  
                doc.styles.title = {
                    color: 'blue',
                    fontSize: '40',
                    alignment: 'center',
                                                            
                    
                }
                
                doc.styles['td:nth-child(2)'] = {
                    className: 'dt-center',
                    backgroundcolor: 'red',
                    width: '100px',
                    color: 'red',
                    margin: 'auto',
                    border: 'solid 1px #ccc',
                    
                    
                    
                    'max-width': '100px'
                }

                doc.styles.tableHeader = {
                        bold: true,
                        fontSize: 11,
                        color: 'black',
                        fillColor: 'gold',
                        alignment: 'center',
                }
                doc.styles.table = {
                         alignment: 'center',
                }
                
            }
        },
        {
            extend: 'excel',
            text: '<i class="fa fa-file-excel-o fa-lg" style="color: green"></i> EXCEL',
            title: 'Parque automotriz del taller de Oruro',
            filename: 'Vehiculos'
        }
        , {
          extend: 'csv',
          text: '<i class="fa fa-file-code-o fa-lg" style="color: blue"></i> CSV',
          filename: 'Vehiculos'
        }
        ],
        

    });

    table.buttons(0, null).container().appendTo(
        table.table().container()
    );



 });
