<?php
usort($daftarSekolah, function ($a, $b) {
    return strcasecmp($a['nama'], $b['nama']);
});
?>
<option value="" disabled selected> Pilih Sekolah</option>
<?php foreach($daftarSekolah as $sekolah) : ?>
    <option value="<?php echo $sekolah['kode'];?>">
        <?php echo $sekolah['kota'] == '-' ?  $sekolah['nama'] : $sekolah['nama'] . " - " . $sekolah['kota']; ?>
    </option>
<?php endforeach; ?>
<script>
    var schools = <?php echo json_encode($daftarSekolah);?>;
</script>

