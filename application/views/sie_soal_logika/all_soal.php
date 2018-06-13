<?php
/**
 * Created by PhpStorm.
 * User: Charlie
 * Date: 1/5/2016
 * Time: 1:53 PM
 */
?>

<div class="wrapper">
    <header>
        <h1 align="center"><?php echo $nama ?></h1>

    </header>
    <ol>
        <?php
        $i = 0;
        foreach ($soal as $row) {
            ?>
            <li>
                <?php echo $row['isi'] ?>
                <ol type="a">
                    <li><?php echo $pilihan[$i][0]['isi'] ?></li>
                    <li><?php echo $pilihan[$i][1]['isi'] ?></li>
                    <li><?php echo $pilihan[$i][2]['isi'] ?></li>
                    <li><?php echo $pilihan[$i][3]['isi'] ?></li>
                    <li><?php echo $pilihan[$i][4]['isi'] ?></li>
                </ol>
            </li>
            <?php
            $i++;
        }
        ?>
    </ol>
</div>
<?php //load file jquery dan js nya bootstrap
echo $jquery . $bootstrapJs; ?>