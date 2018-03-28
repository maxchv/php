<!-- Базовый шаблон -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php echo $viewModel->get('pageTitle'); ?></title>
</head>
<body>
    <?php require($this->viewFile); ?>
</body>
</html>