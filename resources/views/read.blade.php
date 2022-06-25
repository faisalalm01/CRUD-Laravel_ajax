<table class=" table table table-dark table-striped">
    <thead class="thead-dark">
        <tr>
            <th>No</th>
            <th>No surat</th>
            <th>Judul Surat</th>
            <th>Tanggal Surat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody> 
        
        @foreach ($Surat as $surat)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $surat->nosurat }}</td>
              <td>{{ $surat->judul }}</td>
              <td>{{ $surat->tanggal }}</td>
            <td>
                <button class="btn btn-success text-bg-success" onclick="show({{ $surat->id }})">Update</button>
                <button class="btn btn-danger text-bg-danger" onclick="destroy({{ $surat->id }})">Delete</button>    </td>
        </tr>
        @endforeach
    </tbody>
</table>