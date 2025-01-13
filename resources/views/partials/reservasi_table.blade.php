<div class="data-table">
    @foreach($reservasiAll as $reservasi)        
        <div class="row">        
            <div class="cell">{{ $reservasi->user->firstName }} {{ $reservasi->user->lastName }}</div>        
            <div class="cell">{{ $reservasi->dokter->nama }}</div>        
            <div class="cell">{{ $reservasi->tanggal->format('d/m/Y') }}</div>        
            <div class="cell">Antrian {{ $reservasi->no_antrian }}</div>        
            <div class="cell">{{ $reservasi->estimasi_mulai }}</div>        
            <div class="cell">        
                <button class="dropdown-btn">⋮</button>        
                <div class="dropdown-menu">  
                    <a href="#" class="dropdown-item">Edit</a>  
                    <a href="#" class="dropdown-item" onclick="deleteReservasi({{ $reservasi->id_reservasi }})">Hapus</a>        
                </div>        
            </div>        
        </div>        
    @endforeach      
</div>  
