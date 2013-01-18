define([
	'jquery',
	'underscore',
	'backbone',
	'rangy'
], function($, _, Backbone, rangy) {
	var DocumentModel = Backbone.Model.extend({
		defaults: {
			selectedText: 	'',
			documentText: 	''
		},

		url: 	'/add/',

		getHighlightedText: 	function() {
			console.log(rangy);
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
			var selText = this.getHighlightedText();

			if(selText && selText.toString().length != 0) {
				this.attributes.selectedText = selText;
				return true;
			}

			return false;
		}
	});

	return DocumentModel;
});