$(function() {
	'use strict'
    //Colored Head Popover
    var popover = new bootstrap.Popover(document.querySelector('[data-bs-popover-color="head-primary"]'), {
		template: '<div class="popover popover-head-primary" role="popover"><div class="tooltip-arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	})
	var popover = new bootstrap.Popover(document.querySelector('[data-bs-popover-color="head-secondary"]'), {
		template: '<div class="popover popover-head-secondary" role="popover"><div class="tooltip-arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	})

    //Full Colored Popover
	var popover = new bootstrap.Popover(document.querySelector('[data-bs-popover-color="primary"]'), {
		template:'<div class="popover popover-primary" role="popover"><div class="tooltip-arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	})
	var popover = new bootstrap.Popover(document.querySelector('[data-bs-popover-color="secondary"]'), {
		template: '<div class="popover popover-secondary" role="popover"><div class="tooltip-arrow"><\/div><h3 class="popover-header"><\/h3><div class="popover-body"><\/div><\/div>'
	})
	
	$(document).on('click', function (e) {
		$('[data-bs-toggle="popover"],[data-original-title]').each(function () {
			//the 'is' for buttons that trigger popups
			//the 'has' for icons within a button that triggers a popup
			if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
				(($(this).popover('hide').data('bs.popover')||{}).inState||{}).click = false  // fix for BS 3.3.6
			}

		});
	  });
		
});