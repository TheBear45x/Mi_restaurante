<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Punto de Venta - CSI SYSTEMS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root { --primary: #e67e22; --dark: #2c3e50; }
        body { background: #f4f7f6; font-family: 'Poppins', sans-serif; }
        .card-restaurant { background: white; border-radius: 15px; padding: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .title-restaurant { color: var(--dark); font-weight: 700; margin-bottom: 20px; border-bottom: 2px solid var(--primary); display: inline-block; }
        .total-section { background: var(--dark); color: white; padding: 20px; border-radius: 10px; text-align: center; }
        .btn-restaurant { background: var(--primary); color: white; font-weight: 600; border: none; }
        .btn-restaurant:hover { background: #d35400; color: white; }
    </style>
</head>
<body>
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card-restaurant shadow-sm">
                    <h4 class="title-restaurant">🛒 Nueva Venta</h4>
                    <form action="{{ route('ventas.store') }}" method="POST" id="formVenta">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Cliente (ID)</label>
                            <input type="number" class="form-control" name="cliente_id" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Empleado (ID)</label>
                            <input type="number" class="form-control" name="empleado_id" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Método de Pago</label>
                            <select class="form-select" name="metodo_pago" id="metodo_pago">
                                <option value="efectivo">Efectivo</option>
                                <option value="tarjeta">PayPal / Tarjeta</option>
                                <option value="transferencia">Transferencia</option>
                            </select>
                        </div>

                        <input type="hidden" name="total" id="inputTotal" value="0">
                        <input type="hidden" name="detalle_ventas" id="detalle_ventas">

                        <div class="total-section">
                            <small class="d-block opacity-75">TOTAL A PAGAR</small>
                            <h2 id="displayTotal" class="mb-0">$0.00</h2>
                        </div>

                        <div id="btn-efectivo-container" class="mt-3">
                            <button type="submit" class="btn btn-restaurant w-100 py-3">
                                <i class="fas fa-check-circle me-2"></i>Finalizar Venta
                            </button>
                        </div>
                        <div id="paypal-button-container" class="mt-3" style="display: none;"></div>
                    </form>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card-restaurant shadow-sm">
                    <h4 class="title-restaurant">📋 Detalle de Productos</h4>
                    <div class="row g-2 mb-3">
                        <div class="col-md-6">
                            <select id="prod_id" class="form-select">
                                <option value="">Seleccione un Platillo...</option>
                                @foreach($platillos as $p)
                                    <option value="{{ $p->id }}" data-precio="{{ $p->precio }}">{{ $p->nombre }} - ${{ $p->precio }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input type="number" id="prod_cant" class="form-control" value="1" min="1">
                        </div>
                        <div class="col-md-3">
                            <button type="button" onclick="agregarFila()" class="btn btn-dark w-100">
                                <i class="fas fa-plus"></i> Agregar
                            </button>
                        </div>
                    </div>

                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Platillo</th>
                                <th>Cant.</th>
                                <th>Precio</th>
                                <th>Subtotal</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody id="listaProductos"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://www.paypal.com/sdk/js?client-id=TEST_CLIENT_ID&currency=MXN"></script>
    <script>
        let carrito = [];

        function agregarFila() {
            const select = document.getElementById('prod_id');
            const id = select.value;
            const nombre = select.options[select.selectedIndex].text.split(' - ')[0];
            const precio = parseFloat(select.options[select.selectedIndex].getAttribute('data-precio'));
            const cant = parseInt(document.getElementById('prod_cant').value);

            if(!id) return alert("Selecciona un platillo");

            const subtotal = cant * precio;
            carrito.push({ id, cant, precio, subtotal });

            renderTabla();
        }

        function renderTabla() {
            const lista = document.getElementById('listaProductos');
            lista.innerHTML = "";
            let total = 0;

            carrito.forEach((item, index) => {
                total += item.subtotal;
                lista.innerHTML += `
                    <tr>
                        <td>${item.id}</td>
                        <td>${item.nombre}</td>
                        <td>${item.cant}</td>
                        <td>$${item.precio.toFixed(2)}</td>
                        <td>$${item.subtotal.toFixed(2)}</td>
                        <td><button class="btn btn-sm btn-danger" onclick="eliminarItem(${index})">×</button></td>
                    </tr>`;
            });

            document.getElementById('displayTotal').innerText = `$${total.toFixed(2)}`;
            document.getElementById('inputTotal').value = total;
            document.getElementById('detalle_ventas').value = JSON.stringify(carrito);
            
            checkMetodoPago();
        }

        function eliminarItem(index) {
            carrito.splice(index, 1);
            renderTabla();
        }

        // Lógica para mostrar PayPal o Efectivo
        document.getElementById('metodo_pago').addEventListener('change', checkMetodoPago);

        function checkMetodoPago() {
            const metodo = document.getElementById('metodo_pago').value;
            const total = parseFloat(document.getElementById('inputTotal').value);

            if (metodo === 'tarjeta' && total > 0) {
                document.getElementById('paypal-button-container').style.display = 'block';
                document.getElementById('btn-efectivo-container').style.display = 'none';
            } else {
                document.getElementById('paypal-button-container').style.display = 'none';
                document.getElementById('btn-efectivo-container').style.display = 'block';
            }
        }

        // Configuración de PayPal
        paypal.Buttons({
            createOrder: (data, actions) => {
                return actions.order.create({
                    purchase_units: [{ amount: { value: document.getElementById('inputTotal').value } }]
                });
            },
            onApprove: (data, actions) => {
                return actions.order.capture().then(details => {
                    alert('Pago aprobado por PayPal');
                    document.getElementById('formVenta').submit();
                });
            }
        }).render('#paypal-button-container');
    </script>
</body>
</html>