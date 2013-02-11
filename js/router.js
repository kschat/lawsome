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
			'documents/view(/:id)': 	'documentsAction',
			'documents/:id': 			'documentsAction'
			
			//'*actions': 	'defaultAction'
		},
		documentsAction: 	function(dID) {
			if(typeof dID === 'undefined') { dID = 1; }

			var documentView = new DocumentView( {model: new DocumentModel({id: dID, text: $('.document > p').text()}), vent: this.vent });
			var addAnnotationView = new AddAnnotationView( { model: new AnnotationModel({document_id: dID}), vent: this.vent } );
			var annotationListView = new AnnotationListView({ model: new AnnotationCollection(), vent: this.vent });

			$.ajaxSetup({
				headers: { 
					X_REST_USERNAME: 'admin@restuser', 
					X_REST_PASSWORD: 'admin@Access'
				}
			});

			annotationListView.model.fetch({ data: { document_id: dID } });
			$('#annotation-list').html(annotationListView.render());
			//console.log(this.vent);
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