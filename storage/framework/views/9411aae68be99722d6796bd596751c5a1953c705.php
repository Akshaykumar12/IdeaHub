<?php $__env->startSection('content'); ?>
<div class="container text-center">
    <a href="<?php echo e(route('new')); ?>" class="btn btn-primary">Create New Topic</a>
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Topics</div>

                <div class="panel-body">
                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>
                
                    
                    
                <?php if($topics->isEmpty()): ?>
                
                  <div class="text-center">No Topics yet.</div>
                
                
                <?php else: ?>
              
                <ul class="list-group">
                 <?php $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                  <li class="list-group-item">
                  <a href="<?php echo e(route('topic', ['id' => $topic->id])); ?>">
                  <div class="post-item">
                  <?php echo e($topic->name); ?>     
                  <span class="label label-pill label-success justify-content-center" style="color:#fff"><?php echo e($topic->author); ?></span>
                  <span class="label label-pill label-danger pull-right" style="color:#fff">
                  <?php echo e(date('d-m-Y', strtotime($topic->created_at))); ?>

                  </span>
                  </div>
                  </a> 
                  </li>
                
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                  </ul>
                  <?php endif; ?>
              </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>