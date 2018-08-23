<div class="container">
    <h4>Home > Post</h4>

    <a href="add" class="btn btn-primary">Thêm mới</a>
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
                    <th>Category Id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?php echo $post->id;?></td>
                    <td><?php echo str::truncate($post->title, 30);?></td>
                    <td><?php echo Asset::img($post->image, array('class' => 'thumbnail'));?></td>
                    <td><?php echo str::truncate($post->description_short, 50);?></td>
                    <td><?php echo $post->created_at;?></td>
                    <td style="text-align: center"><?php echo $post->category_id;?></td>
                    <td><a href="edit/<?php echo $post->id; ?>" class="btn btn-primary">Sửa</a>
                        <a onclick="return comfirm('Bạn có chắc muốn xóa không!')" class="btn btn-danger" href="delete/<?php echo $post->id;?>">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
