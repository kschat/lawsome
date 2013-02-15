define([
	'jquery',
	'underscore',
	'backbone',
	'rangy',
	'router',
	'bootstrap'
], function($, _, Backbone, rangy, Router, Bootstrap) {
	var initialize = function() {
		var eventAggregator = _.extend({}, Backbone.Events);
		Router.initialize(eventAggregator);
	}

	return {
		initialize: initialize
	};
});