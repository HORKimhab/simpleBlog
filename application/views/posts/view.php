<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at'] ?></small><br />
<img width="25%" src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="Post_Image">
<div class="post-body">
    <?php echo $post['body']; ?>
</div>
<hr />

<!-- Edit post -->
<a class="btn btn-secondary float-left" href="<?php echo site_url('/posts/edit/' . $post['slug']); ?>" role="button">Edit</a>
<!-- Delete post -->
<?php echo form_open('/posts/delete/' . $post['id']); ?>
<input type="submit" value="Delete" class="btn btn-danger mx-1" />
</form>
<hr>
<?php echo form_open('comments/create/' . $post['id']); ?>
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control">
</div>

<div class="form-group">
    <label for="email">Email</label>
    <input type="email" name="email" id="email" class="form-control">
</div>

<div class="form-group">
    <label for="name">Body</label>
    <textarea name="name" id="body" cols="30" rows="10" class="form-control"></textarea>
</div>
<input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
<button class="btn btn-primary" type="submit">Submit</button>
</form>