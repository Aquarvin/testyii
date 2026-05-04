<div class="grid grid-cols-3 gap-4">

    <div class="bg-white rounded-xl shadow p-4 text-center group hover:shadow-md transition-shadow">
        <div class="w-11 h-11 rounded-full bg-blue-100 flex items-center justify-center mx-auto mb-3
                    group-hover:bg-blue-200 transition-colors">
            <i class="fas fa-briefcase text-blue-600 text-lg"></i>
        </div>
        <p class="text-3xl font-bold text-gray-800">
            <?php echo $realtor['experience']; ?>
        </p>
        <p class="text-xs text-gray-500 mt-1 leading-tight">
            років<br>досвіду
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-4 text-center group hover:shadow-md transition-shadow">
        <div class="w-11 h-11 rounded-full bg-violet-100 flex items-center justify-center mx-auto mb-3
                    group-hover:bg-violet-200 transition-colors">
            <i class="fas fa-house-user text-violet-600 text-lg"></i>
        </div>
        <p class="text-3xl font-bold text-gray-800">
            <?php echo $realtor['properties_sold']; ?>
        </p>
        <p class="text-xs text-gray-500 mt-1 leading-tight">
            продано<br>об'єктів
        </p>
    </div>

    <div class="bg-white rounded-xl shadow p-4 text-center group hover:shadow-md transition-shadow">
        <div class="w-11 h-11 rounded-full bg-amber-100 flex items-center justify-center mx-auto mb-3
                    group-hover:bg-amber-200 transition-colors">
            <i class="fas fa-star text-amber-500 text-lg"></i>
        </div>
        <p class="text-3xl font-bold text-gray-800">
            <?php echo $realtor['rating']; ?>
        </p>
        <p class="text-xs text-gray-500 mt-1 leading-tight">
            середній<br>рейтинг
        </p>
    </div>

</div>
