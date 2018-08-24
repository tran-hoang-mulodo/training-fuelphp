<div class="container">
    <div class="form-admin">
        <h2>Vertical (basic) Form</h2>
        <hr/>
        <form action="<?php echo $post->id ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" value="<?php echo $post->title; ?>" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="file" value="<?php echo $post->image; ?>">
                <input type="hidden" name="image" value="<?php echo $post->image; ?>">
                <?php echo Asset::img("$post->image", array('class' => 'thumbnail')) ?>
            </div>
            <div class="form-group">
                <label for="description_short">description Short:</label>
                <textarea class="form-control" rows="5" cols="40" name="description_short"><?php echo $post->description_short; ?></textarea>
            </div>
            <div class="form-group">
                <label for="pwd">description:</label>
                <textarea class="form-control" rows="10" id="description" name="description"><?php echo $post->description; ?></textarea>
                <script>
                    CKEDITOR.replace('description');
                </script>
            </div>
            <div class="form-group">
                <label for="email">Author:</label>
                <input type="text" class="form-control" name="author" placeholder="Enter author" value="<?php echo $post->author; ?>">
            </div>
            <div class="form-group">
                <label for="email">Created At:</label>
                <input type="date" class="form-control" name="created_at" placeholder="Enter date" value="<?php echo $post->created_at; ?>">
            </div>
            <div class="form-group">
                <label for="email">Category Id:</label>
                <select name="category_id">
                    <?php foreach($categories as $category): ?>
                        <?php if ($category->id == $post->id) { ?>
                            <option value="<?php echo $category->id;?>" selected="selectd"><?php echo $category->name;?></option>
                        <?php } else { ?>
                            <option value="<?php echo $category->id;?>"><?php echo $category->name;?></option>
                        <?php } ?>

                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <?php if ($post->status == 1) { ?>
                    <input class="form-check-input" style="margin-left:20px" type="checkbox" id="blankCheckbox" name="status" checked>
                <?php } else { ?>
                    <input class="form-check-input" style="margin-left:20px" type="checkbox" id="blankCheckbox" name="status">
                <?php } ?>

            </div>
            <button type="submit" name="edit" class="btn btn-default" style="margin-left: 200px;">Submit</button>
        </form>
    </div>
</div>
