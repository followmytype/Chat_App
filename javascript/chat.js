const form = document.querySelector(".typing-area");
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-area .chat-box");
const userImgSrc = document.querySelector(".chat-area header img").src;

form.onsubmit = (e) => {
    e.preventDefault();
}

sendBtn.onclick = () => {
    if (inputField.value != "") {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/send-chat.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = JSON.parse(xhr.response);
                    if (data.errors.length == 0) {
                        inputField.value = "";
                    }
                }
            }
        }
    
        let formData = new FormData(form);
    
        xhr.send(formData);
    }
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/get-chat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                chatBox.innerHTML = data;
            }
        }
    }

    let formData = new FormData(form);
    formData.delete('message');
    formData.append('user_img', userImgSrc);

    xhr.send(formData);
}, 500);