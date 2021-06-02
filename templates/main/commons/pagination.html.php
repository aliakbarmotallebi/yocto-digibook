
<?php if($paginator->hasPages()): ?>
    <nav >
        <ul class="pagination">
             <?php if ($paginator->onFirstPage()): ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">&lsaquo;</span>
                </li>
            <?php else: ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo  $paginator->previousPageUrl() ?>" rel="prev">&lsaquo;</a>
                </li>
            <?php endif ?>
            <?php foreach($elements as $element): ?>
                    <?php if(is_string($element)): ?>
                        <li class="page-item disabled" aria-disabled="true">
                            <span class="page-link"><?php echo $element ?></span>
                        </li>
                    <?php endif; ?>
                    <?php if (is_array($element)): ?>
                        <?php foreach ($element as $page => $url): ?>
                            <?php if ($page == $paginator->currentPage()): ?>
                                <li class="page-item active" aria-current="page">
                                    <span  class="page-link"><?php echo $page ?></span>
                                </li>
                            <?php else: ?>
                                <li class="page-item">
                                    <a class="page-link" href="<?php echo $url ?>"><?php echo $page ?></a>
                                </li>
                            <?php endif; ?>
                        <?php endforeach ?>
                    <?php endif ?>
            <?php endforeach ?>

            <?php if ($paginator->hasMorePages()): ?>
                <li class="page-item">
                    <a class="page-link" href="<?php echo $paginator->nextPageUrl() ?>" rel="next" >&rsaquo;</a>
                </li>
            <?php else: ?>
                <li class="page-item disabled" aria-disabled="true">
                    <span class="page-link" aria-hidden="true">&rsaquo;</span>
                </li>
            <?php endif ?>
        </ul>
    </nav>
<?php endif ?>