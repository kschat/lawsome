define([
	'jquery',
	'underscore',
	'backbone'
], function($, _, Backbone) {
	var AnnotationModel = Backbone.Model.extend({
		defaults: {
			title: 			'',
			annotation: 	'Enter annotation here'
		},

		url: 	'/documents/'
	});

	return AnnotationModel;
});