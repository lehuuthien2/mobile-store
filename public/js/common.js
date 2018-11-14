$( function() {
    $('.datepicker').datepicker({
        dateFormat: 'yy-mm-dd',
        // showButtonPanel: true,
        changeMonth: true,
        changeYear: true,
        // showOtherMonths: true,
        // selectOtherMonths: true,
        yearRange: "1960:2099"
    });
} );

function clearForm(oForm) {

    var elements = oForm.elements;

    oForm.reset();

    for(i=0; i<elements.length; i++) {

        field_type = elements[i].type.toLowerCase();

        switch(field_type) {

            case "text":
            case "email":
            case "password":
            case "textarea":
            case "hidden":

                elements[i].value = "";
                break;

            case "radio":
            case "checkbox":
                if (elements[i].checked) {
                    elements[i].checked = false;
                }
                break;

            case "select-one":
            case "select-multi":
                elements[i].selectedIndex = -1;
                break;
            case 'file':
                elements[i].value = "";

            default:
                break;
        }
    }
}
