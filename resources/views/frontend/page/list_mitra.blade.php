@foreach($mitra as $no => $list)
    <tr>
        <td scope="col" class="text-center">{{ $no+1 }}</td>
        <td scope="col" class="text-center">{{ $list->mitra_name }}</td>
        <td scope="col" class="text-center">
            @if($list->mitra_position === 'm')
                Marketer
            @elseif($list->mitra_position === 'r')
                Resseller
            @elseif($list->mitra_position === 's')
                Sub-Agen
            @elseif($list->mitra_position === 'a')
                Agen
            @else
                Tidak ada posisi
            @endif
        </td>
        <td scope="col" class="text-center">{{ $list->mitra_address }}</td>
    </tr>
@endforeach