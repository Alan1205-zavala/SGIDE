document.addEventListener('DOMContentLoaded', () => {
    const carrito = JSON.parse(localStorage.getItem('carrito')) || [];
    const carritoContainer = document.getElementById('carrito-items');
    const contadorCarrito = document.getElementById('contador-carrito');
    const totalElement = document.getElementById('total');

    // Mostrar items del carrito
    function renderCarrito() {
        carritoContainer.innerHTML = '';
        let total = 0;

        carrito.forEach((item, index) => {
            total += item.precio * item.cantidad;
            carritoContainer.innerHTML += `
                <div class="producto-card bg-white p-4 rounded-lg shadow-md flex items-center">
                    <img src="${item.imagen}" alt="${item.nombre}" class="w-20 h-20 object-cover rounded">
                    <div class="ml-4 flex-1">
                        <h3 class="font-semibold">${item.nombre}</h3>
                        <p class="text-gray-600">${item.color} | Cantidad: ${item.cantidad}</p>
                        <p class="text-blue-600 font-bold">$${(item.precio * item.cantidad).toFixed(2)}</p>
                    </div>
                    <button onclick="eliminarDelCarrito(${index})" class="text-red-500 hover:text-red-700">✕</button>
                </div>
            `;
        });

        contadorCarrito.textContent = carrito.length;
        totalElement.textContent = `$${total.toFixed(2)}`;
    }

    window.eliminarDelCarrito = (index) => {
        carrito.splice(index, 1);
        localStorage.setItem('carrito', JSON.stringify(carrito));
        renderCarrito();
    };

    renderCarrito();
});