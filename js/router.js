define([
	'jquery',
	'underscore',
	'backbone',
	'rangy',
	'views/document/documentView',
	'models/document/documentModel',
	'views/annotation/annotationView',
	'models/annotation/annotationModel'
], function($, _, Backbone, rangy, DocumentView, DocumentModel, AnnotationView, AnnotationModel) {
	var AppRouter = Backbone.Router.extend({
		initialize: 		function(options) {
			this.vent = options.eventAggregator;
		},
		routes: {
			'documents/(:id)': 	'documentsAction',
			//'*actions': 	'defaultAction'
		},
		documentsAction: 	function(id) {
			if(typeof id === 'undefined') { id = 1; }
			var documentView = new DocumentView( {model: new DocumentModel({selectedText: 'preview'}), vent: this.vent });
			var annotationView = new AnnotationView( { model: new AnnotationModel(), vent: this.vent } );
		},
		defaultAction: 	function(action) {
			var documentView = new DocumentView( { model:  new DocumentModel( {selectedText : 'selected text'} )});
			documentView.render();
		}
	});

	var initialize = function(ea) {
		var appRouter = new AppRouter({ eventAggregator: ea });

		appRouter.on('defaultAction', function() {
			console.log('defaultAction');
		});

		Backbone.history.start({pushState: true});
	};

	return {
		initialize: initialize
	}
});