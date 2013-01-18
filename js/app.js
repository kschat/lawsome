define([
	'jquery',
	'underscore',
	'backbone',
	'rangy',
	'router'
], function($, _, Backbone, rangy, Router) {
	var initialize = function() {
		var eventAggregator = _.extend({}, Backbone.Events);
		Router.initialize(eventAggregator);
	}

	return {
		initialize: initialize
	};
});