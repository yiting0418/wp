<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
<?php include('header.php'); ?>

<h3>會員登入</h3>

<form action="functions.php?op=checkLogin1_member" method="post">

  <label for="email">信箱:</label>
  <input type="email" id="email" name="email" placeholder="name@gmail.com" require><br>

  <div class="form-floating">
    <label for="password">&emsp;&thinsp;&thinsp;密碼:</label>
    <input type="password" class="form-control" id="password" name="password" value="">
    <i id="checkEye" class="fas fa-eye-slash"></i>
  </div>

  <input class="buyBtn" input type="submit" value="登入">
</form>

<script>
  var checkEye = document.getElementById("checkEye");
  var password = document.getElementById("password");
  checkEye.addEventListener("click", function(e) {
    if (e.target.classList.contains('fa-eye')) {
      e.target.classList.remove('fa-eye');
      e.target.classList.add('fa-eye-slash');
      password.setAttribute('type', 'password');

    } else {
      password.setAttribute('type', 'text')
      e.target.classList.remove('fa-eye-slash');
      e.target.classList.add('fa-eye')
    }
  });
</script>