@forelse ($stockCode as $index => $stockCodes)
    <tr>
        <td class="text-center">{{ $index + 1 + ($stockCode->currentPage() - 1) * $stockCode->perPage() }}</td>
        <td class="text-center">{{ $stockCodes->stock_code }}</td>
        <td class="text-center">{{ $stockCodes->price_code }}</td>
        <td class="text-center">{{ $stockCodes->item_name }}</td>
        <td class="text-center">{{ $stockCodes->class }}</td>
        <td class="text-center">{{ $stockCodes->stock_type_district }}</td>
        <td class="text-center">{{ $stockCodes->mnemonic }}</td>
        <td class="text-center">{{ $stockCodes->part_number }}</td>
        <td class="text-center">{{ $stockCodes->pn_global }}</td>
        <td class="text-center">{{ $stockCodes->home_wh }}</td>
        <td class="text-center">{{ $stockCodes->uoi }}</td>
        <td class="text-center">{{ $stockCodes->issuing_price }}</td>
        <td class="d-flex justify-content-center">
            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                action="{{ route('stockCode.destroy', $stockCodes->id) }}" method="POST" class="d-flex gap-2">
                <a href="{{ route('stockCode.show', $stockCodes->id) }}" class="btn btn-sm btn-dark">Show</a>
                <a href="{{ route('stockCode.edit', $stockCodes->id) }}" class="btn btn-sm btn-primary">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
            </form>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="13" class="text-center">
            <div class="alert alert-danger text-center">
                Data Barang belum tersedia.
            </div>
        </td>
    </tr>
@endforelse
