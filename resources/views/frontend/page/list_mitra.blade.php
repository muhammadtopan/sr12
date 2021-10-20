@foreach($mitra as $no => $list)
    <tr>
        <td scope="col" class="text-center">{{ $no+1 }}</td>
        <td scope="col" class="text-center">{{ $list->username }}</td>
        <td scope="col" class="text-center">{{ $list->user_level}}</td>
        <td scope="col" class="text-center">{{ $list->kota_nama }}</td>
    </tr>
@endforeach