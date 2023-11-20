let deco = document.getElementById("deco");
let deco2 = document.getElementById("deco2");
let deco3 = document.getElementById("deco3");
let btn = document.getElementById("btn");
let btn2 = document.getElementById("btn2");

deco.addEventListener("click", function (e) {
    if (localStorage.getItem("Date") == null) {
        alert("Vous êtes déjà déconnecté");
        e.preventDefault();
    } else {
        localStorage.removeItem("Date");
        alert("Vous vous êtes déconnecté");
        e.preventDefault()
    };
});
deco2.addEventListener("click", function (e) {
    if (localStorage.getItem("Date") == null) {
        alert("Veuillez vous connecter");
        e.preventDefault();
    } else {
        document.location.href = "./HTML/forum.html";
        e.preventDefault();
    };
});
deco3.addEventListener("click", function (e) {
    if (localStorage.getItem("Date") != null) {
        alert("Vous êtes déjà connecté");
        e.preventDefault();
    };
});
btn2.addEventListener("click", function (e) {
    document.location.href = "./HTML/register.html";
        e.preventDefault();

});
btn.addEventListener("click", function (e) {
    if (localStorage.getItem("Date") != null) {
        alert("Vous êtes déjà connecté");
        e.preventDefault();
    } else{
    document.location.href = "./HTML/login.html";
        e.preventDefault();
    }
});