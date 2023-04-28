<?php $dash.='-- '; ?>
<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php if($category->id != $subcategory->id ): ?>
        <option value="<?php echo e($subcategory->id); ?>" <?php if($category->parent_id == $subcategory->id ): ?> selected <?php endif; ?> >
        	<?php echo e($dash); ?><?php echo e($subcategory->category_title); ?>

        </option>
    <?php endif; ?>
    <?php if(count($subcategory->subcategory)): ?>
        <?php echo $__env->make('category.sub_category_list_option_for_update',['subcategories' => $subcategory->subcategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\Projects\multi_category\resources\views/category/sub_category_list_option_for_update.blade.php ENDPATH**/ ?>