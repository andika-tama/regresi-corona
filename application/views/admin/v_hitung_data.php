<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Corona</title>
</head>

<body>
    <?php

    ?>
</body>
<?php
$i = 0;
$jml_data = 0;
foreach ($hari as $hk) {
    $hari_pandemi[$i++] = $hk;
    $jml_data++;
}
$i = 0;
foreach ($forcast as $fc) {
    $prediksi[$i++] = $fc;
}
$i = 0;
foreach ($data_real as $dr) {
    $asli[$i++] = $dr;
}
?>
<table border="1">
    <tr>
        <th>Hari Ke-</th>
        <th>Jumlah Positif (Real)</th>
        <th>Jumlah Positif (Prediksi)</th>
    </tr>
    <?php for ($i = 0; $i < $jml_data; $i++) : ?>
        <tr>
            <td><?php echo $hari_pandemi[$i]; ?></td>
            <td><?php echo $asli[$i]; ?></td>
            <td><?php echo $prediksi[$i]; ?></td>
        </tr>
    <?php endfor; ?>
</table>

</html>