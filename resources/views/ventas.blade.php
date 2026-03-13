<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Punto de Venta - Mi Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card-restaurant">
                    <h4 class="title-restaurant">🛒 Nueva Venta</h4>
                    <form id="formVenta">
                        <div class="mb-3">
                            <label class="form-label">Cliente (ID)</label>
                            <input type="number" class="form-control" name="cliente_id" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Empleado (ID)</label>
                            <input type="number" class="form-control" name="empleado_id" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Método de Pago</label>
                            <select class="form-select" name="metodo_pago">
                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">Tarjeta</option>
                                <option value="transferencia">Transferencia</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fecha/Hora</label>
                            <input type="datetime-local" class="form-control" id="venta_fecha">
                        </div>
                        <hr>
                        <div class="total-section">
                            <span>TOTAL A PAGAR</span>
                            <h2 id="displayTotal">$0.00</h2>
                        </div>
                        <button type="submit" class="btn btn-restaurant w-100 mt-3">Finalizar Venta</button>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-restaurant">
                    <h4 class="title-restaurant">📋 Detalle de Productos</h4>
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <input type="number" id="prod_id" class="form-control" placeholder="ID Platillo">
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="prod_cant" class="form-control" value="1" min="1">
                        </div>
                        <div class="col-md-3">
                            <button type="button" onclick="agregarFila()" class="btn btn-dark w-100">Agregar</button>
                        </div>
                    </div>

                    <table class="table table-hover table-venta">
                        <thead>
                            <tr>
                                <th>Platillo ID</th>
                                <th>Cantidad</th>
                                <th>Precio Unit.</th>
                                <th>Subtotal</th>
                                <th>Acción</th>
                            </tr>
                        </thead>
                        <tbody id="listaProductos">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Establecer fecha actual
        document.getElementById('venta_fecha').value = new Date().toISOString().slice(0, 16);

        let totalGeneral = 0;

        function agregarFila() {
            const id = document.getElementById('prod_id').value;
            const cant = document.getElementById('prod_cant').value;
            const precioRandom = (Math.random() * 100 + 50).toFixed(2); // Simulación de precio
            const subtotal = (cant * precioRandom).toFixed(2);

            if(!id) return alert("Ingresa un ID de platillo");

            const fila = `
                <tr>
                    <td>${id}</td>
                    <td>${cant}</td>
                    <td>$${precioRandom}</td>
                    <td>$${subtotal}</td>
                    <td><button class="btn btn-sm btn-danger" onclick="this.closest('tr').remove(); recalcular();">X</button></td>
                </tr>
            `;

            document.getElementById('listaProductos').innerHTML += fila;
            recalcular();
        }

        function recalcular() {
            let filas = document.querySelectorAll('#listaProductos tr');
            totalGeneral = 0;
            filas.forEach(f => {
                let sub = parseFloat(f.cells[3].innerText.replace('$', ''));
                totalGeneral += sub;
            });
            document.getElementById('displayTotal').innerText = `$${totalGeneral.toFixed(2)}`;
        }

        document.getElementById('formVenta').onsubmit = (e) => {
            e.preventDefault();
            if(totalGeneral <= 0) return alert("Agrega al menos un producto");
            alert("Venta procesada con éxito por $" + totalGeneral.toFixed(2));
        };
    </script>
</body>
</html>