<?php if(Session::has('success')): ?>
    <div class="alert alert-success">
        <button data-dismiss="alert" class="close">&times;</button>
        <?php echo Session::get('success'); ?>

    </div>
<?php elseif(Session::has('info')): ?>
    <div class="alert alert-info">
        <button data-dismiss="alert" class="close">&times;</button>
        <?php echo Session::get('info'); ?>

    </div>
<?php elseif(Session::has('danger')): ?>
    <div class="alert alert-danger">
        <button data-dismiss="alert" class="close">&times;</button>
        <?php echo Session::get('danger'); ?>

    </div>
<?php elseif(Session::has('warning')): ?>
    <div class="alert alert-warning">
        <button data-dismiss="alert" class="close">&times;</button>
        <?php echo Session::get('warning'); ?>

    </div>
<?php endif; ?>



    
        
        
            
                
            
        
    


<?php /**PATH E:\Projects\multi_category\resources\views/flash.blade.php ENDPATH**/ ?>