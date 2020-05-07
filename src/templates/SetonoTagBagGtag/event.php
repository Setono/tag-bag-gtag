<script>
<?php if (count($parameters) > 0): ?>
gtag('event', '<?=$event?>', <?=json_encode($parameters, \JSON_THROW_ON_ERROR | \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES | \JSON_PRESERVE_ZERO_FRACTION | \JSON_INVALID_UTF8_IGNORE)?>);
<?php else: ?>
gtag('event', '<?=$event?>');
<?php endif; ?>
</script>
