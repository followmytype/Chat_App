const form = document.querySelector('.login form');
const loginBtn = form.querySelector('.buttom input');
const errorTxt = form.querySelector('.error-txt');

form.onsubmit = (e) => {
    e.preventDefault();
}

loginBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/login.php");
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = JSON.parse(xhr.response);
                if (data.errors.length) {
                    let errorHTML = "<ul>";
                    data.errors.forEach((error) => {
                        errorHTML += "<li>" + error + "</li>";
                    });
                    errorHTML += "</ul>";
                    errorTxt.innerHTML = errorHTML;
                    errorTxt.style.display = "block";
                } else {
                    location.href = "users.php";
                }
            }
        }
    }

    let formData = new FormData(form);

    xhr.send(formData);
}