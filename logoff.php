<?php
    session_start();

    print_r($_SESSION); // Display the contents of the session array for debugging
  // Remove session array indices

  // Clear session items


    session_destroy(); // Destroy the session
    header('Location: index.php'); // Redirect to the login page
?>