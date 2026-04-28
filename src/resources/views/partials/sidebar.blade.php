<aside class="sidebar">
    <a href="{{ route('cultures.index') }}" class="sb-logo">
        <svg class="sb-logo-svg" viewBox="0 0 48 48" fill="none">
            <circle cx="24" cy="24" r="22" fill="rgba(255,255,255,0.08)" stroke="rgba(255,255,255,0.18)"
                stroke-width="1.5" />
            <path d="M8 36 Q24 30 40 36" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="none"
                stroke-linecap="round" />
            <path d="M24 38 L24 18" stroke="#a8e6c0" stroke-width="2.8" stroke-linecap="round" />
            <path d="M24 29 C19 25 13 23 11 17 C17 16 23 22 24 29Z" fill="#6dbd8e" />
            <path d="M24 24 C29 20 36 18 38 12 C31 11 25 17 24 24Z" fill="#a8e6c0" />
            <path d="M24 33 C28 31 32 29 33 25 C29 25 25 28 24 33Z" fill="#6dbd8e" opacity="0.7" />
            <circle cx="24" cy="11" r="3.5" fill="#f7e96e" opacity="0.9" />
            <line x1="24" y1="6" x2="24" y2="4.5" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round" />
        </svg>
        <div>
            <div class="sb-brand">AgriNova</div>
            <div class="sb-tagline">Gestion Agricole</div>
        </div>
    </a>
    <div class="sb-nav">
        <div class="sb-sec">Principal</div>
        @if(auth()->user() && auth()->user()->roles->contains('name', 'Admin'))
        <a href="{{route('admin.index')}}" class="sb-link">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Validation Comptes
        </a>
        @endif
        <a href="{{ route('cultures.index') }}" class="sb-link"><svg fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064" />
            </svg>Cultures</a>
        <a href="{{ route('stocks.index') }}" class="sb-link"><svg fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
            </svg>Recoltes</a>
        <a href="{{ route('equipments.index') }}" class="sb-link"><svg fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7" />
            </svg>Equipements</a>
        <a href="{{ route('fields.index') }}" class="sb-link"><svg fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>Parcelles</a>
        <div class="sb-sec">Gestion</div>
        <a href="{{ route('profile.show') }}" class="sb-link"><svg fill="none" stroke="currentColor"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>Profile</a>
    </div>
    <div class="sb-footer">
        <a href="{{ route('profile.show') }}" class="sb-user">
            <div class="sb-avatar">{{strtoupper(substr(auth()->user()->name, 0, 2))}}</div>
            <div>
                <div class="sb-uname">{{auth()->user()->name}}</div>
                <div class="sb-urole">{{auth()->user()->roles[0]->name}}</div>
            </div>
        </a>
    </div>
            <div class="sb-footer">
            <a href="{{ route('logout') }}" class="sb-logout">Deconnexion</a>
        </div>
</aside>