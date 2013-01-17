define([
	'jquery',
	'underscore',
	'backbone'
], function($, _, Backbone) {
	var DocumentModel = Backbone.Model.extend({
		defaults: {
			selectedText: 	'',
			documentText: 	''
		},

		url: 	'/documents/',

		getHighlightedText: 	function() {
			var text = '';

			if(window.getSelectedText) {
				text = window.getSelectedText();
			}
			else if(document.getSelection) {
				text = document.getSelection();
			}
			else if(document.selection) {
				text = document.selection.createRange().text;
			}

			return text;
		},

		updateSelectedText: 	function(e) {
			var selText = this.getHighlightedText(),
				targetElem = e.target.tagName.toLowerCase();

			if(selText && targetElem == 'div') {
				this.attributes.selectedText = selText;
			}
		}
	});

	return DocumentModel;
});