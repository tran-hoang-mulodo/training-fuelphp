<div class="container">
    <a href="<?php echo Uri::create('admin/categories/index'); ?>" class="btn btn-primary">Click to back</a>
    <div class="form-admin">
        <h2>Vertical (basic) Form</h2>
        <hr/>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Name:</label>
                <input type="text" class="form-control" name="name" placeholder="Enter name">
            </div>
            <button type="submit" name="add" class="btn btn-default" style="margin-left: 200px;">Submit</button>
        </form>
    </div>
</div>
