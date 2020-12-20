function toggle_flex_visibility(id) {
    let e = document.getElementById(id);

    if (e.style.display === 'flex') {
        e.style.display = 'none';
    } else {
        e.style.display = 'flex';
    }
}

function toggleFilterItemVisibility(id, obj, adjID) {
    let e = document.getElementById(id + "." + adjID);

    if (e.style.display === "block") {
        e.style.display = "none";
        obj.innerText = '\u25BD';

    } else {
        obj.innerText = '\u25B7';
        e.style.display = "block";
        console.log(obj.textContent);
    }
}

function toggleMobileFilterVisibility(obj) {
    let e = document.getElementById('innerFilters');

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

function scrollTo(to, duration = 700) {
    const
        element = document.scrollingElement || document.documentElement,
        start = element.scrollTop,
        change = to - start,
        startDate = +new Date(),

        easeInOutQuad = function (t, b, c, d) {
            t /= d / 2;
            if (t < 1) return c / 2 * t * t + b;
            t--;
            return -c / 2 * (t * (t - 2) - 1) + b;
        },
        animateScroll = function () {
            const currentDate = +new Date();
            const currentTime = currentDate - startDate;
            element.scrollTop = parseInt(easeInOutQuad(currentTime, start, change, duration));
            if (currentTime < duration) {
                requestAnimationFrame(animateScroll);
            } else {
                element.scrollTop = to;
            }
        };
    animateScroll();
}

document.addEventListener('DOMContentLoaded', function () {
    let btn = document.querySelector('#toTop');
    window.addEventListener('scroll', function () {

        if (pageYOffset > 100) {
            btn.classList.add('show');
        } else {
            btn.classList.remove('show');
        }
    });

    btn.onclick = function (click) {
        click.preventDefault();
        scrollTo(0, 400);
    }
});