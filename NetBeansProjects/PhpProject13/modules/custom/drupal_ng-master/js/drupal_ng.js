// Extend the callbacks to work with Bootstrap, as used in this example
// See: http://thedersen.com/projects/backbone-validation/#configuration/callbacks
_.extend(Backbone.Validation.callbacks, {
    valid: function (view, attr, selector) {
        var $el = view.$('[name=' + attr + ']'), 
            $group = $el.closest('.form-group');
        
        $group.removeClass('has-error');
        $group.find('.help-block').html('').addClass('hidden');
    },
    invalid: function (view, attr, error, selector) {
        var $el = view.$('[name=' + attr + ']'), 
            $group = $el.closest('.form-group');
        
        $group.addClass('has-error');
        $group.find('.help-block').html(error).removeClass('hidden');
    }
});

// Define a model with some validation rules
var SignUpModel = Backbone.Model.extend({
    defaults: {
        terms: false,
        gender: ''
    },
    validation: {
        username: {
            required: true
        },
        email: {
            required: true,
            pattern: 'email'
        },
        password: {
            minLength: 8
        },
        repeatPassword: {
            equalTo: 'password',
            msg: 'The passwords does not match'
        },
        country: {
          oneOf: ['Norway', 'Sweeden']
        },
        gender: {
            required: true
        },
        age: {
            required: false,
            range: [18, 100]
        },
        terms: {
            acceptance: true
        }
    }
});

// Define a View that uses our model
var SignUpForm = Backbone.View.extend({
    events: {
        'click #signUpButton': function (e) {
            e.preventDefault();
            this.signUp();
        }
    },

    initialize: function () {
        // This hooks up the validation
        // See: http://thedersen.com/projects/backbone-validation/#using-form-model-validation/validation-binding
        Backbone.Validation.bind(this);
    },

    signUp: function () {
        var data = this.$el.serializeObject();

        this.model.set(data);
        
        // Check if the model is valid before saving
        // See: http://thedersen.com/projects/backbone-validation/#methods/isvalid
        if(this.model.isValid(true)){
            // this.model.save();
            alert('Great Success!');
        }
    },
    
    remove: function() {
        // Remove the validation binding
        // See: http://thedersen.com/projects/backbone-validation/#using-form-model-validation/unbinding
        Backbone.Validation.unbind(this);
        return Backbone.View.prototype.remove.apply(this, arguments);
    }
});

$(function () {
    var view = new SignUpForm({
        el: 'form',
        model: new SignUpModel()
    });
});

// https://github.com/hongymagic/jQuery.serializeObject
$.fn.serializeObject = function () {
    "use strict";
    var a = {}, b = function (b, c) {
        var d = a[c.name];
        "undefined" != typeof d && d !== null ? $.isArray(d) ? d.push(c.value) : a[c.name] = [d, c.value] : a[c.name] = c.value
    };
    return $.each(this.serializeArray(), b), a
};





var myApp = angular.module("myModule", []);

myApp.controller("myController", function ($scope,$http) {
    $scope.message = "This is AngularJS";
    $scope.ctrlTest = "Applying";
    $scope.myJson = ["mayank 1", "mayank 2", "mayank 3", "mayank 4", "mayank 5", "mayank 6", "mayank 7", "mayank 8", "mayank 9"] ; 
    angular.forEach($scope.myJson, function(value, key){
         console.log("username is thomas "+value);
   });
   
   $http.get("http://www.w3schools.com/angular/customers.php").then(function (response) {
       console.log("username is thomas avant ");
       $scope.myData = response.data.records;
       $scope.name = 'nadir fouka' ; 
       console.log("ajax http get");
  });
   
   
});



function move() {
  var elem = document.getElementById("myBar");   
  var width = 1;
  var id = setInterval(frame, 50);
  function frame() {
    if (width >= 100) {
      clearInterval(id);
    } else {
      width++; 
      elem.style.width = width + '%'; 
      jQuery('#myBar').text(width+' %') ; 
    }
  }
}


(function($){
  Drupal.behaviors.drupal_ng = {
    attach: function(context, settings) {

             $(function () {
                 $('#accordion').accordion();
            });
 
    $('.example', context).click(function () {
      $(this).toggle('show');
    });
    
    
    
    
    
    }
    
    
    
  };
  
  
  
   var limit = 60 * 1,
            duration = 750,
            now = new Date(Date.now() - duration)

        var width = 500,
            height = 200

        var groups = {
            current: {
                value: 0,
                color: 'orange',
                data: d3.range(limit).map(function() {
                    return 0
                })
            },
            target: {
                value: 0,
                color: 'green',
                data: d3.range(limit).map(function() {
                    return 0
                })
            },
            output: {
                value: 0,
                color: 'grey',
                data: d3.range(limit).map(function() {
                    return 0
                })
            }
        }

        var x = d3.time.scale()
            .domain([now - (limit - 2), now - duration])
            .range([0, width])

        var y = d3.scale.linear()
            .domain([0, 100])
            .range([height, 0])

        var line = d3.svg.line()
            .interpolate('basis')
            .x(function(d, i) {
                return x(now - (limit - 1 - i) * duration)
            })
            .y(function(d) {
                return y(d)
            })

        var svg = d3.select('.graph').append('svg')
            .attr('class', 'chart')
            .attr('width', width)
            .attr('height', height + 50)

        var axis = svg.append('g')
            .attr('class', 'x axis')
            .attr('transform', 'translate(0,' + height + ')')
            .call(x.axis = d3.svg.axis().scale(x).orient('bottom'))

        var paths = svg.append('g')

        for (var name in groups) {
            var group = groups[name]
            group.path = paths.append('path')
                .data([group.data])
                .attr('class', name + ' group')
                .style('stroke', group.color)
        }

        function tick() {
        now = new Date()

            // Add new values
            for (var name in groups) {
                var group = groups[name]
                //group.data.push(group.value) // Real values arrive at irregular intervals
                group.data.push(20 + Math.random() * 100)
                group.path.attr('d', line)
            }

            // Shift domain
            x.domain([now - (limit - 2) * duration, now - duration])

            // Slide x-axis left
            axis.transition()
                .duration(duration)
                .ease('linear')
                .call(x.axis)

            // Slide paths left
            paths.attr('transform', null)
                .transition()
                .duration(duration)
                .ease('linear')
                .attr('transform', 'translate(' + x(now - (limit - 1) * duration) + ')')
                .each('end', tick)

            // Remove oldest data point from each group
            for (var name in groups) {
                var group = groups[name]
                group.data.shift()
            }
        }

        tick()
  
  
})(jQuery);



