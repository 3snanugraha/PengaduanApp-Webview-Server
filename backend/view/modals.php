<!-- Tambah Masyarakat Modal -->
<div class="modal fade" id="tambahMasyarakat" tabindex="-1" aria-labelledby="tambahMasyarakatLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahMasyarakatLabel">Tambahkan data baru</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="text-center">
        <img src="../../assets/img/addmasyarakat.png" class="img-fluid" style="width:50%;height:50%;"/>
        </div>
        <div class="modal-body">
          <form action="../controller/Controller.php" method="POST">

            <div class="mb-3">
              <label for="nik_masyarakat" class="col-form-label">NIK :</label>
              <input type="text" class="form-control" name="nik_masyarakat" id="nik_masyarakat">
            </div>
            <div class="mb-3">
              <label for="namalengkap_masyarakat" class="col-form-label">Nama Lengkap :</label>
              <input type="text" class="form-control" name="namalengkap_masyarakat" id="namalengkap_masyarakat">
            </div>
            <div class="mb-3">
              <label for="email_masyarakat" class="col-form-label">Email :</label>
              <input type="email" class="form-control" name="email_masyarakat" id="email_masyarakat">
            </div>
            <div class="mb-3">
              <label for="notelp_masyarakat" class="col-form-label">No Telpon :</label>
              <input type="number" class="form-control" name="notelp_masyarakat" id="notelp_masyarakat">
            </div>
            <hr>
            <div class="mb-3">
              <label for="password_masyarakat" class="col-form-label">Password :</label>
              <input type="password" class="form-control" name="password_masyarakat" id="password_masyarakat">
            </div>
            <div class="mb-3">
              <label for="password_masyarakat_verification" class="col-form-label">Masukan Kembali Password :</label>
              <input type="password" class="form-control" name="password_masyarakat_verification" id="password_masyarakat_verification">
            </div>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-success rounded-5" name="tambahMasyarakat">Simpan</button>
        </div>
          </form>
  
      </div>
    </div>
  </div>

<!-- Edit Masyarakat Modal -->
<div class="modal fade" id="edit-masyarakat" tabindex="-1" aria-labelledby="edit-masyarakatLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit-masyarakatLabel">Edit data Masyarakat</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="text-center">
        <img src="../../assets/img/addmasyarakat.png" class="img-fluid" style="width:50%;height:50%;"/>
        </div>
        <div class="modal-body">
          <form action="../controller/Controller.php" method="POST">

            <div class="mb-3">
              <label for="nik_masyarakat" class="col-form-label">NIK :</label>
              <input type="text" class="form-control" name="nik_masyarakat" id="nik_masyarakat">
            </div>
            <div class="mb-3">
              <label for="namalengkap_masyarakat" class="col-form-label">Nama Lengkap :</label>
              <input type="text" class="form-control" name="namalengkap_masyarakat" id="namalengkap_masyarakat">
            </div>
            <div class="mb-3">
              <label for="email_masyarakat" class="col-form-label">Email :</label>
              <input type="email" class="form-control" name="email_masyarakat" id="email_masyarakat">
            </div>
            <div class="mb-3">
              <label for="notelp_masyarakat" class="col-form-label">No Telpon :</label>
              <input type="number" class="form-control" name="notelp_masyarakat" id="notelp_masyarakat">
            </div>
            <hr>
            <div class="mb-3">
              <label for="password_masyarakat" class="col-form-label">Password Baru : *Kosongkan jika tidak ingin diubah</label>
              <input type="password" class="form-control" name="password_masyarakat" id="password_masyarakat">
            </div>
            <div class="mb-3">
              <label for="password_masyarakat_verification" class="col-form-label">Masukan Kembali Password :</label>
              <input type="password" class="form-control" name="password_masyarakat_verification" id="password_masyarakat_verification">
            </div>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-success rounded-5" name="update-masyarakat">Simpan</button>
        </div>
          </form>
  
      </div>
    </div>
  </div>


  <!-- Foto Kejadian Modal -->
  <div class="modal fade" id="FotoKejadian" tabindex="-1" aria-labelledby="KejadianFotoLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="KejadianFotoLabel">Foto Kejadian</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="text-center">
          <code> *berikut adalah foto kejadian dari pengaduan terkait </code>
        </div>
        <div class="modal-body">
          <img class="img-fluid" src="" name="img"/>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>

