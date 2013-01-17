define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/document/documentTemplate.html'
], function($, _, Backbone, DocumentTemplate) {
	var DocumentView = Backbone.View.extend({
		initialize: 	function(options) {
			this.vent = options.vent;
			this.render();
		},

		el: 			$('#document-1'),

		events: 		{
			'mouseup .document': 	'textSelected'
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
			}
		}
	});

	return DocumentView;
});