<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <!-- Seccion Carreras -->
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-mortar-board"></i>
                    <span>Carreras</span>

            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <li>
                        <a href="{{ route('carreras.index') }}"> Listado</a>
                    </li>
                    <li>
                        <a href="{{ route('carreras.create') }}"> Nueva Carrera</a>
                    </li>
                </ul>
            </li>

            <!-- Seccion Comisiones -->
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-tags"></i>
                    <span>Comisiones</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('comisiones.index') }}"> Listado</a>
                    </li>
                    <li>
                        <a href="{{ route('comisiones.create') }}"> Nueva Comisión</a>
                    </li>
                </ul>
            </li>
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-mortar-board"></i>
                    <span>Materias</span>

                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">

                    <li>
                        <a href="{{ route('materias.index') }}"> Listado</a>
                    </li>
                    <li>
                        <a href="{{ route('materias.create') }}"> Nueva materia</a>
                    </li>
                </ul>
            </li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
