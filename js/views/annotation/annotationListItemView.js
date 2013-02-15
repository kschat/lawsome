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

			this.vent = this.options.vent;
		},
		
		template: 	_.template(AnnotationTemplate),

		render: 	function(e) {
			this.$el.html(this.template(this.model.toJSON()));

			return this;
		},

		events: {
			'click .load-comments': 		'loadComments',
			'mouseover div.accordion-group': 	'highLightText',
			'mouseout div.accordion-group': 	'unhighLightText'
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
			$.ajax({
				type: 'GET',
				url: 	'/documents/loadComments?annotation-id=' + $(e.target).attr('id'),
				dataType: 'json',
				complete: 	function(xhr, statusText) {
					$('body').die('click', '#ext-comment-submit');
					$('#comment-modal > .modal-body').empty().html(xhr.responseText);
				}
			});
		},

		highLightText: 			function(e) {
			this.vent.trigger('highlightAnnotation', {target: '#annotation-' + e.currentTarget.id.split('-')[1]});
		},

		unhighLightText: 			function(e) {
			this.vent.trigger('unhighlightAnnotation', {target: '#annotation-' + e.currentTarget.id.split('-')[1]});
		}
	});

	return AnnotationListItemView;
});