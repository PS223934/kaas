const inputdefault = []; //contains the default values of all inputs when the page is first loaded

$.wait = function( callback, seconds){
    return window.setTimeout( callback, seconds * 1000 );
}

function cinit() {
    //adds all needed attributes to every existing input (no its not hardcoded)
    const path = window.location.pathname;

    var inputs = $(".maininput");
    for(var i = 0; i < inputs.length; i++) {
        inputdefault[i] = $(inputs[i]).val();
        $(inputs[i]).attr('onchange', 'verifyinput()');
        $(inputs[i]).attr('onkeyup', 'verifyinput()');
        if (path == '/create') {
            $(inputs[i]).attr('onclick', 'clearinput(this)');
        }    
        $(inputs[i]).attr('autocomplete', 'off');
    }
    verifyinput();
}

//DOM and css are wildly irritating
function btnspin(state, sclass, name) {     
    var element = $('.outer'+name);
    console.log(element);
    if (state == 'in') {
        element[0].classList.add(sclass);
    }
    else {
        element[0].classList.remove(sclass);
    }
}

function r(u) {
    window.location = u;
}

//clears the input when clicked if the input is the default value
function clearinput(input) {
    console.log(input)
    if (inputdefault.includes($(input).val())) {
        $(input).val('');
    }
    verifyinput();
}

//checks if all inputs are filled/differ from inputdefault[] and enables the submit button if they are
function verifyinput() {
    var inputs = $(".maininput");
    const path = window.location.pathname;

    if (path == '/create') {
        for(var i = 0; i < inputs.length; i++) {
            if (!$(inputs[i]).val() || inputdefault.includes($(inputs[i]).val()) ) {
                $(".bottombuttons").addClass("spinbtnhidden spinbtndefault hidden");
                $(".bottombuttons").removeClass("flex");
                return false;
            }
        }
    }

    if (path != '/') {
        $(".bottombuttons").addClass("flex");
        $(".bottombuttons").removeClass("spinbtnhidden hidden");
    }

    $.wait( function() {
        $('.bottombuttons').removeClass("spinbtndefault");
    },0.5);

    return true;
}

//callbacks
$(document).ready(function() {
    $('body').on('load', cinit());
});
