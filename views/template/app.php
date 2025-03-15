<!DOCTYPE html>
<html lang="pt-br" data-theme="dracula">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alarm System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="../styles/reset.css" rel="stylesheet">
    <link href="../styles/output.css" rel="stylesheet">
</head>

<body>
    <section class="container d-flex flex-column gap-3 vh-100">
        <?php require base_path('views/partials/_navbar.view.php'); ?>

        <?php require base_path('views/partials/_search.view.php'); ?>

        <?php require base_path('views/partials/_message.view.php'); ?>

        <div class="flex flex-grow pb-6">
            <?php require base_path("views/{$view}.view.php"); ?>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>