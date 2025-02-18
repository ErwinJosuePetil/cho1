    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">


    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Datatable -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    fetch('fetch_dashboard_data.php')
    .then(response => response.json())
    .then(data => {
        document.getElementById("totalPatients").innerText = data.total_patients;
        document.getElementById("annualPatients").innerText = data.annual_patients;
        document.getElementById("taskPercentage").innerText = data.task_percentage + "%";
        document.getElementById("pendingRequests").innerText = data.pending_requests;
        document.getElementById("taskProgress").style.width = data.task_percentage + "%";
    })
    .catch(error => console.error('Error fetching dashboard data:', error));
});
</script>

