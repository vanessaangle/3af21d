<?php $__env->startPush('css'); ?>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                <?php echo e($template->title); ?>

                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard.index')); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Home</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->            
            <!-- /.row -->
            <!-- Main row -->
            <?php if(AppHelper::access(['Admin'])): ?>
            <div class="row">
                <div class="col-md-12" style="padding-top:180px">                    
                    <h2><center>SELAMAT DATANG SISTEM INFORMASI CLOUD DESA</center></h2>                                    
                </div>                
            </div>
            <?php else: ?>
            
            <?php endif; ?>
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('admin-lte')); ?>/bower_components/chart.js/Chart.js"></script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('admin.layouts.app',[$template], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>