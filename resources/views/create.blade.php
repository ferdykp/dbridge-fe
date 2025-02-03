@extends('layouts.master')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <form action="{{ route('wr.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div id="wrFields">
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">DSTRC_ORI</label>
                                    <input type="text" class="form-control @error('dstrc_ori') is-invalid @enderror"
                                        name="dstrc_ori" value="{{ old('dstrc_ori') }}" placeholder="Insert DSTRC_ORI">

                                    <!-- error message untuk title -->
                                    @error('dstrc_ori')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold mb-3">Creation Date</label>
                                            <input type="date"
                                                class="form-control @error('creation_date') is-invalid @enderror"
                                                name="creation_date" value="{{ old('creation_date') }}">

                                            <!-- error message untuk title -->
                                            @error('creation_date')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold mb-3">AUTHSD_DATE</label>
                                            <input type="date"
                                                class="form-control @error('authsd_date') is-invalid @enderror"
                                                name="authsd_date" value="{{ old('authsd_date') }}">

                                            <!-- error message untuk title -->
                                            @error('authsd_date')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">WO_Desc</label>
                                    <input type="text" class="form-control @error('wo_desc') is-invalid @enderror"
                                        name="wo_desc" value="{{ old('wo_desc') }}" placeholder="Insert WO_DESC">

                                    <!-- error message untuk title -->
                                    @error('wo_desc')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold mb-3">Acuan Plan Service</label>
                                            <input type="date"
                                                class="form-control @error('acuan_plan_service') is-invalid @enderror"
                                                name="acuan_plan_service" value="{{ old('acuan_plan_service') }}">

                                            <!-- error message untuk title -->
                                            @error('acuan_plan_service')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">Componen Desc</label>
                                    <input type="text" class="form-control @error('componen_desc') is-invalid @enderror"
                                        name="componen_desc" value="{{ old('componen_desc') }}"
                                        placeholder="Insert Componen Desc">

                                    <!-- error message untuk title -->
                                    @error('componen_desc')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">EGI</label>
                                    <input type="text" style="text-transform:uppercase"
                                        class="form-control @error('egi') is-invalid @enderror" name="egi"
                                        value="{{ old('egi') }}" placeholder="Insert EGI">

                                    <!-- error message untuk title -->
                                    @error('egi')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">EGI ENG</label>
                                    <input type="text" style="text-transform:uppercase"
                                        class="form-control @error('egi_eng') is-invalid @enderror" name="egi_eng"
                                        value="{{ old('egi_eng') }}" placeholder="Insert EGI ENG">

                                    <!-- error message untuk title -->
                                    @error('egi_eng')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">EQUIP_NO</label>
                                    <input type="text" class="form-control @error('equip_no') is-invalid @enderror"
                                        name="equip_no" value="{{ old('equip_no') }}" placeholder="Insert EQUIP_NO">

                                    <!-- error message untuk title -->
                                    @error('equip_no')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold mb-3">Plant Process</label>
                                            <select class="form-select @error('plant_process') is-invalid @enderror"
                                                aria-label="Default select example" name="plant_process"
                                                value="{{ old('plant_process') }}">
                                                <option value="" disabled selected hidden>--- Insert Plant
                                                    Process ---
                                                </option>
                                                <option value="SCHEDULED">SCHEDULED</option>
                                                <option value="NON PLANT">NON PLANT</option>
                                            </select>
                                            <!-- error message untuk title -->
                                            @error('plant_process')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">Plant Activity</label>
                                    <input type="text"
                                        class="form-control @error('plant_activity') is-invalid @enderror"
                                        name="plant_activity" value="{{ old('plant_activity') }}"
                                        placeholder="Insert Plant Activity">

                                    <!-- error message untuk title -->
                                    @error('plant_activity')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold mb-3">WR_NO</label>
                                            <input type="text" style="text-transform:uppercase"
                                                class="form-control @error('wr_no') is-invalid @enderror" name="wr_no"
                                                value="{{ old('wr_no') }}" placeholder="Insert WR_NO">
                                            <!-- error message untuk title -->
                                            @error('wr_no')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold mb-3">WR_ITEM</label>
                                            <input type="text" onkeypress="return /[0-9]/i.test(event.key)"
                                                class="form-control @error('wr_item') is-invalid @enderror"
                                                name="wr_item"
                                                value="{{ str_pad(old('wr_item', '0'), 4, '0', STR_PAD_LEFT) }}" />

                                            <!-- error message untuk title -->
                                            @error('wr_item')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold mb-3">QTY_REQ</label>
                                            <input type="number"
                                                class="form-control @error('qty_req') is-invalid @enderror"
                                                name="qty_req" value="{{ old('qty_req') }}"
                                                placeholder="Insert QTY_REQ">
                                            <!-- error message untuk title -->
                                            @error('qty_req')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="wr-group">
                                    {{-- <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">Stock Code</label>
                                        <select class="form-select @error('stock_code') is-invalid @enderror"
                                            name="stock_code" id="stock_code">
                                            <option value="" disabled selected hidden>--- Select Stock Code ---
                                            </option>
                                            @foreach ($stockCode as $stock)
                                                <option value="{{ $stock->stock_code }}"
                                                    {{ old('stock_code') == $stock->stock_code ? 'selected' : '' }}>
                                                    {{ $stock->stock_code }} - {{ $stock->item_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('stock_code')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div> --}}

                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">Stock Code</label>
                                        <select class="form-select select2 @error('stock_code') is-invalid @enderror"
                                            name="stock_code" id="stock_code">
                                            <option value="" disabled selected hidden>--- Select Stock Code ---
                                            </option>
                                            @foreach ($stockCode as $stock)
                                                <option value="{{ $stock->stock_code }}"
                                                    {{ old('stock_code') == $stock->stock_code ? 'selected' : '' }}>
                                                    {{ $stock->stock_code }} - {{ $stock->item_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('stock_code')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold mb-3">MNEMONIC</label>
                                                <input type="text" style="text-transform:uppercase"
                                                    class="form-control @error('mnemonic') is-invalid @enderror"
                                                    name="mnemonic" value="{{ old('mnemonic') }}"
                                                    placeholder="Insert Price Code">
                                                <!-- error message untuk title -->
                                                @error('mnemonic')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">PART_NUMBER</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('part_number') is-invalid @enderror"
                                            name="part_number" value="{{ old('part_number') }}"
                                            placeholder="Insert Part Number">
                                        <!-- error message untuk title -->
                                        @error('part_number')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold mb-3">PN_GLOBAL</label>
                                                <input type="text" style="text-transform:uppercase"
                                                    class="form-control @error('pn_global') is-invalid @enderror"
                                                    name="pn_global" value="{{ old('pn_global') }}"
                                                    placeholder="Insert PN Global">
                                                <!-- error message untuk title -->
                                                @error('pn_global')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold mb-3">ITEM_NAME</label>
                                                <input type="text" style="text-transform:uppercase"
                                                    class="form-control @error('item_name') is-invalid @enderror"
                                                    name="item_name" value="{{ old('item_name') }}"
                                                    placeholder="Insert Item Name">
                                                <!-- error message untuk title -->
                                                @error('item_name')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold mb-3">STOCK_TYPE District</label>
                                                <input type="text" style="text-transform:uppercase"
                                                    class="form-control @error('stock_type_district') is-invalid @enderror"
                                                    name="stock_type_district" value="{{ old('stock_type_district') }}"
                                                    placeholder="Insert Stock Type District">
                                                <!-- error message untuk title -->
                                                @error('stock_type_district')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">CLASS</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('class') is-invalid @enderror" name="class"
                                            value="{{ old('class') }}" placeholder="Insert Class">
                                        <!-- error message untuk title -->
                                        @error('class')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">HOME_WH</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('home_wh') is-invalid @enderror" name="home_wh"
                                            value="{{ old('home_wh') }}" placeholder="Insert Home WH">
                                        <!-- error message untuk title -->
                                        @error('home_wh')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="font-weight-bold mb-3">UOI</label>
                                        <input type="text" style="text-transform:uppercase"
                                            class="form-control @error('uoi') is-invalid @enderror" name="uoi"
                                            value="{{ old('uoi') }}" placeholder="Insert UOI">
                                        <!-- error message untuk title -->
                                        @error('uoi')
                                            <div class="alert alert-danger mt-2">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold mb-3">ISSUING PRICE</label>
                                                <input type="text" style="text-transform:uppercase"
                                                    class="form-control @error('issuing_price') is-invalid @enderror"
                                                    name="issuing_price" value="{{ old('issuing_price') }}"
                                                    placeholder="Insert Issuing Price">
                                                <!-- error message untuk title -->
                                                @error('issuing_price')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group mb-3">
                                                <label class="font-weight-bold mb-3">Price Code</label>
                                                <input type="text" style="text-transform:uppercase"
                                                    class="form-control @error('price_code') is-invalid @enderror"
                                                    name="price_code" value="{{ old('price_code') }}"
                                                    placeholder="Insert Price Code">
                                                <!-- error message untuk title -->
                                                @error('price_code')
                                                    <div class="alert alert-danger mt-2">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">Notes</label>
                                    <input type="text" class="form-control @error('notes') is-invalid @enderror"
                                        name="notes" value="{{ old('notes') }}" placeholder="Insert Notes">
                                    <!-- error message untuk title -->
                                    @error('notes')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="font-weight-bold mb-3">ETA</label>
                                    <input type="date" class="form-control @error('eta') is-invalid @enderror"
                                        name="eta" value="{{ old('eta') }}" placeholder="Insert ETA">
                                    <!-- error message untuk title -->
                                    @error('eta')
                                        <div class="alert alert-danger mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label class="font-weight-bold mb-3">Status</label>
                                            <select class="form-select @error('status') is-invalid @enderror"
                                                aria-label="Default select example" name="status"
                                                value="{{ old('status') }}">
                                                <option value="" disabled selected hidden>--- Insert Status ---
                                                </option>
                                                <option value="complete">Complete</option>
                                                <option value="continue">Continue</option>
                                            </select>
                                            <!-- error message untuk title -->
                                            @error('status')
                                                <div class="alert alert-danger mt-2">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- <button type="button" class="btn btn-secondary" onclick="addWr()">Tambah WR</button> --}}
                            <button type="submit" class="btn btn-md btn-primary me-3">Add</button>
                            <button type="reset" class="btn btn-md btn-warning">Reset</button>

                        </form>
                    </div>
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
    <div class="fixed-plugin">
        <a class="fixed-plugin-button text-dark position-fixed px-3 py-2">
            <i class="fa fa-cog py-2"> </i>
        </a>
        <div class="card shadow-lg">
            <div class="card-header pb-0 pt-3 ">
                <div class="float-start">
                    <h5 class="mt-3 mb-0">Argon Configurator</h5>
                    <p>See our dashboard options.</p>
                </div>
                <div class="float-end mt-4">
                    <button class="btn btn-link text-dark p-0 fixed-plugin-close-button">
                        <i class="fa fa-close"></i>
                    </button>
                </div>
                <!-- End Toggle Button -->
            </div>
            <hr class="horizontal dark my-1">
            <div class="card-body pt-sm-3 pt-0 overflow-auto">
                <!-- Sidebar Backgrounds -->
                <div>
                    <h6 class="mb-0">Sidebar Colors</h6>
                </div>
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <div class="badge-colors my-2 text-start">
                        <span class="badge filter bg-gradient-primary active" data-color="primary"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-dark" data-color="dark"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-info" data-color="info"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-success" data-color="success"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-warning" data-color="warning"
                            onclick="sidebarColor(this)"></span>
                        <span class="badge filter bg-gradient-danger" data-color="danger"
                            onclick="sidebarColor(this)"></span>
                    </div>
                </a>
                <!-- Sidenav Type -->
                <div class="mt-3">
                    <h6 class="mb-0">Sidenav Type</h6>
                    <p class="text-sm">Choose between 2 different sidenav types.</p>
                </div>
                <div class="d-flex">
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2 active me-2" data-class="bg-white"
                        onclick="sidebarType(this)">White</button>
                    <button class="btn bg-gradient-primary w-100 px-3 mb-2" data-class="bg-default"
                        onclick="sidebarType(this)">Dark</button>
                </div>
                <p class="text-sm d-xl-none d-block mt-2">You can change the sidenav type just on desktop view.</p>
                <!-- Navbar Fixed -->
                <div class="d-flex my-3">
                    <h6 class="mb-0">Navbar Fixed</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="navbarFixed"
                            onclick="navbarFixed(this)">
                    </div>
                </div>
                <hr class="horizontal dark my-sm-4">
                <div class="mt-2 mb-5 d-flex">
                    <h6 class="mb-0">Light / Dark</h6>
                    <div class="form-check form-switch ps-0 ms-auto my-auto">
                        <input class="form-check-input mt-1 ms-auto" type="checkbox" id="dark-version"
                            onclick="darkMode(this)">
                    </div>
                </div>
                <a class="btn bg-gradient-dark w-100" href="https://www.creative-tim.com/product/argon-dashboard">Free
                    Download</a>
                <a class="btn btn-outline-dark w-100"
                    href="https://www.creative-tim.com/learning-lab/bootstrap/license/argon-dashboard">View
                    documentation</a>
                <div class="w-100 text-center">
                    <a class="github-button" href="https://github.com/creativetimofficial/argon-dashboard"
                        data-icon="octicon-star" data-size="large" data-show-count="true"
                        aria-label="Star creativetimofficial/argon-dashboard on GitHub">Star</a>
                    <h6 class="mt-3">Thank you for sharing!</h6>
                    <a href="https://twitter.com/intent/tweet?text=Check%20Argon%20Dashboard%20made%20by%20%40CreativeTim%20%23webdesign%20%23dashboard%20%23bootstrap5&amp;url=https%3A%2F%2Fwww.creative-tim.com%2Fproduct%2Fargon-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-twitter me-1" aria-hidden="true"></i> Tweet
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=https://www.creative-tim.com/product/argon-dashboard"
                        class="btn btn-dark mb-0 me-2" target="_blank">
                        <i class="fab fa-facebook-square me-1" aria-hidden="true"></i> Share
                    </a>
                </div>
            </div>
        </div>
    </div>
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
    {{-- Get StockCode Data --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#stock_code').change(function() {
                var stockCode = $(this).val(); // Ambil nilai stock_code

                if (stockCode) {
                    $.ajax({
                        url: '/get-stock/' + stockCode, // Panggil endpoint
                        method: 'GET',
                        success: function(data) {
                            // Isi otomatis kolom lain berdasarkan response
                            $('input[name="mnemonic"]').val(data.mnemonic);
                            $('input[name="part_number"]').val(data.part_number);
                            $('input[name="pn_global"]').val(data.pn_global);
                            $('input[name="item_name"]').val(data.item_name);
                            $('input[name="stock_type_district"]').val(data
                                .stock_type_district);
                            $('input[name="class"]').val(data.class);
                            $('input[name="home_wh"]').val(data.home_wh);
                            $('input[name="uoi"]').val(data.uoi);
                            $('input[name="issuing_price"]').val(data.issuing_price);
                            $('input[name="price_code"]').val(data.price_code);
                        },
                        error: function() {
                            alert('Stock Code not found');
                        }
                    });
                }
            });
        });
    </script>
    </body>
@endsection
