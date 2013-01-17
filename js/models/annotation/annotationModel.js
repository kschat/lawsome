define([
	'jquery',
	'underscore',
	'backbone'
], function($, _, Backbone) {
	var AddAnnotationModel = Backbone.Model.extend({
		defaults: {
			preview: 		'preview',
			title: 			'',
			annotation: 	'Enter annotation here'
		},

		url: 	'/documents/'
	});

	return AddAnnotationModel;
});