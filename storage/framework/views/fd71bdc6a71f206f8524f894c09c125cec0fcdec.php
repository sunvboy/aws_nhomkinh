 <nav class="nav-drill flex-col">
     <ul class="nav-items nav-level-1">
         <?php if($menu_header): ?>
         <?php if(count($menu_header->menu_items) > 0): ?>
         <?php $__currentLoopData = $menu_header->menu_items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

         <li class="nav-item <?php if($item->children->count() > 0): ?> nav-expand <?php endif; ?>">
             <a class="nav-link  <?php if($item->children->count() > 0): ?> nav-expand-link <?php endif; ?>" href="<?php echo e(!empty($item->children->count() > 0)?'javascript:void(0)':url($item->slug)); ?>">
                 <?php echo e($item->title); ?>

             </a>
             <?php if($item->children->count() > 0): ?>
             <ul class="nav-items nav-expand-content">
                 <?php $__currentLoopData = $item->children; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 <li class="nav-item">
                     <a class="nav-link" href="<?php echo e(url($item2->slug)); ?>">
                         <?php echo e($item2->title); ?>

                     </a>
                 </li>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
             </ul>
             <?php endif; ?>
         </li>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <?php endif; ?>
         <?php endif; ?>
     </ul>
 </nav><?php /**PATH D:\xampp\htdocs\evox.local\resources\views/homepage/common/menuMobile.blade.php ENDPATH**/ ?>