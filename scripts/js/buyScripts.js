function addToCart(id) {
    const request = new XMLHttpRequest();
    const url = "/addToCart";
    const params = "id=" + id

    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.responseText);
        }
    });

    request.send(params);
    alert('Товар добавлен в корзину');
}


function clearCart() {
    const request = new XMLHttpRequest();
    const url = "/clearCart";

    request.open(null, url, true);

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.responseText);
        }
    });

    request.send();

    alert("Корзина очищена");

    window.location.href = "/";

}


function deleteFromCart(id, price, element) {
    const request = new XMLHttpRequest();
    const url = "/deleteFromCart";
    const params = "id=" + id;

    request.open("POST", url, true);
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    request.addEventListener("readystatechange", () => {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.responseText);
        }
    });

    request.send(params);
    element.parentElement.style.display = "none"

    let sumPrice = document.getElementById("totalSum").innerText
    sumPrice = parseInt(sumPrice.match(/\d+/)) - price;
    document.getElementById("totalSum").innerText = "Общая стоимость: " + sumPrice + " гривен"

    if (parseInt(sumPrice) === 0) {
        document.getElementById("emptyCart").style.display = "block";
    }

    let idField = document.getElementById("idField").value;

    let ids = idField.match(/\d+/g);

    document.getElementById("idField").value = "";
    for (let i = 0; i < ids.length; ++i) {

        if (ids[i] !== id) {
            document.getElementById("idField").value += ids[i] + ", ";
        }
    }

    if (document.getElementById("idField").value === "") {
        document.getElementById("butButtons").style.display = "none";
    }

}


function purchase() {

    let formData = new FormData(document.getElementById("buyForm"));

    let request = new XMLHttpRequest();
    request.open('POST', '/purchase', true);
    request.addEventListener('readystatechange', () => {
        if ((request.readyState === 4) && (request.status === 200)) {
            alert("Заказ выполнен");
            window.location.href = "/";
        }
    });
    request.send(formData);

    return false;
}
