require.config({
	paths: {
		jquery:		'libs/jquery/jquery-1.8.3.min',
		underscore: 'libs/underscore/underscore-amd-1.4.3.min',
		backbone:	'libs/backbone/backbone-amd-0.9.10.min',
		text: 		'libs/require/text/text',
		rangy: 		'libs/rangy/1.2.3/rangy-core.min',
		bootstrap: 	'libs/bootstrap/bootstrap.min'
	},
	shim: {
		'bootstrap': { deps: ['jquery']}
	}
});

require(['app'], function(App) {
	App.initialize();
});