<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/7/2016
 * Time: 2:08 PM
 */
?>
<option value="-1">--Select Contest--</option>
<?php
if (count($kontes) > 0) {
    foreach ($kontes as $row) {
        ?>
        <option value="<?php echo $row['id'] ?>"><?php echo $row['nama'] ?></option>
        <?php
    }
}
?>
