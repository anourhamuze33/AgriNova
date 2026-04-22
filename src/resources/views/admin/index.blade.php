@extends('layouts.app')
@section('title', 'Listes des cultures')

@section('content')
            <div class="page-hdr">
                <div class="page-hdr-left">
                    <div class="page-eyebrow">Administration</div>
                    <h1 class="page-title">Validation des Comptes</h1>
                    <p class="page-sub">Vérifiez les documents soumis et activez les comptes professionnels</p>
                </div>
                <div class="page-hdr-right">
                    <a href="#" class="btn-icon outline">
                        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Exporter
                    </a>
                </div>
            </div>

            <!-- Stats -->
            <div class="stats-row">
                <div class="st-card">
                    <div class="st-icon amber"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg></div>
                    <div>
                        <div class="st-num">{{$stats['pending']}}</div>
                        <div class="st-lbl">En attente</div>
                    </div>
                </div>
                <div class="st-card">
                    <div class="st-icon green"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg></div>
                    <div>
                        <div class="st-num">{{$stats['approved']}}</div>
                        <div class="st-lbl">Approuvés</div>
                    </div>
                </div>
                <div class="st-card">
                    <div class="st-icon red"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg></div>
                    <div>
                        <div class="st-num">{{$stats['rejected']}}</div>
                        <div class="st-lbl">Refusés</div>
                    </div>
                </div>
                <div class="st-card">
                    <div class="st-icon blue"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg></div>
                    <div>
                        <div class="st-num">{{$stats['inscrit']}}</div>
                        <div class="st-lbl">Total inscrits</div>
                    </div>
                </div>
            </div>

            <!-- Workers list -->
            <div class="workers-list" id="workersList">
                @foreach($usersDemanding as $user)
                <div class="worker-card" data-name="{{$user->name}}">
                    <div class="wc-top" onclick="toggleCard(this)">
                        <div class="wc-avatar">{{strtoupper(substr($user->name, 0, 2))}}</div>
                        <div class="wc-info">
                            <div class="wc-name">{{$user->name}}</div>
                            <div class="wc-meta">
                                <span>m_{{$user->name}}</span>
                                <span class="wc-meta-dot"></span>
                                <span>{{$user->email}}</span>
                                <span class="wc-meta-dot"></span>
                                <span>{{$user->ville_id}}</span>
                                <span class="wc-meta-dot"></span>
                                <span>Inscrit le 14 Mars 2026</span>
                            </div>
                        </div>
                        <span class="wc-role-badge role-agri">{{$user->role_id}}</span>
                        <span class="wc-status-badge 
                        {{ $user->demandes[0]->status == 'approved' ? 'status-approved' : 
                        ($user->demandes[0]->status == 'rejected' ? 'status-rejected' : 'status-pending') }}">
                            {{ $user->demandes[0]->status }}
                        </span>
                        <div class="wc-toggle">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </div>
                    </div>
                    <div class="wc-docs">
                        <div class="docs-grid">
                            <!-- Diplôme -->
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <img src="../assets/docs.jpg" alt="Diplôme">
                                    <span class="doc-type-badge">Diplôme</span>
                                    <a href="{{route('file.Diplome.show', $user->lienDiplome)}}" target="_blank">
                                        <button class="doc-view-btn">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Voir
                                        </button>
                                    </a>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Diplôme d'Agriculture</div>
                                    <div class="doc-meta">
                                        <span class="doc-size">{{strtoupper($user->diplome_info[0])}} ·
                                            {{strtoupper($user->diplome_info[1])}}</span>
                                        <span class="doc-status doc-ok">Soumis</span>
                                    </div>
                                </div>
                            </div>
                            <!-- CIN -->
                            <div class="doc-card">
                                <div class="doc-preview">
                                    <img class="img" src="../assets/docs.jpg" alt="CIN">
                                    <span class="doc-type-badge">CIN</span>
                                    <a href="{{route('file.CIN.show', $user->lienCIN)}}" target="_blank">
                                        <button class="doc-view-btn">
                                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                            Voir
                                        </button>
                                    </a>
                                </div>
                                <div class="doc-info">
                                    <div class="doc-title">Carte d'Identité Nationale</div>
                                    <div class="doc-meta">
                                        <span class="doc-size">{{strtoupper($user->cin_info[0])}} ·
                                            {{strtoupper($user->cin_info[1])}}</span>
                                        <span class="doc-status doc-ok">Soumis</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if($user->demandes[0]->status == 'approved')
                        <div class="wc-decided-banner approved">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                style="width:18px;height:18px;flex-shrink:0">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Compte approuvé à l'instant{{$user->demandes[0]->notes ? ' · Note : ' .
                            $user->demandes[0]->notes : ''}} — Utilisateur désormais actif
                        </div>

                        @elseif($user->demandes[0]->status == 'rejected')
                        <div class="wc-decided-banner rejected">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                style="width:18px;height:18px;flex-shrink:0">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Compte refusé à l'instant{{$user->demandes[0]->notes ? ' · Note : ' .
                            $user->demandes[0]->notes : ''}} — Notification envoyée à
                            l'utilisateur
                        </div>
                        @else
                        <form action="{{route('acceptOrRefuse', $user->id)}}" method="POST" class="wc-actions">
                            @csrf
                            <div class="wc-actions-left">
                                <div class="wc-note-label">Note administrative (optionnel)</div>
                                <textarea class="wc-note" name="note"
                                    placeholder="Ajouter une remarque sur ce dossier..."></textarea>
                            </div>
                            <input type="hidden" name="type" id="hiddenType" value="">
                            <div class="wc-actions-right">
                                <button type="submit" class="btn-reject btnType" data-type="rejected">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                    Refuser
                                </button>

                                <button type="submit" class="btn-approve btnType" data-type="approved">
                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M5 13l4 4L19 7" />
                                    </svg>
                                    Approuver le compte
                                </button>
                            </div>
                        </form>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
