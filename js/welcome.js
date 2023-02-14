function deactivate(loginName) {
  $.post("deactivate.php", { login_name: loginName }).done(function (data) {
    window.location = "http://localhost/php-demo/login.php";
  });

  return false;
}
