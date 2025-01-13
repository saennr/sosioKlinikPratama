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
                <button class="dropdown-item">Edit</button>
                <!-- Modal Form -->
                <div class="modal-overlay modal-hidden"></div>
                <div id="userFormModal" class="modal-hidden">
                    <div class="modal-content">
                        <h3>Edit Data User</h3>
                        <form id="userForm">
                        <div class="right-column">                        
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName" placeholder="Masukkan Nama Depan" required />

                            <label for="lastName">Last Name</label>
                            <input type="text" id="lasttName" placeholder="Masukkan Nama Belakang" required />

                            <label for="tgl-lahir">Tanggal Lahir</label>
                            <input type="date" id="tgl-lahir" placeholder="Masukkan tanggal lahir" required />

                            <label for="no_hp">Nomor Telpon</label>
                            <input type="text" id="no_hp" placeholder="Masukkan Nomor Telpon" required />

                            <label for="jk">Jenis Kelamin:</label>
                            <input type="text" id="jk" placeholder="Masukkan Jenis Kelamin" required />
                        </div>    

                        <div class="right-column">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" placeholder="Masukkan Alamat" required />
                            <label for="password">Password Baru</label>
                            <input type="text" id="password" placeholder="Masukkan Pasword Baru" required />
                        </div>
                            <button class="btn-dokter" type="submit">Simpan</button>
                            <button type="button" class="close-btn">Close</button>
                        </form>
                    </div>
                </div>
                <!-- Tambahkan fungsi deleteUser -->
                <a href="javascript:void(0);" class="dropdown-item" onclick="deleteUser({{ $dataUser->id_user }})">Hapus</a>
            </div>
        </div>
    </div>
@endforeach
