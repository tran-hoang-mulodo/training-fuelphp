<div class="container">
    <div class="form-admin">
        <h2>Vertical (basic) Form</h2>
        <hr/>
        <form action="" method="post">
            <div class="form-group">
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title" placeholder="Enter title">
            </div>
            <div class="form-group">
                <label for="image">Image:</label>
                <input type="file" class="form-control" name="image">
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
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
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
