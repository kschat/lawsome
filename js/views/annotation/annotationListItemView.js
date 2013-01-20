define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/annotation/annotationListItemTemplate.html'
], function($, _, Backbone, AnnotationTemplate) {
	var AnnotationListItemView = Backbone.View.extend({
		template: 	_.template(AnnotationTemplate),

		render: 	function(e) {
			this.$el.html(this.template(this.model.toJSON()));
			
			return this;
		}
	});

	return AnnotationListItemView;
});