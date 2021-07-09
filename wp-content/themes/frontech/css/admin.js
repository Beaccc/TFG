

jQuery(document).ready(function() {

    function getSliders(sliderClass, valClass) {

        var Sliders = jQuery('#widgets-right .custom_slider_widget_form').find(sliderClass);

        jQuery.each(speedSliders, function() {

            var inputVal	=	jQuery(this),
                showVal	= inputVal.parents('.widget_slider_wrapper').find(valClass),
                insertVal = function() {
                    showVal.text(inputVal.val() );
                };

            inputVal.on('input', insertVal);

        });
    }

    //For already Loaded Widgets
    getSliders('.slider_input', '.slider_display');

    //For newly added and updated Custom Sliders
    jQuery(document).on('widget-added widget-updated', function(event, widget) {

        var inputValue = widget[0].id;
        if ( -1 === inputValue.indexOf('indi_range_control' ) ) {
            return;
        }

        //Here, we are sure the custom slider widget is loaded
        var sliderValue		= widget.find('.slider_input'),
            sliderDisplay	= widget.find('.slider_display');

        getSliders(sliderValue, sliderDisplay);
    });


    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value;

    slider.oninput = function() {
        output.innerHTML = this.value;
    }
});

