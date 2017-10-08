/*global $, alert, console */

$(function () {

	'use strict';

	$('.username').blur(function() {

		if ($(this).val().length <= 3) {

			console.log('this field needs 3 characters');

		}

	});

});