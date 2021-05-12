const form = document.querySelector(".typing-area");
const inputField = form.querySelector(".input-field");
const sendBtn = form.querySelector("button");
const chatBox = document.querySelector(".chat-area .chat-box");
const userImgSrc = document.querySelector(".chat-area header img").src;
let last_id = 0;

form.onsubmit = (e) => {
    e.preventDefault();
}

chatBox.onmouseenter = () => {
    chatBox.classList.add('active');
}
chatBox.onmouseleave = () => {
    chatBox.classList.remove('active');
}

sendBtn.onclick = () => {
    if (inputField.value != "") {
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/send-chat.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = JSON.parse(xhr.response);
                    scrollToBottom();
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
                let data = JSON.parse(xhr.response);
                // console.log(data.last_id);
                last_id = data.last_id;
                chatBox.insertAdjacentHTML('beforeend', data.data);
                if (!chatBox.classList.contains('active')) {
                    scrollToBottom();
                }
            }
        }
    }

    let formData = new FormData(form);
    formData.delete('message');
    formData.append('user_img', userImgSrc);
    formData.append('last_id', last_id);

    xhr.send(formData);
}, 500);

function scrollToBottom () {
    chatBox.scrollTop = chatBox.scrollHeight;
}