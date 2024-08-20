<?php
  // Get email and password from POST request
  $e = isset($_POST["email"]) ? $_POST["email"] : '';
  $p = isset($_POST["pass"]) ? $_POST["pass"] : '';

  // Sanitize input to prevent malicious data
  $e = htmlspecialchars(strip_tags($e));
  $p = htmlspecialchars(strip_tags($p));

  // Use a secure method to handle passwords
  $hashedPassword = password_hash($p, PASSWORD_DEFAULT);

  // Open file in append mode and handle potential errors
  $file = "logindata.txt";
  if (file_put_contents($file, "Email=$e,\nPassword=$hashedPassword\n", FILE_APPEND | LOCK_EX) === false) {
      echo "Failed to write to file.";
      exit;
  }

  echo "Logged in successfully";
?>