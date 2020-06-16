<?php

  $username = $_POST['username'];
  $genero = $_POST['genero'];
  $edad = $_POST['edad'];
  $email = $_POST['email'];
  $estado = $_POST['estado'];
  $sin1 = $_POST['sin1'];
  $sin2 = $_POST['sin2'];
  $sin3 = $_POST['sin3'];
  $sin4 = $_POST['sin4'];
  $sin5 = $_POST['sin5'];
  $sin6 = $_POST['sin6'];
  $sin7 = $_POST['sin7'];
  $sin8 = $_POST['sin8'];
  $sin9 = $_POST['sin9'];
  $sin10 = $_POST['sin10'];
  $sin11 = $_POST['sin11'];
  $sin12 = $_POST['sin12'];
  $sin13 = $_POST['sin13'];
  $sin14 = $_POST['sin14'];
  $sin15 = $_POST['sin15'];
  $sin16 = $_POST['sin16'];
  $sin17 = $_POST['sin17'];
  $sin18 = $_POST['sin18'];
  $sin19 = $_POST['sin19'];



if (!empty($username)  || !empty($genero) || !empty($edad) || !empty($email) || !empty($estado) || !empty($sin1)
     || !empty($sin2) || !empty($sin3) || !empty($sin4) || !empty($sin5) || !empty($sin6) || !empty($sin7)
      || !empty($sin8) || !empty($sin9) || !empty($sin10) || !empty($sin11) || !empty($sin12) || !empty($sin13)
       || !empty($sin14) || !empty($sin15) || !empty($sin16) || !empty($sin17) || !empty($sin18) || !empty($sin19) )
       {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "pruebahack";

    //Crea la conneccion
    $conn = new mysqli ($host, $dbUsername, $dbPassword, $dbName);


    if (mysqli_connect_error()) {
        die('Connect Error(' .mysqli_connect_errno().')' . mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From reg Where email = ? Limit 1";
        $INSERT = "INSERT Into reg (username, genero, edad, email, estado, sin1, sin2, sin3, sin4, sin5, sin6, sin7
        , sin8, sin9, sin10, sin11, sin12, sin13, sin14, sin15, sin16, sin17, sin18, sin19) values (?, ?, ?, ?
        , ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($SELECT);
        $stmt -> bind_param("s", $email);
        $stmt -> execute();
        $stmt -> bind_result ($email);
        $stmt -> store_result();
        $rnum = $stmt -> num_rows;

        if ($rnum==0) {
          $stmt -> close ();

          $stmt = $conn->prepare($INSERT);
          $stmt->bind_param("ssssssssssssssssssssssss", $username, $genero, $edad, $email, $estado, $sin1, $sin2, $sin3, $sin4, $sin5, $sin6, $sin7, $sin8, $sin9, $sin10, $sin11, $sin12, $sin13, $sin14, $sin15, $sin16, $sin17, $sin18, $sin19);
          $stmt->execute();
          header('Location: resultados.html');
        } else {
          echo "<script>
              alert('Alguien ya ha registrado un usuario con este correo electrónico');
              window.location= 'index.html'
              </script>";
        }

        $stmt->close();
        $conn->close();
    }

}

 else {
  echo "Todos los campos son obligatorios";
  die();
}

 ?>
