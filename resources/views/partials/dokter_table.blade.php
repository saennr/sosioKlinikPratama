<div class="data-table">  
    <div class="row header">  
        <div class="cell">Nama Dokter</div>  
        <div class="cell">Spesialis</div>  
        <div class="cell">Jadwal</div>  
        <div class="cell">No Telepon</div>  
        <div class="cell"></div>  
    </div>
  
    @foreach($dokters as $dokter)  
    <div class="row">  
        <div class="cell">{{ $dokter->nama_dokter }}</div>  
        <div class="cell">Poli {{ $dokter->spesialis->nama_spesialis ?? 'Tidak Diketahui' }}</div>  
        <div class="cell">  
            <button class="btn-jadwal" onclick= "toggleSchedule(this)">Jadwal Dokter</button>  
        </div>  
        <div class="cell">{{ $dokter->no_telepon }}</div>  
        <div class="cell">
        <button class="dropdown-btn">⋮</button>
        <div class="dropdown-menu">
            <button class="dropdown-item">Edit</button>
            <button class="dropdown-item" onclick="deleteDoctor({{ $dokter->id_dokter }})">Hapus</button>
        </div>
    </div> 
    </div>  
    <div class="schedule-row hidden"> <!-- Kontainer untuk jadwal dokter -->  
        <div class="schedule-table">  
            <div class="schedule-row header">  
                <div class="schedule-cell">Hari</div>  
                <div class="schedule-cell">Jam Mulai</div>  
                <div class="schedule-cell">Jam Selesai</div>  
                <div class="schedule-cell">Durasi Tindakan</div>
                <div class="schedule-cell"></div>
            </div>  
            @foreach($dokter->jadwalDokter as $jadwal)  
            <div class="schedule-row">  
                <div class="schedule-cell">{{ $jadwal->hari }}</div> 
                <div class="schedule-cell">{{ $jadwal->jam_mulai }}</div>  
                <div class="schedule-cell">{{ $jadwal->jam_selesai }}</div>  
                <div class="schedule-cell">{{ $jadwal->durasi_tindakan }} Menit</div>
                <div class="schedule-cell">
                            <button class="dropdown-btn">⋮</button>
                            <div class="dropdown-menu">
                                <button class="dropdown-item">Edit</button>
                                <button class="dropdown-item">Hapus</button>
                            </div>
                        </div>
            </div>
            @endforeach
        </div>
        <button class="btn-dokter" id="btn-tambahJadwal" >Tambah Jadwal</button>
    </div>  
    @endforeach
</div>