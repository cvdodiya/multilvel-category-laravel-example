<?php $dash.='-- '; ?>
<?php $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $_SESSION['i']=$_SESSION['i']+1; ?>
    <tr>
        <td><?php echo e($_SESSION['i']); ?></td>
        <td><?php echo e($dash); ?><?php echo e($subcategory->category_title); ?></td>
        <td><?php echo e($subcategory->slug); ?></td>
        <td><?php echo e($subcategory->parent->category_title); ?></td>
        <td>
            <a href="<?php echo e(Route('editCategory', $subcategory->id)); ?>">
                <button class="btn btn-sm btn-info">Edit</button>
            </a>
            <a href="<?php echo e(Route('deleteCategory', $category->id)); ?>">
                <button class="btn btn-sm btn-danger">Delete</button>
            </a>
        </td>
    </tr>
    <?php if(count($subcategory->subcategory)): ?>
        <?php echo $__env->make('category.subcategory',['subcategories' => $subcategory->subcategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH E:\Projects\multi_category\resources\views/category/subcategory.blade.php ENDPATH**/ ?>