<div class="bg-white rounded-xl shadow p-6">

    <h2 class="flex items-center gap-2 text-base font-semibold text-gray-800 mb-4">
        <i class="fas fa-address-card text-blue-500"></i>
        Контакти
    </h2>

    <div class="space-y-2">

        <a href="tel:<?php echo CHtml::encode($realtor['phone']); ?>"
           class="flex items-center gap-4 p-3 rounded-lg hover:bg-blue-50 transition-colors group">
            <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center shrink-0
                        group-hover:bg-blue-200 transition-colors">
                <i class="fas fa-phone text-blue-600 text-sm"></i>
            </div>
            <div>
                <p class="text-xs text-gray-400 leading-none mb-0.5">Телефон</p>
                <p class="text-gray-800 font-medium text-sm">
                    <?php echo CHtml::encode($realtor['phone']); ?>
                </p>
            </div>
            <i class="fas fa-chevron-right text-gray-300 text-xs ml-auto group-hover:text-blue-400 transition-colors"></i>
        </a>

        <a href="mailto:<?php echo CHtml::encode($realtor['email']); ?>"
           class="flex items-center gap-4 p-3 rounded-lg hover:bg-violet-50 transition-colors group">
            <div class="w-10 h-10 rounded-full bg-violet-100 flex items-center justify-center shrink-0
                        group-hover:bg-violet-200 transition-colors">
                <i class="fas fa-envelope text-violet-600 text-sm"></i>
            </div>
            <div>
                <p class="text-xs text-gray-400 leading-none mb-0.5">Email</p>
                <p class="text-gray-800 font-medium text-sm">
                    <?php echo CHtml::encode($realtor['email']); ?>
                </p>
            </div>
            <i class="fas fa-chevron-right text-gray-300 text-xs ml-auto group-hover:text-violet-400 transition-colors"></i>
        </a>

    </div>

    <div class="mt-5 pt-4 border-t border-gray-100">
        <a href="mailto:<?php echo CHtml::encode($realtor['email']); ?>"
           class="block w-full text-center py-2.5 px-4 rounded-lg
                  bg-gradient-to-r from-blue-600 to-violet-600
                  text-white font-semibold text-sm
                  hover:from-blue-700 hover:to-violet-700
                  transition-all shadow hover:shadow-md">
            <i class="fas fa-paper-plane mr-2"></i>
            Написати повідомлення
        </a>
    </div>

</div>
