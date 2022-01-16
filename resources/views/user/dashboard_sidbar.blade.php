<div class="sidebar widget widget-dashboard mb-lg-0 mb-3 col-lg-3 order-0">
    <h2 class="text-uppercase">My Account</h2>
    <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
        <li class="nav-item">
            <a class="nav-link {{$current =='compte'?'active':''}}" id="dashboard-tab" data-toggle="tab" href="#dashboard"
                role="tab" aria-controls="dashboard" aria-selected="true">Dashboard</a>
        </li>

        <li class="nav-item">
            <a class="nav-link {{$current =='commande'?'active':''}}" id="" href="{{ route('user.commande.index') }}" role="tab"
                aria-controls="" aria-selected="false">Mes commandes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="download-tab" data-toggle="tab" href="#download" role="tab"
                aria-controls="download" aria-selected="false">Downloads</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" id="address-tab" data-toggle="tab" href="#address" role="tab"
                aria-controls="address" aria-selected="false">Addresses</a>
        </li>
        {{-- <li class="nav-item">
            <a class="nav-link {{$current =='adresse'?'active':''}}" id="" href="{{ route('adresse.create') }}" role="tab"
                aria-controls="" aria-selected="false"> Mes Addresses</a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link {{$current =='adresse'?'active':''}}" id="" href="{{ route('adresse.index') }}" role="tab"
                aria-controls="" aria-selected="false"> Mes Addresses</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab"
                aria-controls="edit" aria-selected="false">Account
                details</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab"
                aria-controls="info" aria-selected="false">Informations personnelles</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="mp_fget-tab" data-toggle="tab" href="#mp_fget" role="tab"
                aria-controls="mp_fget" aria-selected="false">Modifier votre mot de passe</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="shop-address-tab" data-toggle="tab" href="#shipping" role="tab"
                aria-controls="edit" aria-selected="false">Shopping Addres</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="wishlist.html">Wishlist</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.html">Logout</a>
        </li>
    </ul>
</div>