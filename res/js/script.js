
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});

deleteItemFood = function(event) {
    res = confirm("Esti sigur ca doresti stergerea mancarii?");
    if (res == false) {
        return false;
    }
    return true;
}

deleteItemMenu = function(event) {
    res = confirm("Esti sigur ca doresti stergerea meniului?");
    if (res == false) {
        return false;
    }
    return true;
}

deleteItemForum = function(event) {
    res = confirm("Esti sigur ca doresti stergerea postarii?");
    if (res == false) {
        return false;
    }
    return true;
}

deleteItemOrder = function(event) {
    res = confirm("Esti sigur ca doresti stergerea comenzii?");
    if (res == false) {
        return false;
    }
    return true;
}

deleteItemSupply = function(event) {
    res = confirm("Esti sigur ca doresti stergerea inregistrarii?");
    if (res == false) {
        return false;
    }
    return true;
}

deleteItemQuestion = function(event) {
    res = confirm("Esti sigur ca doresti stergerea intrebarii?");
    if (res == false) {
        return false;
    }
    return true;
}

function showPassword() {
    var x = document.getElementById("myPassword");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}

function clipboard(fieldId,fieldCopied) {
    var $temp = $("<input>");
    console.log($temp);
    $("body").append($temp);
    $temp.val($(fieldId).text()).select();
    document.execCommand("copy");
    $(fieldId).text("copied");
    $(fieldId).addClass("bg-success");
    $(fieldId).addClass("text-light");
    $temp.remove();
}