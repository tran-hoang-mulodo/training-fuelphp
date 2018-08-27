<div class="container">
    <h4>Home > Category</h4>
    <a href="<?php echo Uri::create('admin/categories/add'); ?>" class="btn btn-primary">Thêm mới</a>
    <?php if (Session::get_flash('success')):  ?>
        <label class="alert alert-success text-center"><?php echo Session::get_flash('success');?></label>
    <?php endif; ?>
    <hr/>
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th style="text-align:center">Id</th>
                    <th style="text-align:center">Name</th>
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $category): ?>
                <tr>
                    <td style="text-align:center"><?php echo $category->id;?></td>
                    <td style="text-align:center"><?php echo $category->name; ?></td>
                    <td style="text-align:center">
                        <a href="edit/<?php echo $category->id; ?>" class="btn btn-primary">Sửa</a>
                        <a onclick="return comfirm('Bạn có chắc muốn xóa không!')" class="btn btn-danger" href="delete/<?php echo $category->id;?>">Xóa</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
