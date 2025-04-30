<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?? 'Default title'; ?></title>
    <link rel="icon" href="<?php echo APP_ROOT; ?>/public/images/favicon.png" type="image/png">
    <link rel="stylesheet" href="<?php echo APP_ROOT; ?>/public/css/styler.css">
    <!-- add tailwind cdn include forms and typography-->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <main>
        <?php echo $content; ?>
    </main>
</body>
</html>
