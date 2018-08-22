<div class="col-lg-8">
<?php foreach ($posts as $post): ?>
  <!-- Title -->
  <h3 class="mt-4"><?php echo $post->title; ?></h3>
  <!-- Author -->
  <p class="lead">
    by
    <a href="#"><?php echo $post->author; ?></a>
  </p>
  <hr>
  <!-- Date/Time -->
  <p>Posted on <?php echo date("Y-m-d H:i:s", strtotime($post->created_at)); ?></p>
  <hr>
  <!-- description short -->
  <p><?php echo $post->description_short; ?></p>
  <hr>
  <!-- Preview Image -->
  <div class="img-post">
      <?php echo Asset::img($post->image, array('title' => $post->title));?>
  </div>
  <hr>
  <!-- Post Content -->
  <p class="lead"><?php echo str::truncate($post->description, 400); ?></p>
  <a class="view-more" href="/posts/view/<?php echo $post->id; ?>">View More</a>
  <hr>
<?php endforeach; ?>
</div>
