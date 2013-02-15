define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/annotation/annotationTemplate.html',
	'models/annotation/annotationModel'
], function($, _, Backbone, AnnotationTemplate, AnnotationModel) {
	var AddAnnotationView = Backbone.View.extend({
		initialize: 	function(options) {
			//Bind 'this' with updatePreivew, bind the 'updatePreivew' event with
			//the updatePreview method for this object.
			_.bindAll(this, 'updatePreview', 'saveSuccess', 'saveError');
			this.options.vent.bind('updatePreview', this.updatePreview);
			
			this.vent = this.options.vent;
			this.render();
		},

		el: 			$('.add-annotation-container'),

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

		saveSuccess: 	function() {
			//Trigger the annotationAdded event and pass this views model to it; then replace
			//this views old model with a new one. Finally, re-render the view.
			this.vent.trigger('annotationAdded', this.model);
			this.model = new AnnotationModel();
			this.render();
		},

		saveError: 		function() {

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
			this.model.set({  annotation: $('#add-annotation-text').val(), title: $('#add-annotation-title').val() });

			//Performs the RESTful POST action
			this.model.save({}, {
				success: 	this.saveSuccess,
				error: 	this.saveError
			});

			//Stops the form from submitting
			return false;
		}
	});

	return AddAnnotationView;
});