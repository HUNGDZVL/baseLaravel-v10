<h2>Add</h2>
<!-- action="/category/add" -->
<div class="alert alert-success">
    <?= session('message') ?>
</div>
<form action="<?= route('category.addv2') ?>" method="post" enctype="multipart/form-data">
    <input type="text" name="name">
    <input type="file" name="file">
    <button type="submit">Submit</button>
    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
</form>