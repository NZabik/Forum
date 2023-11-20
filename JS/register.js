let deco = document.getElementById("deco");
let deco2 = document.getElementById("deco2");
let deco3 = document.getElementById("deco3");
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
function isEmailValid(email) {
    let re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
};
function isPasswordSecure(password) {
    let re = /^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[#\^\+\-\[\]])(?=.{8,})/;
    return re.test(password);
};
function isNameValid(name) {
    let re = /^([a-zA-Z]){3,}$/i;
    return re.test(name);
};
function masquernotification() {
    document.getElementById("erreur1").style.display = "none";
    document.getElementById("erreur2").style.display = "none";
    document.getElementById("erreur3").style.display = "none";
    document.getElementById("erreur4").style.display = "none";
    document.getElementById("erreur5").style.display = "none";
}

document.forms[0].addEventListener("submit", function (evenement) {
    if (document.getElementById("nom").value == "" || isNameValid(document.getElementById("nom").value) == false) {
        evenement.preventDefault();
        let show = document.getElementById("erreur1");
        show.style.display = "block";
        window.setTimeout(masquernotification, 3000);
        console.log(isNameValid(document.getElementById("nom").value));
    }
    if (document.getElementById("prenom").value == "" || isNameValid(document.getElementById("prenom").value) == false) {
        evenement.preventDefault();
        let show = document.getElementById("erreur2");
        show.style.display = "block";
        window.setTimeout(masquernotification, 3000);
    }
    if (document.getElementById("mail").value == "" || isEmailValid(document.getElementById("mail").value) == false) {
        evenement.preventDefault();
        let show = document.getElementById("erreur3");
        show.style.display = "block";
        window.setTimeout(masquernotification, 3000);
    }
    if (document.getElementById("password").value == "" || isPasswordSecure(document.getElementById("password").value) == false) {
        evenement.preventDefault();
        let show = document.getElementById("erreur4");
        show.style.display = "block";
        window.setTimeout(masquernotification, 3000);
    }
    if (document.getElementById("password2").value == "" || document.getElementById("password2").value !== document.getElementById("password").value) {
        evenement.preventDefault();
        let show = document.getElementById("erreur5");
        show.style.display = "block";
        window.setTimeout(masquernotification, 3000);
    }
});
document.forms[0].addEventListener("submit", function (evenement) {
    if (isNameValid(document.getElementById("nom").value) == true && isNameValid(document.getElementById("prenom").value) == true && isEmailValid(document.getElementById("mail").value) == true && isPasswordSecure(document.getElementById("password").value) == true && document.getElementById("password2").value === document.getElementById("password").value) {
        let nomform = document.getElementById("nom").value;
        let prenomform = document.getElementById("prenom").value;
        let mailform = document.getElementById("mail").value;
        let mdpform = document.getElementById("password").value;
        let mdpform2 = document.getElementById("password2").value;
        
        let objet = new Object();
        let nomObj = "nom";
        let prenomObj = "prenom";
        let emailObj = "Email";
        let mdpObj = "mdp";
        let mdp2Obj = "mdp2";
        objet[nomObj] = nomform;
        objet[prenomObj] = prenomform;
        objet[emailObj] = mailform;
        objet[mdpObj] = mdpform;
        objet[mdp2Obj] = mdpform2;
        localStorage.setItem("informations", JSON.stringify(objet));
        alert("Enregistrement réussi")
        document.location.href = "../HTML/login.html"
        evenement.preventDefault();
    }
});

