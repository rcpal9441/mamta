

$(window).scroll(function () {

    var fixed = $("body");

    var sticky = $(window).scrollTop();

    if (sticky >= 660) fixed.addClass("search-sticky");

    else fixed.removeClass('search-sticky');

});





// function openNav() {

//     document.getElementById("mySidenav").style.width = "250px";

// }



// function closeNav() {

//     document.getElementById("mySidenav").style.width = "0";

// }





$('.dropdown-main a').click(function () {

    $('.search-form').toggleClass('open-mega-menu');

});


$('.dropdown-main a').click(function () {

    $('.main-form').toggleClass('open-mega-menu');

});


$('#btn-filter').click(function () {

    $('#filterMain').toggleClass('filter-on');

});
// ^^ Require for item listing filter slide down


$(function () {
    $('[data-toggle="tooltip"]').not(".custom-check").tooltip();
    $('.custom-check').tooltip({
    trigger : 'hover'
    });
   
});
// ^^ Require for bootstrap tooltips




jQuery(document).ready(function () {

    // This button will increment the value

    $('[data-quantity="plus"]').click(function (e) {

        // Stop acting like a button

        e.preventDefault();

        // Get the field name

        fieldName = $(this).attr('data-field');

        // Get its current value

        var currentVal = parseInt($('input[name=' + fieldName + ']').val());

        // If is not undefined

        if (!isNaN(currentVal)) {

            // Increment

            $('input[name=' + fieldName + ']').val(currentVal + 1);

        } else {

            // Otherwise put a 0 there

            $('input[name=' + fieldName + ']').val(0);

        }

    });

    // This button will decrement the value till 0

    $('[data-quantity="minus"]').click(function (e) {

        // Stop acting like a button

        e.preventDefault();

        // Get the field name

        fieldName = $(this).attr('data-field');

        // Get its current value

        var currentVal = parseInt($('input[name=' + fieldName + ']').val());

        // If it isn't undefined or its greater than 0

        if (!isNaN(currentVal) && currentVal > 0) {

            // Decrement one

            $('input[name=' + fieldName + ']').val(currentVal - 1);

        } else {

            // Otherwise put a 0 there

            $('input[name=' + fieldName + ']').val(0);

        }

    });

});





