define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/annotation/annotationTemplate.html'
], function($, _, Backbone, AnnotationTemplate) {
	var AnnotationView = Backbone.View.extend({
		initialize: 	function() {
			_.bindAll(this, 'updatePreview');
			this.options.vent.bind('updatePreview', this.updatePreview);

			this.render();
		},

		el: 			$('.annotation-container'),

		render: 		function() {
			var template = _.template(AnnotationTemplate, {preview: '', annotation: this.model.get('annotation')});
			this.$el.html(template);

			return this;
		},

		updatePreview: 	function(model) {
			this.$el.find('#selected-preview').text(model.attributes.selectedText);
		}
	});

	return AnnotationView;
});