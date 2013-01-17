define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/annotation/annotationTemplate.html'
], function($, _, Backbone, DocumentTemplate) {
	var DocumentView = Backbone.View.extend({
		el: 			$('.annotation-container'),

		events: 		{
			'mouseup .document': 	'updatePreview'
		},		

		initialize: 	function() {
			this.render();
		},

		render: 		function() {
			var template = _.template(DocumentTemplate, {preview: this.model.get('preview'), annotation: this.model.get('annotation')});
			this.$el.html(template);
			return this;
		},

		updatePreview: 	function(e) {
			//this.model.preview = 
		}
	});

	return DocumentView;
});