

<?php $__env->startSection('content'); ?>

<div class="container-fluid">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 style="float: left"><i class="fas fa-box"></i> Products</h4>
                        <a href="#" style="float: right" class="btn btn-dark" 
                        data-toggle="modal" data-target="#addproduct">
                            <i class="fas fa-plus"> Add New Products</i></a></div>
                    <div class="card-body">
                        <table class="table table-bordered table-left">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product Name</th>
                                    <th>Brand</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Alert Stock</th>
                                    <th>Description</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key+1); ?></td>
                                    <td><?php echo e($product->product_name); ?></td>
                                    <td><?php echo e($product->brand); ?></td>
                                    <td><?php echo e(number_format($product->price,2)); ?></td>
                                    <td><?php echo e($product->quantity); ?></td>
                                    <td><?php if($product->alert_stock >= $product->quantity): ?> 
                                        <span class="badge badge-danger">
                                        Low Stock: must be > <?php echo e($product->alert_stock); ?></span>
                                    <?php else: ?>
                                        <span class="badge badge-success"><?php echo e($product->alert_stock); ?></span>
                                    <?php endif; ?>
                                        </td>
                                    <td><?php echo e($product->description); ?></td>
                                    
                                   <td>
                                       <div class="btn-group">
                                           <a href="#" class="btn btn-info btnt-sm"
                                           data-toggle="modal" 
                                           data-target="#editproduct<?php echo e($product->id); ?>">
                                               <i class="fas fa-edit"> Edit</i></a>
                                               <a href="#"  data-toggle="modal" 
                                               data-target="#deleteproduct<?php echo e($product->id); ?>" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i> Delete</a>
                                       </div>
                                   </td>
                                </tr>
                                <div class="modal right fade" id="editproduct<?php echo e($product->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="staticBackdropLabel">Edit product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                      <?php echo e($product->id); ?>   
                                    </div>
                                    <div class="modal-body">
                                      <form action="<?php echo e(route('products.update', $product->id)); ?>" method="POST">
                                    
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('put'); ?>
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" name="product_name" id="" value="<?php echo e($product->product_name); ?>" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Brand</label>
                                            <input type="text" name="brand" id="" value="<?php echo e($product->brand); ?>" class="form-control">

                                        </div>            

                                        <div class="form-group">
                                            <label for="">Price</label>
                                            <input type="number" name="price" id="" value="<?php echo e($product->price); ?>"class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Quantity</label>
                                            <input type="number" name="quantity" id="" value="<?php echo e($product->quantity); ?>" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Alert Stock</label>
                                            <input type="number" name="alert_stock" id="" value="<?php echo e($product->alert_stock); ?>" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label for="">Description</label>
                                            <textarea name="description" id=""cols="30" rows="2" class="form-control"><?php echo e($product->description); ?></textarea>
                                        </div>
                                        
                                        <div class="modal-footer">
                                            <button class="btn btn-primary btn-block">Update Product</button>
                                        </div>
                                    </form>
                                      
                                    </div>
                                    
                                  </div>
                                    </div>
                                </div>

                                <div class="modal right fade" id="deleteproduct<?php echo e($product->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                      <h4 class="modal-title" id="staticBackdropLabel">Delete product</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                      <?php echo e($product->id); ?>   
                                    </div>
                                    <div class="modal-body">
                                      <form action="<?php echo e(route('products.destroy', $product->id)); ?>" method="POST">
                                    
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('delete'); ?>
                                    <p>Are you sure you want to delete this <?php echo e($product->product_name); ?>?</p>
                                        <div class="modal-footer">
                                            <button class="btn btn-info" data-dismiss="modal">Cancel</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </div>
                                    </form>
                                      
                                    </div>
                                    
                                  </div>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($products->links()); ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-3"><div class="card">
                <div class="card-header"><h4>Search product</h4></div>
                    <div class="card-body">
                        ...
                    </div>
            </div></div>
        </div>
    </div>
</div>
    <div class="modal right fade" id="addproduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="staticBackdropLabel">Add product</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>   
        </div>
        <div class="modal-body">
          <form action="<?php echo e(route('products.store')); ?>" method="POST">
        
            <?php echo csrf_field(); ?>

            <div class="form-group">
                <label for="">Product Name</label>
                <input type="text" name="product_name" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Brand</label>
                <input type="text" name="brand" id="" class="form-control">

            </div>            

            <div class="form-group">
                <label for="">Price</label>
                <input type="number" name="price" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Quantity</label>
                <input type="number" name="quantity" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Alert Stock</label>
                <input type="number" name="alert_stock" id="" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Description</label>
                <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
            </div>
            
            <div class="modal-footer">
                <button class="btn btn-primary btn-block">Save Product</button>
            </div>
        </form>
          
        </div>
        
      </div>
        </div>
    </div>

  <style>
      .modal.right .modal-dialog{
          top: 0;
          right: 0;
          margin-right: 3vh;
      }

      .modal-fade:not(.in).right .modal-dialog{
          -webkit-transform: translate3d(25%,0,0);
          transform: translate3d(25%, 0, 0);
      }
  </style>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Xampp\htdocs\POS\resources\views/products/index.blade.php ENDPATH**/ ?>