<!-- Vendor JS Files -->
<script src="assets/vendor/purecounter/purecounter.js"></script>
<script src="assets/vendor/aos/aos.js"></script>
<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
<script src="assets/vendor/php-email-form/validate.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    fetch('/report-data')
        .then(response => response.json())
        .then(data => {
            const ctx = document.getElementById('reportChart').getContext('2d');
            new Chart(ctx, {
                type: 'pie', // Grafik batang
                data: {
                    labels: ['Total Pengaduan', 'Pengaduan Selesai'],
                    datasets: [{
                        label: 'Jumlah Pengaduan',
                        data: [data.totalReports, data.completedReports],
                        backgroundColor: ['#4CAF50', '#FF6384'],
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Pastikan ukuran tidak terlalu besar
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            callbacks: {
                                label: function(tooltipItem) {
                                    const value = tooltipItem.raw;
                                    return `${tooltipItem.label}: ${value}`;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error fetching report data:', error));
});
</script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>
