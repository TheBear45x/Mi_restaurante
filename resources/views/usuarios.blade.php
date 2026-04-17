<div class="card shadow-sm border-0">
    <div class="card-header bg-dark text-white fw-bold">
        <i class="fas fa-users me-2"></i> LISTADO DE USUARIOS REGISTRADOS
    </div>
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="ps-3">ID</th>
                        <th>Perfil</th>
                        <th>Nombre Completo</th>
                        <th>Correo Electrónico</th>
                        <th>Rol</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $u)
                    <tr>
                        <td class="ps-3 text-muted">#{{ $u->id }}</td>
                        <td>
                            <img src="{{ $u->avatar ?? 'https://ui-avatars.com/api/?name='.$u->name }}" 
                                 class="rounded-circle border" width="40" height="40">
                        </td>
                        <td class="fw-bold">{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            <span class="badge {{ $u->rol == 'admin' ? 'bg-danger' : 'bg-primary' }}">
                                {{ strtoupper($u->rol) }}
                            </span>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-sm btn-outline-info me-1"><i class="fas fa-edit"></i></button>
                            <form action="#" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>