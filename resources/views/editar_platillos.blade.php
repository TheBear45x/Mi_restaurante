<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Platillo - Mi Restaurant</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        :root {
            --primary-orange: #e67e22;
            --dark-blue: #2c3e50;
            --bg-light: #f4f7f6;
        }

        body {
            background-color: var(--bg-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .edit-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card-header-custom {
            background: linear-gradient(135deg, var(--dark-blue), #34495e);
            color: white;
            padding: 25px;
            text-align: center;
        }

        .form-label {
            font-weight: 600;
            color: var(--dark-blue);
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            border: 2px solid #eee;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 0.25 dark-blue;
        }

        .img-container {
            background: #f8f9fa;
            border: 2px dashed #ddd;
            border-radius: 15px;
            padding: 15px;
            position: relative;
        }

        #img-preview {
            max-height: 180px;
            border-radius: 10px;
            object-fit: cover;
        }

        .btn-update {
            background-color: var(--primary-orange);
            border: none;
            padding: 15px;
            border-radius: 12px;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-update:hover {
            background-color: #d35400;
            transform: translateY(-2px);
        }

        .btn-back-custom {
            text-decoration: none;
            color: #7f8c8d;
            font-weight: 500;
            transition: 0.3s;
        }

        .btn-back-custom:hover {
            color: var(--dark-blue);
        }
    </style>
</head>
<body>

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            
            <div class="mb-3">
                <a href="{{ route('platillos.lista') }}" class="btn-back-custom">
                    <i class="fas fa-chevron-left me-1"></i> Regresar al Menú
                </a>
            </div>

            <div class="card edit-card">
                <div class="card-header-custom">
                    <h4 class="mb-0"><i class="fas fa-edit me-2"></i>Editar Platillo</h4>
                    <small class="opacity-75">Ajusta los detalles del producto</small>
                </div>
                
                <div class="card-body p-4 bg-white">
                    <form action="{{ route('platillos.actualizar', $platillo->id) }}" method="POST" enctype="multipart/form-data"> 
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre del Platillo</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" 
                                   value="{{ $platillo->nombre }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Descripción</label>
                            <textarea name="descripcion" id="descripcion" class="form-control" 
                                      rows="3" required>{{ $platillo->descripcion }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="precio" class="form-label">Precio Unitario</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0" style="border-radius: 10px 0 0 10px;">$</span>
                                <input type="number" step="0.01" name="precio" id="precio" 
                                       class="form-control border-start-0" value="{{ $platillo->precio }}" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">Imagen del Platillo</label>
                            
                            <div class="img-container text-center mb-3">
                                <img src="{{ asset('storage/platillos/' . $platillo->foto) }}" class="card-img-top" style="height: 220px; object-fit: cover;">
                            </div>

                            <div class="input-group">
                                <input type="file" name="foto" id="foto" class="form-control" 
                                       accept="image/*" onchange="previewSelectedImage(event)">
                            </div>
                            <div class="form-text text-muted mt-2">
                                <i class="fas fa-info-circle me-1"></i> Deje vacío si no desea cambiar la imagen.
                            </div>
                        </div>

                        <hr class="my-4 text-muted">

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-update text-white">
                                <i class="fas fa-save me-2"></i> Actualizar Información
                            </button>
                            <a href="{{ route('platillos.lista') }}" class="btn btn-link text-muted">Descartar cambios</a>
                        </div>
                    </form>
                </div>
            </div>

            <footer class="text-center mt-4">
                <p class="text-muted small">
                    <strong>CSI SYSTEMS</strong> - Gestión de Restaurante
                </p>
            </footer>
        </div>
    </div>
</div>

<script>
    function previewSelectedImage(event) {
        const reader = new FileReader();
        reader.onload = function() {
            const output = document.getElementById('img-preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>