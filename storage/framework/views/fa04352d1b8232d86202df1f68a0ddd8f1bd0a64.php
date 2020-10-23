
<?php $__env->startSection("contenido"); ?>
    <div class="row">
        <div class="col-12">
            <a href="/empleados">
                <button type="button" class="btn btn-info text-white float-left">
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-chevron-circle-left-alt')); ?>"></use>                    
                    </svg>
                    <?php echo app('translator')->get('Regresar'); ?>
                </button>
            </a> 
            
            <a href="/empleados/editar/<?php echo e($empleado->id); ?>">
                <button type="button" class="btn btn-success text-white float-right">                    
                    <svg class="c-icon c-icon-lg">
                        <use xlink:href="<?php echo e(asset('assets/dashboard/vendors/@coreui/icons/svg/free.svg#cil-pencil')); ?>"></use>                    
                    </svg>                    
                    <?php echo app('translator')->get('Editar'); ?>
                </button>
            </a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-12">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e($empleado->id); ?>">
                        <i class="fa fa-bars fa-sm"> <?php echo app('translator')->get('Datos Personales'); ?></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active">
                        <i class="fas fa-calendar-alt fa-sm"> Historial Citas</i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="alert alert-success" role="alert">
                <dt>
                    <b>Emmpleado: </b>
                    <?php echo e($empleado->tipoId); ?> <?php echo e($empleado->nIdEmp); ?> - 
                    <?php echo e($empleado->pNom); ?> <?php echo e($empleado->sNom); ?> <?php echo e($empleado->pApe); ?> <?php echo e($empleado->sApe); ?> 
                </dt>
            </div>
        </div>                     
    </div>

    <div class="row">
        <div class="col-md-auto">
            <dl class="text-right">
                <dt><?php echo app('translator')->get('Tipo Documento'); ?></dt>
                <dt><?php echo app('translator')->get('Número Documento'); ?></dt>
                <dt><?php echo app('translator')->get('Primer Apellido'); ?></dt>
                <dt><?php echo app('translator')->get('Segundo Apellido'); ?></dt>
                <dt><?php echo app('translator')->get('Primer Nombre'); ?></dt>
                <dt><?php echo app('translator')->get('Segundo Nombre'); ?></dt>
                <dt><?php echo app('translator')->get('Género'); ?></dt>
                <dt><?php echo app('translator')->get('Fecha Nacimiento'); ?></dt>
                <dt><?php echo app('translator')->get('Edad'); ?></dt>
                <dt><?php echo app('translator')->get('Grupo Sanguíneo'); ?></dt>
                <dt>ARL</dt>
            </dl>
        </div>
        <div class="col-md-auto">
            <dl class="text-left">                    
                <dt><?php echo e($empleado->tipoId); ?></dt>
                <dt><?php echo e($empleado->nIdEmp); ?></dt>
                <dt><?php echo e($empleado->pApe); ?></dt>
                <dt><?php echo e($empleado->sApe); ?></dt>
                <dt><?php echo e($empleado->pNom); ?></dt>
                <dt><?php echo e($empleado->sNom); ?></dt>
                <?php if($empleado->genero == "M"): ?>
                    <dt>Masculino</dt>
                <?php else: ?>
                    <dt>Femenino</dt>
                <?php endif; ?>                
                <dt><?php echo e($empleado->fecNac); ?></dt>
                <dt><?php echo e($edad); ?></dt>
                <dt><?php echo e($empleado->rh); ?></dt>
                <dt><?php echo e($empleado->arl); ?></dt>
            </dl>
        </div>
        
        <div class="col-md-auto">
            <dl class="text-right">            
                <dt>EPS</dt>                            
                <dt><?php echo app('translator')->get('Ciudad'); ?></dt>
                <dt><?php echo app('translator')->get('Dirección'); ?></dt>
                <dt><?php echo app('translator')->get('Teléfono'); ?></dt>
                <dt><?php echo app('translator')->get('Correo'); ?></dt>
                <dt><?php echo app('translator')->get('Estado Civil'); ?></dt>
                <dt><?php echo app('translator')->get('Nivel Educativo'); ?></dt>
                <dt><?php echo app('translator')->get('Fecha Ingreso'); ?></dt>
                <dt><?php echo app('translator')->get('Cargo'); ?></dt>
                <dt><?php echo app('translator')->get('Sede'); ?></dt>
                <dt><?php echo app('translator')->get('Estado'); ?></dt>
            </dl>
        </div>

        <div class="col-md-auto">
            <dl class="text-left">
                <dt><?php echo e($empleado->eps); ?></dt>
                <dt><?php echo e($empleado->ciuRes); ?></dt>
                <dt><?php echo e($empleado->dirRes); ?></dt>
                <dt><?php echo e($empleado->telEmp); ?></dt>
                <dt><?php echo e($empleado->emailEmp); ?></dt>
                <dt><?php echo e($empleado->eCivil); ?></dt>
                <dt><?php echo e($empleado->nivlEdu); ?></dt>
                <dt><?php echo e($empleado->fecIng); ?></dt>
                <dt><?php echo e($empleado->nomCar); ?></dt>
                <dt><?php echo e($empleado->nomSede); ?></dt>
                <?php if($empleado->estado == 1): ?>
                    <dt style="color: green;">
                        Activo
                    </dt>
                    <?php else: ?>
                    <dt style="color: red;">
                        Inactivo
                    </dt>
                    <?php endif; ?>
                </dt>
            </dl>        
        </div>

        <div class="col-md-auto col-lg-auto">
            
            <br>            
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.app", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\andre\Desktop\proyecto\resources\views/empleados/view.blade.php ENDPATH**/ ?>