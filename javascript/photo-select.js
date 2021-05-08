const imgs = document.querySelectorAll('.photo img');

for(const img of imgs) {
    img.addEventListener('click', (event) => {
        const activeImg = document.querySelector('.photo img.active');
        if (activeImg) {
            activeImg.classList.remove('active');
        }
        event.target.classList.add('active');
    })
}