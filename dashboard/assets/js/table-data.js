$(function(e) {		
	
	$('#example1').DataTable({
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			
		}
	});
	
	$('#example2').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			"scrollX": false
		}
	});

	//file export datatable
	var table = $('#example').DataTable({
		lengthChange: false,
		buttons: [ 'copy', 'excel', 'pdf', 'colvis' ],
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
			
		}
	});
	table.buttons().container()
	.appendTo( '#example_wrapper .col-md-6:eq(0)' );
	
	var table = $('#example-delete').DataTable({
		responsive: true,
		language: {
			searchPlaceholder: 'Search...',
			sSearch: '',
		}
	});

    $('#example-delete tbody').on( 'click', 'tr', function () {
        if ( $(this).hasClass('selected') ) {
            $(this).removeClass('selected');
        }
        else {
            table.$('tr.selected').removeClass('selected');
            $(this).addClass('selected');
        }
    } );
 
    $('#button').click( function () {
        table.row('.selected').remove().draw( false );
    } );

	
    // $('table').on('draw.dt', function() {
    //     $('.select2').select2({
    //         minimumResultsForSearch: Infinity,
    //         placeholder: 'Choose one'
    //     });
    // });

    //______Select2 
    $('.select2').select2({
        minimumResultsForSearch: Infinity
    });
	
});