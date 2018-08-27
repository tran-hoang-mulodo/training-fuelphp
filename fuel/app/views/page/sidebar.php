<h5 class="card-header">Categories</h5>
<div class="card-body">
  <div class="row">
      <?php foreach ($categories as $category): ?>
          <div class="col-lg-6">
            <ul class="list-unstyled mb-0">
                <li>
                  <a href="#"><?php echo $category->name;?></a>
                </li>
            </ul>
        </div>
    <?php endforeach; ?>
  </div>
</div>
