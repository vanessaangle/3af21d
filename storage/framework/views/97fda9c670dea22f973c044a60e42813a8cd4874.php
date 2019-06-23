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
                    <?php if($errors->any()): ?>
                        <div class="alert alert-danger">
                            <ul>
                                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li><?php echo e($error); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    <?php endif; ?>
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><i class="<?php echo e($template->icon); ?>"></i> Detail <?php echo e($template->title); ?></h3>                            
                        </div>
                        <div class="box-body">  
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width:200px"></th>
                                        <th style="width:20px"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>                                                                                       
                                       <?php $__currentLoopData = $form; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(array_key_exists('type',$item) && $item['type'] == 'password'): ?>
                                            
                                            <?php elseif(array_key_exists('type',$item) && $item['type'] == 'file'): ?>
                                            <tr>
                                                <td><?php echo e($item['label']); ?></td>
                                                <td>:</td>
                                                <td>                                                    
                                                    <a href="<?php echo e(asset($data->{$item['name']})); ?>" target="_blank"><img src="<?php echo e(asset($data->{$item['name']})); ?>" alt="<?php echo e(asset($data->{$item['name']})); ?>" style="max-width:300px;"></a>
                                                </td>
                                            </tr>
                                            <?php else: ?>
                                            <tr>
                                                <td><?php echo e($item['label']); ?></td>
                                                <td>:</td>
                                                <td><?php echo $data->{$item['name']}; ?></td>
                                            </tr>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">                                
                            <a href="<?php echo e(url()->previous()); ?>" class="btn btn-default">Kembali</a>
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
        var map, marker;
         function initMap(){
            console.log('INIT MAP');
            var myLatLng = {lat: <?php echo e($data->lat); ?>, lng: <?php echo e($data->lng); ?> };         
            $('.lat').val(myLatLng.lat);
            $('.lng').val(myLatLng.lng); 
            map = new google.maps.Map(document.getElementById('google_map'), {
                zoom: 16,
                center: myLatLng
            });  

            marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                draggable:false,
                title: 'Lokasi Desa'
            });
            marker.setPosition(event.latLng);
        }
    </script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDX5i1N1RR3DSQTIRu0ZbIyTgorg7Rhg_g&callback=initMap"></script>
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