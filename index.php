<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<?php
$menu = [];

$menu[0]['name'] = "Kobab";
$menu[0]['price'] = 47;
$menu[0]['image'] = 'images/kobab.png';

$menu[1]['name'] = "Sandewich";
$menu[1]['price'] = 52;
$menu[1]['image'] = 'images/san.png';

$menu[2]['name'] = "Piza";
$menu[2]['price'] = 300;
$menu[2]['image'] = 'images/pizza.png';

$menu[3]['name'] = "Lazania";
$menu[3]['price'] = 150;
$menu[3]['image'] = 'images/laza.png';

$menu[4]['name'] = "Pirashki";
$menu[4]['price'] = 20;
$menu[4]['image'] = 'images/pir.png';

$menu[5]['name'] = "Tahchin";
$menu[5]['price'] = 85;
$menu[5]['image'] = "images/tahchin.png";


$drink = [];

$drink[0]['name'] = "Cola";
$drink[0]['price'] = 33;

$drink[1]['name'] = "Dogh";
$drink[1]['price'] = 30;

$drink[2]['name'] = "Zero";
$drink[2]['price'] = 33;
?>
<body>
    <div class="container-">
        <form action="index.php?page=form&action=save&name=ali" method="post">


            <div class="row">>
                <?php foreach ($menu as $key => $item): ?>
                    <div class="col-4">
                        <div class="card">
                            <img src="<?php echo $item['image']; ?>" class="card-img-top img-thumbnail" width="128px" height="128px">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $item['name']; ?></h5>
                                <p class="card-text"><?php echo $item['price']; ?></p>

                                <input name="order[<?php echo $key; ?>]" type="number" value="0" class="form-control">
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>

            <input type="submit" name="submit">
        </form>

        <?php
        $total = 0;
        $order = $_POST['order'];
        ?>

        <ul>
            <?php foreach ($order as $key => $item): ?>
            <li>
                <?php echo $menu[$key]['name']; ?>=>
                <?php echo $menu[$key]['price']; ?>
                *
                <?php echo $item; ?>
                =
                <?php echo $menu[$key]['price'] * $item; ?>
                <?php $total += $menu[$key]['price'] * $item; ?>
            </li>
            <?php endforeach; ?>
        </ul>

        Total:<?php echo $total; ?>


        <h2>POST</h2>
        <?php foreach ($_POST as $key => $value) { ?>
            <?php if(is_array($value)) { ?>
                <?php print($key.":"); ?>
                <?php var_dump($value); ?>
                <?php } else { ?>
            <?php print($key.":".$value."<br />"); ?>

            <?php } ?>
        <?php } ?>

        <h2>GET</h2>
        <?php foreach ($_GET as $key => $value) { ?>
            <?php print($key.":".$value."<br />"); ?>
        <?php } ?>

        <h2>REQUEST</h2>
        <?php foreach ($_REQUEST as $key => $value) { ?>
            <?php print($key.":".$value."<br />"); ?>
        <?php } ?>
    </div>

</body>
</html>
