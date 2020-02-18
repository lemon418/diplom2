let form = document.forms.authorization;
const SUCCESS = "Авторизация прошла успешно";
const ERROR = "Ошибка авторизации";
form.addEventListener('submit', sendRequest);

function responseHandler(response) {
    if(response == SUCCESS) {
        window.location.replace("/");
    } else if (response == ERROR) {
        let elem = document.
        getElementById('error');
        elem.innerText = ERROR;
    }
}

function sendRequest(event) {
    event.preventDefault();
    console.log("auth");
    let data = new FormData(this);
    let request = new XMLHttpRequest();
    request.open("POST", "/login",
        true);
    request.send(data);
    request.onload = function() {
        console.log(request.responseText);
        if (request.status === 200){
            responseHandler(request.responseText);
        }
    }
}