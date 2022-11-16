var regName = /^[a-zA-Z][^0-9]$/;

function validateFirstLastName() {
    var name = document.forms["myForm"]["fname"].value;
    if (!regName.test(name)) {
        alert("Name must only be characters");
        return false;
    }
}