<!-- Cetak Laporan -->
<div class="modal fade" id="CetakLaporan" tabindex="-1" aria-labelledby="CetakLaporanLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="CetakLaporanLabel">Cetak Laporan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="text-center">
          <code> *Silahkan isi filter untuk mencetak laporan pengaduan </code>
        </div>
        <div class="modal-body">
        <form action="../controller/Controller.php" method="POST">
            <!-- Formulir Cetak Laporan -->
            <hr>
              <p>Pilih Periode Laporan :</p>
            <div class="mb-3">
              <label for="tanggal_1" class="col-form-label">Dari Tanggal :</label>
              <input type="date" class="form-control" name="tanggal_1">
            </div>
            <div class="mb-3">
              <label for="tanggal_2" class="col-form-label">Sampai Tanggal :</label>
              <input type="date" class="form-control" name="tanggal_2">
            </div>
            <hr>
            <div class="mb-3">
              <label for="filter_laporan" class="col-form-label">Filter Laporan :</label>
              <select class="form-select" name="filter_laporan" required>
                  <option value=""> Pilih Filter Status Laporan</option>
                  <option value="0"> Belum Ditinjau</option>
                  <option value="1"> Sudah Ditinjau</option>
                  <option value="2"> Semua Laporan</option>
              </select>
            </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-sm btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-sm btn-success rounded-5" name="cetak-laporan">Cetak</button>
          </div>
        </form>
      </div>
    </div>
  </div>

<!-- Ubah Informasi Akun -->
<div class="modal fade" id="ubahinformasiakun" tabindex="-1" aria-labelledby="ubahinformasiLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="ubahinformasiLabel">Ubah Informasi Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="text-center">
          <br>
          <code> *Lakukan pengubahan informasi akun anda </code>
        </div>
        <div class="modal-body">
        <form action="../controller/Controller.php" method="POST">
            <!-- Formulir ubah akun -->
            <div class="mb-3">
              <label for="username_operator" class="col-form-label">Username Operator :</label>
              <input type="text" class="form-control" name="username_operator" value="<?= $_SESSION['username_operator']; ?>">
              <input type="hidden" class="form-control" name="id_operator" value="<?= $_SESSION['id_operator']; ?>">
            </div>
            <div class="mb-3">
              <label for="nama_operator" class="col-form-label">Nama Operator :</label>
              <input type="text" class="form-control" name="nama_operator" value="<?= $_SESSION['nama_operator']; ?>">
            </div>
            <div class="mb-3">
              <label for="verifikasi_password" class="col-form-label">Password Verifikasi (Password saat ini) :</label>
              <input type="password" class="form-control" name="verifikasi_password">
            </div>
            <hr>
            <div class="mb-3">
              <label for="password_baru" class="col-form-label">Password Baru : *Kosongkan jika tidak ingin diubah</label>
              <input type="password" class="form-control" name="password_baru">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-success rounded-5" name="ubahakunoperator">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>

  <!-- Ubah Informasi Akun -->
<div class="modal fade" id="edit-operator" tabindex="-1" aria-labelledby="edit-operatorLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="edit-operatorLabel">Ubah Informasi Akun Ini</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="text-center">
          <br>
          <code> *Lakukan pengubahan informasi akun Operator di bawah ini </code>
        </div>
        <div class="modal-body">
        <form action="../controller/Controller.php" method="POST">
            <!-- Formulir ubah akun -->
            <div class="mb-3">
              <label for="username_operator" class="col-form-label">Username Operator :</label>
              <input type="text" class="form-control" name="username_operator" id="username_operator">
              <input type="hidden" class="form-control" name="id_operator" id="id_operator">
            </div>
            <div class="mb-3">
              <label for="nama_operator" class="col-form-label">Nama Operator :</label>
              <input type="text" class="form-control" name="nama_operator" id="nama_operator">
            </div>
            <hr>
            <div class="mb-3">
              <label for="password_baru" class="col-form-label">Password Baru : *Kosongkan jika tidak ingin diubah</label>
              <input type="password" class="form-control" name="password_baru">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary rounded-5" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-success rounded-5" name="editoperator">Simpan</button>
          </div>
        </form>

      </div>
    </div>
  </div>

   <!-- Ubah Informasi Akun -->
<div class="modal fade" id="tambahOperator" tabindex="-1" aria-labelledby="tambahOperatorLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="tambahOperatorLabel">Tambahkan Akun Operator</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="text-center">
          <br>
          <code> *Silahkan isi informasi akun Operator di bawah ini </code>
        </div>
        <div class="modal-body">
        <form action="../controller/Controller.php" method="POST">
            <!-- Formulir ubah akun -->
            <div class="mb-3">
              <label for="username_operator" class="col-form-label">Username Operator :</label>
              <input type="text" class="form-control" name="username_operator" required>
            </div>
            <div class="mb-3">
              <label for="nama_operator" class="col-form-label">Nama Operator :</label>
              <input type="text" class="form-control" name="nama_operator" required>
            </div>
            <div class="mb-3">
              <label for="password_operator" class="col-form-label">Password Operator :</label>
              <input type="password" class="form-control" name="password_operator" required>
            </div>
            <hr>
            <div class="mb-3">
              <label for="password_operator_verif" class="col-form-label">Konfirmasi Password :</label>
              <input type="password" class="form-control" name="password_operator_verif">
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary rounded-5" data-bs-dismiss="modal">Batalkan</button>
          <button type="submit" class="btn btn-sm btn-success rounded-5" name="tambahakunoperator">Tambahkan</button>
          </div>
        </form>

      </div>
    </div>
  </div>