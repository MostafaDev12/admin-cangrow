<?php if($paginator->hasPages()): ?>
    <nav aria-label="..." class="d-flex justify-content-center">
        <ul class="pagination">
            
            <?php if($paginator->onFirstPage()): ?>
                <li class="page-item" aria-disabled="true" aria-label="<?php echo app('translator')->get('السابق'); ?>">
                    <a class="page-link" aria-hidden="true"><?php echo app('translator')->get('السابق'); ?></a>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($paginator->previousPageUrl()); ?>" rel="prev" aria-label="<?php echo app('translator')->get('السابق'); ?>"><?php echo app('translator')->get('السابق'); ?></a>
                </li>
            <?php endif; ?>

            
            <?php
                $currentPage = $paginator->currentPage();
                $lastPage = $paginator->lastPage();
                $startPage = max(1, $currentPage - 1);
                $endPage = min($lastPage, $currentPage + 1);
            ?>

            
            <?php if($startPage > 1): ?>
                <li class="page-item"><a class="page-link" href="<?php echo e($paginator->url(1)); ?>">1</a></li>
                <?php if($startPage > 2): ?>
                    <li class="page-item disabled"><a class="page-link">...</a></li>
                <?php endif; ?>
            <?php endif; ?>

            
            <?php for($page = $startPage; $page <= $endPage; $page++): ?>
                <?php if($page == $currentPage): ?>
                    <li class="page-item active" aria-current="page"><a class="page-link"><?php echo e($page); ?></a></li>
                <?php else: ?>
                    <li class="page-item"><a class="page-link" href="<?php echo e($paginator->url($page)); ?>"><?php echo e($page); ?></a></li>
                <?php endif; ?>
            <?php endfor; ?>

            
            <?php if($endPage <= $lastPage): ?>
                <?php if($endPage <= $lastPage - 1): ?>
                    <li class="page-item disabled"><a class="page-link">...</a></li>
                <?php endif; ?>
                <li class="page-item"><a class="page-link" href="<?php echo e($paginator->url($lastPage)); ?>"><?php echo e($lastPage); ?></a></li>
            <?php endif; ?>

            
            <?php if($paginator->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo e($paginator->nextPageUrl()); ?>" rel="next" aria-label="<?php echo app('translator')->get('التالى'); ?>"><?php echo app('translator')->get('التالى'); ?></a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" aria-disabled="true" aria-label="<?php echo app('translator')->get('التالى'); ?>">
                    <a class="page-link" aria-hidden="true"><?php echo app('translator')->get('التالى'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>
<?php /**PATH /home/cangrowonline/public_html/dr-shams/resources/views/includes/pagination/custom.blade.php ENDPATH**/ ?>