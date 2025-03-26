<?php if ($pager->hasPreviousPage() || $pager->hasNextPage()): ?>
    <nav>
        <ul class="pagination">
            <?php if ($pager->hasPreviousPage()): ?>
                <li class="pagination-btn">
                    <a class="page-btn" href="<?= $pager->getFirst() ?>"> <?= lang('bahasa.first'); ?></a>
                </li>
                <li class="pagination-btn">
                    <a class="page-btn" href="<?= $pager->getPreviousPage() ?>">&lt;</a>
                </li>
            <?php endif; ?>

            <?php foreach ($pager->links() as $link): ?>
                <li class="pagination-btn <?= $link['active'] ? 'active' : '' ?>">
                    <a class="page-btn" href="<?= $link['uri'] ?>">
                        <?= $link['title'] ?>
                    </a>
                </li>
            <?php endforeach; ?>

            <?php if ($pager->hasNextPage()): ?>
                <li class="pagination-btn">
                    <a class="page-btn" href="<?= $pager->getNextPage() ?>">&gt;</a>
                </li>
                <li class="pagination-btn">
                    <a class="page-btn" href="<?= $pager->getLast() ?>"> <?= lang('bahasa.last'); ?></a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
<?php endif; ?>