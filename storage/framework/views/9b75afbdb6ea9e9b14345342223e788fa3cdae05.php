  

  <?php $__env->startSection('content'); ?>
  <div class="container text-center">
    <a href="<?php echo e(route('new')); ?>" class="btn btn-primary">Create New Topic</a>
  </div>
  <?php if($user=== $topic->user_id): ?>
  <div class="container text-center" style="margin-top:3px">
    <a href="<?php echo e(route('delete-topic', ['id' => $topic->id])); ?>" class="btn btn-success">Delete</a>
  </div>
  <?php endif; ?>
  <div class="container">

  <h1><?php echo e($topic->name); ?></h1>
  <h3><?php echo e($topic->description); ?></h3>

  </div>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-default">
                  <div class="panel-heading">Share an Idea</div>

                 <div class="panel-body">
              <form method="post" action="<?php echo e(route('new-idea', ['id' => $topic->id])); ?> ">
               <?php echo e(csrf_field()); ?>

               <div class="form-group">
                 <textarea name="body" id="body" class="form-control" rows="3" placeholder="Wrie your Idea"></textarea>
               </div>
               <div class="pull-right">
                 <button type="submit" class="btn btn-primary">Share</button>
               </div>
             </form>



                </div>
                </div>
                </div>
               <hr>
               
              <div class="col-md-12">
              <div class="panel panel-default  shared">
                  <div class="panel-heading bg-info">Idea Discussion</div>
                  <div class="panel-body">
            <?php if($ideas->isEmpty()): ?>

                    <div class="text-center">No Idea has posted yet.</div>

              <?php else: ?>
                 
                 <ul class="list-group">
                   <?php $__currentLoopData = $ideas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $idea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                   <li class="list-group-item">
                     <?php echo e($idea->body); ?>

                      <span class="pull-right label label-pill label-danger ">
                      <?php echo e($idea->author); ?>:<?php echo e(date('d-m-Y', strtotime($idea->created_at))); ?>

                      </span>
                   </li>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 </ul>
                </div>
                </div>
        </div>
        <?php endif; ?>

          </div>
      </div>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>