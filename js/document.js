(function($) {
	//Doc module
	var Doc = (function() {
		function Doc($doc, $form) {
			this.$document = $doc;
			this.$form = $form;
			this.selectedText = this.updateSelectedText().toString();
			
			this.$document.on('mouseup', {'that': this}, function(event) {
				var that = event.data.that;
				var newText = that.updateSelectedText().toString();

				if(that.textChanged(newText)) {
					that.selectedText = newText;
					console.log('selected text: ' + newText);
					that.updateFormPreview();
				}
			});
		}

		Doc.prototype.updateSelectedText = function() {
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
		};

		Doc.prototype.textChanged = function(newText) {
			if(this.selectedText !== newText) {
				return true;
			}

			return false;
		};

		Doc.prototype.updateFormPreview = function() {
			var preview = this.$form.find('#selected-preview').text(this.selectedText);
		};

		return Doc;
	}());

	$(document).ready(function() {
		var pageDocument = new Doc($('.document p'), $('#add-annotation-form'));
		//console.log(pageDocument.updateSelectedText());
	});

})(jQuery);