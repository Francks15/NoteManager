<hr>
<div class="footer"></div>
<footer class="container-fluid text-center text-light bg-dark pt-2 footer position-absolute bottom-0 pb-2">
    <h3>GESTION DES NOTES DE L'UNIVERSITE DE YAOUNDE I</h3>
    <p class="lead text-center text-danger m-0 pt-5">NoteManager&copy; 2022 All rights reserved | CUTI UY1 |</p>
</footer>
<script src="bootstrap.min.js"></script>
<script>
    function height() {
        let h = window.innerHeight;
        document.body.style.minHeight = h + "px";
    }
    window.onload = function() {
        height()
    };
    window.onresize = function() {
        height()
    };
</script>
</body>

</html>