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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

    <!-- Datatable -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script src="https://cdn.datatables.net/2.2.1/js/dataTables.js"></script>

    <!-- Custom scripts for all pages-->
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

<script>
document.addEventListener("DOMContentLoaded", function () {
    fetchChartData();
});

function fetchChartData() {
    fetch('fetch_chart_data.php')
        .then(response => response.json())
        .then(data => {
            updateCharts(data.patients, data.staff, data.babies);
        })
        .catch(error => console.error('Error fetching data:', error));
}

function updateCharts(totalPatients, totalStaff, totalBabies) {
    // Area Chart (Patients over Time)
    var ctx = document.getElementById("myAreaChart").getContext("2d");
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"], // Example labels
            datasets: [{
                label: "Total Patients",
                data: [10, 20, 30, 40, 50, 60, totalPatients], // Example data
                backgroundColor: "rgba(78, 115, 223, 0.3)", // Lighter background color
                borderColor: "rgba(78, 115, 223, 1)", // Consistent border color
                borderWidth: 3, // Thicker border for better visibility
                pointRadius: 5, // Increase point radius for visibility
                pointBackgroundColor: "rgba(78, 115, 223, 1)", // Point color
                fill: true,
                lineTension: 0.3 // Smoother line
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                x: {
                    grid: {
                        color: "#f1f1f1" // Lighter grid lines
                    }
                },
                y: {
                    grid: {
                        color: "#f1f1f1"
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 14,
                            family: "'Arial', sans-serif",
                        },
                        color: "#333" // Dark color for legend text
                    }
                }
            }
        }
    });

    // Pie Chart (Distribution of Patients, Staff, Babies)
    var ctx2 = document.getElementById("myPieChart").getContext("2d");
    new Chart(ctx2, {
        type: 'doughnut',
        data: {
            labels: ["Patients", "Staff", "Babies"],
            datasets: [{
                data: [totalPatients, totalStaff, totalBabies],
                backgroundColor: ["#4e73df", "#1cc88a", "#36b9cc"], // Updated color scheme
                borderWidth: 2, // Slight border for each section
                hoverOffset: 4, // Slight hover effect for better user experience
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 14,
                            family: "'Arial', sans-serif",
                        },
                        color: "#333" // Dark color for legend text
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            return tooltipItem.label + ": " + tooltipItem.raw;
                        }
                    }
                }
            }
        }
    });
}
</script>

    


<script>
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.dataset.id;

            fetch('get_mother.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: 'id=' + id
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    alert(data.error);
                } else {
                    // Populate the form fields
                    document.getElementById('edit-id').value = data.id;
                    document.getElementById('edit-firstname').value = data.firstname;
                    document.getElementById('edit-middlename').value = data.middlename;
                    document.getElementById('edit-lastname').value = data.lastname;
                    document.getElementById('edit-birthdate').value = data.birthdate;
                    document.getElementById('edit-birthplace').value = data.birthplace;
                    document.getElementById('edit-address').value = data.address;
                    document.getElementById('edit-contact_number').value = data.contact_number;
                    document.getElementById('edit-admission_date').value = data.admission_date;
                    document.getElementById('edit-discharge_date').value = data.discharge_date;
                    document.getElementById('edit-complications').value = data.complications;

                    // Show the modal
                    $('#editPatientModal').modal('show');
                }
            })
            .catch(error => console.error('Error fetching data:', error));
        });
    });
</script>

