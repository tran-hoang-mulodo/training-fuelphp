<div class="container">
    <h4>Home > Post</h4>
    <a href="<?php echo Uri::create('admin/post/add'); ?>" class="btn btn-primary">Thêm mới</a>
    <?php if (Session::get_flash('success')):  ?>
        <label class="alert alert-success text-center"><?php echo Session::get_flash('success');?></label>
    <?php endif; ?>
    <hr/>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>description Short</th>
                    <th>Created At</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo $post->id;?></td>
                    <td><?php echo str::truncate($post->title, 20);?></td>
                    <td><?php echo Asset::img($post->image, array('class' => 'thumbnail'));?></td>
                    <td><?php echo str::truncate($post->description_short, 30);?></td>
                    <td><?php echo $post->created_at;?></td>
                    <td style="text-align: center">
                        <?php foreach ($categories as $category): ?>
                            <?php if ($category->id == $post->category_id) { ?>
                                <?php echo $category->name;?>
                            <?php } ?>
                        <?php endforeach;?>
                    </td>
                    <td>
                        <a href="<?php echo Uri::create('admin/post/edit/'.$post->id)?>" class="btn btn-primary">Sửa</a>
                        <a onclick="return comfirm('Bạn có chắc muốn xóa không!')" class="btn btn-danger" href="<?php echo Uri::create('admin/post/delete/'.$post->id)?> ?>">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php echo Pagination::instance('pagination'); ?>
    </div>
</div>
