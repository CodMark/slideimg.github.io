var showw = document.getElementById("showww")
var form = document.getElementById("forms")
var loguot = document.getElementById("logut")
var valid_name = localStorage.getItem('username')
var valid_email = localStorage.getItem('email')
var valid_pass = localStorage.getItem('password')
function load() {
    if (valid_name, valid_email, valid_pass === null) {
        form.classList.add('showform')
        loguot.classList.remove('showform')
        return false
    } else {
        loguot.classList.add('showform')
        form.classList.remove('showform')
        showw.innerHTML = `<img src="https://codmark.github.io/slideimg.github.io/groom.png" alt="usericon" /><div class='commdel'><p class='usernem'>${valid_name}</p><p class='emalid'>${valid_email}</p></div>`
    }
}
load()