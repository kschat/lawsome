define([
	'jquery',
	'underscore',
	'backbone'
], function($, _, Backbone) {
	var AnnotationModel = Backbone.Model.extend({
		initialize: function() {
			
		},
		defaults: {
			annotation: 	''
		},
		url: 	'/api/annotations/'
	});

	return AnnotationModel;
});