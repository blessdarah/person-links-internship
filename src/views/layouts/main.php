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
        <!-- Show alert if available -->
        <?php if (isset($success)) : ?>
            <div class="px-4 py-2 m-4 max-w-[500] m-auto bg-yellow-100 text-yellow-800 border border-yellow-300 rounded-md mb-4">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <!-- Show errors if available -->
            <?php if (isset($errors)) : ?>
                <?php foreach ($errors as $error) : ?>
                    <div class="px-4 py-2 my-4 mx-auto bg-red-100 text-red-800 border border-red-300 rounded-md max-w-[500px]">
                        <?php echo $error->message; ?>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        <?php echo $content; ?>
    </main>
</body>
</html>
