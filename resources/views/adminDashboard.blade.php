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
                                <thead class="table-light">
                                    <tr>
                                        <th style="white-space: nowrap;">No</th>
                                        <th style="white-space: nowrap;">DSTRC_ORI</th>
                                        <th style="white-space: nowrap;">CREATION_DATE</th>
                                        <th style="white-space: nowrap;">AUTHSD_DATE</th>
                                        <th style="white-space: nowrap;">WO_DESC</th>
                                        <th style="white-space: nowrap;">ACUAN PLAN SERVICE</th>
                                        <th style="white-space: nowrap;">Componen_Desc</th>
                                        <th style="white-space: nowrap;">EGI</th>
                                        <th style="white-space: nowrap;">EGI ENG</th>
                                        <th style="white-space: nowrap;">EQUIP_NO</th>
                                        <th style="white-space: nowrap;">Plant Process</th>
                                        <th style="white-space: nowrap;">Plant Activity</th>
                                        <th style="white-space: nowrap;">WR_NO</th>
                                        <th style="white-space: nowrap;">WR_ITEM</th>
                                        <th style="white-space: nowrap;">QTY_REQ</th>
                                        <th style="white-space: nowrap;">Stock_Code</th>
                                        <th style="white-space: nowrap;">Mnemonic</th>
                                        <th style="white-space: nowrap;">PART_NUMBER</th>
                                        <th style="white-space: nowrap;">PN_GLOBAL</th>
                                        <th style="white-space: nowrap;">ITEM_NAME</th>
                                        <th style="white-space: nowrap;">STOCK_TYPE_DISTRICT</th>
                                        <th style="white-space: nowrap;">CLASS</th>
                                        <th style="white-space: nowrap;">HOME_WH</th>
                                        <th style="white-space: nowrap;">UOI</th>
                                        <th style="white-space: nowrap;">ISSUING PRICE</th>
                                        <th style="white-space: nowrap;">PRICE_CODE</th>
                                        <th style="white-space: nowrap;">Notes</th>
                                        <th style="white-space: nowrap;">Status</th>
                                        <th style="white-space: nowrap;">Action</th>

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
                                            <td>{{ $wr->mnemonic }}</td>
                                            <td>{{ $wr->part_number }}</td>
                                            <td>{{ $wr->pn_global }}</td>
                                            <td>{{ $wr->item_name }}</td>
                                            <td>{{ $wr->stock_type_district }}</td>
                                            <td>{{ $wr->class }}</td>
                                            <td>{{ $wr->home_wh }}</td>
                                            <td>{{ $wr->uoi }}</td>
                                            <td>{{ $wr->issuing_price }}</td>
                                            <td>{{ $wr->price_code }}</td>
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
    </div>
@endsection
