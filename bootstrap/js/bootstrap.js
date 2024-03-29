require.config({
	paths: {
		jquery:		'//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min',
		underscore: 'libs/underscore/underscore-amd-1.4.3.min',
		backbone:	'libs/backbone/backbone-amd-0.9.10.min',
		text: 		'libs/require/text/text',
		rangy: 		'libs/rangy/1.2.3/rangy-core.min'
	}
});

require(['app'], function(App) {
	App.initialize();
});