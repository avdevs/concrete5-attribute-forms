<div class="panel panel-primary">
    <div class="panel-heading">
        <div class="panel-title">
            <?= t('Form Results') ?>
        </div>
    </div>
    <div class="panel-body">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th><?= t('Name') ?></th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($formTypes as $formType) { ?>
                <tr>
                    <td><?= $formType->getFormName() ?></td>
                    <td>
                        <a class="btn btn-primary pull-right"
                           href="<?php echo $view->action('entries', $formType->getID()) ?>"><?php echo t('Show Entries') ?>
                        </a>
                    </td>
                </tr>
            <?php } ?>
            </tbody>
            <tfoot>
            <tr>
                <td colspan="8">
                    <?= $formTypesPagination ?>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>
</div>
