
<!-- Sidebar Menu -->
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item menu-open">
      <a href="{{ route('dashboard') }}" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>Tableau de bord</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-cogs"></i>
        <p>
          Paramètres
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
          <li class="nav-item">
              <a href="{{ route('monprofil') }}" class="nav-link">
                <i class="fas fa-id-badge nav-icon"></i>
                <p>Mon profil</p>
              </a>
            </li>
            
            <!--
            <li class="nav-item">
              <a href="{{ route('abonnement') }}" class="nav-link">
                <i class="fas fa-money-check-alt nav-icon"></i>
                <p>Abonnement</p>
              </a>
            </li>
            @if(Auth::user()->role_id == 1)
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-cog nav-icon"></i>
                <p>Rôle</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-lock nav-icon"></i>
                <p>Permission</p>
              </a>
            </li>
            
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="fas fa-user-friends nav-icon"></i>
                <p>Utilisateurs</p>
              </a>
            </li>
            @endif
          -->
          
      </ul>
    </li>
    
    <li class="nav-item"><hr></li>

    <li class="nav-item">
      <a href="{{ route('operateur.index') }}" class="nav-link">
        <i class="nav-icon fas fa-satellite-dish"></i>
        <p>Opérateur réseau</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('caisse.index') }}" class="nav-link">
        <i class="nav-icon fas fa-search-dollar"></i>
        <p>Caisse</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('client.index') }}" class="nav-link">
        <i class="nav-icon fas fa-mobile-alt"></i>
        <p>Clients</p>
      </a>
    </li>

    <li class="nav-item">
      <a href="{{ route('transaction.index') }}" class="nav-link">
        <i class="nav-icon far fa-money-bill-alt"></i>
        <p>Transaction</p>
      </a>
    </li>
    
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-exclamation-triangle"></i>
        <p>Erreurs</p>
      </a>
    </li>
    
    <li class="nav-header"><hr></li>
    
    <li class="nav-item">
      <a href="{{ route('logout') }}" class="nav-link">
        <i class="nav-icon fas fa-lock"></i>
        <p>
          Se déconnecter
        </p>
      </a>
    </li>
   
  </ul>
</nav>
<!-- /.sidebar-menu -->