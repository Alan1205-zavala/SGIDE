<?php session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: registro_inicio.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Carrito - SGIDE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/css/styles.css">
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <a href="catalogo.php" class="text-xl font-bold">SGIDE</a>
            <div class="flex space-x-4">
                <a href="catalogo.php" class="hover:text-blue-200 transition">Productos</a>
                <a href="carrito.php" class="flex items-center hover:text-blue-200 transition">
                    🛒 <span id="contador-carrito" class="ml-1 bg-white text-blue-600 rounded-full w-6 h-6 flex items-center justify-center text-sm">0</span>
                </a>
            </div>
        </div>
    </nav>

    <!-- Contenido -->
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-3xl font-bold mb-8">Tu Carrito</h1>
        <div id="carrito-items" class="space-y-4"></div>
        <div class="mt-8 bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <span class="text-xl font-semibold">Total:</span>
                <span id="total" class="text-2xl font-bold text-blue-600">$0.00</span>
            </div>
            <button id="finalizar-compra" class="boton-primario w-full bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg">
                Finalizar Compra
            </button>
        </div>
    </div>

    <script src="/assets/js/carrito.js"></script>
</body>

</html>