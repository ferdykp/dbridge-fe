  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

  <script>
      $(document).ready(function() {
          $('#stock_code').select2({
              placeholder: "--- Select Stock Code ---",
              allowClear: true
          });
      });
  </script>

  <script>
      document.getElementById('search').addEventListener('keyup', function() {
          let query = this.value;
          let currentRoute = document.getElementById('search').dataset.route; // Ambil route dari data attribute
          if (!currentRoute) return;

          fetch(`${currentRoute}?search=${query}`)
              .then(response => response.text())
              .then(data => {
                  document.getElementById('table-body').innerHTML = data;
              });
      });
  </script>

  <script>
      document.addEventListener("DOMContentLoaded", function() {
          const selectAllCheckbox = document.getElementById("select_all_id");
          const checkboxes = document.querySelectorAll(".checkbox_id");
          const deleteButton = document.getElementById("delete_selected");

          if (!selectAllCheckbox || !deleteButton) return;

          // **Fitur Select All**
          selectAllCheckbox.addEventListener("change", function() {
              checkboxes.forEach(checkbox => {
                  checkbox.checked = selectAllCheckbox.checked;
              });
          });

          // **Update Select All Jika Checkbox di Klik**
          checkboxes.forEach(checkbox => {
              checkbox.addEventListener("change", function() {
                  const totalChecked = document.querySelectorAll(".checkbox_id:checked").length;
                  selectAllCheckbox.checked = (totalChecked === checkboxes.length);
              });
          });

          // **Fitur Hapus Data Terpilih**
          deleteButton.addEventListener("click", function() {
              let selectedIds = Array.from(document.querySelectorAll(".checkbox_id:checked"))
                  .map(checkbox => checkbox.value);

              if (selectedIds.length === 0) {
                  alert("❌ Pilih minimal satu data untuk dihapus!");
                  return;
              }

              if (!confirm("⚠️ Anda yakin ingin menghapus data ini?")) {
                  return;
              }

              // **Tentukan route berdasarkan data-table yang sedang ditampilkan**
              let currentTable = document.getElementById("datatable");
              let tableType = currentTable.getAttribute(
                  "data-type"); // Pastikan ada atribut data-type pada tabel

              let deleteRoutes = {
                  "wr": "{{ route('wr.bulkDelete') }}",
                  "bcs": "{{ route('bcs.bulkDelete') }}",
                  "midlife": "{{ route('midlife.bulkDelete') }}",
                  "overhaul": "{{ route('overhaul.bulkDelete') }}",
                  "periodic": "{{ route('periodic.bulkDelete') }}",
                  "stockCode": "{{ route('stockCode.bulkDelete') }}"

              };

              let deleteUrl = deleteRoutes[tableType];

              if (!deleteUrl) {
                  alert("❌ Route untuk hapus tidak ditemukan.");
                  return;
              }

              // **Kirim request ke server menggunakan AJAX**
              fetch(deleteUrl, {
                      method: "POST",
                      headers: {
                          "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                          "Content-Type": "application/json"
                      },
                      body: JSON.stringify({
                          ids: selectedIds
                      })
                  })
                  .then(response => response.json())
                  .then(data => {
                      if (data.success) {
                          alert("✅ Data berhasil dihapus.");
                          location.reload();
                      } else {
                          alert("❌ Terjadi kesalahan saat menghapus data.");
                      }
                  })
                  .catch(error => console.error("❌ Gagal menghapus data:", error));
          });
      });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
      document.addEventListener("DOMContentLoaded", function() {
          var ctx1 = document.getElementById('chart-line').getContext('2d');

          var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);
          gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
          gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
          gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');

          new Chart(ctx1, {
              type: 'line',
              data: {
                  labels: ['BCS', 'WR', 'Midilfe', 'Overhaul', 'Periodic', 'Lainnya', 'Stock Code'],
                  datasets: [{
                      label: 'Jumlah Data',
                      tension: 0.4,
                      borderWidth: 0,
                      pointRadius: 4,
                      pointBackgroundColor: '#5e72e4',
                      borderColor: '#5e72e4',
                      backgroundColor: gradientStroke1,
                      borderWidth: 3,
                      fill: true,
                      data: [
                          {{ $bcsCount }},
                          {{ $wrCount }},
                          {{ $midlifeCount }},
                          {{ $overhaulCount }},
                          {{ $periodicCount }},
                          {{ $lainnyaCount }},
                          {{ $stockCodeCount }}
                      ],
                      maxBarThickness: 6,
                  }, ],
              },
              options: {
                  responsive: true,
                  maintainAspectRatio: false,
                  plugins: {
                      legend: {
                          display: false,
                      },
                  },
                  interaction: {
                      intersect: false,
                      mode: 'index',
                  },
                  scales: {
                      y: {
                          grid: {
                              drawBorder: false,
                              display: true,
                              drawOnChartArea: true,
                              drawTicks: false,
                              borderDash: [5, 5],
                          },
                          ticks: {
                              display: true,
                              padding: 10,
                              color: '#fbfbfb',
                              font: {
                                  size: 11,
                                  family: 'Open Sans',
                                  style: 'normal',
                                  lineHeight: 2,
                              },
                          },
                      },
                      x: {
                          grid: {
                              drawBorder: false,
                              display: false,
                              drawOnChartArea: false,
                              drawTicks: false,
                              borderDash: [5, 5],
                          },
                          ticks: {
                              display: true,
                              color: '#ccc',
                              padding: 20,
                              font: {
                                  size: 11,
                                  family: 'Open Sans',
                                  style: 'normal',
                                  lineHeight: 2,
                              },
                          },
                      },
                  },
              },
          });
      });
  </script>


  <script>
      var win = navigator.platform.indexOf('Win') > -1;
      if (win && document.querySelector('#sidenav-scrollbar')) {
          var options = {
              damping: '0.5'
          }
          Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
      }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/argon-dashboard.min.js?v=2.1.0"></script>
