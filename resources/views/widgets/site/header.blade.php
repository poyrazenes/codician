<header class="masthead mb-auto">
    <div class="inner">
        <h3 class="masthead-brand">Codician</h3>
        <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link {{ $active == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="nav-link {{ $active == 'companies' ? 'active' : '' }}" href="#">Companies</a>
            <a class="nav-link {{ $active == 'people' ? 'active' : '' }}" href="#">People</a>
            <a class="nav-link {{ $active == 'addresses' ? 'active' : '' }}" href="#">Addresses</a>
        </nav>
    </div>
</header>
