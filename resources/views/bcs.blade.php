@extends('layouts.master')

@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4 ">
                    @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                        <div class="card-header">
                            <div>
                                <form action="{{ route('bcs.import') }}" method="POST" enctype="multipart/form-data"
                                    class="d-flex">
                                    @csrf
                                    <div class="form-group me-2">
                                        <label for="file">Upload BCS File in Excel</label>
                                        <input type="file" name="file" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary mt-4">Import BCS</button>
                                </form>
                            </div>
                        </div>
                    @endif
                    <div class="card-header pb-0 d-flex justify-content-between">
                        @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                            <div class="d-flex flex-column">
                                <div class="d-flex">
                                    <a class="btn btn-danger me-2" id="delete_selected">Delete Selected</a>
                                    <a href="{{ route('bcs.create') }}" class="btn btn-md btn-success me-2">Add BCS</a>
                        @endif
                        <a href="{{ route('bcs.export') }}" class="btn btn-md btn-warning"><i
                                class="fa fa-download"></i>Export Data BCS in Excel</a>
                    </div>
                </div>
                <div class="w-25"> <!-- Adjust the width as needed -->
                    <input type="text" id="search" data-route="{{ route('dynamic.search', ['type' => 'bcs']) }}"
                        name="search" placeholder="Search BCS Code" autocomplete="off" class="form-control">
                </div>
            </div>
            <div class="card-header pb-0">
                <h6>Data BCS</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-4">
                <div class="table-responsive p-0">
                    <table id="datatable" class="table align-items-center mb-0">
                        <thead class="table-light">
                            <tr>
                                @if (in_array(Auth::user()->role, ['sm', 'supplier']))
                                    <th style="white-space: nowrap;" class="text-center"><input type="checkbox"
                                            name="select_all" id="select_all_id"></th>
                                @endif
                                <th style="white-space: nowrap;" class="text-center">No</th>
                                <th style="white-space: nowrap;" class="text-center">DSTRC_ORI</th>
                                <th style="white-space: nowrap;" class="text-center">CREATION_DATE</th>
                                <th style="white-space: nowrap;" class="text-center">AUTHSD_DATE</th>
                                <th style="white-space: nowrap;" class="text-center">WO_DESC</th>
                                <th style="white-space: nowrap;" class="text-center">ACUAN PLAN SERVICE</th>
                                <th style="white-space: nowrap;" class="text-center">Componen_Desc</th>
                                <th style="white-space: nowrap;" class="text-center">EGI</th>
                                <th style="white-space: nowrap;" class="text-center">EGI ENG</th>
                                <th style="white-space: nowrap;" class="text-center">EQUIP_NO</th>
                                <th style="white-space: nowrap;" class="text-center">Plant Process</th>
                                <th style="white-space: nowrap;" class="text-center">Plant Activity</th>
                                <th style="white-space: nowrap;" class="text-center">WR_NO</th>
                                <th style="white-space: nowrap;" class="text-center">WR_ITEM</th>
                                <th style="white-space: nowrap;" class="text-center">QTY_REQ</th>
                                <th style="white-space: nowrap;" class="text-center">Stock_Code</th>
                                <th style="white-space: nowrap;" class="text-center">Mnemonic</th>
                                <th style="white-space: nowrap;" class="text-center">PART_NUMBER</th>
                                <th style="white-space: nowrap;" class="text-center">PN_GLOBAL</th>
                                <th style="white-space: nowrap;" class="text-center">ITEM_NAME</th>
                                <th style="white-space: nowrap;" class="text-center">STOCK_TYPE_DISTRICT</th>
                                <th style="white-space: nowrap;" class="text-center">CLASS</th>
                                <th style="white-space: nowrap;" class="text-center">HOME_WH</th>
                                <th style="white-space: nowrap;" class="text-center">UOI</th>
                                <th style="white-space: nowrap;" class="text-center">ISSUING PRICE</th>
                                <th style="white-space: nowrap;" class="text-center">PRICE_CODE</th>
                                <th style="white-space: nowrap;" class="text-center">Notes</th>
                                <th style="white-space: nowrap;" class="text-center">Status</th>
                                <th style="white-space: nowrap;" class="text-center">Action</th>

                            </tr>
                        </thead>
                        <tbody id="table-body">
                            @include('partials.wr_table', ['data' => $bcs, 'routePrefix' => 'bcs'])
                        </tbody>
                    </table>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div>
                        Showing {{ $bcs->firstItem() }} to {{ $bcs->lastItem() }} of
                        {{ $bcs->total() }} entries
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        {{ $bcs->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const selectAllCheckbox = document.getElementById("select_all_id");
            const checkboxes = document.querySelectorAll(".checkbox_id");
            const deleteButton = document.getElementById("delete_selected"); // Pastikan ID tombol delete benar

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

                // **Looping Hapus Data dengan Fetch API**
                let deletePromises = selectedIds.map(id => {
                    return fetch(`/wr/${id}`, {
                            method: "DELETE",
                            headers: {
                                "X-CSRF-TOKEN": document.querySelector(
                                    'meta[name="csrf-token"]').content,
                                "Content-Type": "application/json"
                            }
                        })
                        .then(response => response.json())
                        .catch(error => console.error(`❌ Gagal menghapus ${id}`, error));
                });
                Promise.all(deletePromises).then(() => {
                    location.reload(); // Langsung reload tanpa notifikasi
                });

                // **Reload Halaman Setelah Semua Data Dihapus**
                // Promise.all(deletePromises).then(() => {
                //     alert("✅ Data berhasil dihapus.");
                //     location.reload();
                // });
            });
        });
    </script>
@endsection
