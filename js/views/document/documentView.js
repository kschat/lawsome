define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/document/documentTemplate.html'
], function($, _, Backbone, DocumentTemplate) {
	var DocumentView = Backbone.View.extend({
		initialize: 	function(options) {
			_.bindAll(this, 'annotationAdded', 'highlightText', 'unhighlightText');
			this.options.vent.bind('annotationAdded', this.annotationAdded);
			this.options.vent.bind('highlightAnnotation', this.highlightText);
			this.options.vent.bind('unhighlightAnnotation', this.unhighlightText);

			this.vent = options.vent;
			this.render();
		},

		el: 			$('.document-container'),

		events: 		{
			'mouseup .document': 		'textSelected',
			'mouseover .reference': 	'triggerHighlight',
			'mouseout .reference': 		'triggerUnhighlight',
			'click .reference': 		'annotationClicked'
		},

		render: 		function() {
			//var template = _.template(DocumentTemplate, {documentText: this.model.get('documentText')});
			//this.$el.html(template);
			return this;
		},

		//Function called when the mouse up action occurs in the .document DOM element.
		//Checks if the selected text was changed. If it was trigger the textSelected 
		//action with this views model and it's context.
		textSelected: 	function(e) {
			if(this.model.updateSelectedText(e)) {
				this.vent.trigger('updatePreview', this.model);
				var sel = this.model.getHighlightedText();

				//Tests that the selection is greater than 0
				if(sel.rangeCount) {
					//Find the old temp highlighted element (if any) and remove the span around it.
					var content = $('.temp-highlight').contents();
					$('.temp-highlight').replaceWith(content);

					//Create the span element that will highlight the selection
					var spanElement = document.createElement('span');
					spanElement.setAttribute('class', 'temp-highlight');

					//clone the range and surround it with the span element we made above
					//Needs to be updated to deal with muti-range selections
					try {
						var range = sel.getRangeAt(0).cloneRange();
						range.surroundContents(spanElement);
					}
					catch(ex) {

					}
				}
			}
		},

		annotationAdded: 	function(m) {
			this.$el.find('.temp-highlight').removeClass().addClass('reference').attr('id', 'annotation-' + m.id);
			this.model.set({text: $('.document > div#document-text').html()});

			this.model.save({}, {
				success: 	function() {
				},
				error: 		function() {
				}
			});
		},

		highlightText: 	function(e) {
			$(e.target).addClass('highlight-annotation');
		},

		triggerHighlight: function(e) {
			this.highlightText(e);
			this.vent.trigger('annotationHover', $(e.target));
		},

		unhighlightText: 	function(e) {
			$(e.target).removeClass('highlight-annotation');
		},

		triggerUnhighlight: function(e) {
			this.unhighlightText(e);
			this.vent.trigger('annotationHoverOff', $(e.target));
		},


		annotationClicked: 	function(e) {
			this.vent.trigger('annotationClicked', e.target);
		}
	});

	return DocumentView;
});