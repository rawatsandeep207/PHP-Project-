<div class="container">
<h1 class="heading text-center mb-4">Ask A Question</h1>
<form method="POST" action="./server/requests.php">
<div class="row">
<div class="col-6 offset-sm-3 mb-3">
<label class="title">Title</label>
<input type="text" name="title" class="form-control" required>
</div>
</div>
<div class="row">
<div class="col-6 offset-sm-3 mb-3">
<label class="description">Description</label>
<textarea name="description" class="form-control" rows="5" required></textarea>
</div>
</div>
<div class="row">
<div class="col-6 offset-sm-3 mb-3">
<label class="category">Category</label>
<?php include 'category.php'; ?>
</div>
</div>
<div class="row">
<div class="col-6 offset-sm-3 text-center">
<button type="submit" name="ask" class="btn btn-primary px-4">Ask Question
</button>
</div>
</div>
</form>