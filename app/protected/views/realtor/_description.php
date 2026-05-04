<div class="bg-white rounded-xl shadow p-6">
    <h2 class="flex items-center gap-2 text-base font-semibold text-gray-800 mb-4">
        <i class="fas fa-id-card text-blue-500"></i>
        Про мене
    </h2>

    <blockquote class="border-l-4 border-blue-500 pl-4 text-gray-600 leading-relaxed italic text-sm">
        <?php echo nl2br(CHtml::encode($realtor['description'])); ?>
    </blockquote>
</div>
