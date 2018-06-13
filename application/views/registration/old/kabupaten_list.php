<option value="" disabled selected> Pilih Kabupaten/Kota</option>
<?php foreach($daftarKab as $kab) : ?>
    <option value="<?php echo $kab['id'];?>"><?php echo $kab['nama'];?> </option>
<?php endforeach; ?>