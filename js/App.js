(function(){
    var Customer = Backbone.Model.extend({

        urlRoot: "customer",

        defaults: {
            firstName: null,
            lastName: null,
            email: null,
            gender: null,
            ipAddress: null,
            company: null,
            city: null,
            title: null,
            website: null
        }
    });

    var CustomerCollection = Backbone.Collection.extend({
        url: "customer",
        model: Customer,

        getSentenceCaseModelFieldsNames: function () {
            if (this.length === 0) {
                return [];
            }

            return Object.keys(this.models[0].attributes).map(this.toSentenceCase);
        },

        toSentenceCase: function (field) {
            var withSpace = field.replace(/([A-Z]+)*([A-Z][a-z])/g, "$1 $2");
            var allLowerCase = withSpace.toLocaleLowerCase();
            var withUpperCaseFirst = allLowerCase.charAt(0).toUpperCase() + allLowerCase.slice(1);
            return withUpperCaseFirst;
        }
    });

    var AppView = Backbone.View.extend({

        el: ".js-app-view",

        events: {
            "click .js-customer-load-button": "loadCustomers"
        },

        initialize: function() {
            this.template = Handlebars.compile($("#js-app-hbs").html())
        },

        render: function () {
            this.$el.html(this.template({
                customers: this.collection.toJSON(),
                customerFieldNames: this.collection.getSentenceCaseModelFieldsNames()
            }));

            return this;
        },

        loadCustomers: function () {
            this.showLoadingFeedBack();
            this.collection.fetch().done(this.render.bind(this))
        },

        showLoadingFeedBack: function () {
            this.$el.find(".js-customer-load-button").html("loading...")
        }

    });

    new AppView({collection: new CustomerCollection()}).render();
})();