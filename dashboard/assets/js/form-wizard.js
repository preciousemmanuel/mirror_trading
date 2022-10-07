$(function() {
	'use strict'
	$('#wizard1').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>'
	});
	$('#wizard2').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
		onStepChanging: function(event, currentIndex, newIndex) {
			if (currentIndex < newIndex) {
				// Step 1 form validation
				if (currentIndex === 0) {
					var fname = $('#firstname').parsley();
					var lname = $('#lastname').parsley();
					if (fname.isValid() && lname.isValid()) {
						return true;
					} else {
						fname.validate();
						lname.validate();
					}
				}
				// Step 2 form validation
				if (currentIndex === 1) {
					var email = $('#email').parsley();
					if (email.isValid()) {
						return true;
					} else {
						email.validate();
					}
				}
				// Always allow step back to the previous step even if the current step is not valid.
			} else {
				return true;
			}
		}
	});
	$('#wizard3').steps({
		headerTag: 'h3',
		bodyTag: 'section',
		autoFocus: true,
		titleTemplate: '<span class="number">#index#<\/span> <span class="title">#title#<\/span>',
		stepsOrientation: 1
	});

	// Toolbar extra buttons
	var btnFinish = $('<button></button>').text('Finish')
		.addClass('btn btn-primary')
		.on('click', function(){ alert('Finish Clicked'); });
	var btnCancel = $('<button></button>').text('Cancel')
		.addClass('btn btn-secondary')
		.on('click', function(){ $('#smartwizard-3').smartWizard("reset"); });


	// Smart Wizard
	$('#smartwizard').smartWizard({
			selected: 0,
			theme: 'default',
			transitionEffect:'fade',
			showStepURLhash: true,
			toolbarSettings: {
							  toolbarButtonPosition: 'end',
							  toolbarExtraButtons: [btnFinish, btnCancel]
							}
	});
		
	// Arrows Smart Wizard 1
	$('#smartwizard-1').smartWizard({
			selected: 0,
			theme: 'arrows',
			transitionEffect:'fade',
			showStepURLhash: false,
			toolbarSettings: {
							  toolbarExtraButtons: [btnFinish, btnCancel]
							}
	});
			
	// Circles Smart Wizard 1
	$('#smartwizard-2').smartWizard({
			selected: 0,
			theme: 'circles',
			transitionEffect:'fade',
			showStepURLhash: false,
			toolbarSettings: {
							  toolbarExtraButtons: [btnFinish, btnCancel]
							}
	});
			
	// Dots Smart Wizard 1
	$('#smartwizard-3').smartWizard({
			selected: 0,
			theme: 'dots',
			transitionEffect:'fade',
			showStepURLhash: false,
			toolbarSettings: {
							  toolbarExtraButtons: [btnFinish, btnCancel]
							}
	});

	$('.dropify').dropify({
		messages: {
			'default': 'Drag and drop a file here or click',
			'replace': 'Drag and drop or click to replace',
			'remove': 'Remove',
			'error': 'Ooops, something wrong appended.'
		},
		error: {
			'fileSize': 'The file size is too big (2M max).'
		}
	});

	//fancyfileuplod
	$('#demo').FancyFileUpload({
		params : {
		 action : 'fileuploader'
		},
		maxfilesize : 1000000
		});
});