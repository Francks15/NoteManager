let modifier = document.querySelectorAll(".prof-modifier");
for (let i = 0; i < modifier.length; i++) {
    let element = modifier[i];
    console.log('element :>> ', element);
    let id = element.id;
    let td = document.querySelectorAll("." + id);
    element.addEventListener("click", function () {
        console.log('td[0] :>> ', td[0]);
        console.log('td[1] :>> ', td[1]);
        var input_text = td[1].firstElementChild;
        if (element.innerHTML == "Modifier") {
            element.innerHTML = "Terminer";
            td[0].className += " d-none";
            td[1].className = id;
            input_text.value = td[0].innerHTML;
        } else {
            element.innerHTML = "Modifier";
            td[1].className += " d-none";
            td[0].className = id;
            td[0].innerHTML = input_text.value;
        }
    });
}