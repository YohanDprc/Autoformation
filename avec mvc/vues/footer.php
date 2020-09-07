<div id="modalSup" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation de suppression</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Voulez vous supprimer cette nationalité ?</p>
            </div>
            <div class="modal-footer">
                <a href="" type="button" class="btn btn-secondary" data-dismiss="modal">Retour</a>
                <a href="" type="button" class="btn btn-primary" id="btnSup">Supprimer</a>
            </div>
        </div>
    </div>
</div>
<footer class="container">
    <p>&copy; Company 2017-2020</p>
</footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script type="text/javascript">
    $("a[data-suppression]").click(function() {
        var lien = $(this).attr("data-suppression"); // On récupère le lien du bouton "Poubelle"
        var message = $(this).attr("data-message"); // On récupère le lien du bouton
        $("#btnSup").attr("href", lien); // On écrit ce lien sur le bouton "Supprimer" de la modal
        $(".modal-body").text(message); // On écrit ce lien sur le bouton "Supprimer" de la modal
    });
</script>
</body>

</html>