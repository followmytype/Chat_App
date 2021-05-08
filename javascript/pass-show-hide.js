const pawdField = document.querySelector(".form input[type='password']");
const toggleBtn = document.querySelector(".form .field i");

toggleBtn.onclick = () => {
    if (pawdField.type === 'password') {
        pawdField.type = 'text';
        toggleBtn.classList.add('active');
    } else {
        pawdField.type = 'password';
        toggleBtn.classList.remove('active');
    }
}