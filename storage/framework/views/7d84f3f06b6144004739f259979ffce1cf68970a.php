
<?php $__env->startSection('contenido'); ?>
    <div class="row">        
        <div class="col-sm-5 col-md-6 col-lg-5">
            <a href="/empresa">
                <button type="button" class="btn btn-sm btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Regresar'); ?>
                </button>
            </a>
        </div>
              
        <div class="col-sm-2 col-lg-2 d-none d-md-block">
            
        </div> 
        <div class="col-sm-5 col-md-6 col-lg-5">
            <a href="/empresa/convenios/crear" class="col-4">
                <button type="button" class="btn btn-sm btn-success text-white float-right">
                    <?php echo app('translator')->get('Nuevo'); ?>
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-library-add')); ?>"></use>                    
                    </svg>                    
                </button>
            </a>
        </div>                                  
    </div>
    <hr>
    <div class="card">
        <div class="card-header">
            <form action="/empresa/convenios/exportar" method="POST">
                <?php echo csrf_field(); ?>
                <button name="pdf" type="submit" class="btn btn-sm btn-danger float-right" value="pdf">
                    PDF
                </button>                                
                <button name="excel" type="submit" class="btn btn-sm btn-success float-right" value="excel">
                    XLS
                </button>                            
            </form>
            <strong><?php echo app('translator')->get('Convenios'); ?></strong>            
            <a href="/empresa/convenios/crear"><span class="badge badge-success"><?php echo app('translator')->get('Nuevo'); ?> +</span></a>           
        </div>

        <div class="card-body">
            <?php echo $__env->make('flash::message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <table id="tbl_convenios" class="table" style="width: 100%;">
                <thead>                                      
                    <th><?php echo app('translator')->get('Código'); ?></th>
                    <th><?php echo app('translator')->get('Fecha Apertura'); ?></th>
                    <th>IPS</th>
                    <th><?php echo app('translator')->get('Duración'); ?></th>                                            
                    <th><?php echo app('translator')->get('Costo'); ?></th>                                            
                    <th><?php echo app('translator')->get('Estado'); ?></th> 
                    <th><?php echo app('translator')->get('Acción'); ?></th>                                                                                            
                </thead>
                <tbody>                    
                </tbody>
            </table>        
        </div>        
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection("scripts"); ?>
    <script>
        $('#tbl_convenios').DataTable({
        autoWidth: false,
        processing: true,
        serverSide: true,
        ajax: '/empresa/convenios/listar',
        columns: [
            {
                data: 'codConv', 
                name: 'codConv'
            },
            {
                data: 'fecAper', 
                name: 'fecAper'
            },            
            {
                data: 'nomIPS', 
                name: 'nomIPS'
            },
            {
                data: 'durConv', 
                name: 'durConv'
            },
            {
                data: 'cosConv', 
                name: 'cosConv'
            },
            {
                data: 'estado', 
                name: 'estado'
            },                    
            {
                data: 'editar', 
                name: 'editar', 
                orderable: false, 
                searchable: false
            }
            /* {
                data: 'cambiar', 
                name: 'cambiar', 
                orderable: false, 
                searchable: false
            } */
        ]
    });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/empresa/convenios/index.blade.php ENDPATH**/ ?>