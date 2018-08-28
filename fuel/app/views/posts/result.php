<div class="col-lg-8">
    <?php foreach ($posts as $post): ?>
        <h3 class="mt-4"><a href="<?php echo Uri::create('posts/view/'.$post->id); ?>"><?php echo $post->title; ?></a></h3>
        <div>
        <?php echo Asset::img($post->image, array('title' => $post->title, 'class' => 'img-search'));?>
        </div>
        <p class="lead"><?php echo str::truncate($post->description, 200); ?></p>
    <?php endforeach; ?>
</div>
