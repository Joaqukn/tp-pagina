<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    $sql = "CALL usuario(?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $id, $nombre);

    if ($stmt->execute()) {
        echo "Contacto agregado exitosamente.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