(function() { 
	
  // D3 Bubble Chart 

	var diameter = 600;

	var svg = d3.select('#chart').append('svg')
		.attr('width', diameter)
		.attr('height', diameter);

	var bubble = d3.layout.pack()
		.size([diameter, diameter])
		.value(function(d) {return d.size;}) // new data is loaded to bubble layout
		.padding(3);

	function drawBubbles(m) {

		// generate data with calculated layout values
		var nodes = bubble.nodes(processData(m))
			.filter(function(d) { return !d.children; }); // filter out the outer bubble

		// assign new data to existing DOM 
		var vis = svg.selectAll('circle')
			.data(nodes, function(d) { return d.name; });

		// enter data -> remove, so non-exist selections for upcoming data won't stay -> enter new data -> ...

		// To chain transitions, 
		// create the transition on the updating elements before the entering elements 
		// because enter.append merges entering elements into the update selection

		var duration = 300;
		var delay = 0;

		// update - this is created before enter.append. it only applies to updating nodes.
		vis.transition()
			.duration(duration)
			.delay(function(d, i) {delay = i * 7; return delay;}) 
			.attr('transform', function(d) { return 'translate(' + d.x + ',' + d.y + ')'; })
			.attr('r', function(d) { return d.r; })
			.style('opacity', 1); // force to 1, so they don't get stuck below 1 at enter()

		// enter - only applies to incoming elements (once emptying data)	
		vis.enter().append('circle')
			.attr('transform', function(d) { return 'translate(' + d.x + ',' + d.y + ')'; })
			.attr('r', function(d) { return d.r; })
			.attr('class', function(d) { return d.className; })
			.style('opacity', 0) 
			.transition()
			.duration(duration * 1.2)
			.style('opacity', 1);

		// exit
		vis.exit()
			.transition()
			.duration(duration + delay)
			.style('opacity', 0)
			.remove();
	}
  
  /* PubNub */

	var channel = 'rts-xNjiKP4Bg4jgElhhn9v9';

	var pubnub = PUBNUB.init({
		subscribe_key: 'e19f2bb0-623a-11df-98a1-fbd39d75aa3f'
	});

	function getData() {
		var i = 0;
		pubnub.subscribe({
			channel: channel,
			callback: function(m) {
        //ah too much data! I just reduce it to 1/10!
				i++; 
				if(i === 1 || i%10 === 0) {
					drawBubbles(m);
				}		
			}
		});
	}

	function processData(data) {
		if(!data) return;

		var obj = data.countries_msg_vol;

		var newDataSet = [];

		for(var prop in obj) {
			newDataSet.push({name: prop, className: prop.toLowerCase().replace(/ /g,''), size: obj[prop]});
		}
		return {children: newDataSet};
	}

	getData();
  
})();



window.app = {};

window.app.Person = Backbone.Model.extend({
    defaults: { name: "Type your name" },
    validate: function () { }
});

window.app.People = Backbone.Collection.extend({
    model: window.app.Person
});

window.app.NewPersonView = Backbone.View.extend({
    template: _.template($("#new_person_template").html()),
    initialize: function () {
        _.bindAll(this, 'submit');
    },
    events:
    {
        "click #btnSubmit": "submit"
    },
    render: function () {
        $(this.el).html(this.template());
        return this;
    },
    submit: function (x, y, z) {
        var person = new window.app.Person({name: $("#txtName").val()});
        this.model.add(person);
    }
});

window.app.PersonView = Backbone.View.extend({
    tagname: "li",
    template: _.template($("#person_template").html()),
    render: function() {
        $(this.el).html(this.template(this.model.toJSON()));
        return this;
    }
});

window.app.PeopleView = Backbone.View.extend({
    tagName: "ul",
   
    initialize: function() {
        _.bindAll(this, "render", "renderPerson");
        this.model.bind("add", this.renderPerson);
    },
    
    render: function() {
       console.log("rendering");
       this.model.each(this.renderPerson);
       return this;
    },
    
    renderPerson: function(person) {
        var personView = new window.app.PersonView({model: person});
        $(this.el).append(personView.render().el);
    }
});


$(document).ready(function () {

    var people = new window.app.People();
    var newPersonView = new window.app.NewPersonView({model: people});
    var peopleView = new window.app.PeopleView({model: people});

    $("#container").html(newPersonView.render().el);
    $("#container").append(peopleView.render().el);
});