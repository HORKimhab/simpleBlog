<h2><?php echo $post['title']; ?></h2>
<small class="post-date">Posted on: <?php echo $post['created_at'] ?></small><br />
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