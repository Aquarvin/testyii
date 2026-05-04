<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <title>Yii 1.1.16 — Docker</title>
    <style>
        body { font-family: monospace; max-width: 640px; margin: 60px auto; background: #1e1e1e; color: #d4d4d4; }
        h1   { color: #4ec9b0; }
        .ok  { color: #4ec9b0; }
        .err { color: #f44747; }
        table { border-collapse: collapse; width: 100%; margin-top: 24px; }
        td, th { border: 1px solid #444; padding: 8px 12px; text-align: left; }
        th { background: #2d2d2d; color: #9cdcfe; }
    </style>
</head>
<body>
    <h1>Yii 1.1.16 + PHP <?= PHP_VERSION ?></h1>

    <table>
        <tr><th>Parameter</th><th>Value</th></tr>
        <tr>
            <td>PHP version</td>
            <td><?= PHP_VERSION ?></td>
        </tr>
        <tr>
            <td>Yii version</td>
            <td><?= Yii::getVersion() ?></td>
        </tr>
        <tr>
            <td>Database (MySQL)</td>
            <td class="<?= strpos($dbStatus, 'error') === false ? 'ok' : 'err' ?>">
                <?= CHtml::encode($dbStatus) ?>
            </td>
        </tr>
        <tr>
            <td>Xdebug</td>
            <td class="<?= extension_loaded('xdebug') ? 'ok' : 'err' ?>">
                <?= extension_loaded('xdebug') ? 'enabled (' . phpversion('xdebug') . ')' : 'disabled' ?>
            </td>
        </tr>
        <tr>
            <td>Environment</td>
            <td><?= YII_DEBUG ? 'debug' : 'production' ?></td>
        </tr>
    </table>
</body>
</html>
