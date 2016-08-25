var i = 0;
var divs = [];
function showImage (fileId) {
    i++;
    var scale = 50;
    var imageURL = "https://dl.dropboxusercontent.com/u/109891044/";
    var fileInput = document.getElementById(fileId);
    var name = fileInput.value;

    var reg = new RegExp("[_]+", "g");
    var nameArray = name.split(reg);

    var img = document.createElement("img");
    img.setAttribute('id',i);
    img.setAttribute('height', scale + '%');
    img.setAttribute('width', scale + '%');
    img.setAttribute('src',imageURL + nameArray[0] +"/" + fileInput.value);
    img.setAttribute('class', "img-thumbnail");

    var container = document.getElementById('imageUploaded');
    var div = document.createElement("div");
    div.id = 'divId';
    divs.push(div);
    container.appendChild(div);

    $('#divId').append(i);
    $('#divId').append(' - ');
    $('#divId').append(name);
    $('#divId').append('<br/>');
    $('#divId').append(img);
    $('#divId').append('<br/>');
    $('#divId').append('<br/>');
}