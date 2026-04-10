<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AgriNova — Cultures par Parcelle</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --forest:   #1b3a2d;
  --pine:     #254d3a;
  --fern:     #2e6b4f;
  --sage:     #4a8c68;
  --mint:     #6dbd8e;
  --dew:      #b8dfc8;
  --fog:      #e6f2eb;
  --parch:    #f8f4ed;
  --cream:    #fdfbf7;
  --straw:    #e8d5a0;
  --muted:    #5a6b55;
  --border:   #c8dcc0;
  --text:     #1a2318;
  --amber:    #c98a12;
  --amber-bg: rgba(201,138,18,.1);
  --rust:     #b84a1e;
  --rust-bg:  rgba(184,74,30,.08);
  --blue:     #2563eb;
  --blue-bg:  rgba(37,99,235,.08);
  --white:    #ffffff;
  --sidebar-w:250px;
}

html,body{height:100%;}
body{font-family:'Outfit',sans-serif;background:var(--parch);color:var(--text);display:flex;min-height:100vh;}

/* ══ SIDEBAR ══ */
.sidebar{
  width:var(--sidebar-w);flex-shrink:0;
  background:var(--white);border-right:1.5px solid var(--border);
  display:flex;flex-direction:column;height:100vh;position:sticky;top:0;overflow-y:auto;
}
.sb-logo{
  background:linear-gradient(135deg,var(--forest) 0%,#2d6444 100%);
  padding:1.375rem 1.25rem;display:flex;align-items:center;gap:11px;
  text-decoration:none;flex-shrink:0;
}
.sb-logo-svg{width:38px;height:38px;flex-shrink:0;}
.sb-brand{font-family:'Playfair Display',serif;font-size:1.25rem;font-weight:700;color:#fff;}
.sb-tagline{font-size:.58rem;color:rgba(184,223,200,.72);letter-spacing:.1em;text-transform:uppercase;margin-top:2px;}
.sb-sec{font-size:.58rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--muted);padding:.875rem 1.25rem .3rem;opacity:.7;}
.sb-nav{padding:.375rem .625rem;flex:1;}
.sb-link{
  display:flex;align-items:center;gap:10px;padding:.6rem .875rem;border-radius:10px;
  color:var(--muted);text-decoration:none;font-size:.8125rem;font-weight:600;margin-bottom:2px;
  transition:background .18s,color .18s;position:relative;
}
.sb-link:hover{background:var(--fog);color:var(--fern);}
.sb-link.active{background:var(--fog);color:var(--forest);}
.sb-link.active::before{content:'';position:absolute;left:0;top:20%;height:60%;width:3px;background:var(--sage);border-radius:0 3px 3px 0;}
.sb-link svg{width:17px;height:17px;flex-shrink:0;}
.sb-badge{margin-left:auto;background:var(--amber);color:#fff;font-size:.6rem;font-weight:700;padding:2px 7px;border-radius:20px;}
.sb-footer{padding:1rem .625rem;border-top:1px solid var(--border);}
.sb-user{display:flex;align-items:center;gap:10px;padding:.625rem .75rem;border-radius:10px;background:var(--fog);}
.sb-avatar{width:34px;height:34px;border-radius:50%;background:var(--forest);display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;color:#fff;flex-shrink:0;}
.sb-uname{font-size:.8125rem;font-weight:600;color:var(--text);}
.sb-urole{font-size:.65rem;color:var(--muted);margin-top:1px;}

/* ══ MAIN ══ */
.main{flex:1;display:flex;flex-direction:column;min-width:0;background:var(--parch);}
.content{padding:2.25rem 2.25rem 3rem;overflow-y:auto;flex:1;}

/* ══ PAGE HEADER ══ */
.page-hdr{
  display:flex;align-items:flex-end;justify-content:space-between;
  margin-bottom:1.75rem;padding-bottom:1.5rem;border-bottom:1.5px solid var(--border);
}
.page-eyebrow{font-size:.65rem;font-weight:700;color:var(--sage);letter-spacing:.14em;text-transform:uppercase;margin-bottom:.5rem;display:flex;align-items:center;gap:8px;}
.page-eyebrow::before{content:'';width:20px;height:2px;background:var(--sage);border-radius:2px;}
.page-title{font-family:'Playfair Display',serif;font-size:2rem;font-weight:700;color:var(--forest);line-height:1.05;letter-spacing:-.02em;}
.page-title em{font-style:italic;color:var(--sage);}
.page-sub{font-size:.875rem;color:var(--muted);margin-top:.5rem;}
.page-hdr-right{display:flex;align-items:center;gap:.75rem;flex-shrink:0;}

/* Buttons */
.btn-primary{
  display:flex;align-items:center;gap:7px;
  padding:.6rem 1.25rem;background:var(--forest);color:#fff;
  font-weight:700;font-size:.8125rem;font-family:'Outfit',sans-serif;
  border:none;border-radius:10px;cursor:pointer;
  box-shadow:0 4px 14px rgba(27,58,45,.22);
  transition:background .2s;text-decoration:none;
}
.btn-primary:hover{background:var(--fern);}
.btn-primary svg{width:14px;height:14px;}
.btn-outline{
  display:flex;align-items:center;gap:7px;
  padding:.6rem 1.125rem;background:var(--white);
  border:1.5px solid var(--border);color:var(--muted);
  font-weight:600;font-size:.8125rem;font-family:'Outfit',sans-serif;
  border-radius:10px;cursor:pointer;text-decoration:none;
  transition:background .2s,border-color .2s,color .2s;
}
.btn-outline:hover{background:var(--fog);border-color:var(--sage);color:var(--fern);}
.btn-outline svg{width:14px;height:14px;}

/* ══ FILTER BAR ══ */
.filter-bar{display:flex;align-items:center;gap:.625rem;margin-bottom:1.75rem;flex-wrap:wrap;}
.f-tab{
  display:flex;align-items:center;gap:6px;
  padding:.4rem 1rem;border-radius:20px;
  border:1.5px solid var(--border);background:var(--white);
  color:var(--muted);font-size:.78rem;font-weight:700;
  cursor:pointer;transition:all .18s;
}
.f-tab:hover{border-color:var(--sage);color:var(--fern);}
.f-tab.active{background:var(--forest);border-color:var(--forest);color:#fff;}
.f-tab-count{
  background:rgba(255,255,255,.25);border-radius:20px;
  padding:1px 7px;font-size:.62rem;font-weight:700;
}
.f-tab:not(.active) .f-tab-count{background:var(--fog);color:var(--muted);}
.search-box{
  display:flex;align-items:center;gap:7px;
  background:var(--white);border:1.5px solid var(--border);
  border-radius:10px;padding:.4rem .875rem;margin-left:auto;
}
.search-box:focus-within{border-color:var(--sage);}
.search-box svg{width:14px;height:14px;color:var(--muted);}
.search-box input{border:none;outline:none;background:transparent;font-size:.8rem;font-family:'Outfit',sans-serif;color:var(--text);width:160px;}
.search-box input::placeholder{color:#aab5a4;}

/* ══ PARCELLE SECTION ══ */
.parcelle-section{margin-bottom:2.25rem;}

.parcelle-header{
  display:flex;align-items:stretch;gap:0;
  background:var(--white);border:1.5px solid var(--border);
  border-radius:16px 16px 0 0;
  overflow:hidden;
  border-bottom:none;
}

.parcelle-photo{
  width:180px;flex-shrink:0;position:relative;overflow:hidden;
}
.parcelle-photo img{width:100%;height:100%;object-fit:cover;display:block;}
.parcelle-photo-overlay{
  position:absolute;inset:0;
  background:linear-gradient(to right,rgba(10,26,16,.55) 0%,transparent 100%);
}
.parcelle-photo-ha{
  position:absolute;bottom:10px;left:12px;
  font-family:'Playfair Display',serif;
  font-size:1.25rem;font-weight:700;color:#fff;
  text-shadow:0 2px 8px rgba(0,0,0,.4);
}
.parcelle-photo-ha span{font-size:.65rem;font-weight:400;opacity:.8;}

.parcelle-meta{
  flex:1;padding:1.25rem 1.375rem;
  display:flex;align-items:center;justify-content:space-between;gap:1rem;
}
.parcelle-meta-left{}
.parcelle-name{
  font-family:'Playfair Display',serif;
  font-size:1.2rem;font-weight:700;color:var(--forest);line-height:1.1;
}
.parcelle-sub{
  font-size:.75rem;color:var(--muted);margin-top:4px;
  display:flex;align-items:center;gap:6px;flex-wrap:wrap;
}
.parcelle-sub-dot{width:3px;height:3px;border-radius:50%;background:var(--dew);}
.parcelle-loc{display:flex;align-items:center;gap:4px;font-size:.75rem;color:var(--muted);}
.parcelle-loc svg{width:12px;height:12px;color:var(--sage);}

.parcelle-kpis{display:flex;gap:1.25rem;}
.kpi{text-align:center;}
.kpi-num{font-family:'Playfair Display',serif;font-size:1.25rem;font-weight:700;color:var(--forest);line-height:1;}
.kpi-lbl{font-size:.62rem;font-weight:600;color:var(--muted);margin-top:2px;text-transform:uppercase;letter-spacing:.06em;}
.kpi-divider{width:1px;height:32px;background:var(--border);align-self:center;}

.parcelle-actions{display:flex;align-items:center;gap:.5rem;flex-shrink:0;}

.parcelle-status-tag{
  display:inline-flex;align-items:center;gap:5px;
  font-size:.65rem;font-weight:800;letter-spacing:.06em;text-transform:uppercase;
  padding:4px 12px;border-radius:20px;
}
.pst-active {background:var(--fog);color:var(--sage);}
.pst-treat  {background:var(--amber-bg);color:var(--amber);}
.pst-harvest{background:rgba(201,138,18,.15);color:#8a5a00;}

/* ══ CROPS GRID ══ */
.crops-container{
  background:var(--white);
  border:1.5px solid var(--border);
  border-top:none;
  border-radius:0 0 16px 16px;
  overflow:hidden;
}

.crops-grid-header{
  display:flex;align-items:center;justify-content:space-between;
  padding:.875rem 1.375rem;
  background:var(--fog);
  border-bottom:1.5px solid var(--border);
}
.crops-grid-title{
  font-size:.72rem;font-weight:700;color:var(--muted);
  letter-spacing:.08em;text-transform:uppercase;
  display:flex;align-items:center;gap:6px;
}
.crops-grid-title svg{width:13px;height:13px;color:var(--sage);}
.crops-add-btn{
  display:flex;align-items:center;gap:5px;
  font-size:.72rem;font-weight:700;color:var(--fern);
  background:none;border:1.5px solid var(--dew);
  border-radius:20px;padding:4px 12px;cursor:pointer;
  transition:all .18s;
}
.crops-add-btn:hover{background:var(--fog);border-color:var(--sage);}
.crops-add-btn svg{width:11px;height:11px;}

.crops-grid{
  display:grid;
  grid-template-columns:repeat(3,1fr);
  gap:0;
}

/* Individual crop card */
.crop-card{
  border-right:1px solid var(--border);
  border-bottom:1px solid var(--border);
  position:relative;overflow:hidden;
  transition:background .18s;
  cursor:pointer;
}
.crop-card:hover{background:var(--parch);}
/* Remove right border on last of each row */
.crop-card:nth-child(3n){border-right:none;}
/* Remove bottom border on last row items */
.crop-card:nth-last-child(-n+3):nth-child(3n+1),
.crop-card:nth-last-child(-n+3):nth-child(3n+2),
.crop-card:nth-last-child(-n+3):nth-child(3n){border-bottom:none;}

.crop-photo{height:110px;position:relative;overflow:hidden;}
.crop-photo img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .3s;}
.crop-card:hover .crop-photo img{transform:scale(1.04);}
.crop-photo-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(10,26,16,.08) 0%,rgba(10,26,16,.55) 100%);}

/* Cycle progress bar on photo */
.crop-cycle-bar{
  position:absolute;bottom:0;left:0;right:0;height:3px;background:rgba(255,255,255,.2);
}
.crop-cycle-fill{height:100%;border-radius:0 2px 2px 0;}
.cycle-plant  .crop-cycle-fill{background:#3b82f6;}
.cycle-growth .crop-cycle-fill{background:var(--mint);}
.cycle-treat  .crop-cycle-fill{background:var(--amber);}
.cycle-harvest.crop-cycle-fill{background:#f5c842;}

.crop-stage-badge{
  position:absolute;top:8px;left:8px;
  font-size:.58rem;font-weight:800;letter-spacing:.05em;text-transform:uppercase;
  padding:3px 9px;border-radius:20px;
}
.stage-plant  {background:rgba(59,130,246,.88); color:#fff;}
.stage-growth {background:rgba(74,140,104,.88); color:#fff;}
.stage-treat  {background:rgba(201,138,18,.88); color:#fff;}
.stage-harvest{background:rgba(27,58,45,.88);   color:#fff;}

.crop-yield-badge{
  position:absolute;top:8px;right:8px;
  background:rgba(0,0,0,.45);backdrop-filter:blur(4px);
  font-size:.6rem;font-weight:700;color:#fff;
  border-radius:20px;padding:3px 9px;
  display:flex;align-items:center;gap:4px;
}
.crop-yield-badge svg{width:10px;height:10px;}

.crop-body{padding:.875rem 1rem;}
.crop-name{font-family:'Playfair Display',serif;font-size:.9375rem;font-weight:700;color:var(--forest);line-height:1.1;}
.crop-variety{font-size:.68rem;color:var(--muted);margin-top:2px;font-style:italic;}

.crop-meta-row{
  display:flex;align-items:center;justify-content:space-between;
  margin-top:.625rem;
}
.crop-date{font-size:.68rem;color:var(--muted);display:flex;align-items:center;gap:4px;}
.crop-date svg{width:11px;height:11px;color:var(--sage);}

/* Progress ring text */
.crop-progress{
  display:flex;align-items:center;gap:4px;
  font-size:.68rem;font-weight:700;
}
.crop-progress-track{
  width:50px;height:5px;background:var(--fog);border-radius:4px;overflow:hidden;
}
.crop-progress-fill{height:100%;border-radius:4px;}
.fill-plant  {background:#3b82f6;}
.fill-growth {background:var(--mint);}
.fill-treat  {background:var(--amber);}
.fill-harvest{background:var(--sage);}

.crop-actions{
  display:flex;align-items:center;gap:.375rem;margin-top:.75rem;
  padding-top:.625rem;border-top:1px solid var(--border);
}
.crop-action-btn{
  display:flex;align-items:center;gap:4px;
  font-size:.65rem;font-weight:700;
  padding:3px 9px;border-radius:6px;cursor:pointer;
  border:1px solid transparent;transition:all .15s;
  font-family:'Outfit',sans-serif;background:none;
}
.cab-view{color:var(--fern);border-color:var(--dew);}
.cab-view:hover{background:var(--fog);}
.cab-edit{color:var(--muted);border-color:var(--border);}
.cab-edit:hover{background:var(--parch);}
.cab-delete{color:var(--rust);border-color:transparent;margin-left:auto;}
.cab-delete:hover{background:var(--rust-bg);}
.crop-action-btn svg{width:11px;height:11px;}

/* Empty crops state */
.empty-crops{
  padding:2.5rem 1.5rem;text-align:center;
  border-top:1px dashed var(--border);
}
.empty-crops-icon{font-size:2.5rem;margin-bottom:.75rem;}
.empty-crops-title{font-size:.875rem;font-weight:700;color:var(--text);margin-bottom:.375rem;}
.empty-crops-sub{font-size:.775rem;color:var(--muted);margin-bottom:1rem;}
.btn-add-crop{
  display:inline-flex;align-items:center;gap:6px;
  padding:.5rem 1.125rem;background:var(--forest);color:#fff;
  font-weight:700;font-size:.8rem;font-family:'Outfit',sans-serif;
  border:none;border-radius:9px;cursor:pointer;text-decoration:none;
  transition:background .2s;
}
.btn-add-crop:hover{background:var(--fern);}
.btn-add-crop svg{width:13px;height:13px;}
</style>
</head>
<body>

<!-- ══ SIDEBAR ══ -->
<aside class="sidebar">
  <a href="/dashboard" class="sb-logo">
    <svg class="sb-logo-svg" viewBox="0 0 48 48" fill="none">
      <circle cx="24" cy="24" r="22" fill="rgba(255,255,255,0.08)" stroke="rgba(255,255,255,0.18)" stroke-width="1.5"/>
      <path d="M8 36 Q24 30 40 36" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="none" stroke-linecap="round"/>
      <path d="M24 38 L24 18" stroke="#a8e6c0" stroke-width="2.8" stroke-linecap="round"/>
      <path d="M24 29 C19 25 13 23 11 17 C17 16 23 22 24 29Z" fill="#6dbd8e"/>
      <path d="M24 24 C29 20 36 18 38 12 C31 11 25 17 24 24Z" fill="#a8e6c0"/>
      <path d="M24 33 C28 31 32 29 33 25 C29 25 25 28 24 33Z" fill="#6dbd8e" opacity="0.7"/>
      <circle cx="24" cy="11" r="3.5" fill="#f7e96e" opacity="0.9"/>
      <line x1="24" y1="6" x2="24" y2="4.5" stroke="#f7e96e" stroke-width="1.5" stroke-linecap="round"/>
      <line x1="28.5" y1="7" x2="29.5" y2="5.8" stroke="#f7e96e" stroke-width="1.3" stroke-linecap="round" opacity="0.75"/>
      <line x1="19.5" y1="7" x2="18.5" y2="5.8" stroke="#f7e96e" stroke-width="1.3" stroke-linecap="round" opacity="0.75"/>
    </svg>
    <div><div class="sb-brand">AgriNova</div><div class="sb-tagline">Gestion Agricole</div></div>
  </a>

  <div class="sb-nav">
    <div class="sb-sec">Principal</div>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>Dashboard</a>
    <a href="#" class="sb-link active"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>Cultures<span class="sb-badge">12</span></a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>Récoltes</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg>Stocks</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Parcelles</a>
    <div class="sb-sec">Gestion</div>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Personnel</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Équipements</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>Rapports</a>
  </div>

  <div class="sb-footer">
    <div class="sb-user">
      <div class="sb-avatar">MA</div>
      <div><div class="sb-uname">Mohamed Alami</div><div class="sb-urole">Agriculteur</div></div>
    </div>
  </div>
</aside>

<!-- ══ MAIN ══ -->
<div class="main">
<div class="content">

  <!-- Page header -->
  <div class="page-hdr">
    <div>
      <div class="page-eyebrow">Saison Printemps 2026</div>
      <h1 class="page-title">Cultures par <em>Parcelle</em></h1>
      <p class="page-sub">4 parcelles actives · 12 cultures en cours · Exploitation El Haouz</p>
    </div>
    <div class="page-hdr-right">
      <a href="/cultures" class="btn-outline">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/></svg>
        Vue liste
      </a>
      <a href="/cultures/create" class="btn-primary">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Nouvelle culture
      </a>
    </div>
  </div>

  <!-- Filter bar -->
  <div class="filter-bar">
    <button class="f-tab active" onclick="filterTab('all',this)">
      Toutes <span class="f-tab-count">12</span>
    </button>
    <button class="f-tab" onclick="filterTab('plant',this)">
      🌱 Plantation <span class="f-tab-count">3</span>
    </button>
    <button class="f-tab" onclick="filterTab('growth',this)">
      🌿 Croissance <span class="f-tab-count">5</span>
    </button>
    <button class="f-tab" onclick="filterTab('treat',this)">
      ⚗ Traitement <span class="f-tab-count">2</span>
    </button>
    <button class="f-tab" onclick="filterTab('harvest',this)">
      🌾 Récolte <span class="f-tab-count">2</span>
    </button>
    <div class="search-box">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
      <input type="text" placeholder="Rechercher une culture...">
    </div>
  </div>


  <!-- ════════════════════════════
       PARCELLE A — Nord
  ════════════════════════════ -->
  <div class="parcelle-section">
    <div class="parcelle-header">
      <div class="parcelle-photo">
        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=400&q=80&fit=crop" alt="Parcelle A">
        <div class="parcelle-photo-overlay"></div>
        <div class="parcelle-photo-ha">4.2<span> ha</span></div>
      </div>
      <div class="parcelle-meta">
        <div class="parcelle-meta-left">
          <div class="parcelle-name">Parcelle A — Nord</div>
          <div class="parcelle-sub">
            <span class="parcelle-loc"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>El Haouz, Marrakech</span>
            <span class="parcelle-sub-dot"></span>
            <span>4 cultures actives</span>
          </div>
        </div>
        <div class="parcelle-kpis">
          <div class="kpi"><div class="kpi-num">4</div><div class="kpi-lbl">Cultures</div></div>
          <div class="kpi-divider"></div>
          <div class="kpi"><div class="kpi-num">2.8t</div><div class="kpi-lbl">Rendement</div></div>
          <div class="kpi-divider"></div>
          <div class="kpi"><div class="kpi-num">J−6</div><div class="kpi-lbl">Récolte</div></div>
        </div>
        <div class="parcelle-actions">
          <span class="parcelle-status-tag pst-harvest">🌾 Récolte proche</span>
          <a href="/parcelles/1" class="btn-outline" style="padding:.4rem .875rem;font-size:.75rem;">Voir →</a>
        </div>
      </div>
    </div>

    <div class="crops-container">
      <div class="crops-grid-header">
        <span class="crops-grid-title">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>
          4 cultures
        </span>
        <button class="crops-add-btn">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
          Ajouter une culture
        </button>
      </div>

      <div class="crops-grid">

        <!-- Tomates -->
        <div class="crop-card">
          <div class="crop-photo">
            <img src="https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=300&q=80&fit=crop" alt="Tomates">
            <div class="crop-photo-overlay"></div>
            <span class="crop-stage-badge stage-harvest">🌾 Récolte</span>
            <span class="crop-yield-badge"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>1.2t</span>
            <div class="crop-cycle-bar"><div class="crop-cycle-fill fill-harvest" style="width:78%"></div></div>
          </div>
          <div class="crop-body">
            <div class="crop-name">Tomates Roma</div>
            <div class="crop-variety">Variété Roma VF · Semis direct</div>
            <div class="crop-meta-row">
              <span class="crop-date"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>15 Jan 2026</span>
              <div class="crop-progress">
                <div class="crop-progress-track"><div class="crop-progress-fill fill-harvest" style="width:78%"></div></div>
                <span style="color:var(--sage);font-size:.65rem;">78%</span>
              </div>
            </div>
            <div class="crop-actions">
              <button class="crop-action-btn cab-view"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>Voir</button>
              <button class="crop-action-btn cab-edit"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>Modifier</button>
              <button class="crop-action-btn cab-delete"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
            </div>
          </div>
        </div>

        <!-- Oignons -->
        <div class="crop-card">
          <div class="crop-photo">
            <img src="https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2?w=300&q=80&fit=crop" alt="Oignons">
            <div class="crop-photo-overlay"></div>
            <span class="crop-stage-badge stage-growth">🌿 Croissance</span>
            <span class="crop-yield-badge"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>0.8t</span>
            <div class="crop-cycle-bar"><div class="crop-cycle-fill fill-growth" style="width:52%"></div></div>
          </div>
          <div class="crop-body">
            <div class="crop-name">Oignons Rouges</div>
            <div class="crop-variety">Variété Red Baron · Transplant</div>
            <div class="crop-meta-row">
              <span class="crop-date"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>01 Fév 2026</span>
              <div class="crop-progress">
                <div class="crop-progress-track"><div class="crop-progress-fill fill-growth" style="width:52%"></div></div>
                <span style="color:var(--mint);font-size:.65rem;">52%</span>
              </div>
            </div>
            <div class="crop-actions">
              <button class="crop-action-btn cab-view"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>Voir</button>
              <button class="crop-action-btn cab-edit"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>Modifier</button>
              <button class="crop-action-btn cab-delete"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
            </div>
          </div>
        </div>

        <!-- Menthe -->
        <div class="crop-card">
          <div class="crop-photo">
            <img src="https://images.unsplash.com/photo-1628556270448-4d4e4148e1b1?w=300&q=80&fit=crop" alt="Menthe">
            <div class="crop-photo-overlay"></div>
            <span class="crop-stage-badge stage-treat">⚗ Traitement</span>
            <span class="crop-yield-badge"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>0.3t</span>
            <div class="crop-cycle-bar"><div class="crop-cycle-fill fill-treat" style="width:65%"></div></div>
          </div>
          <div class="crop-body">
            <div class="crop-name">Menthe Verte</div>
            <div class="crop-variety">Mentha spicata · Boutures</div>
            <div class="crop-meta-row">
              <span class="crop-date"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>20 Jan 2026</span>
              <div class="crop-progress">
                <div class="crop-progress-track"><div class="crop-progress-fill fill-treat" style="width:65%"></div></div>
                <span style="color:var(--amber);font-size:.65rem;">65%</span>
              </div>
            </div>
            <div class="crop-actions">
              <button class="crop-action-btn cab-view"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>Voir</button>
              <button class="crop-action-btn cab-edit"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>Modifier</button>
              <button class="crop-action-btn cab-delete"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
            </div>
          </div>
        </div>

        <!-- Piment -->
        <div class="crop-card">
          <div class="crop-photo">
            <img src="https://images.unsplash.com/photo-1583119022894-919a68a3d0e3?w=300&q=80&fit=crop" alt="Piment">
            <div class="crop-photo-overlay"></div>
            <span class="crop-stage-badge stage-plant">🌱 Plantation</span>
            <span class="crop-yield-badge"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>0.5t</span>
            <div class="crop-cycle-bar"><div class="crop-cycle-fill fill-plant" style="width:12%"></div></div>
          </div>
          <div class="crop-body">
            <div class="crop-name">Piment Doux</div>
            <div class="crop-variety">Capsicum annuum · Semis</div>
            <div class="crop-meta-row">
              <span class="crop-date"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>10 Mar 2026</span>
              <div class="crop-progress">
                <div class="crop-progress-track"><div class="crop-progress-fill fill-plant" style="width:12%"></div></div>
                <span style="color:#3b82f6;font-size:.65rem;">12%</span>
              </div>
            </div>
            <div class="crop-actions">
              <button class="crop-action-btn cab-view"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>Voir</button>
              <button class="crop-action-btn cab-edit"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>Modifier</button>
              <button class="crop-action-btn cab-delete"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
            </div>
          </div>
        </div>

      </div><!-- /crops-grid -->
    </div><!-- /crops-container -->
  </div><!-- /parcelle-section A -->


  <!-- ════════════════════════════
       PARCELLE B — Ouest
  ════════════════════════════ -->
  <div class="parcelle-section">
    <div class="parcelle-header">
      <div class="parcelle-photo">
        <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=400&q=80&fit=crop" alt="Parcelle B">
        <div class="parcelle-photo-overlay"></div>
        <div class="parcelle-photo-ha">6.8<span> ha</span></div>
      </div>
      <div class="parcelle-meta">
        <div class="parcelle-meta-left">
          <div class="parcelle-name">Parcelle B — Ouest</div>
          <div class="parcelle-sub">
            <span class="parcelle-loc"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>El Haouz, Marrakech</span>
            <span class="parcelle-sub-dot"></span>
            <span>3 cultures actives</span>
          </div>
        </div>
        <div class="parcelle-kpis">
          <div class="kpi"><div class="kpi-num">3</div><div class="kpi-lbl">Cultures</div></div>
          <div class="kpi-divider"></div>
          <div class="kpi"><div class="kpi-num">3.9t</div><div class="kpi-lbl">Rendement</div></div>
          <div class="kpi-divider"></div>
          <div class="kpi"><div class="kpi-num">J−28</div><div class="kpi-lbl">Récolte</div></div>
        </div>
        <div class="parcelle-actions">
          <span class="parcelle-status-tag pst-active">🌿 En croissance</span>
          <a href="/parcelles/2" class="btn-outline" style="padding:.4rem .875rem;font-size:.75rem;">Voir →</a>
        </div>
      </div>
    </div>

    <div class="crops-container">
      <div class="crops-grid-header">
        <span class="crops-grid-title">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>
          3 cultures
        </span>
        <button class="crops-add-btn">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
          Ajouter une culture
        </button>
      </div>
      <div class="crops-grid">

        <!-- Blé dur -->
        <div class="crop-card">
          <div class="crop-photo">
            <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=300&q=80&fit=crop" alt="Blé">
            <div class="crop-photo-overlay"></div>
            <span class="crop-stage-badge stage-growth">🌿 Croissance</span>
            <span class="crop-yield-badge"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>2.1t</span>
            <div class="crop-cycle-bar"><div class="crop-cycle-fill fill-growth" style="width:55%"></div></div>
          </div>
          <div class="crop-body">
            <div class="crop-name">Blé Dur</div>
            <div class="crop-variety">Triticum durum · Semis direct</div>
            <div class="crop-meta-row">
              <span class="crop-date"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>10 Déc 2025</span>
              <div class="crop-progress">
                <div class="crop-progress-track"><div class="crop-progress-fill fill-growth" style="width:55%"></div></div>
                <span style="color:var(--mint);font-size:.65rem;">55%</span>
              </div>
            </div>
            <div class="crop-actions">
              <button class="crop-action-btn cab-view"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>Voir</button>
              <button class="crop-action-btn cab-edit"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>Modifier</button>
              <button class="crop-action-btn cab-delete"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
            </div>
          </div>
        </div>

        <!-- Orge -->
        <div class="crop-card">
          <div class="crop-photo">
            <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=300&q=80&fit=crop" alt="Orge">
            <div class="crop-photo-overlay"></div>
            <span class="crop-stage-badge stage-growth">🌿 Croissance</span>
            <span class="crop-yield-badge"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>1.2t</span>
            <div class="crop-cycle-bar"><div class="crop-cycle-fill fill-growth" style="width:48%"></div></div>
          </div>
          <div class="crop-body">
            <div class="crop-name">Orge de Brasserie</div>
            <div class="crop-variety">Hordeum vulgare · Semis méca.</div>
            <div class="crop-meta-row">
              <span class="crop-date"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>15 Déc 2025</span>
              <div class="crop-progress">
                <div class="crop-progress-track"><div class="crop-progress-fill fill-growth" style="width:48%"></div></div>
                <span style="color:var(--mint);font-size:.65rem;">48%</span>
              </div>
            </div>
            <div class="crop-actions">
              <button class="crop-action-btn cab-view"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>Voir</button>
              <button class="crop-action-btn cab-edit"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>Modifier</button>
              <button class="crop-action-btn cab-delete"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
            </div>
          </div>
        </div>

        <!-- Tournesol -->
        <div class="crop-card">
          <div class="crop-photo">
            <img src="https://images.unsplash.com/photo-1530908295418-a12e326966ba?w=300&q=80&fit=crop" alt="Tournesol">
            <div class="crop-photo-overlay"></div>
            <span class="crop-stage-badge stage-plant">🌱 Plantation</span>
            <span class="crop-yield-badge"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg>0.6t</span>
            <div class="crop-cycle-bar"><div class="crop-cycle-fill fill-plant" style="width:8%"></div></div>
          </div>
          <div class="crop-body">
            <div class="crop-name">Tournesol</div>
            <div class="crop-variety">Helianthus annuus · Semis</div>
            <div class="crop-meta-row">
              <span class="crop-date"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>18 Mar 2026</span>
              <div class="crop-progress">
                <div class="crop-progress-track"><div class="crop-progress-fill fill-plant" style="width:8%"></div></div>
                <span style="color:#3b82f6;font-size:.65rem;">8%</span>
              </div>
            </div>
            <div class="crop-actions">
              <button class="crop-action-btn cab-view"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>Voir</button>
              <button class="crop-action-btn cab-edit"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>Modifier</button>
              <button class="crop-action-btn cab-delete"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div><!-- /parcelle-section B -->


  <!-- ════════════════════════════
       PARCELLE C — Sud (empty)
  ════════════════════════════ -->
  <div class="parcelle-section">
    <div class="parcelle-header">
      <div class="parcelle-photo">
        <img src="https://images.unsplash.com/photo-1518977676405-a97d9e26d8c3?w=400&q=80&fit=crop" alt="Parcelle C">
        <div class="parcelle-photo-overlay"></div>
        <div class="parcelle-photo-ha">3.1<span> ha</span></div>
      </div>
      <div class="parcelle-meta">
        <div class="parcelle-meta-left">
          <div class="parcelle-name">Parcelle C — Sud</div>
          <div class="parcelle-sub">
            <span class="parcelle-loc"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>El Haouz, Marrakech</span>
            <span class="parcelle-sub-dot"></span>
            <span>Aucune culture active</span>
          </div>
        </div>
        <div class="parcelle-kpis">
          <div class="kpi"><div class="kpi-num">0</div><div class="kpi-lbl">Cultures</div></div>
          <div class="kpi-divider"></div>
          <div class="kpi"><div class="kpi-num">—</div><div class="kpi-lbl">Rendement</div></div>
          <div class="kpi-divider"></div>
          <div class="kpi"><div class="kpi-num">—</div><div class="kpi-lbl">Récolte</div></div>
        </div>
        <div class="parcelle-actions">
          <span class="parcelle-status-tag pst-treat">🌱 Libre</span>
          <a href="/parcelles/3" class="btn-outline" style="padding:.4rem .875rem;font-size:.75rem;">Voir →</a>
        </div>
      </div>
    </div>

    <div class="crops-container">
      <div class="crops-grid-header">
        <span class="crops-grid-title">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>
          Aucune culture
        </span>
        <button class="crops-add-btn">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
          Ajouter une culture
        </button>
      </div>
      <div class="empty-crops">
        <div class="empty-crops-icon">🌾</div>
        <div class="empty-crops-title">Parcelle disponible</div>
        <div class="empty-crops-sub">Cette parcelle n'a aucune culture active. Commencez une nouvelle plantation.</div>
        <a href="/cultures/create?field=3" class="btn-add-crop">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
          Démarrer une culture
        </a>
      </div>
    </div>
  </div><!-- /parcelle-section C -->

</div><!-- /content -->
</div><!-- /main -->

<script>
function filterTab(stage, btn) {
    document.querySelectorAll('.f-tab').forEach(t => t.classList.remove('active'));
    btn.classList.add('active');
    // In a real app this would filter crop cards by data-stage attribute
}
</script>
</body>
</html>