<script>
<?php if (count($parameters) > 0): ?>
gtag('event', '<?=$event?>', <?=\Setono\TagBag\encode($parameters)?>);
<?php else: ?>
gtag('event', '<?=$event?>');
<?php endif; ?>
</script>
