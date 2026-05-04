<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>Error <?= $error['code'] ?></title>
</head>
<body>
    <h1>Error <?= $error['code'] ?></h1>
    <p><?= CHtml::encode($error['message']) ?></p>
</body>
</html>
