<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Corona</title>
</head>

<body>
    <?php echo $corona ?>
    <form action="method=" post" action="<?php echo base_url('admin/input_data') ?>">
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Tanggal
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="date" id="first-name" name="tgl" class="form-control" required="required">
            </div>
        </div>
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jumlah Positif
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="number" id="first-name" name="jml_pstf" class="form-control" required="required">
            </div>
        </div>
        <?php echo $data_corona ?>
    </form>
</body>

</html>