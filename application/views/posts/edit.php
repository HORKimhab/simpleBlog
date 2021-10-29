<h2><?= $title; ?></h2>
<?php echo validation_errors(); ?>
<?php echo form_open('posts/update'); ?>
<!-- form_open: https://codeigniter.com/userguide3/helpers/form_helper.html?highlight=form_open -->
<input type="hidden" name="id" value="<?php echo $post['id']; ?>">
<div class="form-group">
    <label for="inputTitile">Title</label>
    <input type="text" name="title" class="form-control" value="<?php echo $post['title']; ?>" id="inputTitile" aria-describedby="titleHelp" placeholder="Enter title">
    <!-- <small id="titleHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
</div>

<div class="form-group">
    <label for="exampleFormControlBody">Body</label>
    <textarea class="form-control" name="body" id="body1" rows="3" placeholder="Add Body"><?php echo $post['body']; ?></textarea>
</div>

<div class="form-group">
    <label for="category">Category</label>
    <select class="form-control" id="category" name="category_id">
        <?php foreach ($categories as $category) : ?>
            <option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
        <?php endforeach; ?>
    </select>
</div>

<!-- <div class="form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->
<button type="submit" class="btn btn-primary">Update</button>
</form>