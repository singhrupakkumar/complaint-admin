<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12 grid-margin">

            <div class="card">

                <div class="card-body">

                    <h4 class="card-title">Reports</h4>

                    <form role="search" action="<?php echo e(route('generatePDF')); ?>">
                        <div class="row" style="margin-bottom: 10px;">  

                            <div class="col-md-6 col-xs-12">   
                                <div class="input-group-sm">   
                                    <label>REG. DATE</label>     
                                    <input type="date" class="form-control" name="from_date" id="from_date" value="<?php echo e(Request('from_date')); ?>" />      
                                </div> 
                            </div> 

                            <div class="col-md-6 col-xs-12">      
                                <div class="input-group-sm"> 
                                    <label>To Date</label>          
                                    
                                        <input type="date" class="form-control" name="to_date" id="to_date" value="<?php echo e(Request('to_date')); ?>"/>  
                                                  
                                   
                                </div>

                            </div>
 
                        </div>

                        <div class="row" style="margin-top: 40px;">     
                            <div class="col-md-2 col-xs-2"> 

                                <div class="d-flex">
                               <button type="submit" name="rejectedbase" value="1" class="btn btn-outline-primary" style="margin-left:10px;">
                                            Rejected Bases  
                                        </button>  
                                <button type="submit" name="catrejectedbase" value="1" class="btn btn-outline-primary" style="margin-left:10px;">
                                            Category Rejects
                                        </button> 
                                 </div>        

                            </div>
                        </div>        
                    </form> 

                

            </div>

        </div>

    </div>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xamppnew\htdocs\june\complaint-admin\resources\views/admin/reports.blade.php ENDPATH**/ ?>