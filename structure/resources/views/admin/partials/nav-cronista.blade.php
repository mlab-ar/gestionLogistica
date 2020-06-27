<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <li class="nav-item has-treeview {{ setActiveRoute(['dashboard','admin/configuraciones','admin.configuraciones.index','admin.eventos.index','admin.eventos.edit','admin.speakers.index','admin.speakers.edit','admin.agenda.index','admin.agenda.edit','admin.personas.index','admin.personas.edit','admin.sponsors.index','admin.sponsors.edit','admin.video.index','admin.video.edit','admin.posts.index','admin.posts.edit']) }}">
      <a href="#" class="nav-link {{ setActiveRouteHome(['dashboard','admin/configuraciones','admin.configuraciones.index','admin.eventos.index','admin.eventos.edit','admin.speakers.index','admin.speakers.edit','admin.agenda.index','admin.agenda.edit','admin.personas.index','admin.personas.edit','admin.sponsors.index','admin.sponsors.edit','admin.video.index','admin.video.edit','admin.posts.index','admin.posts.edit']) }}">
        <i class="nav-icon fas fa-th"></i>
          <!-- <img src="/lay-admin/dist/img/iconos/camion.png">         -->
        <p>
          Plataforma Web
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>

      @if(auth()->user()->role_id == 1)

          <ul class="nav nav-treeview">
            <li class="nav-item has-treeview {{ setActiveRoute(['admin.eventos.index','admin.eventos.edit','admin.speakers.index','admin.speakers.edit','admin.agenda.index','admin.agenda.edit','admin.personas.index','admin.personas.edit','admin.sponsors.index','admin.sponsors.edit','admin.video.index','admin.video.edit','admin.posts.index','admin.posts.edit']) }}">
               <a href="#" class="nav-link ">
                 <i class="nav-icon far fa-calendar-alt"></i>
                 <p>
                   Gestión de Eventos
                   <i class="fas fa-angle-left right"></i>
                 </p>
               </a>
               <ul class="nav nav-treeview">
                 <li class="nav-item" style="margin-left:15px">
                   <a href="{{ Route('admin.personas.index') }}" class="nav-link {{ setActiveRouteHome(['admin.personas.index','admin.personas.edit']) }}">
                     <!-- <i class="far fa-circle text-primary nav-icon"></i> -->
                     <i class="fas fa-id-badge"></i>
                     <p>Listado de Preinscriptos</p>
                   </a>
                 </li>

                 <li class="nav-item" style="margin-left:15px">
                  <a href="{{ Route('admin.eventos.index') }}" class="nav-link {{ setActiveRouteHome(['admin.eventos.index','admin.eventos.edit']) }}">
                    <i class="far fa-edit"></i>
                    <p class="text">
                      Eventos
                    </p>
                  </a>
                 </li>

                 <li class="nav-item" style="margin-left:15px">
                  <a href="{{ Route('admin.video.index') }}" class="nav-link {{ setActiveRouteHome(['admin.video.index','admin.video.edit']) }}">
                    <i class="fab fa-youtube"></i>
                    <p class="text">
                      Video Institucional
                    </p>
                  </a>
                 </li>


                 <li class="nav-item" style="margin-left:15px">
                   <a href="{{ Route('admin.speakers.index') }}" class="nav-link {{ setActiveRouteHome(['admin.speakers.index','admin.speakers.edit']) }}">
                     <i class="fas fa-users"></i>
                     <p class="text">Oradores</p>
                   </a>
                 </li>

                 <li class="nav-item" style="margin-left:15px">
                   <a href="{{ Route('admin.agenda.index') }}" class="nav-link {{ setActiveRouteHome(['admin.agenda.index','admin.agenda.edit']) }}">
                     <i class="fas fa-calendar-check"></i>
                     <p class="text">Agenda</p>
                   </a>
                 </li>

                 <li class="nav-item" style="margin-left:15px">
                   <a href="{{ Route('admin.sponsors.index') }}" class="nav-link {{ setActiveRouteHome(['admin.sponsors.index','admin.sponsors.edit']) }}">
                     <i class="fas fa-cubes"></i>
                     <p class="text">Sponsors</p>
                   </a>
                 </li>

                 <li class="nav-item" style="margin-left:15px">
                   <a href="{{ Route('admin.posts.index') }}" class="nav-link {{ setActiveRouteHome(['admin.posts.index','admin.posts.edit']) }}">
                     <i class="fas fa-rss-square"></i>
                     <p class="text">Blog</p>
                   </a>
                 </li>


                <!-- <li class="nav-item">
                 <a href="#" class="nav-link" target="_blank">
                   <i class="fas fa-file-word"></i>
                   <p class="text">Documentación</p>
                 </a>
               </li> -->
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
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                  Configuraciones
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="/admin/configuraciones" class="nav-link {{ setActiveRouteHome(['admin.configuraciones.index']) }}">
                    <i class="nav-icon far fa-circle text-danger"></i>
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
