<div class="container">
    <h1 class="heading">Signup</h1>
</div>
<form method="POST" action="./server/requests.php">
  <div class="col-6 offset-sm-3 margin-bottom-20">
    <label for="username" class="form-label">User Name</label>
    <input type="username" name= "username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
</div>
  <div class="col-6 offset-sm-3 margin-bottom-20">
    <label for="email" class="form-label">Email Address</label>
    <input type="text" name="email" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="col-6 offset-sm-3 margin-bottom-20">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="col-6 offset-sm-3 margin-bottom-20">
    <label for="address" class="form-label">Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="col-6 offset-sm-3 margin-bottom-20"> 
  <button type="submit" name="signup" class="btn btn-primary">Signup</button>
</div>
</form>
    