<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

	<!-- Sidebar - Brand -->
	<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
		<div class="sidebar-brand-icon rotate-n-15">
			<i class="fas fa-laugh-wink"></i>
		</div>
		<div class="sidebar-brand-text mx-3">Admin</div>
	</a>

	<li class="nav-item">
		{!! link_to('admin/home', "Dashboard", $attributes = array('class' => 'nav-link')) !!}		
	</li>


	<!-- Divider -->
	<hr class="sidebar-divider my-0">

	<!-- Divider -->
	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Mi tienda
	</div>

	<!-- Nav Item - Pages Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
			<i class="fas fa-shopping-cart"></i>
			<span>Productos</span>
		</a>
		<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="{{ route('admin.product.index') }}">Artículos</a>
				<a class="collapse-item" href="{{ route('admin.category.index') }}">Categorias</a>
			</div>
		</div>
	</li>

	<!-- Nav Item - Utilities Collapse Menu -->
	<li class="nav-item">
		<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
			<i class="fas fa-shopping-basket"></i>
			<span>Mi tienda</span>
		</a>
		<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
			<div class="bg-white py-2 collapse-inner rounded">
				<a class="collapse-item" href="{{ route('admin.photogallery.index') }}">Galeria</a>
				<a class="collapse-item" href="utilities-border.html">Informacion</a>
			</div>
		</div>
	</li>

	<li class="nav-item">
		<a class="nav-link" href="{{ route('admin.order.index') }}">
			<i class="fas fa-fw fa-table"></i>
			<span>Pedidos</span>
		</a>
	</li>

	<!-- Divider -->

	<hr class="sidebar-divider">

	<!-- Heading -->
	<div class="sidebar-heading">
		Utilidades
	</div>

	<!-- Nav Item - Charts -->
	<li class="nav-item">
		<a class="nav-link" href="{{ route('admin.user.index') }}">
			<i class="fas fa-users"></i>
			<span>Usuarios</span>
		</a>
	</li>


	<!-- Divider -->
	<hr class="sidebar-divider d-none d-md-block">

	<!-- Sidebar Toggler (Sidebar) -->
	<div class="text-center d-none d-md-inline">
		<button class="rounded-circle border-0" id="sidebarToggle"></button>
	</div>

</ul>

<!-- End of Sidebar -->