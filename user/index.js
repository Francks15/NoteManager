function affiche() {
    var parent_larg = document.querySelectorAll('.parent_larg');
    var larg = document.querySelectorAll('.larg');
    for (let i = 0; i < parent_larg.length; i++) {
        let h = parent_larg[i].clientHeight;
        larg[i].style.height = h + "px";
    }
}

affiche();

window.onresize = function () {
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

let cel = document.querySelectorAll('.cel');
let soumettre = document.querySelector('.soumettre');

function preventDef(e) {
    e.preventDefault();
    e.target.addEventListener('submit', function (event) {
        event.preventDefault()
    });
    return true;
}


soumettre.addEventListener('click', function (e) {
    let prevent = false;
    for (let i = 0; i < cel.length; i += 3) {
        let val_id = cel[i + 1].id;
        for (let j = 0; j < 3; j++) {
            cel[i + j].style.removeProperty('background-color');
        }
        if (val_id.indexOf('modtp') != -1) {

            if ((cel[i].value >= 0 && cel[i].value <= 20) || cel[i].value == "el" || cel[i].value == "/" || cel[i].value == "EL") {} else {
                if (!prevent) {
                    prevent = preventDef(e);
                };
                cel[i].style.backgroundColor = "#ffabab";
            }
            if ((cel[i + 1].value >= 0 && cel[i + 1].value <= 30) || cel[i + 1].value == "el" || cel[i + 1].value == "/" || cel[i + 1].value == "EL") {} else {
                if (!prevent) {
                    prevent = preventDef(e);
                };
                cel[i + 1].style.backgroundColor = "#ffabab";
            }
            if ((cel[i + 2].value >= 0 && cel[i + 2].value <= 50) || cel[i + 2].value == "el" || cel[i + 2].value == "/" || cel[i + 2].value == "EL") {} else {
                if (!prevent) {
                    prevent = preventDef(e);
                };
                cel[i + 2].style.backgroundColor = "#ffabab";
            }
        } else {
            if ((cel[i].value >= 0 && cel[i].value <= 30) || cel[i].value == "el" || cel[i].value == "/" || cel[i].value == "EL") {} else {
                if (!prevent) {
                    prevent = preventDef(e);
                };
                cel[i].style.backgroundColor = "#ffabab";
            }
            if ((cel[i + 2].value >= 0 && cel[i + 2].value <= 70) || cel[i + 2].value == "el" || cel[i + 2].value == "/" || cel[i + 2].value == "EL") {} else {
                if (!prevent) {
                    prevent = preventDef(e);
                };
                cel[i + 2].style.backgroundColor = "#ffabab";
            }
        }
    }
})


for (let i = 0; i < cel.length; i++) {
    let j = i / 3 >> 0;
    cel[i].addEventListener('blur', function (e) {
        cel[i].style.removeProperty('background-color');
        let val_id = cel[3*j + 1].id;
        if (val_id.indexOf('modtp') != -1) {
            if (i % 3 == 0) {
                if ((cel[i].value >= 0 && cel[i].value <= 20) || cel[i].value == "el" || cel[i].value == "/" || cel[i].value == "EL") {} else {
                    cel[i].style.backgroundColor = "#ffabab";
                }
            } else if (i % 3 == 1) {
                if ((cel[i].value >= 0 && cel[i].value <= 30) || cel[i].value == "el" || cel[i].value == "/" || cel[i].value == "EL") {} else {
                    cel[i].style.backgroundColor = "#ffabab";
                }
            } else if (i % 3 == 2) {
                if ((cel[i].value >= 0 && cel[i].value <= 50) || cel[i].value == "el" || cel[i].value == "/" || cel[i].value == "EL") {} else {
                    cel[i].style.backgroundColor = "#ffabab";
                }
            }
        } else {
            if (i % 3 == 0)
                if ((cel[i].value >= 0 && cel[i].value <= 30) || cel[i].value == "el" || cel[i].value == "/" || cel[i].value == "EL") {} else {
                    cel[i].style.backgroundColor = "#ffabab";
                }
            else if (i % 3 == 2) {
                if ((cel[i].value >= 0 && cel[i].value <= 70) || cel[i].value == "el" || cel[i].value == "/" || cel[i].value == "EL") {} else {
                    cel[i].style.backgroundColor = "#ffabab";
                }
            }
        }
    })
}