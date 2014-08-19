;(function($){

	"use strict";

	$(function(){

		/**
		 * Validación de emails
		 */
		window.validateEmail = function (email) {
			var regExp = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			return regExp.test(email);
		};

		/**
		 * Regresa todos los valores de un formulario como un associative array
		 */
		window.getFormData = function (selector) {
			var result = [],
				data   = $(selector).serializeArray();

			$.map(data, function (attr) {
				result[attr.name] = attr.value;
			});

			return result;
		};


		/**
		 * Borrar un recurso de la base de datos.
		 * El ID del recurso se guarda en una variable global 'deleteID'.
		 *
		 * @uses     https://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js
		 * @example  http://getbootstrap.com/javascript/#modals
		 */
		$('.delete-resource-link').on('click', function (e) {
			e.preventDefault();
			window.deleteID = $(this).data('resource_id');
			$('#delete-resource-modal').modal('show');
		});

		$('#confirmar-eliminar-btn').on('click', function(){
			$('.form-borrar-recurso[data-resource_id="'+deleteID+'"]').submit();
		});


		/**
		 * Bootstrap3 WYSIWYG
		 *
		 * @uses  assets/css/bootstrap-wysihtml5.css
		 * @uses  assets/js/wysihtml5.js
		 * @uses  assets/js/bootstrap3-wysihtml5.js
		 *
		 * @link    https://github.com/schnawel007/bootstrap3-wysihtml5
		 * @example http://schnawel007.github.io/bootstrap3-wysihtml5/
		 */
		 $('.wysiwyg').wysihtml5({
			'font-styles': true,  // Font styling, e.g. h1, h2, etc. Default true
			'emphasis'   : true,  // Italics, bold, etc. Default true
			'lists'      : true,  // (Un)ordered lists, e.g. Bullets, Numbers. Default true
			'html'       : false, // Button which allows you to edit the generated HTML. Default false
			'link'       : true,  // Button to insert a link. Default true
			'image'      : false, // Button to insert an image. Default true,
			'color'      : false, // Button to change color of font
			'size'       : 'sm'   // Button size like sm, xs etc.
		});


        /*
         888            d8b          d8b
         888            Y8P          Y8P
         888
         888888 888d888 888 888  888 888  8888b.  .d8888b
         888    888P"   888 888  888 888     "88b 88K
         888    888     888 Y88  88P 888 .d888888 "Y8888b.
         Y88b.  888     888  Y8bd8P  888 888  888      X88
         "Y888 888     888   Y88P   888 "Y888888  88888P'
         */


        window.Question = {
            /**
             * Template for adding new questions.
             * Located in views/dashboard/footer.php
             *
             * @type string
             */
            template : $.trim(
                "<div class='input-group'>" +
                    "<input type='text' class='form-control' name='preguntas[]'>" +
                    "<span class='input-group-btn'>" +
                        "<button class='btn btn-default delete-question-btn' type='button'>✕</button>" +
                    "</span>" +
                "</div>"
            )
        };

        /**
         * Get new DOM object element
         *
         * @return object
         */
        Question.get = function ()
        {
            return $( this.template );
        };

        /**
         * Callback: Remove question from DOM
         */
        Question.remove = function ()
        {
            $(this).closest('.input-group').remove();
        };

        /**
         * Callback: Insert new question into the DOM
         */
        Question.add = function (e)
        {
            e.preventDefault();
            $(this).before( Question.get() );
        };


        $('#add-new-question').on( 'click', Question.add );

        $(document).on( 'click', '.delete-question-btn', Question.remove );

	});

})(jQuery);
