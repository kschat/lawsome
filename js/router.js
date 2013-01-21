define([
	'jquery',
	'underscore',
	'backbone',
	'rangy',
	'views/document/documentView',
	'models/document/documentModel',
	'views/annotation/addAnnotationView',
	'models/annotation/annotationModel',
	'collections/annotation/annotationCollection',
	'views/annotation/annotationListView'
], function($, _, Backbone, rangy, DocumentView, DocumentModel, AddAnnotationView, AnnotationModel, AnnotationCollection, AnnotationListView) {
	var AppRouter = Backbone.Router.extend({
		initialize: 		function(options) {
			this.vent = options.eventAggregator;
		},
		routes: {
			'documents(/:id)': 	'documentsAction',
			
			//'*actions': 	'defaultAction'
		},
		documentsAction: 	function(dID) {
			if(typeof id === 'undefined') { id = 1; }
			var documentView = new DocumentView( {model: new DocumentModel({id: dID, selectedText: 'preview'}), vent: this.vent });
			var addAnnotationView = new AddAnnotationView( { model: new AnnotationModel(), vent: this.vent } );
			var annotationListView = new AnnotationListView({ model: new AnnotationCollection(), vent: this.vent });

			$.ajaxSetup({
				headers: { 
					X_REST_USERNAME: 'admin@restuser', 
					X_REST_PASSWORD: 'admin@Access'
				}
			});

			annotationListView.model.fetch();
			$('#annotation-list').html(annotationListView.render());
			console.log(this.vent);
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