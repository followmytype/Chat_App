const searchBar = document.querySelector(".users .search input");
const searchBtn = document.querySelector(".users .search button");
const usersList = document.querySelector(".users .users-list");

searchBtn.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchBtn.classList.toggle("active");
    searchBar.value = "";
}

searchBar.onkeyup = () => {
    let search = searchBar.value;
    if (search != "") {
        searchBar.classList.add('active');
        searchBtn.classList.add("active");
    } else {
        searchBar.classList.remove('active');
        searchBtn.classList.remove("active");
    }
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/search.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                usersList.innerHTML = data;
            }
        }
    }
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.send('search=' + search);
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/userList.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                if (!searchBar.classList.contains('active')) {
                    usersList.innerHTML = data;                    
                }
            }
        }
    }

    xhr.send();
}, 500);