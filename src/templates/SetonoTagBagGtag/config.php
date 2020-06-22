<script>
<?php if (count($parameters) > 0): ?>
gtag('config', '<?=$target?>', <?=\Setono\TagBag\encode($parameters)?>);
<?php else: ?>
gtag('config', '<?=$target?>');
<?php endif; ?>
</script>
