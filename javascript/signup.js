const form = document.querySelector('.signup form');
const signupBtn = form.querySelector('.buttom input');
const errorTxt = form.querySelector('.error-txt');

form.onsubmit = (e) => {
    e.preventDefault();
}

signupBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/register.php", true);
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
    let active_img = document.querySelector(".signup form .image li img.active");
    if (active_img) {
        let image_src = active_img.src.split('/').pop();
        formData.append('image', image_src);
    }

    xhr.send(formData);
}