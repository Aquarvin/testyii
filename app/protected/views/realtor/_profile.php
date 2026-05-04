<?php
$nameParts = explode(' ', $realtor['name']);
$initials  = mb_substr($nameParts[0], 0, 1, 'UTF-8')
           . (isset($nameParts[1]) ? mb_substr($nameParts[1], 0, 1, 'UTF-8') : '');

$fullStars    = (int) floor($realtor['rating']);
$hasHalfStar  = ($realtor['rating'] - $fullStars) >= 0.5;
?>
<div class="bg-white rounded-2xl shadow-xl overflow-hidden">

    <div class="h-36 bg-gradient-to-r from-blue-600 to-violet-600 relative">
        <div class="absolute inset-0 opacity-20"
             style="background-image: url('data:image/svg+xml,%3Csvg width=\'60\' height=\'60\' viewBox=\'0 0 60 60\' xmlns=\'http://www.w3.org/2000/svg\'%3E%3Cg fill=\'none\' fill-rule=\'evenodd\'%3E%3Cg fill=\'%23ffffff\' fill-opacity=\'1\'%3E%3Cpath d=\'M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z\'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E');">
        </div>

        <div class="absolute -bottom-14 left-1/2 -translate-x-1/2">
            <div class="w-28 h-28 rounded-full border-4 border-white shadow-lg
                        bg-gradient-to-br from-blue-400 to-violet-600
                        flex items-center justify-center select-none">
                <span class="text-white text-3xl font-bold tracking-wide">
                    <?php echo CHtml::encode($initials); ?>
                </span>
            </div>
        </div>
    </div>

    <div class="pt-16 pb-6 px-6 text-center">
        <h1 class="text-2xl font-bold text-gray-800">
            <?php echo CHtml::encode($realtor['name']); ?>
        </h1>
        <p class="text-blue-600 font-medium mt-1 text-sm uppercase tracking-widest">
            Ліцензований ріелтор
        </p>

        <div class="flex items-center justify-center gap-1 mt-3">
            <?php for ($i = 1; $i <= 5; $i++): ?>
                <?php if ($i <= $fullStars): ?>
                    <i class="fas fa-star text-amber-400 text-base"></i>
                <?php elseif ($i === $fullStars + 1 && $hasHalfStar): ?>
                    <i class="fas fa-star-half-alt text-amber-400 text-base"></i>
                <?php else: ?>
                    <i class="far fa-star text-gray-300 text-base"></i>
                <?php endif; ?>
            <?php endfor; ?>
            <span class="ml-2 text-gray-700 font-semibold text-sm">
                <?php echo $realtor['rating']; ?>
            </span>
        </div>
    </div>

</div>
