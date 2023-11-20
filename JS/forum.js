window.addEventListener("load", (e) => {
    if (localStorage.getItem("Date") == null) {
        document.location.href = "../HTML/login.html";
        alert("Veuillez vous connecter");
        e.preventDefault();
    };
  });
let deco = document.getElementById("deco");
let deco2 = document.getElementById("deco2");
let deco3 = document.getElementById("deco3");
deco.addEventListener("click", function (e) {
    if (localStorage.getItem("Date") == null) {
        alert("Vous êtes déjà déconnecté");
        e.preventDefault();
    } else {
        localStorage.removeItem("Date");
        document.location.href = "../index.html"
        alert("Vous vous êtes déconnecté");
        e.preventDefault()
    };
});
deco2.addEventListener("click", function (e) {
    if (localStorage.getItem("Date") == null) {
        alert("Veuillez vous connecter");
        e.preventDefault();
    } else {
        document.location.href = "../HTML/forum.html";
        e.preventDefault();
    };
});
deco3.addEventListener("click", function (e) {
    if (localStorage.getItem("Date") != null) {
        alert("Vous êtes déjà connecté");
        e.preventDefault();
    };
});
let newDate = localStorage.getItem("Date");
let dateConnex = JSON.parse(newDate);
let btn = document.getElementById("btn")
let i = 0;

document.getElementById("prenom").innerHTML = dateConnex["prenom"];
document.getElementById("date").innerHTML = dateConnex["date"];
document.getElementById("heure").innerHTML = dateConnex["heure"];