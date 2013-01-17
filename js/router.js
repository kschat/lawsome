define([
	'jquery',
	'underscore',
	'backbone',
	'views/document/documentView',
	'models/document/documentModel',
	'views/annotation/annotationView',
	'models/annotation/annotationModel'
], function($, _, Backbone, DocumentView, DocumentModel, AnnotationView, AnnotationModel) {
	var AppRouter = Backbone.Router.extend({
		routes: {
			'documents/(:id)': 	'documentsAction',
			//'*actions': 	'defaultAction'
		},
		documentsAction: 	function(id) {
			if(typeof id === 'undefined') { id = 1; }
			var annotationView = new AnnotationView( { model: new AnnotationModel()} );
		},
		defaultAction: 	function(action) {
			var documentView = new DocumentView( { model:  new DocumentModel( {selectedText : 'selected text'} )});
			documentView.render();
		}
	});

	var initialize = function() {
		var appRouter = new AppRouter;

		appRouter.on('defaultAction', function() {
			console.log('defaultAction');
		});

		Backbone.history.start({pushState: true});
	};

	return {
		initialize: initialize
	}
});