<?php 

  session_start();

  print_r($_POST); // Display the contents of the POST array for debugging

  
 // working with the data received from the form
  $title = str_replace('|', '-', $_POST['title']); // Replace '|' with '-' in the title
  $category = str_replace('|', '-', $_POST['category']); // Replace '|' with '-' in the category
  $description = str_replace('|', '-', $_POST['description']); // Replace '|' with '-' in the description

  $text = $_SESSION['id'] . '|' . $title . '|' . $category . '|' . $description . PHP_EOL; // Prepare the text to be written
 // open archive
  $file = fopen('../../app_help_desk/arquivo.hd', 'a'); // Open the file in append mode
 // write the text to the file
  fwrite($file, $text);
   // Write the text to the file
 
  fclose($file); // Close the file

  header('Location: abrir_chamado.php'); // Redirect to the list of tickets
?>