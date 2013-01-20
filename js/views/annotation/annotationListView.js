define([
	'jquery',
	'underscore',
	'backbone',
	'views/annotation/annotationListItemView'
], function($, _, Backbone, AnnotationListItemView) {
	var AnnotationListView = Backbone.View.extend({
		initialize: 	function() {
			//Rerenders the list whenever the model has been reset (updated)
			this.model.bind('reset', this.render, this);
		},

		el: 	$('#annotation-list'),

		render: 		function(e) {
			_.each(this.model.models, function(m) {
				//Appends a new AnnotationListItemView to the list and adds it to the DOM
				this.$el.append(new AnnotationListItemView({model: m}).render().el);
			}, this);

			return this;
		}
	});

	return AnnotationListView;
});