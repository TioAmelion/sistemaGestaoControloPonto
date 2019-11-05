<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src='{{asset("assests/$tema/dist/img/user2-160x160.jpg")}}' class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <!--a href="#" class="d-block"></a-->
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
            <a href="{{route('inicio')}}" class="nav-link active">
              <p>
                Dashboard
              </p>
            </a></li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Registrar Ponto
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('marcar.ponto')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Benfica</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('talatona')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Talatona</p>
                </a>
              </li>
              <li class="nav-item">
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('funcionario')}}" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Cadastrar Funcionarios
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('funcionario/imprimir')}}" class="nav-link">
              <i class="fas fa-print"></i>
              <p>
                Imprimir Qr Code
              </p>
            </a>
          </li>
          <li class="nav-item has-treeview">
            <a href="{{route('events')}}" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Plano de Férias
              </p>
            </a>
          </li>
             <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Reajustes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Justificar Atraso</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('justificar_faltas')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Justificar Falta</p>
                </a>
              </li>
              <li class="nav-item">
              </li>
            </ul>
          </li>
           <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Relatorios
                <i class="fas fa-file-chart-line"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('imprimir')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Imprimir Folha de Ponto</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('imprimir_ponto')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Imprimir Folha de P. Individual</p>
                </a>
              </li>
              <li class="nav-item">
              </li>
            </ul>
          </li>
          @can('super_admin')
          <li class="nav-item has-treeview">
            <a href="{{route('usuarios')}}" class="nav-link">
              <i class="fas fa-users"></i>
              <p>
                Permissões usuarios
              </p>
            </a>
          </li>
          @endcan
        </ul>
        <ul>
          <li>
             <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                 <span class="caret"></span>
                    </a>
                      <a  href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Logout') }}
                      </a>
                       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                      </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>