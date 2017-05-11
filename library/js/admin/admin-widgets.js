var testimonialsWidget = testimonialsWidget || {};

testimonialsWidget.render = function( id, JSON ){
  // Model (Data for individual testimonial)
  var Testimonial = Backbone.Model.extend( {
    defaults: {
      'quote_heading' : '',
      'quote' : '',
      'author': '',
      'rating': 5,
      'author_description': '',
      'author_avatar':''
    }
  } );

  // View ( Final markup for individual testimonial  )
  var TestimonialView = Backbone.View.extend( {

    className: 'individual-testimonial',
    events : {
      'click .js-remove-testimonial' : 'destroy',
    },
    render : function(){
      var tmpl = Handlebars.compile( jQuery( '#js-testimonial-' + id ).html() );
      this.$el.html( tmpl( this.model.toJSON() ) );
      this.$( 'select.js-rating' ).val( this.model.get( 'rating' ) );
      return this;
    },
    destroy : function(event){
      event.preventDefault();
      this.model.trigger( 'destroy' );
      this.$el.remove();
    }

  } );

  var TestimonialsView = Backbone.View.extend({
      className: "testimonials",
      el: '#js-testimonials-' + id,
      events: {
        'click .js-add-testimonial': 'addNew'
      },
      initialize: function( params ) {
        this.$testimonials = this.$( '#js-testimonials-list' );
        this.collection.on( 'add', this.appendOne, this );
      },
      addNew : function( event ){
        event.preventDefault();
        var testimonialId = 0;
        if( ! this.collection.isEmpty() ){
          var testimonialsWithMaxId = this.collection.max(function(testimonial){
            return testimonial.id;
          });
          testimonialId = parseInt( testimonialsWithMaxId.id, 10 ) + 1;
        }
        this.collection.add( new Testimonial({ id: testimonialId }) );
        return this;
      },
      appendOne: function( testimonial ){
        var renderedTestimonial = new TestimonialView( { model: testimonial } ).render();
        if ( '__i__' !== id.slice( -5 ) ) {
          this.$testimonials.append(renderedTestimonial.el);
        }
      }
  });

  //Collection of testimonials
  var Testimonials = Backbone.Collection.extend({
    model: Testimonial
  });
  testimonials = new Testimonials();

  // Collection of testimonials view
  var testimonialsView = new TestimonialsView({
    //el: '#js-testimonials-' + id,
    collection: testimonials
  });

  testimonials.add(JSON);

}

var logosListWidget = logosListWidget || {};

logosListWidget.render = function( id, JSON ){
  // Model (Data for individual logo)
  var Logo = Backbone.Model.extend( {
    defaults: {
      'url' : '',
      'name': ''
    }
  } );

  // View ( Final markup for individual logo  )
  var LogoView = Backbone.View.extend( {

    className: 'individual-logo',
    events : {
      'click .js-remove-logo' : 'destroy',
    },
    render : function(){
      var tmpl = Handlebars.compile( jQuery( '#js-logos-list-' + id ).html() );
      this.$el.html( tmpl( this.model.toJSON() ) );
      return this;
    },
    destroy : function(event){
      event.preventDefault();
      this.model.trigger( 'destroy' );
      this.$el.remove();
    }

  } );

  var LogosListView = Backbone.View.extend({
      className: "logos",
      el: '#js-logos-' + id,
      events: {
        'click .js-add-logo': 'addNew'
      },
      initialize: function( params ) {
        this.$logos = this.$( '#js-logos-list' );
        this.collection.on( 'add', this.appendOne, this );
      },
      addNew : function( event ){
        event.preventDefault();
        var logoId = 0;
        if( ! this.collection.isEmpty() ){
          var logosWithMaxId = this.collection.max(function(logo){
            return logo.id;
          });
          logoId = parseInt( logosWithMaxId.id, 10 ) + 1;
        }
        this.collection.add( new Logo({ id: logoId }) );
        return this;
      },
      appendOne: function( logo ){
        var renderedLogo = new LogoView( { model: logo } ).render();
        if ( '__i__' !== id.slice( -5 ) ) {
          this.$logos.append(renderedLogo.el);
        }
      }
  });

  //Collection of testimonials
  var Logos = Backbone.Collection.extend({
    model: Logo
  });
  logos = new Logos();

  // Collection of testimonials view
  var logosListView = new LogosListView({
    collection: logos
  });
  logos.add(JSON);

}
