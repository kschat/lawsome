define([
	'jquery',
	'underscore',
	'backbone',
	'text!templates/document/documentTemplate.html'
], function($, _, Backbone, DocumentTemplate) {
	var DocumentView = Backbone.View.extend({
		el: 			$('#document-1'),

		events: 		{
			'mouseup .document': 	'textSelected'
		},		

		initialize: 	function() {
			this.render();
		},

		render: 		function() {
			var template = _.template(DocumentTemplate, {documentText: this.model.get('documentText')});
			this.$el.html(template);
			return this;
		},

		textSelected: 	function(e) {
			this.model.updateSelectedText(e);
		}
	});

	return DocumentView;
});