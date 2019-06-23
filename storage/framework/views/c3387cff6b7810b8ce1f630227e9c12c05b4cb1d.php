<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo e($template->title); ?>                
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard.index')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active"><?php echo e($template->title); ?></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           <div class="row">
               <div class="col-md-12">
                    <?php echo Alert::showBox(); ?>

                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><i class="<?php echo e($template->icon); ?>"></i> List <?php echo e($template->title); ?></h3>
                            <a href="<?php echo e(route("$template->route".'.create')); ?>" class="btn btn-primary pull-right">
                                <i class="fa fa-pencil"></i> Tambah <?php echo e($template->title); ?>

                            </a>
                        </div>
                        <div class="box-body">
                            <table class="table" id="datatables">
                                <thead>
                                    <tr>
                                        <td>No.</td>
                                        <?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(array_key_exists('view_index',$item) && $item['view_index']): ?>
                                                <td><?php echo e($item['label']); ?></td>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <td>Opsi</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key+1); ?></td>
                                            <?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if(array_key_exists('view_index',$item) && $item['view_index']): ?>
                                                    <td>
                                                        <?php if(array_key_exists('view_relation',$item)): ?>
                                                        <?php echo e(AppHelper::viewRelation($row,$item['view_relation'])); ?>

                                                        <?php else: ?>
                                                        <?php echo e($row->{$item['name']}); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                <?php endif; ?>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <td>
                                                <a href="<?php echo e(route("$template->route".'.edit',[$row->id])); ?>" class="btn btn-success btn-sm">Ubah</a>
                                                <a href="<?php echo e(route("$template->route".'.show',[$row->id])); ?>" class="btn btn-info btn-sm">Lihat</a>
                                                <a href="#" class="btn btn-danger btn-sm" onclick="confirm('Lanjutkan ?') ? $('#frmDelete<?php echo e($row->id); ?>').submit() : ''">Hapus</a>
                                                <form action="<?php echo e(route("$template->route".'.destroy',[$row->id])); ?>" method="POST" id="frmDelete<?php echo e($row->id); ?>">
                                                    <?php echo e(csrf_field()); ?>

                                                    <?php echo method_field('DELETE'); ?>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
           </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>
<?php $__env->startPush('js'); ?>
    <!-- page script -->
    <script>
    $(function () {
        $('#datatables').DataTable()
        $('#full-datatables').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>