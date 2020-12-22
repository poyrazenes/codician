<header class="masthead mb-auto">
    <div class="inner">
        <h3 class="masthead-brand">Codician</h3>
        <nav class="nav nav-masthead justify-content-center">
            <a class="nav-link {{ $active == 'home' ? 'active' : '' }}" href="{{ route('home') }}">Home</a>
            <a class="nav-link {{ $active == 'companies' ? 'active' : '' }}" href="{{ route('companies.index') }}">Companies</a>
        </nav>
    </div>
</header>
