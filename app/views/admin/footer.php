<!-- </div> -->
<footer class="footer" style="background-color:#f8f5f0;">
    <div class="copyright" id="copyright">
        &copy; <script>
        document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
        </script> Singular Tous droits réservés. Projet de fin de formation de l'ADRAR.
    </div>
    </div>
</footer>
    </div>
</div>
    <!-- Core JS Files -->
    <script src="<?=ASSETS?>admin/js/core/jquery.min.js"></script>
    <script src="<?=ASSETS?>admin/js/script.js"></script>
    <script src="<?=ASSETS?>admin/js/core/popper.min.js"></script>
    <script src="<?=ASSETS?>admin/js/core/bootstrap.min.js"></script>
    <script src="<?=ASSETS?>admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script type="text/javascript" src="<?=ASSETS?>admin/DataTables/datatables.js"></script>
    <!-- Chart JS -->
    <script src="<?=ASSETS?>admin/js/plugins/chartjs.min.js"></script>
    <!-- Notifications Plugin -->
    <script src="<?=ASSETS?>admin/js/plugins/bootstrap-notify.js"></script>
    <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?=ASSETS?>admin/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script>
</body>
</html>

<script>
$(document).ready(function () {
    $('#table_id').DataTable({
        "ordering": false,
        // pagingType: 'numbers',
        language: {
            search: "Recherche :",
            searchPlaceholder: "",
            lengthMenu: 'Afficher _MENU_ par page',
            zeroRecords: 'Pas de résultats disponibles.',
            info: 'Page _PAGE_ sur _PAGES_',
            infoEmpty: 'Pas de résultats disponibles.',
            infoFiltered: '(Sur _MAX_ résultats)',
            "paginate": {
                "previous": "Précédent",
                "next": "Suivant"
            },
        },
    } );
});
</script>