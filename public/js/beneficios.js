(function ($) {

	"use strict";

	$(function(){


		/**
		 * Verify that bootstrap.js is loaded
		 */
		if( typeof( $.fn.modal ) === 'undefined' ) {
			console.info( 'loaded bootstrap from beneficios plugin' );
			$.getScript( '//maxcdn.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js' );
		}


/*
	888                                  .d888 d8b          d8b
	888                                 d88P"  Y8P          Y8P
	888                                 888
	88888b.   .d88b.  88888b.   .d88b.  888888 888  .d8888b 888  .d88b.  .d8888b
	888 "88b d8P  Y8b 888 "88b d8P  Y8b 888    888 d88P"    888 d88""88b 88K
	888  888 88888888 888  888 88888888 888    888 888      888 888  888 "Y8888b.
	888 d88P Y8b.     888  888 Y8b.     888    888 Y88b.    888 Y88..88P      X88
	88888P"   "Y8888  888  888  "Y8888  888    888  "Y8888P 888  "Y88P"   88888P'
*/
		window.Modal = {};

		Modal.$el      = $('#modal-benefit');
		Modal.$id      = Modal.$el.find('#modal-benefit-id');
		Modal.$title   = Modal.$el.find('#modal-benefit-title');
		Modal.$image   = Modal.$el.find('#modal-benefit-image');
		Modal.$content = Modal.$el.find('#modal-benefit-content');
		Modal.$save    = Modal.$el.find('#save-benefit')

		/**
		 * Constructs an image element with the specified source
		 *
		 * @param src
		 * @returns {*|HTMLElement}
		 */
		Modal.getImageElement = function (src) {
			return $('<img />', {
				src: src,
				class: 'img-responsive'
			});
		};

		/**
		 * Constructs a link element with the specified url
		 *
		 * @param url
		 * @returns {*|HTMLElement}
		 */
		Modal.getLinkElement = function (url) {
			return $('<a></a>', {
				href: url,
				text: url,
				target: '_blank'
			});
		};

		/**
		 * Sets the id of the benefit as an attribute.
		 *
		 * @param id
		 */
		Modal.setID = function (id) {
			this.$id.val(id);
		};

		/**
		 * Sets the title of the benefit inside the title element.
		 *
		 * @param title
		 */
		Modal.setTitle = function (title) {
			this.$title.empty().text(title);
		};

		/**
		 * Sets the content of the benefit inside the content elment.
		 *
		 * @param content
		 */
		Modal.setContent = function (content) {
			this.$content.empty().html(content);
		};

		/**
		 * Sets the image element inside it's container.
		 *
		 * @param image_src
		 */
		Modal.setImage = function (image_src) {
			var image = this.getImageElement(image_src);

			this.$image.empty().html(image);
		};

		/**
		 * Appends the legales to the content of the benefit.
		 *
		 * @param legales
		 */
		Modal.setLegales = function (legales) {
			this.$content.append( $('<p>'+legales+'</p>') );
		};

		Modal.setExpiration = function (expiration) {
			this.$content.append( $('<p>'+expiration+'</p>') );
		};

		/**
		 * Appends the url to the content of the benefit.
		 *
		 * @param url
		 */
		Modal.setUrl = function (link) {
			var link = this.getLinkElement(link);

			this.$content.append(link);
		};

		/**
		 * Fill the modal with the benefit data.
		 *
		 * @param benefit
		 * @returns {Modal}
		 */
		Modal.fill = function (benefit) {
			this.setID(benefit.id);
			this.setTitle(benefit.title);
			this.setImage(benefit.featured_image);
			this.setContent(benefit.content);
			this.setLegales(benefit.legal);
			this.setExpiration(benefit.valid_to);
			this.setUrl(benefit.url);

			return this;
		};

		/**
		 * Displays the benefit modal
		 */
		Modal.show = function () {
			this.$el.modal('show');
		};

		/***
		 * Hides the benefit modal
		 */
		Modal.hide = function () {
			this.$el.modal('hide');
		};

		/**
		 * @todo Implement this motherfucker
		 *
		 * @param evt
		 */
		Modal.saveBenefit = function (evt) {
			console.log(this);
		};

		/**
		 * @todo Something with the bind and this. I don't know wtf.
		 */
		Modal.$save.on('click', Modal.saveBenefit.bind(Modal));

		/**
		 * Action listener to fill and show the benefit modal.
		 */
		$('.beneficios-container .add-benefit').on('click', function () {
			var data = $(this).data('benefit');
			Modal.fill(data).show();
		});


		/**
		 * Show the benefit modal when user is logged out.
		 */
		/*$('.add-benefit').on('click', function () {
			$('#beneficio-modal').modal('show')
		});*/

		$('.beneficios-container .guest-benefit').on('click', function (e) {
			e.preventDefault();
			$('#beneficio-guest').modal('show')
		});

	});

})(jQuery);