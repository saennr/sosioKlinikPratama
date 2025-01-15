<div class="data-table">
    @foreach($reservasiAll as $reservasi)        
        <div class="row">        
            <div class="cell">{{ $reservasi->user->firstName }} {{ $reservasi->user->lastName }}</div>        
            <div class="cell">{{ $reservasi->dokter->nama_dokter }}</div>        
            <div class="cell">{{ $reservasi->tanggal->format('d/m/Y') }}</div>        
            <div class="cell">Antrian {{ $reservasi->no_antrian }}</div>        
            <div class="cell">{{ $reservasi->estimasi_mulai }}</div>        
            <div class="cell">        
                <button class="dropdown-btn">⋮</button>        
                <div class="dropdown-menu">  
                    <a class="dropdown-item">Edit</a>
                    <!-- Modal Form -->
                    <div class="modal-overlay modal-hidden"></div>
                    <div id="reservasiFormModal" class="modal-hidden">
                        <div class="modal-content">
                            <h3>Edit Reservasi</h3>
                            <form id="reservasiForm">
                            <div class="right-column">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName" placeholder="Masukkan Nama Depan" required />
                                
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName" placeholder="Masukkan Nama Belakang" required />

                                <label for="dokter">Nama Dokter</label>
                                <input type="text" id="dokter" placeholder="Masukkan Nama Dokter" required />

                                <label for="tanggal">Tanggal</label>
                                <input type="date" id="tanggal" placeholder="Pilih Tanggal" required />
                            </div>

                            <div class="right-column">
                                <label for="no_antrian">No Antrian</label>
                                <input type="text" id="no_antrian" placeholder="Masukkan No Antrian" required />

                                <label for="estimasi_mulai">Estimasi</label>
                                <input type="text" id="estimasi_mulai" placeholder="Masukkan Estimasi" required />
                            </div>
                                <button class="btn-dokter" type="submit">Simpan</button>
                                <button type="button" class="close-btn">Close</button>
                            </form>
                        </div>
                    </div>
                    <a href="#" class="dropdown-item" onclick="deleteReservasi({{ $reservasi->id_reservasi }})">Hapus</a>        
                </div>        
            </div>        
        </div>        
    @endforeach      
</div>  
