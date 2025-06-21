<div class="container card border-3 col-6 offset-sm-3 d-fex mt-5 bg-light">
  <div class=" text-center ">
<h1 class="heading pt-3">Login </h1>
<hr>
<form action="./server/requests.php" method="post">


  <div class="col-6 offset-sm-3 margin-bottom-15">
    <label for="email" class="form-label">User Email</label>
    <input type="text" name="email" class="form-control" id="email" placeholder="enter user email" required>
  </div>

  <div class="col-6 offset-sm-3 margin-bottom-15">
    <label for="password" class="form-label">User Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="enter user password" required>
  </div>
  <div class="col-6 offset-sm-3 margin-bottom-15">
  <button type="submit" name="login" class="btn btn-primary">Login</button>

  </div>

</form>
</div>
</div>