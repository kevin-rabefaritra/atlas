<?php $__env->startSection('title'); ?>
    Message Header Analyzer
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-left-primary shadow h-100">
                <div class="card-body">
                    <div class="form-group mb-0">
                        <textarea class="form-control" rows="3" id="headers" placeholder="Paste your message headers here ~"></textarea>
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-primary">Analyze!</button>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/MAMP/htdocs/atlas/resources/views/mha/index.blade.php ENDPATH**/ ?>