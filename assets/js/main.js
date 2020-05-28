/*  ---------------------------------------------------
    Template Name: Europa Hotel And Spa
    Description: Europa Hotel And Spa HTML Template
    Author: Colorlib
    Author URI: http://www.colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
		Date Picker
	--------------------*/

    $(".datepicker-1").datepicker({
        format: 'dd/mm/yyyy',
    });
    $(".datepicker-2").datepicker({
        format: 'dd/mm/yyyy',
    });

})(jQuery);