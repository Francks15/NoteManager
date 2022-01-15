<hr>
<div class="footer"></div>
<footer class="container-fluid text-center text-light bg-dark pt-2 footer position-absolute bottom-0 pb-2">
    <h4>GESTION DES NOTES DE L'UNIVERSITE DE YAOUNDE I</h4>
    <p class="lead text-center text-danger m-0 pt-5">NoteManager&copy; 2022 All rights reserved | CUTI UY1 |</p>
</footer>
</div>
<script src="bootstrap.min.js"></script>
<script>
    function height() {
        let h = window.innerHeight;
        document.body.style.minHeight = h + "px";
    }
    window.onload = function() {
        height();
        let chargement = document.querySelector('.chargement');
        let cover = document.querySelector('.cover');
        let page = document.querySelector('.page');
        chargement.classList.add("v-none");
        cover.classList.add("v-none");
        page.classList.remove('v-none');
    };
    window.onresize = function() {
        height();
    };



    let button = document.querySelectorAll('.btn');
    for(let i=0; i<button.length; i++){
        let cover = document.querySelector('.cover');
        let chargement = document.querySelector('.chargement');
        button[i].onclick=function(){
            chargement.classList.remove('v-none');
            cover.classList.remove('v-none');
            window.setTimeout(function(){
                chargement.classList.add('v-none');
                cover.classList.add('v-none');
            }, 2000);
        }
    }
</script>
</body>

</html>