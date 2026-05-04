<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo CHtml::encode($realtor['name']); ?> — Профіль ріелтора</title>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-100 to-blue-50 py-10 px-4">

<div class="max-w-xl mx-auto space-y-4">
    <?php $this->renderPartial('_profile', ['realtor' => $realtor]); ?>
    <?php $this->renderPartial('_stats', ['realtor' => $realtor]); ?>
    <?php $this->renderPartial('_description', ['realtor' => $realtor]); ?>
    <?php $this->renderPartial('_contact', ['realtor' => $realtor]); ?>
</div>

<div class="max-w-5xl mx-auto mt-8 px-4 pb-12">
    <?php $this->renderPartial('_listings', ['listings' => $listings, 'realtor' => $realtor]); ?>
</div>

</body>
</html>
