const searchBar = document.querySelector(".users .search input"),
searchButton = document.querySelector(".users .search button"),
userList = document.querySelector(".users .user-list") ;

searchButton.onclick = () => {
    searchBar.classList.toggle("active");
    searchBar.focus();
    searchButton.classList.toggle("active");
}

searchBar.onkeyup = () => {
    let searchTerm = searchBar.value;
    if(searchTerm == ""){
        searchBar.classList.remove("active");
    } else{
        searchBar.classList.add("active");
    }
        let xhr = new XMLHttpRequest();
        xhr.open("POST", "php/search.php", true);
        xhr.onload = () => {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    let data = xhr.response;
                    userList.innerHTML = data;  
                }
            }
        }
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhr.send("searchTerm=" + searchTerm);
    
}

setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "php/users.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
               if(!searchBar.classList.contains('active')){
                    userList.innerHTML = data;
                }
            }
        }
    }
    xhr.send();
}, 500);