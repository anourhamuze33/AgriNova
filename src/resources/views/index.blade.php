<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AgriNova - Gestion Agricole Intelligente</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;0,900;1,600&family=Outfit:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
html{scroll-behavior:smooth;}
:root{
  --forest:#1b3a2d;--pine:#254d3a;--fern:#2e6b4f;
  --sage:#4a8c68;--mint:#6dbd8e;--dew:#b8dfc8;
  --fog:#e6f2eb;--parch:#f8f4ed;
  --muted:#5a6b55;--border:#c8dcc0;--text:#1a2318;
  --amber:#c98a12;--rust:#b84a1e;--white:#ffffff;
  --amber-bg:rgba(201,138,18,.1);
  --rust-bg:rgba(184,74,30,.08);
  --blue-bg:rgba(37,99,235,.08);
  --sage-bg:rgba(74,140,104,.1);
}
body{font-family:'Outfit',sans-serif;color:var(--text);overflow-x:hidden;}
::-webkit-scrollbar{width:5px;}::-webkit-scrollbar-thumb{background:rgba(109,189,142,.3);border-radius:4px;}
.hero-section{position:relative;min-height:100vh;display:flex;flex-direction:column;overflow:hidden;}
.hero-bg{position:absolute;inset:0;background:url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1800&q=85&fit=crop') center/cover;}
.hero-overlay{position:absolute;inset:0;background:linear-gradient(170deg,rgba(10,24,14,.82) 0%,rgba(20,45,28,.72) 45%,rgba(12,28,18,.90) 100%);}
.hero-glow{position:absolute;top:-10%;left:60%;width:700px;height:700px;background:radial-gradient(circle,rgba(109,189,142,.08) 0%,transparent 65%);pointer-events:none;}
nav{position:relative;z-index:10;display:flex;align-items:center;justify-content:space-between;padding:1.375rem 3.5rem;border-bottom:1px solid rgba(255,255,255,.07);backdrop-filter:blur(12px);background:rgba(12,28,18,.3);}
.nav-logo{display:flex;align-items:center;gap:12px;text-decoration:none;}
.nav-logo-svg{width:42px;height:42px;filter:drop-shadow(0 2px 8px rgba(0,0,0,.3));}
.nav-brand{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:#fff;letter-spacing:-.01em;}
.nav-links{display:flex;align-items:center;gap:2rem;list-style:none;}
.nav-links a{color:rgba(255,255,255,.65);text-decoration:none;font-size:.875rem;font-weight:500;transition:color .2s;}
.nav-links a:hover{color:var(--mint);}
.nav-ctas{display:flex;align-items:center;gap:.75rem;}
.btn-nav-ghost{padding:.5rem 1.25rem;border:1.5px solid rgba(255,255,255,.28);border-radius:30px;color:rgba(255,255,255,.85);font-size:.8125rem;font-weight:600;font-family:'Outfit',sans-serif;background:transparent;cursor:pointer;text-decoration:none;transition:all .2s;}
.btn-nav-ghost:hover{border-color:rgba(255,255,255,.55);background:rgba(255,255,255,.08);color:#fff;}
.btn-nav-solid{padding:.5rem 1.4rem;background:var(--sage);border:none;border-radius:30px;color:#fff;font-size:.8125rem;font-weight:700;font-family:'Outfit',sans-serif;cursor:pointer;text-decoration:none;transition:all .2s;box-shadow:0 4px 14px rgba(74,140,104,.4);}
.btn-nav-solid:hover{background:var(--mint);}
.hero-body{flex:1;position:relative;z-index:2;display:flex;flex-direction:column;align-items:center;justify-content:center;text-align:center;padding:4.5rem 2rem 2.5rem;}
.hero-badge{display:inline-flex;align-items:center;gap:7px;background:rgba(74,140,104,.18);border:1px solid rgba(109,189,142,.32);border-radius:30px;padding:6px 16px;font-size:.7rem;font-weight:700;color:var(--mint);letter-spacing:.1em;text-transform:uppercase;margin-bottom:1.875rem;animation:fadeUp .6s ease both;}
.hbdot{width:6px;height:6px;background:var(--mint);border-radius:50%;}
.hero-title{font-family:'Playfair Display',serif;font-size:clamp(2.75rem,6vw,4.5rem);font-weight:900;color:#fff;line-height:1.07;letter-spacing:-.025em;margin-bottom:1.5rem;animation:fadeUp .7s .08s ease both;}
.hero-title em{font-style:italic;color:var(--mint);}
.hero-sub{font-size:1.0625rem;color:rgba(255,255,255,.58);line-height:1.72;max-width:560px;margin:0 auto 2.75rem;animation:fadeUp .7s .18s ease both;}
.hero-actions{display:flex;align-items:center;justify-content:center;gap:1rem;flex-wrap:wrap;animation:fadeUp .7s .28s ease both;margin-bottom:3.5rem;}
.btn-primary{display:inline-flex;align-items:center;gap:8px;padding:.9rem 2.25rem;background:var(--sage);border:none;border-radius:14px;color:#fff;font-size:.9375rem;font-weight:700;font-family:'Outfit',sans-serif;cursor:pointer;text-decoration:none;box-shadow:0 8px 28px rgba(74,140,104,.45);transition:all .22s;}
.btn-primary:hover{background:var(--mint);transform:translateY(-2px);}
.btn-primary svg,.btn-ghost-lg svg{width:18px;height:18px;}
.btn-ghost-lg{display:inline-flex;align-items:center;gap:8px;padding:.9rem 2.25rem;background:rgba(255,255,255,.08);border:1.5px solid rgba(255,255,255,.24);border-radius:14px;color:rgba(255,255,255,.88);font-size:.9375rem;font-weight:600;font-family:'Outfit',sans-serif;cursor:pointer;text-decoration:none;backdrop-filter:blur(8px);transition:all .22s;}
.btn-ghost-lg:hover{background:rgba(255,255,255,.14);border-color:rgba(255,255,255,.42);color:#fff;}
.hero-stats{display:flex;gap:1.125rem;justify-content:center;flex-wrap:wrap;animation:fadeUp .7s .38s ease both;}
.hstat{background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.14);border-radius:16px;backdrop-filter:blur(14px);padding:1rem 1.5rem;text-align:center;min-width:110px;transition:background .2s,border-color .2s;}
.hstat:hover{background:rgba(255,255,255,.14);border-color:rgba(109,189,142,.3);}
.hstat-num{font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;color:#fff;line-height:1;}
.hstat-lbl{font-size:.6rem;color:rgba(255,255,255,.42);text-transform:uppercase;letter-spacing:.09em;margin-top:4px;}
.scroll-hint{position:absolute;bottom:2rem;left:50%;transform:translateX(-50%);z-index:2;display:flex;flex-direction:column;align-items:center;gap:6px;color:rgba(255,255,255,.3);font-size:.65rem;letter-spacing:.1em;text-transform:uppercase;animation:fadeUp .7s .6s ease both;}
.scroll-arrow{width:24px;height:24px;border:1.5px solid rgba(255,255,255,.2);border-radius:50%;display:flex;align-items:center;justify-content:center;animation:bounce 2s infinite;}
.scroll-arrow svg{width:12px;height:12px;}
@keyframes bounce{0%,100%{transform:translateY(0)}50%{transform:translateY(5px)}}
.features-section{background:var(--parch);padding:5rem 3.5rem;}
.section-inner{max-width:1100px;margin:0 auto;}
.sec-eyebrow{font-size:.63rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--sage);margin-bottom:.625rem;display:flex;align-items:center;gap:8px;opacity:0;transform:translateY(18px);transition:all .55s ease;}
.sec-eyebrow::before{content:'';width:20px;height:1.5px;background:var(--sage);}
.sec-eyebrow.vis{opacity:1;transform:none;}
.sec-title{font-family:'Playfair Display',serif;font-size:clamp(1.75rem,3.5vw,2.5rem);font-weight:700;color:var(--forest);line-height:1.15;margin-bottom:.875rem;opacity:0;transform:translateY(18px);transition:all .55s .08s ease;}
.sec-title.vis{opacity:1;transform:none;}
.sec-title em{font-style:italic;color:var(--sage);}
.sec-sub{font-size:.9375rem;color:var(--muted);max-width:500px;line-height:1.65;margin-bottom:3rem;opacity:0;transform:translateY(18px);transition:all .55s .16s ease;}
.sec-sub.vis{opacity:1;transform:none;}
.feat-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1.125rem;}
.feat-card{background:var(--white);border:1.5px solid var(--border);border-radius:18px;padding:1.625rem 1.5rem;transition:box-shadow .22s,transform .22s,border-color .22s;opacity:0;transform:translateY(22px);}
.feat-card.vis{opacity:1;transform:none;}
.feat-card:hover{box-shadow:0 10px 32px rgba(27,58,45,.1);transform:translateY(-4px);border-color:var(--dew);}
.feat-card.large{grid-column:span 2;display:flex;gap:1.75rem;align-items:flex-start;}
.feat-visual{width:80px;height:80px;border-radius:18px;background:var(--sage-bg);border:1.5px solid var(--dew);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.feat-visual svg{width:38px;height:38px;color:var(--sage);}
.feat-icon{width:46px;height:46px;border-radius:13px;display:flex;align-items:center;justify-content:center;margin-bottom:1rem;}
.feat-icon svg{width:22px;height:22px;}
.fi-g{background:var(--sage-bg);color:var(--sage);}
.fi-a{background:var(--amber-bg);color:var(--amber);}
.fi-r{background:var(--rust-bg);color:var(--rust);}
.fi-b{background:var(--blue-bg);color:#2563eb;}
.fi-p{background:rgba(124,58,237,.08);color:#7c3aed;}
.feat-title{font-family:'Playfair Display',serif;font-size:1.05rem;font-weight:700;color:var(--forest);margin-bottom:.5rem;}
.feat-desc{font-size:.8125rem;color:var(--muted);line-height:1.65;}
.feat-strip{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;margin-top:1.125rem;}
.fsc{background:var(--white);border:1.5px solid var(--border);border-radius:14px;padding:1rem 1.125rem;display:flex;align-items:center;gap:.875rem;transition:box-shadow .2s,transform .2s;opacity:0;transform:translateY(18px);}
.fsc.vis{opacity:1;transform:none;}
.fsc:hover{box-shadow:0 4px 16px rgba(27,58,45,.08);transform:translateY(-2px);}
.fsc-icon{width:38px;height:38px;border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.fsc-icon svg{width:19px;height:19px;}
.fsc-num{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:var(--forest);line-height:1;}
.fsc-lbl{font-size:.68rem;font-weight:600;color:var(--muted);margin-top:2px;}
.roles-section{position:relative;overflow:hidden;background:linear-gradient(140deg,var(--forest) 0%,#1a4232 55%,#243d2b 100%);padding:5rem 3.5rem;}
.roles-section::before{content:'';position:absolute;inset:0;pointer-events:none;background:radial-gradient(ellipse at 80% 0%,rgba(109,189,142,.12) 0%,transparent 55%),radial-gradient(ellipse at 10% 100%,rgba(201,138,18,.06) 0%,transparent 45%);}
.roles-inner{position:relative;z-index:2;max-width:1100px;margin:0 auto;}
.rse{font-size:.63rem;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:rgba(184,223,200,.65);margin-bottom:.625rem;display:flex;align-items:center;gap:8px;}
.rse::before{content:'';width:20px;height:1.5px;background:rgba(184,223,200,.4);}
.rst{font-family:'Playfair Display',serif;font-size:clamp(1.75rem,3.5vw,2.5rem);font-weight:700;color:#fff;margin-bottom:.875rem;line-height:1.15;}
.rst em{font-style:italic;color:rgba(184,223,200,.85);}
.rss{font-size:.9375rem;color:rgba(255,255,255,.45);max-width:500px;line-height:1.65;margin-bottom:3rem;}
.roles-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;}
.role-card{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:18px;padding:1.75rem 1.25rem;text-align:center;backdrop-filter:blur(10px);transition:all .25s;opacity:0;transform:translateY(22px);}
.role-card.vis{opacity:1;transform:none;}
.role-card:hover{background:rgba(74,140,104,.14);border-color:rgba(109,189,142,.28);transform:translateY(-4px);box-shadow:0 12px 36px rgba(0,0,0,.2);}
.r-av{width:60px;height:60px;border-radius:50%;background:rgba(74,140,104,.2);border:1.5px solid rgba(109,189,142,.25);display:flex;align-items:center;justify-content:center;margin:0 auto 1.125rem;}
.r-av svg{width:28px;height:28px;color:var(--mint);}
.r-name{font-family:'Playfair Display',serif;font-size:1rem;font-weight:700;color:#fff;margin-bottom:.5rem;}
.r-desc{font-size:.775rem;color:rgba(255,255,255,.45);line-height:1.65;}
.r-perms{margin-top:1rem;padding-top:.875rem;border-top:1px solid rgba(255,255,255,.08);display:flex;flex-direction:column;gap:.35rem;}
.perm{display:flex;align-items:center;gap:6px;font-size:.68rem;color:rgba(255,255,255,.38);text-align:left;}
.pd{width:5px;height:5px;border-radius:50%;background:var(--sage);flex-shrink:0;}
.perm.hi{color:rgba(184,223,200,.7);}
.perm.hi .pd{background:var(--mint);}
.how-section{background:var(--parch);padding:5rem 3.5rem;}
.how-inner{max-width:1100px;margin:0 auto;}
.how-steps{display:grid;grid-template-columns:repeat(4,1fr);gap:1.5rem;margin-top:3rem;position:relative;}
.how-steps::before{content:'';position:absolute;top:28px;left:calc(12.5% + 10px);right:calc(12.5% + 10px);height:1.5px;background:var(--border);z-index:0;}
.how-step{display:flex;flex-direction:column;align-items:center;text-align:center;position:relative;z-index:1;opacity:0;transform:translateY(18px);}
.how-step.vis{opacity:1;transform:none;}
.step-num{width:56px;height:56px;border-radius:50%;background:var(--white);border:2px solid var(--border);display:flex;align-items:center;justify-content:center;font-family:'Playfair Display',serif;font-size:1.25rem;font-weight:700;color:var(--sage);margin-bottom:1rem;position:relative;z-index:2;transition:background .2s,border-color .2s;}
.how-step:hover .step-num{background:var(--sage);color:#fff;border-color:var(--sage);}
.step-title{font-family:'Playfair Display',serif;font-size:.975rem;font-weight:700;color:var(--forest);margin-bottom:.375rem;}
.step-desc{font-size:.775rem;color:var(--muted);line-height:1.6;}
.cta-section{margin:0;background:linear-gradient(140deg,var(--forest),#1a4232 60%,#243d2b);padding:5rem 3.5rem;position:relative;overflow:hidden;}
.cta-section::before{content:'';position:absolute;top:-100px;left:50%;transform:translateX(-50%);width:600px;height:600px;background:radial-gradient(circle,rgba(109,189,142,.1) 0%,transparent 65%);pointer-events:none;}
.cta-inner{position:relative;z-index:2;max-width:700px;margin:0 auto;text-align:center;}
.cta-badge{display:inline-flex;align-items:center;gap:7px;background:rgba(74,140,104,.18);border:1px solid rgba(109,189,142,.3);border-radius:30px;padding:5px 15px;font-size:.68rem;font-weight:700;color:var(--mint);letter-spacing:.1em;text-transform:uppercase;margin-bottom:1.5rem;}
.cta-title{font-family:'Playfair Display',serif;font-size:clamp(1.875rem,3.5vw,2.75rem);font-weight:700;color:#fff;margin-bottom:1rem;line-height:1.1;}
.cta-title em{font-style:italic;color:rgba(184,223,200,.85);}
.cta-sub{font-size:.9375rem;color:rgba(255,255,255,.48);max-width:460px;margin:0 auto 2.5rem;line-height:1.65;}
.cta-btns{display:flex;align-items:center;justify-content:center;gap:1rem;flex-wrap:wrap;}
footer{background:var(--white);border-top:1.5px solid var(--border);padding:1.5rem 3.5rem;display:flex;align-items:center;justify-content:space-between;}
.fl{display:flex;align-items:center;gap:10px;}
.fl-svg{width:32px;height:32px;}
.fl-brand{font-family:'Playfair Display',serif;font-size:1.125rem;font-weight:700;color:var(--forest);}
.fc{font-size:.75rem;color:var(--muted);}
.fls{display:flex;gap:1.5rem;list-style:none;}
.fls a{font-size:.75rem;color:var(--muted);text-decoration:none;transition:color .18s;}
.fls a:hover{color:var(--fern);}
@keyframes fadeUp{from{opacity:0;transform:translateY(22px)}to{opacity:1;transform:translateY(0)}}
</style>
</head>
<body>

<section class="hero-section">
  <div class="hero-bg"></div>
  <div class="hero-overlay"></div>
  <div class="hero-glow"></div>

  <nav>
    <a href="#" class="nav-logo">
      <svg class="nav-logo-svg" viewBox="0 0 48 48" fill="none">
        <circle cx="24" cy="24" r="22" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.22)" stroke-width="1.5"/>
        <path d="M8 34 Q24 29 40 34" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="none" stroke-linecap="round"/>
        <path d="M24 36 L24 18" stroke="#a8e6c0" stroke-width="2.8" stroke-linecap="round"/>
        <path d="M24 28 C19 24 13 22 11 16 C17 15 23 21 24 28Z" fill="#6dbd8e"/>
        <path d="M24 23 C29 19 36 17 38 11 C31 10 25 16 24 23Z" fill="#a8e6c0"/>
        <path d="M24 32 C28 30 32 28 33 24 C29 24 25 27 24 32Z" fill="#6dbd8e" opacity="0.7"/>
        <circle cx="24" cy="10" r="3.5" fill="#f7e96e" opacity="0.9"/>
        <line x1="24" y1="5" x2="24" y2="3.5" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round"/>
        <line x1="28.5" y1="6" x2="29.5" y2="4.8" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round" opacity="0.75"/>
        <line x1="19.5" y1="6" x2="18.5" y2="4.8" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round" opacity="0.75"/>
      </svg>
      <span class="nav-brand">AgriNova</span>
    </a>
    <ul class="nav-links">
      <li><a href="#fonctionnalites">Fonctionnalites</a></li>
      <li><a href="#roles">Roles</a></li>
      <li><a href="#comment">Comment ca marche</a></li>
    </ul>
    <div class="nav-ctas">
      <a href="/login" class="btn-nav-ghost">Se connecter</a>
      <a href="/register" class="btn-nav-solid">S'inscrire</a>
    </div>
  </nav>

  <div class="hero-body">
    <div class="hero-badge"><span class="hbdot"></span>Plateforme Agricole Professionnelle</div>
    <h1 class="hero-title">Gerez votre exploitation<br>avec <em>intelligence</em></h1>
    <p class="hero-sub">AgriNova centralise la gestion de vos cultures, recoltes, stocks et equipements en une seule plateforme. Simple, fiable, concu pour l'agriculteur moderne.</p>
    <div class="hero-actions">
      <a href="/register" class="btn-primary">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
        Commencer gratuitement
      </a>
      <a href="/login" class="btn-ghost-lg">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
        Se connecter
      </a>
    </div>
    <div class="hero-stats">
      <div class="hstat"><div class="hstat-num">4</div><div class="hstat-lbl">Roles utilisateurs</div></div>
      <div class="hstat"><div class="hstat-num">6+</div><div class="hstat-lbl">Modules de gestion</div></div>
      <div class="hstat"><div class="hstat-num">100%</div><div class="hstat-lbl">Tracabilite</div></div>
      <div class="hstat"><div class="hstat-num">MVC</div><div class="hstat-lbl">Architecture Laravel</div></div>
    </div>
  </div>

  <div class="scroll-hint">
    <span>Decouvrir</span>
    <div class="scroll-arrow"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg></div>
  </div>
</section>

<section class="features-section" id="fonctionnalites">
  <div class="section-inner">
    <div class="sec-eyebrow" data-rev>Fonctionnalites</div>
    <h2 class="sec-title" data-rev>Tout ce dont votre <em>exploitation</em> a besoin</h2>
    <p class="sec-sub" data-rev>Une solution complete pour digitaliser et optimiser chaque aspect de votre activite agricole.</p>

    <div class="feat-grid">
      <div class="feat-card large" data-rev data-delay="0">
        <div class="feat-visual"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg></div>
        <div>
          <div class="feat-title">Gestion des Cultures</div>
          <div class="feat-desc">Suivez les cycles complets - semis, traitement, croissance, recolte. Gerez les parcelles, saisons et cultures avec une tracabilite totale du rendement et des pertes.</div>
        </div>
      </div>
      <div class="feat-card" data-rev data-delay="1">
        <div class="feat-icon fi-a"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg></div>
        <div class="feat-title">Gestion des Stocks</div>
        <div class="feat-desc">Suivi en temps reel des produits recoltes, semences et engrais. Alertes automatiques pour stocks faibles ou perimes.</div>
      </div>
      <div class="feat-card" data-rev data-delay="2">
        <div class="feat-icon fi-g"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg></div>
        <div class="feat-title">Planification Recoltes</div>
        <div class="feat-desc">Planifiez et suivez vos recoltes. Notifications pour recoltes a venir ou en retard. Filtrage par parcelle, culture, saison ou date.</div>
      </div>
      <div class="feat-card" data-rev data-delay="3">
        <div class="feat-icon fi-b"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
        <div class="feat-title">Equipements</div>
        <div class="feat-desc">Historique des machines agricoles. Suivi des couts, des statuts et allocation aux parcelles ou taches.</div>
      </div>
      <div class="feat-card" data-rev data-delay="4">
        <div class="feat-icon fi-p"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
        <div class="feat-title">Personnel</div>
        <div class="feat-desc">Gestion des profils, attribution des taches selon les cultures et parcelles. Acces securise par role.</div>
      </div>
      <div class="feat-card" data-rev data-delay="5">
        <div class="feat-icon fi-r"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div>
        <div class="feat-title">Acces Securise</div>
        <div class="feat-desc">Authentification et controle d'acces par role. Interface adaptee pour chaque profil.</div>
      </div>
    </div>

    <div class="feat-strip">
      <div class="fsc" data-rev><div class="fsc-icon fi-g"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2"/></svg></div><div><div class="fsc-num">6+</div><div class="fsc-lbl">Modules de gestion</div></div></div>
      <div class="fsc" data-rev><div class="fsc-icon fi-a"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg></div><div><div class="fsc-num">100%</div><div class="fsc-lbl">Tracabilite cycles</div></div></div>
      <div class="fsc" data-rev><div class="fsc-icon fi-b"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2"/></svg></div><div><div class="fsc-num">MVC</div><div class="fsc-lbl">Architecture Laravel</div></div></div>
      <div class="fsc" data-rev><div class="fsc-icon fi-p"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857"/></svg></div><div><div class="fsc-num">4</div><div class="fsc-lbl">Roles utilisateurs</div></div></div>
    </div>
  </div>
</section>

<section class="roles-section" id="roles">
  <div class="roles-inner">
    <div class="rse">Roles & Acces</div>
    <h2 class="rst">Une plateforme pour <em>tous les acteurs</em></h2>
    <p class="rss">Chaque utilisateur accede aux fonctionnalites adaptees a son role dans l'exploitation.</p>
    <div class="roles-grid">
      <div class="role-card" data-rev>
        <div class="r-av"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"/></svg></div>
        <div class="r-name">Administrateur</div>
        <div class="r-desc">Gestion globale et supervision complete du systeme.</div>
        <div class="r-perms">
          <div class="perm hi"><span class="pd"></span>Creer et gerer les comptes</div>
          <div class="perm hi"><span class="pd"></span>Supervision cultures & stocks</div>
          <div class="perm hi"><span class="pd"></span>Logs et activites systeme</div>
          <div class="perm"><span class="pd"></span>Parametrage general</div>
        </div>
      </div>
      <div class="role-card" data-rev>
        <div class="r-av"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg></div>
        <div class="r-name">Agriculteur</div>
        <div class="r-desc">Planification et suivi des cultures et recoltes.</div>
        <div class="r-perms">
          <div class="perm hi"><span class="pd"></span>Gerer cultures & parcelles</div>
          <div class="perm hi"><span class="pd"></span>Planifier les recoltes</div>
          <div class="perm hi"><span class="pd"></span>Gerer le personnel</div>
          <div class="perm"><span class="pd"></span>Consulter les stocks</div>
        </div>
      </div>
      <div class="role-card" data-rev>
        <div class="r-av"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></div>
        <div class="r-name">Ouvrier</div>
        <div class="r-desc">Suivi des taches assignees et mise a jour des informations.</div>
        <div class="r-perms">
          <div class="perm hi"><span class="pd"></span>Voir ses taches assignees</div>
          <div class="perm hi"><span class="pd"></span>Mettre a jour les cultures</div>
          <div class="perm hi"><span class="pd"></span>Signaler traitements</div>
          <div class="perm"><span class="pd"></span>Consulter son planning</div>
        </div>
      </div>
      <div class="role-card" data-rev>
        <div class="r-av"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg></div>
        <div class="r-name">Gest. Stock</div>
        <div class="r-desc">Inventaire et suivi des entrees/sorties de produits.</div>
        <div class="r-perms">
          <div class="perm hi"><span class="pd"></span>Entrees & sorties stock</div>
          <div class="perm hi"><span class="pd"></span>Inventaire semences</div>
          <div class="perm hi"><span class="pd"></span>Alertes stocks faibles</div>
          <div class="perm"><span class="pd"></span>Consultation production</div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="how-section" id="comment">
  <div class="how-inner">
    <div class="sec-eyebrow" data-rev>Comment ca marche</div>
    <h2 class="sec-title" data-rev>Operationnel en <em>4 etapes simples</em></h2>
    <p class="sec-sub" data-rev>Commencez a digitaliser votre exploitation en quelques minutes.</p>
    <div class="how-steps">
      <div class="how-step" data-rev><div class="step-num">1</div><div class="step-title">Creer un compte</div><div class="step-desc">Inscrivez-vous et renseignez les informations de votre exploitation. Validation en 24-48h.</div></div>
      <div class="how-step" data-rev><div class="step-num">2</div><div class="step-title">Ajouter vos parcelles</div><div class="step-desc">Creez vos parcelles avec localisation, superficie et type de zone agricole.</div></div>
      <div class="how-step" data-rev><div class="step-num">3</div><div class="step-title">Planifier vos cultures</div><div class="step-desc">Ajoutez vos cultures par parcelle, cycle et saison. Suivez chaque etape en temps reel.</div></div>
      <div class="how-step" data-rev><div class="step-num">4</div><div class="step-title">Gerer & Analyser</div><div class="step-desc">Tableau de bord centralise, alertes automatiques, historique et rapports de rendement.</div></div>
    </div>
  </div>
</section>

<section class="cta-section">
  <div class="cta-inner">
    <div class="cta-badge"><span class="hbdot"></span>Rejoignez AgriNova</div>
    <h2 class="cta-title">Pret a <em>digitaliser</em><br>votre exploitation ?</h2>
    <p class="cta-sub">Centralisez la gestion de votre ferme, reduisez les pertes et prenez de meilleures decisions grace aux donnees.</p>
    <div class="cta-btns">
      <a href="/register" class="btn-primary">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/></svg>
        Creer un compte gratuitement
      </a>
      <a href="/login" class="btn-ghost-lg">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/></svg>
        Deja inscrit ? Se connecter
      </a>
    </div>
  </div>
</section>

<footer>
  <div class="fl">
    <svg class="fl-svg" viewBox="0 0 48 48" fill="none"><circle cx="24" cy="24" r="22" fill="var(--fog)" stroke="var(--border)" stroke-width="1.5"/><path d="M24 36 L24 18" stroke="var(--sage)" stroke-width="2.8" stroke-linecap="round"/><path d="M24 28 C19 24 13 22 11 16 C17 15 23 21 24 28Z" fill="var(--sage)"/><path d="M24 23 C29 19 36 17 38 11 C31 10 25 16 24 23Z" fill="var(--mint)"/><circle cx="24" cy="10" r="3" fill="var(--amber)" opacity="0.8"/></svg>
    <span class="fl-brand">AgriNova</span>
  </div>
  <span class="fc">2025 AgriNova - Gestion Agricole Intelligente - Laravel - PHP - MySQL</span>
  <ul class="fls"><li><a href="#">Conditions</a></li><li><a href="#">Confidentialite</a></li><li><a href="#">Contact</a></li></ul>
</footer>

<script>
const obs = new IntersectionObserver((entries) => {
  entries.forEach(e => {
    if (!e.isIntersecting) return;
    const el = e.target;
    const delay = (el.dataset.delay || 0) * 100;
    setTimeout(() => el.classList.add('vis'), delay);
    obs.unobserve(el);
  });
}, { threshold: 0.1 });
document.querySelectorAll('[data-rev]').forEach(el => obs.observe(el));

</script>
</body>
</html>