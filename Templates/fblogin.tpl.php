<h1>Build your overlay!</h1>
<div class="image_options">
    <?php foreach ($overlays as $id => $overlay) : ?>
        <img src="<?=$overlay;?>" style="max-width: 200px;border:2px solid grey;margin:10px;" />
    <?php endforeach; ?>
</div>

<?= \Lightning\Tools\SocialDrivers\Facebook::loginButton(true);