@endsection

    <script>
  function toggleCard(topEl) {
  const card = topEl.closest('.worker-card');
  const docs = card.querySelector('.wc-docs');
  const toggle = topEl.querySelector('.wc-toggle');
  const isOpen = docs.classList.contains('open');
  // Close all others
  document.querySelectorAll('.wc-docs.open').forEach(d => {
    d.classList.remove('open');
    d.closest('.worker-card').querySelector('.wc-toggle').classList.remove('open');
  });
  if (!isOpen) {
    docs.classList.add('open');
    toggle.classList.add('open');
  }
}

// Filter tabs
function filterCards(status, btn) {
  document.querySelectorAll('.filter-tab').forEach(t => t.classList.remove('active'));
  btn.classList.add('active');
  document.querySelectorAll('.worker-card').forEach(card => {
    if (status === 'all' || card.dataset.status === status) {
      card.style.display = '';
    } else {
      card.style.display = 'none';
    }
  });
}

// Search
function searchCards(val) {
  const q = val.toLowerCase();
  document.querySelectorAll('.worker-card').forEach(card => {
    const name = card.dataset.name.toLowerCase();
    card.style.display = name.includes(q) ? '' : 'none';
  });
}

// Modal
function openModal(title, imgSrc, meta) {
  document.getElementById('modalTitle').textContent = title;
  document.getElementById('modalImg').src = imgSrc;
  document.getElementById('modalMeta').textContent = meta;
  document.getElementById('docModal').classList.add('open');
}
function closeModal() {
  document.getElementById('docModal').classList.remove('open');
}
function closeModalOnBg(e) {
  if (e.target === document.getElementById('docModal')) closeModal();
}
document.addEventListener('keydown', e => { if (e.key === 'Escape') closeModal(); });

let valueType = document.querySelector('#hiddenType');
const types = document.querySelectorAll('.btnType');
types.forEach(type => {
    type.addEventListener('click', (e)=>{        
        valueType.value = e.target.dataset.type;
    })
})

    </script>
</body>

</html>
