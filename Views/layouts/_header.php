<!DOCTYPE html>
<html>
<head>
    <!-- Required meta tags -->
    <?= generate_tag_group('meta',$metadata, false) ?>
    <?= generate_tag_group('link',$styles, false) ?>
    <title><?= _title($pageTitle) ?></title>
</head>

<body>
    <?php include_once LAYOUTS.'nav.php'; ?>
