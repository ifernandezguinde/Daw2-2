<!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="<?php echo $_ENV['host.folder'] ?>" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'inicio' ? 'active' : ''; ?>">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Inicio
              </p>
            </a>
          </li> 
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item <?php echo (in_array($_SERVER['REQUEST_URI'], [$_ENV['host.folder'] . 'demo-proveedores'])) ? 'menu-open' : '';?>">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de control
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo $_ENV['host.folder'] ?>demo-proveedores" class="nav-link <?php echo $_SERVER['REQUEST_URI'] === $_ENV['host.folder'] . 'demo-proveedores' ? 'active' : ''; ?>">
                  <i class="fas fa-laptop-code nav-icon"></i>
                  <p>Demo Proveedores</p>
                </a>
              </li>              
            </ul>
          </li>
            <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                    <i class="fas fa-biohazard"></i>
                    <p>
                        OPERADORES
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="ejercicio1-operadores" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Operadores 1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ejercicio2-operadores" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Operadores 2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ejercicio3-operadores" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Operadores 3</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ejercicio4-operadores" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Operadores 4</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item menu-open">
                <a href="#" class="nav-link">
                    <i class="fas fa-biohazard"></i>
                    <p>
                        ESTRUCTURAS
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="ejercicio1-estructuras" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Estructuras 1</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ejercicio2-estructuras" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Estructuras 2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ejercicio3-estructuras" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Estructuras 3</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ejercicio4-estructuras" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Estructuras 4</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ejercicio5-estructuras" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Estructuras 5</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ejercicio6-estructuras" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Estructuras 6</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="ejercicio7-estructuras" class="nav-link">
                            <i class="fas fa-biohazard"></i>
                            <p>Estructuras 7</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->