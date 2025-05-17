<!DOCTYPE html>
<html lang="<?= session()->get('lang') ?? 'id'; ?>">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title><?= $lang == 'id' ? ($meta['meta_title_id'] ?? 'Trending Only') : ($meta['meta_title_en'] ?? 'Trending Only'); ?></title>

    <meta name="description" content="<?= $lang == 'id' ? ($meta['meta_description_id'] ?? 'Trending Only') : ($meta['meta_description_en'] ?? 'Trending Only'); ?>">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CMuli:400,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css'); ?>" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?= base_url('assets/css/font-awesome.min.css'); ?>">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>" />
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">

</head>

<body>
    <!-- HEADER -->
    <header id="header">
        <!-- NAV -->
        <?= $this->include('layouts/navbar'); ?>
        <!-- /NAV -->

        <!-- PAGE HEADER -->
        <?= $this->renderSection('pageHeader'); ?>
        <!-- /PAGE HEADER -->
    </header>

    <!-- /HEADER -->

    <!-- SECTION -->
    <?= $this->renderSection('content'); ?>
    <!-- /SECTION -->

    <!-- FOOTER -->
    <?= $this->include('layouts/footer'); ?>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script src="<?= base_url('assets/js/jquery.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/jquery.stellar.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/main.js'); ?>"></script>

</body>

</html>