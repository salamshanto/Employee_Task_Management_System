

<?php $__env->startSection('title'); ?>
    List of Admin
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="container">
                
                    <div class="card">
                        <div class="card-header">
                            <h3>List of admin</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="list_admin" class="table" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <?php $__currentLoopData = $admins; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $admin): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($admin->id); ?></td>
                                            <td><?php echo e($admin->name); ?></td>
                                            <td><?php echo e($admin->email); ?></td>
                                            <td><?php echo e($admin->phone); ?></td>
                                            <td>
                                                <button class="btn btn-danger" id="delete-admin"
                                                    data-id='<?php echo e($admin->id); ?>'>Delete</button>
                                                    <a href="<?php echo e(route('admin.admin.edit', ['id'=>$admin->id])); ?>" class="btn btn-primary" 
                                                    >Edit</a></td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script>
        $(document).ready(function() {
            $('#list_admin').DataTable();
        });

        $(document).on('click', '#delete-admin', function(e) {
            e.preventDefault();

            const id = $(this).data('id');
            if (id != "") {
                $.ajax({
                    type: 'POST',
                    url: "<?php echo e(route('admin.admin.delete' )); ?>",
                    data: {
                        id,
                        "_token":"<?php echo e(csrf_token()); ?>"
                    },
                    dataType: 'json',
                    success: (data) => {
                        if(data.success == true){
                            alert(data.message);
                            window.location.href="<?php echo e(route('admin.admin.list' )); ?>"
                        }else{
                            alert(data.message);

                        }
                    }
                })
            }
        })
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\y\project-1-employee-task-management-system\resources\views/admin/admin/index.blade.php ENDPATH**/ ?>