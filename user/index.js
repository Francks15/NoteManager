
function affiche() {
    var parent_larg = document.querySelectorAll('.parent_larg');
    var larg = document.querySelectorAll('.larg');
    for (let i = 0; i < parent_larg.length; i++) {
        let h = parent_larg[i].clientHeight;
        larg[i].style.height = h + "px";
    }
}

affiche();

window.onresize= function(){
    affiche();
}

let tbody = document.querySelector(".body-rech");
let ligne = document.querySelectorAll(".ligne");
let matri = document.querySelectorAll(".ligne-matri");
let btn_search = document.querySelector(".rechercher");
let input_search = document.getElementById("my-search");

btn_search.addEventListener('click', function (e) {
    e.preventDefault();
    if (btn_search.firstChild.nodeValue == "Rechercher ") {
        btn_search.innerHTML = "Annuler";
        let trouve = false;
        for (let i = 0; i < matri.length; i++) {
            if (matri[i].innerHTML.indexOf(input_search.value) == -1) {
                ligne[i].classList.toggle('d-none');
            } else {
                trouve = true;
            }
        }
        if (trouve == false) {
            let next_tr = document.createElement('tr');
            next_tr.id = "non_trouver";
            tbody.appendChild(next_tr);
            next_tr.innerHTML = '<td class="fst-italic" colspan=5 >Matricule introuvable</td>';
        }
    } else {
        btn_search.innerHTML = 'Rechercher <i class=" bi bi-search" ></i>';
        let next_tr = document.getElementById('non_trouver');
        if (next_tr) {
            next_tr.parentNode.removeChild(next_tr);
        }
        for (let i = 0; i < matri.length; i++) {
            ligne[i].classList.remove('d-none');
        }
    }
});

btn_search.addEventListener('submit', function (e) {
    e.preventDefault();
});