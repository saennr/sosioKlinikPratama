<div class="row header">
    <div class="cell">Nama</div>
    <div class="cell">NIK/NIM/NIP</div>
    <div class="cell">Tanggal Lahir</div>
    <div class="cell">No Telpon</div>
    <div class="cell">Jenis Kelamin</div>
    <div class="cell">Alamat</div>
    <div class="cell"></div>
</div>

@foreach ($dataUsers as $dataUser)
    <div class="row">
        <div class="cell">{{ $dataUser->firstName }} {{ $dataUser->lastName }}</div>
        <div class="cell">{{ $dataUser->no_identitas }}</div>
        <div class="cell">{{ $dataUser->tgl_lahir }}</div>
        <div class="cell">{{ $dataUser->no_hp }}</div>
        <div class="cell">{{ $dataUser->jk }}</div>
        <div class="cell">{{ $dataUser->alamat }}</div>
        <div class="cell">
            <button class="dropdown-btn">⋮</button>
            <div class="dropdown-menu">
                <a href="#" class="dropdown-item">Edit</a>
                <a href="#" class="dropdown-item">Hapus</a>
            </div>
        </div>
    </div>
@endforeach
