<div class="container">
    <a href="<?php echo Uri::create('admin/post/index'); ?>" class="btn btn-primary">Click to back</a>
    <div class="form-admin">
        <h2>Vertical (basic) Form</h2>
        <hr/>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" onchange="readURL(this);" name="file">
                <img src="#" class="thumbnail" id="image-add"/>
                <input type="hidden" name="image" value=""/>
            </div>
            <div class="form-group">
                <label for="pwd">description Short:</label>
                <textarea class="form-control" rows="5" cols="40" name="description_short"></textarea>
            </div>
            <div class="form-group">
                <label for="pwd">description:</label>
                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                <script>
                    CKEDITOR.replace('description');
                </script>
            </div>
            <div class="form-group">
                <label for="email">Author:</label>
                <input type="text" class="form-control" name="author" placeholder="Enter author">
            </div>
            <div class="form-group">
                <label for="email">Created At:</label>
                <input type="date" class="form-control" name="created_at" placeholder="Enter date">
            </div>
            <div class="form-group">
                <label for="email">Category Id:</label>
                <select name="category_id">
                    <?php foreach($categories as $category): ?>
                        <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input class="form-check-input" style="margin-left:20px" type="checkbox" id="blankCheckbox" name="status">
            </div>
            <button type="submit" name="add" class="btn btn-default" style="margin-left: 200px;">Submit</button>
        </form>
    </div>
</div>
