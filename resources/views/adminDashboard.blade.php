@extends('layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('wr.create') }}" class="btn btn-md btn-success">Add</a>
                        </div>
                        <div>
                            <a href="{{ route('wr.export') }}" class="btn btn-md btn-warning"><i class="fa fa-download"></i>
                                Export User Data</a>
                        </div>
                    </div>
                    <div class="card-header pb-0">
                        <h6>Authors table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-4">
                        <div class="table-responsive p-0">
                            <table id="datatable" class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>DSTRC_ORI</th>
                                        <th>CREATION_DATE</th>
                                        <th>AUTHSD_DATE</th>
                                        <th>WO_DESC</th>
                                        <th>ACUAN PLAN SERVICE</th>
                                        <th>Componen_Desc</th>
                                        <th>EGI</th>
                                        <th>EGI ENG</th>
                                        <th>EQUIP_NO</th>
                                        <th>Plant Process</th>
                                        <th>Plant Activity</th>
                                        <th>WR_NO</th>
                                        <th>WR_ITEM</th>
                                        <th>QTY_REQ</th>
                                        <th>Stock_Code</th>
                                        <th>Price_Code</th>
                                        <th>ITEM_NAME</th>
                                        <th>CLASS</th>
                                        <th>Current Class</th>
                                        <th>Mnemonic Current</th>
                                        <th>PN Current</th>
                                        <th>PN Global</th>
                                        <th>WH</th>
                                        <th>UOI</th>
                                        <th>Notes</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($wr as $index => $wr)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $wr->dstrc_ori }}</td>
                                            <td>{{ $wr->creation_date }}</td>
                                            <td>{{ $wr->authsd_date }}</td>
                                            <td>{{ $wr->wo_desc }}</td>
                                            <td>{{ $wr->acuan_plan_service }}</td>
                                            <td>{{ $wr->componen_desc }}</td>
                                            <td>{{ $wr->egi }}</td>
                                            <td>{{ $wr->egi_eng }}</td>
                                            <td>{{ $wr->equip_no }}</td>
                                            <td>{{ $wr->plant_process }}</td>
                                            <td>{{ $wr->plant_activity }}</td>
                                            <td>{{ $wr->wr_no }}</td>
                                            <td>{{ $wr->wr_item }}</td>
                                            <td>{{ $wr->qty_req }}</td>
                                            <td>{{ $wr->stock_code }}</td>
                                            <td>{{ $wr->price_code }}</td>
                                            <td>{{ $wr->item_name }}</td>
                                            <td>{{ $wr->class }}</td>
                                            <td>{{ $wr->current_class }}</td>
                                            <td>{{ $wr->mnemonic_current }}</td>
                                            <td>{{ $wr->pn_current }}</td>
                                            <td>{{ $wr->pn_global }}</td>
                                            <td>{{ $wr->wh }}</td>
                                            <td>{{ $wr->uoi }}</td>
                                            <td>{{ $wr->notes }}</td>
                                            <td>{{ $wr->status }}</td>
                                            <td class="d-flex justify-content-center">
                                                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                                    action="{{ route('wr.destroy', $wr->id) }}" method="POST"
                                                    class="d-flex gap-2">
                                                    <a href="{{ route('wr.show', $wr->id) }}"
                                                        class="btn btn-sm btn-dark">Show</a>
                                                    <a href="{{ route('wr.edit', $wr->id) }}"
                                                        class="btn btn-sm btn-primary">Edit</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="50">
                                                <div class="alert alert-danger text-center">
                                                    Data Barang belum tersedia.
                                                </div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                    Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </main>

    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script>
        var ctx1 = document.getElementById("chart-line").getContext("2d");

        var gradientStroke1 = ctx1.createLinearGradient(0, 230, 0, 50);

        gradientStroke1.addColorStop(1, 'rgba(94, 114, 228, 0.2)');
        gradientStroke1.addColorStop(0.2, 'rgba(94, 114, 228, 0.0)');
        gradientStroke1.addColorStop(0, 'rgba(94, 114, 228, 0)');
        new Chart(ctx1, {
            type: "line",
            data: {
                labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
                datasets: [{
                    label: "Mobile apps",
                    tension: 0.4,
                    borderWidth: 0,
                    pointRadius: 0,
                    borderColor: "#5e72e4",
                    backgroundColor: gradientStroke1,
                    borderWidth: 3,
                    fill: true,
                    data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
                    maxBarThickness: 6

                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false,
                    }
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
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            padding: 10,
                            color: '#fbfbfb',
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                    x: {
                        grid: {
                            drawBorder: false,
                            display: false,
                            drawOnChartArea: false,
                            drawTicks: false,
                            borderDash: [5, 5]
                        },
                        ticks: {
                            display: true,
                            color: '#ccc',
                            padding: 20,
                            font: {
                                size: 11,
                                family: "Open Sans",
                                style: 'normal',
                                lineHeight: 2
                            },
                        }
                    },
                },
            },
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
    </body>
@endsection

</html>
