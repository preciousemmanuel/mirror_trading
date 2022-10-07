$(function() {
	'use strict'
		// colored tooltip
		$('[data-bs-toggle="tooltip-primary"]').tooltip({
			template: '<div class="tooltip tooltip-primary" role="tooltip"><div class="tooltip-arrow"><\/div><div class="tooltip-inner"><\/div><\/div>'
		});
		$('[data-bs-toggle="tooltip-secondary"]').tooltip({
			template: '<div class="tooltip tooltip-secondary" role="tooltip"><div class="tooltip-arrow"><\/div><div class="tooltip-inner"><\/div><\/div>'
		});
});