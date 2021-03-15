const form = document.querySelector(".typing"),
    inputField = form.querySelector(".input"),
    sendButton = form.querySelector("button"),
    messageList = document.querySelector('.messageList');

form.onsubmit = (e) => {
    e.preventDefault();
}
sendButton.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/insertChat.php", true);
    xhr.onload = () => {
   
        if (xhr.readyState === XMLHttpRequest.DONE) {    
            if (xhr.status === 200) {
                console.log(xhr.response)
                inputField.value = ""; 
            }
        }
    }

    let formData = new FormData(form);
    xhr.send(formData);
}

messageList.onmouseenter = () => {
    messageList.classList.add("active")
}
messageList.onmouseleave = () => {
    messageList.classList.remove("active")
}
setInterval(() => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/getChat.php", true);
    xhr.onload = () => {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                let data = xhr.response;
                messageList.innerHTML = data;
                if(!messageList.classList.contains("active")){
                     scrollToBottom();
                }
            }
        }
    }
    let formData = new FormData(form);
    xhr.send(formData);
}, 500);


scrollToBottom = () => {
    messageList.scrollTop = messageList.scrollHeight;
}