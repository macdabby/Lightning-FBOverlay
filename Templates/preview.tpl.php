<div class="image_options">
    <?php foreach ($overlays as $id => $overlay) : ?>
        <img src="/overlay/preview?id=<?=$id;?>" data-id="<?=$id;?>" <?php if ($id == 0): ?>class="selected"<?php endif; ?> onclick="overlays.select(<?=$id;?>)" id="overlay_preview_<?=$id;?>" />
    <?php endforeach; ?>
</div>
<form action="/overlay" method="post">
    <?= \Lightning\Tools\Form::renderTokenInput(); ?>
    <input type="hidden" name="id" id="overlay_form_id" value="0">
    <input type="hidden" name="action" value="update">
    <input type="submit" name="submit" value="Post to Facebook" class="button" />
</form>
<script>
    overlays = {
        select: function(id){
            $('.image_options img').removeClass('selected');
            $('#overlay_preview_' + id).addClass('selected');
            $('#overlay_form_id').val(id);
        }
    };
</script>
<style>
    .image_options img.selected {
        border: 2px solid red;
    }
</style>
