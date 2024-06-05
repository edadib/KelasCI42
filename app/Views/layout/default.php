<?= $this->extend($layout); ?>

<?= $this->section('content'); ?>

<?= $this->include($page); ?>

<?= $this->endSection(); ?>