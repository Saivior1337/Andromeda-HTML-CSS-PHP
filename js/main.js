function eraseError()
{
    document.getElementById('alert-check').innerHTML = "<div class='error-alert_container' id='alert-check'><div class='error-alert-erase'></div></div>";
    setTimeout(function() {document.getElementById('alert-check').remove();}, 1000);
}

function eraseModal(elementId)
{
    document.getElementById(elementId).style.opacity = "0";
    document.getElementById(elementId).style.pointerEvents = "none";
}

function showModal(elementId)
{
    document.getElementById(elementId).style.opacity = "1";
    document.getElementById(elementId).style.pointerEvents = "auto";
    document.getElementById(elementId).style.overflowY = "auto";
}

function redirect(path)
{
    document.location.href = path;
}

var element = document.getElementById('alert-check');

if (element)
{
    setTimeout(eraseError, 5000);
} 