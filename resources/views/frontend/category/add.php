<h2>Add</h2>
<!-- action="/category/add" -->
<div class="alert alert-success">
    <?= session('message') ?>
</div>
<form action="<?= route('category.add') ?>" method="post">
    <input type="text" name="name">
    <button type="submit">Submit</button>
    <input type="hidden" name="_token" value="<?= csrf_token() ?>">
</form>