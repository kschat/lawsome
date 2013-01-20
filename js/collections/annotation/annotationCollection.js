define([
	'jquery',
	'underscore',
	'backbone',
	'models/annotation/annotationModel'
], function($, _, Backbone, AnnotationModel) {
	var AnnotationCollection = Backbone.Collection.extend({
		model: 	AnnotationModel,
		url: 	'/api/annotations/'
	});

	return AnnotationCollection;
});