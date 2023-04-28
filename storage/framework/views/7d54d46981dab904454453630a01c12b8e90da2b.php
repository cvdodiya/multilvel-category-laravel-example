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
                    <a class="add-new" href="<?php echo e(Route('allCategories')); ?>">
                        <button class="btn btn-primary btn-xs">All Category</button>
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
                            <th> Name</th>
                            <th>Email Slug</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                        <?php if(isset($users)): ?>
                            <?php $_SESSION['i'] = 0; ?>
                            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $_SESSION['i']=$_SESSION['i']+1; ?>
                                <tr>
                                    <td><?php echo e($_SESSION['i']); ?></td>
                                    <td><?php echo e($user->name); ?></td>
                                    <td><?php echo e($user->email); ?></td>
                                 </tr>
                                 

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
<?php /**PATH E:\Projects\multi_category\resources\views/user/view.blade.php ENDPATH**/ ?>