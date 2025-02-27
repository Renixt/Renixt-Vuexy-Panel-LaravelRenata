@extends('layouts/layoutMaster')

@section('title', 'User List - Pages')

@section('vendor-style')
@vite([
  'resources/assets/vendor/libs/datatables-bs5/datatables.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.scss',
  'resources/assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.scss',
  'resources/assets/vendor/libs/select2/select2.scss',
  'resources/assets/vendor/libs/@form-validation/form-validation.scss'
])
@endsection

@section('vendor-script')
@vite([
  'resources/assets/vendor/libs/moment/moment.js',
  'resources/assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js',
  'resources/assets/vendor/libs/select2/select2.js',
  'resources/assets/vendor/libs/@form-validation/popular.js',
  'resources/assets/vendor/libs/@form-validation/bootstrap5.js',
  'resources/assets/vendor/libs/@form-validation/auto-focus.js',
  'resources/assets/vendor/libs/cleavejs/cleave.js',
  'resources/assets/vendor/libs/cleavejs/cleave-phone.js'
])
@endsection

@section('page-script')
@vite('resources\assets\js\clientes\app-clientes-lists.js')
@endsection

@section('content')

<div class="row g-6 mb-6">
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span class="text-heading">Session</span>
            <div class="d-flex align-items-center my-1">
              <h4 class="mb-0 me-2">21,459</h4>
              <p class="text-success mb-0">(+29%)</p>
            </div>
            <small class="mb-0">Total Users</small>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-primary">
              <i class="ti ti-users ti-26px"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span class="text-heading">Paid Users</span>
            <div class="d-flex align-items-center my-1">
              <h4 class="mb-0 me-2">4,567</h4>
              <p class="text-success mb-0">(+18%)</p>
            </div>
            <small class="mb-0">Last week analytics </small>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-danger">
              <i class="ti ti-user-plus ti-26px"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span class="text-heading">Active Users</span>
            <div class="d-flex align-items-center my-1">
              <h4 class="mb-0 me-2">19,860</h4>
              <p class="text-danger mb-0">(-14%)</p>
            </div>
            <small class="mb-0">Last week analytics</small>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-success">
              <i class="ti ti-user-check ti-26px"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6 col-xl-3">
    <div class="card">
      <div class="card-body">
        <div class="d-flex align-items-start justify-content-between">
          <div class="content-left">
            <span class="text-heading">Pending Users</span>
            <div class="d-flex align-items-center my-1">
              <h4 class="mb-0 me-2">237</h4>
              <p class="text-success mb-0">(+42%)</p>
            </div>
            <small class="mb-0">Last week analytics</small>
          </div>
          <div class="avatar">
            <span class="avatar-initial rounded bg-label-warning">
              <i class="ti ti-user-search ti-26px"></i>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Users List Table -->
<div class="card">
  <div class="card-header border-bottom">
    <h5 class="card-title mb-0">Filters</h5>
    <div class="d-flex justify-content-between align-items-center row pt-4 gap-4 gap-md-0">
      <div class="col-md-4 user_role"></div>
      <div class="col-md-4 user_plan"></div>
      <div class="col-md-4 user_status"></div>
    </div>
  </div>
  <div class="card-datatable table-responsive">
    <table class="datatables-users table">
      <thead class="border-top">
        <tr>
          <th></th>
          <th></th>
          <th>Nombre</th>
          <th>Apellidos</th>
          <th>Correo</th>
          <th>Telefono</th>
          <th>Fecha de Nacimiento</th>

        </tr>
        @foreach ( $clientes as $cliente )
        
        <tr>
            <td></td>
            <td></td>
            <td><a href="{{ route('clientes.show', $cliente->id) }}">{{$cliente->nombre}}</a></td>
            <td>{{$cliente->apellidos}}</td>
            <td>{{$cliente->correo}}</td>
            <td>{{$cliente->telefono}}</td>
            <td>{{$cliente->fecha_nacimiento}}</td>

        </tr>
        @endforeach
       
      </thead>
    </table>
  </div>
  <!-- Offcanvas to add new user -->
    

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header border-bottom">
      <h5 id="offcanvasAddUserLabel" class="offcanvas-title">Add User</h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 p-6 h-100">
      <form method="POST" action="{{route('clientes.store')}}" >
        @csrf <!--//proteger el formulario -->
         @method('post')
        <div class="mb-6">
          <label class="form-label" for="add-user-fullname" >Nombre</label>
          <input type="text" class="form-control" id="add-user-fullname" placeholder="John" name="nombre" aria-label="John Doe" />
        </div>
        <div class="mb-6">
            <label class="form-label" for="add-user-fullname">Apellidos</label>
            <input type="text" class="form-control" id="add-user-fullname" placeholder="Doe" name="apellidos" aria-label="John Doe" />
          </div>
        
        <div class="mb-6">
          <label class="form-label" for="add-user-email">Correo</label>
          <input type="text" id="add-user-email" class="form-control" placeholder="john.doe@example.com" aria-label="john.doe@example.com" name="correo" />
        </div>
        <div class="mb-6">
          <label class="form-label" for="add-user-contact">Telefono</label>
          <input type="text" id="add-user-contact" class="form-control phone-mask" placeholder="+1 (609) 988-44-11" aria-label="john.doe@example.com" name="telefono" />
        </div>

        <div class="mb-6">
            <label class="form-label" for="add-user-company" >Fecha de Nacimiento</label>
            <input type="date" id="add-user-company" class="form-control" placeholder="Web Developer" aria-label="jdoe1" name="fecha_nacimiento" />
          </div>
       
       
        <button type="submit" class="btn btn-primary me-3 data-submit">Submit</button>
        <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">Cancel</button>
      </form>
    </div>
  </div>
</div>


@endsection
