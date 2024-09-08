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
    <div class="container">

        <?php if(isset($_GET['action'])): ?>
            <?php if($_GET['action'] == 'preorder'): ?>


                <form action="index.php?action=final" method="post">

                        <?php foreach ($menu as $key => $item): ?>

                            <div class="d-flex flex-row border border-primary rounded mb-2">
                                <img src="<?php echo $item['image']; ?>" class="rounded-circle" width="32" height="32">

                                <h5 class="px-2"><?php echo $item['name']; ?></h5>
                                <p class="px-2"><?php echo $item['price']; ?></p>

                                <?php if(isset($_POST['order'][$key])) { ?>
                                    <input class="px-2" name="order[<?php echo $key; ?>]" type="number" value="<?php echo $_POST['order'][$key]; ?>" class="form-control">
                                <?php } else {?>
                                    <input class="px-2" name="order[<?php echo $key; ?>]" type="number" value="0" class="form-control">
                                <?php } ?>

                            </div>
                        <?php endforeach; ?>
                        <select class="form-select" name="table" aria-label="Default select example">
                            <option value="1" <?php if($_GET['table'] == 1){ echo " selected";} ?>>One</option>
                            <option value="2" <?php if($_GET['table'] == 2){ echo " selected";} ?>>Two</option>
                            <option value="3" <?php if($_GET['table'] == 3){ echo " selected";} ?>>Three</option>
                            <option value="4" <?php if($_GET['table'] == 4){ echo " selected";} ?>>Four</option>
                        </select>
                        <input type="submit" name="submit">
                        <a href="index.php" class="btn btn-link">Reset</a>
                    </form>



            <?php endif; ?>
        <?php if($_GET['action'] == 'final'): ?>
            <?php print $_POST['table']; ?>
        <?php endif; ?>


        <?php endif; ?>



        <?php
        $total = 0;
        if(isset($_POST['submit'])){


        $order = $_POST['order'];
        ?>

        <ul>
            <?php foreach ($order as $key => $item): ?>

            <?php if($item != 0): ?>
            <li>
                <?php echo $menu[$key]['name']; ?>=>
                <?php echo $menu[$key]['price']; ?>
                *
                <?php echo $item; ?>
                =
                <?php echo $menu[$key]['price'] * $item; ?>
                <?php $total += $menu[$key]['price'] * $item; ?>
            </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>

        Total:<?php echo $total; ?>
        <?php } ?>

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
