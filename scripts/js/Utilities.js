function toggle_visibility(id) {
    let e = document.getElementById(id);

    if (e.style.display === 'block') {
        e.style.display = 'none';
    } else {
        e.style.display = 'block';
    }
}

function toggleFilterItemVisibility(id, obj) {
    let e = document.getElementById(id);

    if (e.style.display === "block") {
        e.style.display = "none";
        obj.innerText = '\u25BD';

    } else {
        obj.innerText = '\u25B7';
        e.style.display = "block";
        console.log(obj.textContent);
    }
}


function showFullImage() {
    let menu = document.getElementById('hover-image');
    let isToggled = false;

    window.onclick = function (event) {
        if (event.target.matches('.image') && isToggled === false) {
            menu.style.display = "block";
            isToggled = true;
        } else if (!event.target.matches('.image') && isToggled === true) {
            menu.style.display = "none";
            isToggled = false;
        }
    }
}