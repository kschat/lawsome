define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/annotation/annotationListItemTemplate.html'
], function($, _, Backbone, AnnotationTemplate) {
	var AnnotationListItemView = Backbone.View.extend({
		initialize: 	function() {
			_.bindAll(this, 'annotationHover', 'annotationHoverOff');
			this.options.vent.bind('annotationHover', this.annotationHover);
			this.options.vent.bind('annotationHoverOff', this.annotationHoverOff);
			this.options.vent.bind('annotationClicked', this.giveAnnotationFocus);
		},
		
		template: 	_.template(AnnotationTemplate),

		render: 	function(e) {
			this.$el.html(this.template(this.model.toJSON()));

			return this;
		},

		events: {
			'click .load-comments': 	'loadComments'
		},

		annotationHover: 	function(e) {
			//Parse the annotation ID from the clicked elements id attribute
			var annotationID = $(e).attr('id').split('-')[1];
			this.$el.find('#accordion-' + annotationID).addClass('annotation-hover');
		},

		annotationHoverOff: 	function(e) {
			//Parse the annotation ID from the clicked elements id attribute
			var annotationID = $(e).attr('id').split('-')[1];
			this.$el.find('#accordion-' + annotationID).removeClass('annotation-hover');
		},

		giveAnnotationFocus: 	function(e) {
			//Parse the annotation ID from the clicked elements id attribute
			var annotationID = $(e).attr('id').split('-')[1];
			//Show the corrisponding accordion node
			$('#collapse-' + annotationID).collapse('show');
		},

		loadComments: 			function(e) {
			console.log($(e.target).attr('id'));
			$.ajax({
				type: 'GET',
				url: 	'/documents/loadComments?annotation-id=' + $(e.target).attr('id'),
				dataType: 'json',
				complete: 	function(xhr, statusText) {
					
					$('#comment-modal > .modal-body').html(xhr.responseText);
				}
			});

			//return false;
		}
	});

	return AnnotationListItemView;
});