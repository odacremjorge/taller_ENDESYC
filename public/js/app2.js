function forceLower(strInput) {
    strInput.value = strInput.value.toLowerCase();
}

// Restricts input for the given textbox to the given inputFilter.
function setInputFilter(textbox, inputFilter) {
    ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach(function(event) {
        textbox.addEventListener(event, function() {
            if (inputFilter(this.value)) {
                this.oldValue = this.value;
                this.oldSelectionStart = this.selectionStart;
                this.oldSelectionEnd = this.selectionEnd;
            } else if (this.hasOwnProperty("oldValue")) {
                this.value = this.oldValue;
                this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
            } else {
                this.value = "";
            }
        });
    });
}
//Solo acepta El abecedario 
setInputFilter(document.getElementById("sololetras"), function(value) {
    return /^[a-z, ""]*$/i.test(value);
});

setInputFilter(document.getElementById("sololetras1"), function(value) {
    return /^[a-z, ""]*$/i.test(value);
});

 //Telefono validacion
setInputFilter(document.getElementById("solonumeros"), function(value) {
    return /^\d*$/.test(value) && (value === "" || parseInt(value) <= 99999999);
});

