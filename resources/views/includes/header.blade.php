<nav class="navbar">
    <div class="navbar-brand">
        <a href="{{ route('home') }}">Projet concours-robots</a>
        <button class="burger" id="burger">
            <span></span><span></span><span></span>
        </button>
    </div>

    <ul class="nav-links" id="nav-links">
        <li><a href="{{ route('home') }}">Accueil</a></li>

        {{-- --------------------------- GUEST --------------------------- --}}
        @guest
        <li class="dropdown">
            <a href="#">Collèges ▾</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('home') }}">Élèves</a></li>
                <li><a href="{{ route('home') }}">Équipe</a></li>
            </ul>
        </li>

        <li><a href="{{ route('home') }}">Épreuves</a></li>
        <li><a href="{{ route('home') }}">Classement</a></li>

        @if (Route::has('login'))
        <li><a href="{{ route('login') }}">Connexion</a></li>
        @endif
        @if (Route::has('register'))
        <li><a href="{{ route('register') }}">Inscription</a></li>
        @endif

        @else
        {{-- --------------------------- AUTH --------------------------- --}}

        <li class="dropdown">
            <a href="#">Collèges ▾</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('home') }}">Élèves</a></li>
                <li><a href="{{ route('home') }}">Ajout élèves</a></li>
                <li><a href="{{ route('home') }}">Équipe</a></li>
            </ul>
        </li>

        <li><a href="{{ route('home') }}">Épreuves</a></li>
        <li><a href="{{ route('home') }}">Classement</a></li>

        {{-- ------------------ GESTIONNAIRE = ROLE 60 ------------------ --}}
        @php
        $role = DB::table('engager')
        ->where('id_utilisateur', Auth::id())
        ->value('id_role');
        @endphp

        @if($role >= 60)
        <li><a href="{{ route('home') }}">Saisie Note</a></li>

        <li class="dropdown">
            <a href="#">Page Gestion ▾</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('gestion_concours') }}">Concours</a></li>
                <li><a href="{{ route('home') }}">Collèges</a></li>
                <li><a href="{{ route('home') }}">Abonnement</a></li>
                <li><a href="{{ route('home') }}">Rôle</a></li>

                <li class="dropdown">
                    <a href="#">Résultat ▾</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('home') }}">Édition</a></li>
                        <li><a href="{{ route('home') }}">Exportation</a></li>
                        <li><a href="{{ route('home') }}">Modification</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        @endif

        {{-- --------------------------- ADMIN --------------------------- --}}
        @php
        $role = DB::table('engager')
        ->where('id_utilisateur', Auth::id())
        ->value('id_role');
        @endphp

        @if($role == 90)
        <li class="dropdown">
            <a href="#">Page Admin ▾</a>
            <ul class="dropdown-menu">
                <li><a href="{{ route('home') }}">Genre</a></li>
                <li><a href="{{ route('home') }}">Utilisateurs</a></li>
                <li><a href="{{ route('home') }}">Pays</a></li>
            </ul>
        </li>
        @endif

        {{-- Déconnexion --}}
        <li>
            @livewire('logout-button')
        </li>

        @endguest
    </ul>
</nav>

<script>
    const burger = document.getElementById('burger');
    const navLinks = document.getElementById('nav-links');

    burger.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });
</script>