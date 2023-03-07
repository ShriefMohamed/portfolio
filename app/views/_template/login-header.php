<div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
    <?php if (\Framework\Lib\Session::Exists('messages')) : ?>
        <?php if (\Framework\Lib\Session::Get('messages')[0] !== 'error') : ?>
            <div class="alert alert-success" style="position: absolute;top: 40px;width: 40%;text-align: center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span class="icon icon-ok-sign"></span> <strong class="badge badge-success" style="float: left">Success!</strong> <?= \Framework\Lib\Session::Get('messages')[1] ?>
            </div>
        <?php else : ?>
            <div class="alert alert-danger" style="position: absolute;top: 40px;width: 40%;text-align: center">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <span class="icon icon-remove-sign"></span> <strong class="badge badge-danger" style="float: left">Oh snap!</strong> <?= \Framework\Lib\Session::Get('messages')[1] ?>
            </div>
        <?php endif; ?>

        <?php \Framework\Lib\Session::Remove('messages'); ?>
    <?php endif; ?>

    <div class="auth-box border-top border-secondary" style="width: 40%; max-width: 40%;">
