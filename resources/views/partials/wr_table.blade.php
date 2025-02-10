@forelse ($data as $index => $item)
    <tr>
        @if (in_array(Auth::user()->role, ['sm', 'supplier']))
            <td class="text-center">
                <input type="checkbox" class="checkbox_id" value="{{ $item->id }}">
            </td>
        @endif
        <td class="text-center">
            {{ $index + 1 + ($data->currentPage() - 1) * $data->perPage() }}
        </td>
        <td class="text-center">{{ $item->dstrct_ori }}</td>
        <td class="text-center">{{ $item->creation_date }}</td>
        <td class="text-center">{{ $item->authsd_date }}</td>
        <td class="text-center">{{ $item->wo_desc }}</td>
        <td class="text-center">{{ $item->acuan_plan_service }}</td>
        <td class="text-center">{{ $item->componen_desc }}</td>
        <td class="text-center">{{ $item->egi }}</td>
        <td class="text-center">{{ $item->egi_eng }}</td>
        <td class="text-center">{{ $item->equip_no }}</td>
        <td class="text-center">{{ $item->plant_process }}</td>
        <td class="text-center">{{ $item->plant_activity }}</td>
        <td class="text-center">{{ $item->wr_no }}</td>
        <td class="text-center">{{ $item->wr_item }}</td>
        <td class="text-center">{{ $item->qty_req }}</td>
        <td class="text-center">{{ $item->stock_code }}</td>
        <td class="text-center">{{ $item->mnemonic }}</td>
        <td class="text-center">{{ $item->part_number }}</td>
        <td class="text-center">{{ $item->pn_global }}</td>
        <td class="text-center">{{ $item->item_name }}</td>
        <td class="text-center">{{ $item->stock_type_district }}</td>
        <td class="text-center">{{ $item->class }}</td>
        <td class="text-center">{{ $item->home_wh }}</td>
        <td class="text-center">{{ $item->uoi }}</td>
        <td class="text-center">{{ $item->issuing_price }}</td>
        <td class="text-center">{{ $item->price_code }}</td>
        <td class="text-center">{{ $item->notes }}</td>
        <td class="text-center">{{ $item->eta }}</td>
        <td class="text-center">{{ $item->status }}</td>
        @if (in_array(Auth::user()->role, ['sm', 'supplier']))
            <td class="d-flex justify-content-center">
                <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                    action="{{ route($routePrefix . '.destroy', $item->id) }}" method="POST" class="d-flex gap-2">
                    {{-- <a href="{{ route($routePrefix . '.show', $item->id) }}" class="btn btn-sm btn-dark">Show</a> --}}
                    <a href="{{ route($routePrefix . '.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                    {{-- <a href="{{ route('dynamic.edit', ['type' => $routePrefix, 'id' => $item->id]) }}"
                    class="btn btn-sm btn-primary">Edit</a> --}}
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        @endif

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
