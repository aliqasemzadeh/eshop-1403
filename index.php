<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
        <form action="index.php?page=form&action=save&name=ali" method="post">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password">
            </div>

            <input type="submit" name="submit">
        </form>
        <h2>POST</h2>
        <?php foreach ($_POST as $key => $value) { ?>
            <?php print($key.":".$value."<br />"); ?>
        <?php } ?>

        <h2>GET</h2>
        <?php foreach ($_GET as $key => $value) { ?>
            <?php print($key.":".$value."<br />"); ?>
        <?php } ?>

        <h2>REQUEST</h2>
        <?php foreach ($_REQUEST as $key => $value) { ?>
            <?php print($key.":".$value."<br />"); ?>
        <?php } ?>
</body>
</html>
