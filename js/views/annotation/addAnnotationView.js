define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/annotation/annotationTemplate.html'
], function($, _, Backbone, AnnotationTemplate) {
	var AddAnnotationView = Backbone.View.extend({
		initialize: 	function() {
			_.bindAll(this, 'updatePreview');
			this.options.vent.bind('updatePreview', this.updatePreview);

			this.render();
		},

		el: 			$('.annotation-container'),

		events: 	{
			'click #add-annotation': 	'addAnnotation'
		},

		render: 		function() {
			var template = _.template(AnnotationTemplate, {preview: '', annotation: this.model.get('annotation')});
			this.$el.html(template);

			return this;
		},

		updatePreview: 	function(model) {
			this.$el.find('#selected-preview').text(model.attributes.selectedText);
		},

		addAnnotation: 	function(e) {
			//Sets the username and password headers for the REST action
			$.ajaxSetup({
				headers: { 
					X_REST_USERNAME: 'admin@restuser', 
					X_REST_PASSWORD: 'admin@Access'
				}
			});

			//Sets the annotation field in the model the text in the annotaion-text textarea.
			this.model.set('annotation', $('#annotation-text').val());
			console.log(this.model.isNew());
			//Performs the RESTful PUT action
			this.model.save();

			//Stops the form from submitting
			return false;
		}
	});

	return AddAnnotationView;
});