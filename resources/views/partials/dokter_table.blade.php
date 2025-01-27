<div class="data-table">  
    <div class="row header">  
        <div class="cell">Nama Dokter</div>  
        <div class="cell">Spesialis</div>  
        <div class="cell">Hari</div>  
        <div class="cell">Jadwal</div>  
        <div class="cell">No Telepon</div>  
        <div class="cell"></div>  
    </div>
  
    @foreach($dokters as $dokter)  
    <div class="row" data-doctor-id="{{ $dokter->id_dokter }}">  
        <div class="cell" id="doctor-name">
            <span class="doctor-name-text">{{ $dokter->nama_dokter }}</span>
            <input type="text" class="doctor-name-input" value="{{ $dokter->nama_dokter }}" style="display:none;">
        </div>  
        <div class="cell" id="doctor-specialty">
            <span class="doctor-specialty-text">Poli {{ $dokter->spesialis->nama_spesialis ?? 'Tidak Diketahui' }}</span>
            <select id="id_spesialis" name="id_spesialis" class="doctor-specialty-input" required style="display:none;">
                <option value="">Pilih Spesialis</option>
                <option value="1">Umum</option>
                <option value="2">Gigi</option>
            </select>
        </div>  
        <div class="cell" id="doctor-day">
            <span class="doctor-day-text">{{ $dokter->hari }}</span>
            <input type="text" class="doctor-day-input" value="{{ $dokter->hari }}" style="display:none;">
        </div>
        <div class="cell">  
            <button class="btn-jadwal" onclick="toggleSchedule(this)">Jadwal Dokter</button>  
        </div>  
        <div class="cell" id="doctor-phone">
            <span class="doctor-phone-text">{{ $dokter->no_telepon }}</span>
            <input type="text" class="doctor-phone-input" value="{{ $dokter->no_telepon }}" style="display:none;">
        </div>  
        <div class="cell">
            <button class="dropdown-btn">⋮</button>
            <div class="dropdown-menu">
                <button class="dropdown-item" data-edit>Edit</button>
                <button class="dropdown-item" onclick="deleteDoctor({{ $dokter->id_dokter }})">Hapus</button>
            </div>
        </div>
        <!-- Tombol Save dan Cancel di bawah baris -->
    </div>  
    <div class="row-buttons" style="display:none;">
            <button class="save-btn">Save</button>
            <button class="cancel-btn">Cancel</button>
    </div>
    <div class="schedule-row hidden"> 
    <div class="schedule-table">  
        <div class="schedule-row header">  
            <div class="schedule-cell">Hari</div>  
            <div class="schedule-cell">Jam Mulai</div>  
            <div class="schedule-cell">Jam Selesai</div>  
            <div class="schedule-cell">Durasi Tindakan</div>
            <div class="schedule-cell"></div>
        </div>  
        @foreach($dokter->jadwalDokter as $jadwal)  
        <div class="schedule-row" data-jadwal-id="{{ $jadwal->id_jadwal_dokter }}">  
            <div class="schedule-cell">{{ $jadwal->hari }}</div> 
            <div class="schedule-cell">{{ $jadwal->jam_mulai }}</div>  
            <div class="schedule-cell">{{ $jadwal->jam_selesai }}</div>  
            <div class="schedule-cell">{{ $jadwal->durasi_tindakan }} Menit</div>
            <div class="schedule-cell">
                <button class="dropdown-btn">⋮</button>
                <div class="dropdown-menu">
                    <button class="dropdown-item hapus-jadwal">Hapus</button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <button class="btn-dokter" id="btn-tambahJadwal">Tambah Jadwal</button>
</div>
    @endforeach
</div>

<!-- Modal Edit Dokter -->  
<div class="modal-overlay modal-hidden"></div>  
<div id="doctorFormModal" class="modal-hidden">  
    <div class="modal-content">  
        <h3>Edit Dokter</h3>  
        <form id="editDokterForm">  
            @csrf  
            <input type="hidden" id="edit_id_dokter" name="id_dokter" />  
            <label for="edit_nama_dokter">Nama Dokter</label>  
            <input type="text" id="edit_nama_dokter" name="edit_nama_dokter" placeholder="Masukkan Nama Dokter" required />  
  
            <label for="edit_id_spesialis">Spesialis</label>  
            <select id="edit_id_spesialis" name="edit_id_spesialis" required>  
                <option value="">Pilih Spesialis</option>  
                <option value="1">Umum</option>  
                <option value="2">Gigi</option>  
            </select>  
  
            <label for="edit_no_telepon">No Telepon</label>  
            <input type="text" id="edit_no_telepon" name="edit_no_telepon" placeholder="Masukkan No Telepon" required />  
  
            <button class="btn-dokter" type="submit">Simpan</button>  
            <button type="button" class="close-btn">Close</button>  
        </form>  
    </div>  
</div>