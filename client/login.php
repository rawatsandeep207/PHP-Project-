<div class="container">
    <h1 class="heading">Login</h1>
</div>

<form method="POST" action="./server/requests.php">

  <div class="col-6 offset-sm-3 margin-bottom-20">
    <label class="form-label">User Email</label>
    <input type="email" name="email" class="form-control" required>
  </div>

  <div class="col-6 offset-sm-3 margin-bottom-20">
    <label class="form-label">User Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>

  <div class="col-6 offset-sm-3 margin-bottom-20"> 
    <button type="submit" name="login" class="btn btn-primary">Login</button>
  </div>

</form>
