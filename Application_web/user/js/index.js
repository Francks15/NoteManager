

let tbody = document.querySelector(".body-rech");
let ligne = document.querySelectorAll(".ligne");
let matri = document.querySelectorAll(".ligne-matri");
let input_search = document.getElementById("my-search");

input_search.addEventListener('keyup', function (e) {
    if (input_search.value != "") {
        let chaine = input_search.value.toUpperCase()
        let trouve = false;
        for (let i = 0; i < matri.length; i++) {
            if (matri[i].innerHTML.indexOf(chaine) == -1) {
                ligne[i].classList.add('d-none');
            } else {
                trouve = true;
                ligne[i].classList.remove('d-none');
                let non_trouver = document.getElementById('non_trouver');
                if (non_trouver) {
                    non_trouver.parentNode.removeChild(non_trouver);
                }
            }
        }
        if (trouve == false) {
            let non_trouver = document.getElementById('non_trouver');
            if (!non_trouver) {
                let next_tr = document.createElement('tr');
                next_tr.id = "non_trouver";
                tbody.appendChild(next_tr);
                next_tr.innerHTML = '<td class="fst-italic" colspan=7 >Matricule introuvable</td>';
            }
        }
    } else if (input_search.value == "") {
        let next_tr = document.getElementById('non_trouver');
        if (next_tr) {
            next_tr.parentNode.removeChild(next_tr);
        }
        for (let i = 0; i < matri.length; i++) {
            ligne[i].classList.remove('d-none');
        }
    }
});


let cel = document.querySelectorAll('.cel');
let soumettre = document.querySelector('.soumettre');
let total = document.querySelectorAll('.total');

function preventDef(e) {
    e.preventDefault();
    e.target.addEventListener('submit', function (event) {
        event.preventDefault()
    });
    return true;
}

function controle(i, j) {
    cel[i].style.removeProperty('background-color');
    let val_id = cel[3 * j + 1].id;
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
    if (cel[3 * j].value == "el" || cel[3 * j].value == "EL" || cel[3 * j + 1].value == "el" || cel[3 * j + 1].value == "EL" || cel[3 * j + 2].value == "el" || cel[3 * j + 2].value == "EL") {
        total[j].innerHTML == "EL";
    } else {
        let tab = [];
        let T = 0;
        let cc = parseFloat(cel[3 * j].value);
        let tp;
        let ee = parseFloat(cel[3 * j + 2].value);
        if (val_id.indexOf('modtp') != -1) {
            tp = parseFloat(cel[3 * j + 1].value);
        } else {
            tp = 0;
        }
        if (cc) {
            tab.push(cc);
        }
        if (tp) {
            tab.push(tp);
        }
        if (ee) {
            tab.push(ee);
        }
        for (let y = 0; y < tab.length; y++) {
            T += tab[y];
        }
        total[j].innerHTML = Math.round(T * 100) / 100;
    }

}

function alert_soumission(i) {
    let enregistrement2 = document.querySelector('.enregistrement2')
    cel[i].style.backgroundColor = "#ffabab";
    enregistrement2.classList.remove('d-none');
    window.setTimeout(function () {
        enregistrement2.classList.add("d-none");
    }, 7000);
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
                alert_soumission(i)
            }
            if ((cel[i + 1].value >= 0 && cel[i + 1].value <= 30) || cel[i + 1].value == "el" || cel[i + 1].value == "/" || cel[i + 1].value == "EL") {} else {
                if (!prevent) {
                    prevent = preventDef(e);
                };
                alert_soumission(i + 1)
            }
            if ((cel[i + 2].value >= 0 && cel[i + 2].value <= 50) || cel[i + 2].value == "el" || cel[i + 2].value == "/" || cel[i + 2].value == "EL") {} else {
                if (!prevent) {
                    prevent = preventDef(e);
                };
                alert_soumission(i + 2);
            }
        } else {
            if ((cel[i].value >= 0 && cel[i].value <= 30) || cel[i].value == "el" || cel[i].value == "/" || cel[i].value == "EL") {} else {
                if (!prevent) {
                    prevent = preventDef(e);
                };
                alert_soumission(i);
            }
            if ((cel[i + 2].value >= 0 && cel[i + 2].value <= 70) || cel[i + 2].value == "el" || cel[i + 2].value == "/" || cel[i + 2].value == "EL") {} else {
                if (!prevent) {
                    prevent = preventDef(e);
                };
                alert_soumission(i + 2);
            }
        }
    }
})


for (let i = 0; i < cel.length; i++) {
    let j = i / 3 >> 0;
    cel[i].addEventListener('keyup', function () {
        controle(i, j)
    });
}

let enregistrement = document.querySelector(".enregistrement");

if (enregistrement) {
    window.setTimeout(function () {
        enregistrement.classList.add('d-none');
    }, 7000)
}