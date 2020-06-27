<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview {{ setActiveRoute(['dashboard','admin/configuraciones','admin.users.index','admin.users.edit','admin.logistica.index','admin.logistica.edit','admin.configuraciones.index','admin.logistica.editfile']) }}">
      <a href="#" class="nav-link {{ setActiveRouteHome(['dashboard','admin/configuraciones','admin.users.index','admin.users.edit','admin.logistica.index','admin.logistica.edit','admin.configuraciones.index','admin.logistica.editfile']) }}">
        <i class="nav-icon"><img src="/lay-admin/dist/img/iconos/camion.png"></i>
        <p>
          Plataforma Web
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>

      @if(auth()->user()->role_id == 1)

          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview {{ setActiveRoute(['admin.users.index','admin.users.edit','admin.logistica.index','admin.logistica.edit','admin.logistica.editfile']) }}">
               <a href="#" class="nav-link ">
                 <img src="/lay-admin/dist/img/iconos/contenedor.png">
                 <p>
                   DEPÓSITO
                   <i class="fas fa-angle-left right"></i>
                 </p>
               </a>
               <ul class="nav nav-treeview">
                 <li class="nav-item">
                   <a href="{{ Route('admin.users.index') }}" class="nav-link {{ setActiveRouteHome(['admin.users.index','admin.users.edit',]) }}">
                     <!-- <i class="far fa-circle text-primary nav-icon"></i> -->
                     <img src="/lay-admin/dist/img/iconos/people1.png">
                     <p>Clientes</p>
                   </a>
                 </li>

                 <li class="nav-item">
                  <a href="{{ route('admin.logistica.index', auth()->user()->id )}}" class="nav-link {{ setActiveRouteHome(['admin.logistica.index','admin.logistica.edit','admin.logistica.editfile']) }}">
                    <!-- <i class="nav-icon far fa-circle text-danger"></i> -->
                    <img src="/lay-admin/dist/img/iconos/cajas-rojas.png">
                    <p class="text">Logística</p>
                  </a>
                </li>
                <li class="nav-item">
                 <a href="http://transfont.es/lay-admin/files/Plataforma-Transfon.pdf" class="nav-link" target="_blank">
                   <i class="nav-icon text-danger"><img src="/lay-admin/dist/img/iconos/pdf.png"></i>
                   <p class="text">Documentación</p>
                 </a>
               </li>
               <!-- <li class="nav-item">
                <a href="https://docs.google.com/spreadsheets/d/1zpfdK24241dRyibhT3is4g0mT-KKu8oXQD586xkj6YU/edit#gid=0" class="nav-link" target="_blank">
                  <i class="nav-icon text-danger"><img src="/lay-front/img/excel.png"></i>
                  <p class="text">Template Carga Datos</p>
                </a>
              </li> -->
               </ul>
             </li>

             <li class="nav-item has-treeview {{ setActiveRoute(['admin.configuraciones.index']) }}">
              <a href="#" class="nav-link ">
                <img src="/lay-admin/dist/img/iconos/settings.png">
                <p>
                  Configuraciones
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/configuraciones" class="nav-link {{ setActiveRouteHome(['admin.configuraciones.index']) }}">
                    <img src="/lay-admin/dist/img/iconos/settings-general.png">
                    <p>Generales</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
      @else

      <ul class="nav nav-treeview">
        <li class="nav-item has-treeview {{ setActiveRoute(['admin.users.index','admin.logistica.index']) }}">
           <a href="#" class="nav-link ">
             <img src="/lay-admin/dist/img/iconos/contenedor.png">
             <p>
               DEPÓSITO
               <i class="fas fa-angle-left right"></i>
             </p>
           </a>
           @if(auth()->user()->validar == 'SI')
             <ul class="nav nav-treeview">
               <li class="nav-item">
                 <a href="{{ route('admin.logistica.index', auth()->user()->id )}}" class="nav-link {{ setActiveRouteHome(['admin.logistica.index']) }}">
                   <img src="/lay-admin/dist/img/iconos/cajas.png">
                   <p>Mercaderías</p>
                 </a>
               </li>
               <li class="nav-item">
                 <a href="{{ Route('admin.users.index') }}" class="nav-link {{ setActiveRouteHome(['admin.users.index']) }}">
                   <img src="/lay-admin/dist/img/iconos/people1.png">
                   <p>Mi Perfil</p>
                 </a>
               </li>
            </ul>
          @endif
         </li>
      </ul>

      @endif

    </li>
  </ul>
</nav>
