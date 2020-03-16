$('#ship-table').DataTable( {
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal( {
                header: function ( row ) {
                    var data = row.data();
                    return 'Details for '+data[0]+' '+data[1];
                }
            } ),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                tableClass: 'table'
            } )
        }
    },
} );
$('#user-table').DataTable( {
    responsive: {
        details: {
            display: $.fn.dataTable.Responsive.display.modal( {
                header: function ( row ) {
                    var data = row.data();
                    return 'Details for '+data[0]+' '+data[1];
                }
            } ),
            renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                tableClass: 'table'
            } )
        }
    },
} );

$('.deleteUser').on('click', function(){
    return confirm("Do you wish do delete this user?");
})

$('.admin').on('click', function(){
    alert("You can't delete admins");
})