<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SGIDE - Inicio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('assets/images/fondo-eventos.jpg');
            /* Ruta a tu imagen de fondo */
            background-size: cover;
            background-position: center;
        }

        .title-highlight {
            color: black;
            padding: 0.5rem 1rem;
            display: inline-block;
            background-color: rgba(255, 255, 255, 0.7);
            border-radius: 9999px;
        }

        .auth-container {
            background-color: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(5px);
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center">
    <div class="container mx-auto p-6 max-w-md">
        <!-- Título con fondo semitransparente (original) -->
        <h1 class="text-3xl font-bold text-center mb-6"><span class="title-highlight">Tienda de Productos Personalizados</span></h1>

        <!-- Mostrar errores/éxitos (original) -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="fixed top-4 right-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded animate-fadeIn">
                <?php echo $_SESSION['error'];
                unset($_SESSION['error']); ?>
            </div>
        <?php endif; ?>

        <!-- Contenedor de Tabs (original) -->
        <div class="flex justify-center mb-6 rounded-t-lg overflow-hidden">
            <button id="registroTab" class="px-4 py-2 bg-blue-600 text-white hover:bg-blue-700 transition flex-1">Registro</button>
            <button id="inicioSesionTab" class="px-4 py-2 bg-gray-200 hover:bg-gray-300 transition flex-1">Iniciar Sesión</button>
        </div>

        <!-- Formulario de Registro (original) -->
        <div id="registroModule" class="auth-container p-6 rounded-b-lg shadow-xl">
            <form action="register.php" method="POST" class="space-y-4">
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700 mb-2">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 mb-2">Correo Electrónico:</label>
                    <input type="email" id="email" name="email" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-700 mb-2">Contraseña:</label>
                    <input type="password" id="password" name="password" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded-lg transition">Registrarse</button>
            </form>
        </div>

        <!-- Formulario de Login (original) -->
        <div id="inicioSesionModule" class="auth-container p-6 rounded-b-lg shadow-xl hidden">
            <form action="login.php" method="POST" class="space-y-4">
                <div class="mb-4">
                    <label for="loginEmail" class="block text-gray-700 mb-2">Correo Electrónico:</label>
                    <input type="email" id="loginEmail" name="email" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <div class="mb-4">
                    <label for="loginPassword" class="block text-gray-700 mb-2">Contraseña:</label>
                    <input type="password" id="loginPassword" name="password" required class="w-full p-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                </div>
                <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-lg transition">Iniciar Sesión</button>
            </form>
            <div class="mt-4 text-center">
                <a href="reset_password.php" class="text-blue-600 hover:underline">¿Olvidaste tu contraseña?</a>
            </div>
        </div>
    </div>

    <script>
        // Lógica de tabs (original)
        const registroTab = document.getElementById('registroTab');
        const inicioSesionTab = document.getElementById('inicioSesionTab');
        const registroModule = document.getElementById('registroModule');
        const inicioSesionModule = document.getElementById('inicioSesionModule');

        registroTab.addEventListener('click', () => {
            registroModule.classList.remove('hidden');
            inicioSesionModule.classList.add('hidden');
            registroTab.classList.add('bg-blue-600', 'text-white');
            registroTab.classList.remove('bg-gray-200');
            inicioSesionTab.classList.remove('bg-blue-600', 'text-white');
            inicioSesionTab.classList.add('bg-gray-200');
        });

        inicioSesionTab.addEventListener('click', () => {
            inicioSesionModule.classList.remove('hidden');
            registroModule.classList.add('hidden');
            inicioSesionTab.classList.add('bg-blue-600', 'text-white');
            inicioSesionTab.classList.remove('bg-gray-200');
            registroTab.classList.remove('bg-blue-600', 'text-white');
            registroTab.classList.add('bg-gray-200');
        });

        // Mostrar registro por defecto
        registroTab.click();
    </script>
</body>

</html>