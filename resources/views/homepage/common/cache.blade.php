<?php if (!empty(Auth::user())) { ?>
    <div class="w-full bg-[#282828] text-center z-50">
        <a href="{{route('homepage.clearCache')}}" class="text-white font-bold py-2 px-4 rounded neonShadow flex justify-center items-center">Xóa cache</a>
    </div>
<?php } ?>