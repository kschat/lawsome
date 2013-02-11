define([
	'jquery',
	'underscore',
	'backbone'
], function($, _, Backbone) {
	var AnnotationModel = Backbone.Model.extend({
		initialize: function() {
			
		},
		defaults: {
			title: 			'',
			annotation: 	''
		},
		url: 	'/api/annotations/',
		parse: 	function(response) {
			if(response[0]) {
				return response[0];
			}

			return response;
		}
	});

	return AnnotationModel;
});