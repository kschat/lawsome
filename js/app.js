define([
	'jquery',
	'underscore',
	'backbone',
	'router'
], function($, _, Backbone, Router) {
	var initialize = function() {
		var eventAggregator = _.extend({}, Backbone.Events);
		Router.initialize(eventAggregator);
	}

	return {
		initialize: initialize
	};
});