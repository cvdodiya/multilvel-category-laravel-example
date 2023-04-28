<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<section class="content" style="padding:50px 20%;">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <div class="panel-heading">Dashboard</div>
                    Welcome <?php echo e(Auth::user()->name); ?>

                    <br>
                    <a class="add-new" href="<?php echo e(Route('allUsers')); ?>">
                        <button class="btn btn-primary btn-xs">All Users</button>
                    </a>
                    <a class="add-new" href="<?php echo e(Route('createCategory')); ?>">
                        <button class="btn btn-primary btn-xs">Add New Category</button>
                    </a>
                    <a class="add-new" href="<?php echo e(Route('treeview')); ?>">
                        <button class="btn btn-primary btn-xs">Treeview</button>
                    </a>
                    
                    <?php if(Auth::guest()): ?>
                        
                    <?php else: ?>
                        <a href="<?php echo e(route('logout')); ?>"
                            onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();" class="btn btn-primary pull-right">
                            Logout
                        </a>

                        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                            <?php echo e(csrf_field()); ?>

                        </form>
                    <?php endif; ?>
                    

                </div>

                <br>
                <div class="box-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>S.No.</th>
                            <th>Category Name</th>
                            <th>Category Slug</th>
                            <th>Parent Category</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($categories)): ?>
                            <?php $_SESSION['i'] = 0; ?>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                                <tr>
                                    <?php $dash=''; ?>
                                    <td><?php echo e($_SESSION['i']); ?></td>
                                    <td><?php echo e($category->category_title); ?></td>
                                    <td><?php echo e($category->slug); ?></td>
                                    <td>
                                        <?php if(isset($category->parent_id)): ?>
                                            Parent
                                        <?php else: ?>
                                            None
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <a href="<?php echo e(Route('editCategory', $category->id)); ?>">
                                            <button class="btn btn-sm btn-info">Edit</button>
                                        </a>
                                        <a href="<?php echo e(Route('deleteCategory', $category->id)); ?>">
                                            <button class="btn btn-sm btn-danger">Delete</button>
                                        </a>
                                    </td>
                                 </tr>
                                 <?php if(count($category->subcategory)): ?>
                                     <?php echo $__env->make('category.subcategory',['subcategories' => $category->subcategory], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                 <?php endif; ?>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php unset($_SESSION['i']); ?>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<?php /**PATH E:\Projects\multi_category\resources\views/category/all_category.blade.php ENDPATH**/ ?>