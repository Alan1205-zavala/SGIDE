<?php
session_start();
require 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $token = $_POST['token'];
    $password = trim($_POST['password']);

    // Verificar si el token es válido
    $stmt = $conn->prepare("SELECT email FROM reset_tokens WHERE token = ? AND expiration > NOW()");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 0) {
        $_SESSION['error'] = "El enlace de restablecimiento no es válido o ha expirado.";
        header("Location: reset_password.php");
        exit;
    }

    $stmt->bind_result($email);
    $stmt->fetch();

    // Hashear la nueva contraseña
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Actualizar la contraseña en la base de datos
    $stmt = $conn->prepare("UPDATE usuarios SET password = ? WHERE email = ?");
    $stmt->bind_param("ss", $hashed_password, $email);
    $stmt->execute();

    // Eliminar el token usado
    $stmt = $conn->prepare("DELETE FROM reset_tokens WHERE token = ?");
    $stmt->bind_param("s", $token);
    $stmt->execute();

    $_SESSION['success'] = "Tu contraseña ha sido restablecida correctamente.";
    header("Location: registro_inicio.php");
    exit;
}
