var Backbone = require('backbone'),
    _ = require('underscore'),
    $ = require('jquery'),
    LocationFormView = require('views/location-form'),
    SpecialtyFormView = require('views/specialty-form');

var SearchFormView = Backbone.View.extend({

    /**
     * Models
     *
     */
    model: undefined,  // model: SearchForm; not persisted

    /**
     * Subviews
     *
     */
    locationFormView: undefined,
    specialtyFormView: undefined,

    initialize: function() {
        // Initialize the search form's two inputs
        this.locationFormView = new LocationFormView({
            model: this.model.searchLocation
        });

        this.specialtyFormView = new SpecialtyFormView({
            model: this.model.specialty,
            searchLocation: this.model.searchLocation
        });

    },

    render: function() {
        return this;
    },

    events: {
        submit: 'formSubmit'
    },

    formSubmit: function(evt) {

        evt.preventDefault();
        console.log('form submitted: ' + (this.isValid() ? 'valid' : 'invalid' ));
        if (this.isValid()) {
            var queryString = this.$el.serialize();    
            var href = window.location.href;

            window.location = [
                href,
                'find-your-do-results',
                '?',
                queryString
            ].join('')
        } else {
            this.indicateInvalid();
        }
    },
    
    isValid: function() {
        return !this.model.searchLocation.isEmpty() || 
            this.locationFormView.resolved;
    },

    indicateInvalid: function() {
        var $loc = $('#location');
        $('#location')
            .addClass('animated bounceIn required')
            .one('webkitAnimationEnd mozAnimationEnd MSAnimationEnd ' +
                    'oanimationend animationend', function() { 
                $(this).removeClass('animated bounceIn required');
            });
    }

});

module.exports = SearchFormView;

