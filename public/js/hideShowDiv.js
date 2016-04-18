/**
 * Created by Jacques on 25/03/2016.
 */

function hideThis(_div, _form){
    var obj = document.getElementById(_div);
    var mainObj = document.getElementById(_form);
    var changePassword = document.getElementById('linkChangePassword');
    var changeProfile = document.getElementById('linkChangeProfile');
    if(obj.style.display == "block") {
        obj.style.display = "none";
        mainObj.style.display = "block";
        changePassword.style.display = "block";
        changeProfile.style.display = "none";
    }
    else {
        obj.style.display = "block";
        mainObj.style.display = "none";
        changePassword.style.display = "none";
        changeProfile.style.display = "block";
    }
}
