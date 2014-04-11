<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="copyright" content="Copyright (c) 2013 High Fidelity Inc. http://www.highfidelity.io" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php View::includeStyles(); ?>
    <?php View::includeScripts(); ?>
    <script type="text/javascript">
        $(function() {
            hifi.current_view = <?php echo View::read('page'); ?>;
            hifi.init();
        });
    </script>
    <title><?php echo View::$title ?></title>
</head>
<body>
