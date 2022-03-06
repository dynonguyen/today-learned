<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php echo !empty($page_title) ? $page_title : "Trang Chủ" ?>
    </title>
    <link rel="stylesheet" href="/public/assets/clients/css/style.css">
</head>

<body>
    <?php $this->render('blocks/header'); ?>

    <?php $this->render($content, $sub_content); ?>

    <?php require_once _DIR_ROOT . '/app/views/blocks/footer.php' ?>
</body>

</html>