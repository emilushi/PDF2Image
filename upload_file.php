<?php

    $pdfPath = "./media/pdf/";
    $maxSize = 102400000000;
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload_pdf'])) {   
      if (is_uploaded_file($_FILES['filepdf']['tmp_name'])) {
        if ($_FILES['filepdf']['size'] > $maxSize) {
          echo '<p class="error">The file uploaded is to large. The max file size allowed for upload is: ' . $maxSize . 'KB</p>';
        } else {
          $menuName = $menuName . basename( $_FILES['filepdf']['name']);
          $result = move_uploaded_file($_FILES['filepdf']['tmp_name'], $pdfPath . $menuName);
          if ($result == 1) {
            echo $success = '<p class="error">Document Uploaded</p>';
          } else {
            echo '<p class="error">It has been an error, please check the file type or file size. Or contact our Administrator</p>';
          }
        }
      }
    }

if($success == true){
  echo "<script language='javascript'>\n";
  echo "alert('Upload successful!'); window.location.href='http://emilushi.com/pdf/index.php?file=$menuName';";
  echo "</script>\n";
}

?>