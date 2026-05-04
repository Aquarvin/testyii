<?php
$typeStyle = [
    'Здам'   => 'bg-emerald-100 text-emerald-700',
    'Продам' => 'bg-blue-100 text-blue-700',
    'Зніму'  => 'bg-orange-100 text-orange-700',
];
$typeIcon = [
    'Здам'   => 'fa-key',
    'Продам' => 'fa-tag',
    'Зніму'  => 'fa-search',
];
?>

<div class="mb-6 flex items-center justify-between">
    <div>
        <h2 class="text-xl font-bold text-gray-800">
            Всі оголошення ріелтора
        </h2>
        <p class="text-sm text-gray-500 mt-0.5">
            <?php echo CHtml::encode($realtor['name']); ?> &middot;
            <?php echo count($listings); ?> оголошень
        </p>
    </div>
    <div class="flex items-center gap-2 text-sm text-gray-500">
        <i class="fas fa-sliders-h text-blue-400"></i>
        <span>Фільтр</span>
    </div>
</div>

<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
<?php foreach ($listings as $listing): ?>

    <div class="bg-white rounded-xl shadow hover:shadow-lg transition-all duration-200 overflow-hidden flex flex-col group">

        <div class="relative overflow-hidden">
            <img
                src="<?php echo CHtml::encode($listing['image']); ?>"
                alt="<?php echo CHtml::encode($listing['title']); ?>"
                class="w-full h-44 object-cover group-hover:scale-105 transition-transform duration-300"
            >
            <span class="absolute top-3 left-3 inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-semibold
                         <?php echo isset($typeStyle[$listing['type']]) ? $typeStyle[$listing['type']] : 'bg-gray-100 text-gray-600'; ?>">
                <i class="fas <?php echo isset($typeIcon[$listing['type']]) ? $typeIcon[$listing['type']] : 'fa-home'; ?>"></i>
                <?php echo CHtml::encode($listing['type']); ?>
            </span>
        </div>

        <div class="p-4 flex flex-col flex-1">

            <h3 class="font-semibold text-gray-800 text-sm leading-snug mb-1 line-clamp-2">
                <?php echo CHtml::encode($listing['title']); ?>
            </h3>

            <p class="text-xs text-gray-500 line-clamp-2 mb-3 flex-1">
                <?php echo CHtml::encode($listing['description']); ?>
            </p>

            <div class="flex items-center gap-1.5 text-xs text-gray-400 mb-3">
                <i class="fas fa-map-marker-alt text-blue-400"></i>
                <?php echo CHtml::encode($listing['city']); ?>
            </div>

            <div class="flex items-end justify-between">
                <div>
                    <span class="text-blue-600 font-bold text-lg">
                        <?php echo CHtml::encode($listing['price']); ?>
                    </span>
                    <span class="text-gray-400 text-xs ml-1">
                        <?php echo CHtml::encode($listing['currency']); ?>
                    </span>
                </div>
            </div>

        </div>

        <div class="border-t border-gray-100 px-4 py-2.5">
            <label class="flex items-center gap-2 cursor-pointer group/check">
                <input
                    type="checkbox"
                    value="<?php echo (int)$listing['id']; ?>"
                    class="w-4 h-4 rounded border-gray-300 text-blue-600 cursor-pointer"
                >
                <span class="text-xs text-gray-400 group-hover/check:text-gray-600 transition-colors select-none">
                    Додати до порівняння
                </span>
            </label>
        </div>

    </div>

<?php endforeach; ?>
</div>
