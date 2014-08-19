(function($){

	"use strict";

	$(function(){

		/**
		 * Close bootstap modals with the <esc> key
		 */
		$(document).keyup(function(e) {
			if (e.keyCode == 27) $('.modal').modal('hide');
		});

/*
                              888                      888
                              888                      888
                              888                      888
     .d8888b .d88b.  88888b.  888888  8888b.   .d8888b 888888
    d88P"   d88""88b 888 "88b 888        "88b d88P"    888
    888     888  888 888  888 888    .d888888 888      888
    Y88b.   Y88..88P 888  888 Y88b.  888  888 Y88b.    Y88b.
     "Y8888P "Y88P"  888  888  "Y888 "Y888888  "Y8888P  "Y888
*/

		/**
		 * Validación de emails
		 */
		window.validateEmail = function (email) {
			var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regExp.test(email);
		};


		var ContactForm = {};

		/**
		 * The conacto form DOM element
		 * @type object
		 */
		ContactForm.$el = $('#contact-form');


		ContactForm.submitFormData = function (data)
		{
			data.action = 'ajax_submit_contact_form';

			var ajaxRequest = $.post( ajax_url, data, 'json' );

			ajaxRequest.done(function (response) {
				if ( response.success ) {
					ContactForm.$el.hide();
					$('#contact-form-success').fadeIn();
				} else {
					ContactForm.toggleSubmitButton();
				}
			});
		}

		/**
		 * Get the contacto form data as an object
		 * @return object
		 */
		ContactForm.getData = function ()
		{
			return {
				name    : $.trim( ContactForm.$el.find('#name').val() ),
				email   : $.trim( ContactForm.$el.find('#email').val() ),
				subject : $.trim( ContactForm.$el.find('#subject').val() ),
				message : $.trim( ContactForm.$el.find('#message').val() )
			};
		};

		/**
		 * Validate contact form data
		 *
		 * @param data
		 * @returns boolean
		 */
		ContactForm.validate = function (data)
		{
			if ( data.name.length < 1 ) {
				this.showContactFormMessge('El nombre es un campo requerido', '#name');
				return false;
			} else  if ( ! validateEmail(data.email)) {
				this.showContactFormMessge('Ingresa una dirección de correo valida', '#email');
				return false;
			} else if ( data.message.length < 1 ) {
				this.showContactFormMessge('Ingresa tu mensaje', '#message');
				return false;
			}

			return true;
		}

		/**
		 * Show error message and hilight the input with red border
		 *
		 * @param message
		 * @param field
		 */
		ContactForm.showContactFormMessge = function (message, field)
		{
			$('body').scrollTop( 100 );
			$('#contact-form-error').fadeIn();
			$('#contact-form-message').empty().html(message).fadeIn();
			$(field).focus();
		}

		ContactForm.toggleSubmitButton = function()
		{
			this.$el.find('input[type=submit]').attr('disabled', function(idx, oldAttr) {
				return !oldAttr;
			});
		}

		ContactForm.$el.on('submit', function (e) {
			e.preventDefault();

			$('#contact-form-error').hide();

			var formData  = ContactForm.getData();

			if ( ContactForm.validate( formData ) ) {
				ContactForm.toggleSubmitButton();
				ContactForm.submitFormData(formData);
			}

		});


	});

})(jQuery);
