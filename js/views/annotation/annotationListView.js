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
			this.model.bind('add', this.render, this);

			_.bindAll(this, 'annotationAdded');
			this.options.vent.bind('annotationAdded', this.annotationAdded);
		},

		el: 	$('.annotation-list-container'),

		render: 		function(e) {
			if(this.model.models.length === 0) {
				this.$el.html('<div class="panel">There aren\'t any annotations on this document.</div>');
			}
			else {
				this.$el.html('');
				_.each(this.model.models, function(m) {
					//Appends a new AnnotationListItemView to the list and adds it to the DOM
					this.$el.append(new AnnotationListItemView({model: m, vent: this.options.vent}).render().el);
				}, this);
			}

			return this;
		},

		annotationAdded: 	function(m) {
			this.$el.html('');
			this.model.add(m);
		}
	});

	return AnnotationListView;
});