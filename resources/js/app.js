//i really didn't want to do this but i had to
function btnspin(state) {
    var element = document.getElementsByClassName('outerbtn');

    if (state == 'in') {
        element.classList.add('spinbtn');
    }
    else {
        element.classList.remove('spinbtn');
    }
}


