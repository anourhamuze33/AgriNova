<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AgriNova — Gestion des Cultures</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --forest:#1b3a2d;--pine:#254d3a;--fern:#2e6b4f;
  --sage:#4a8c68;--mint:#6dbd8e;--dew:#b8dfc8;
  --fog:#e6f2eb;--parch:#f8f4ed;--cream:#fdfbf7;
  --muted:#5a6b55;--border:#c8dcc0;--text:#1a2318;
  --amber:#c98a12;--amber-bg:rgba(201,138,18,.1);
  --rust:#b84a1e;--rust-bg:rgba(184,74,30,.08);
  --blue:#2563eb;--blue-bg:rgba(37,99,235,.08);
  --white:#ffffff;--sidebar-w:250px;
}
html,body{height:100%;}
body{font-family:'Outfit',sans-serif;background:var(--parch);color:var(--text);display:flex;min-height:100vh;}

/* SIDEBAR */
.sidebar{width:var(--sidebar-w);flex-shrink:0;background:var(--white);border-right:1.5px solid var(--border);display:flex;flex-direction:column;height:100vh;position:sticky;top:0;overflow-y:auto;}
.sb-logo{background:linear-gradient(135deg,var(--forest) 0%,#2d6444 100%);padding:1.375rem 1.25rem;display:flex;align-items:center;gap:11px;text-decoration:none;flex-shrink:0;}
.sb-logo-svg{width:38px;height:38px;flex-shrink:0;}
.sb-brand{font-family:'Playfair Display',serif;font-size:1.25rem;font-weight:700;color:#fff;}
.sb-tagline{font-size:.58rem;color:rgba(184,223,200,.72);letter-spacing:.1em;text-transform:uppercase;margin-top:2px;}
.sb-sec{font-size:.58rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--muted);padding:.875rem 1.25rem .3rem;opacity:.7;}
.sb-nav{padding:.375rem .625rem;flex:1;}
.sb-link{display:flex;align-items:center;gap:10px;padding:.6rem .875rem;border-radius:10px;color:var(--muted);text-decoration:none;font-size:.8125rem;font-weight:600;margin-bottom:2px;transition:background .18s,color .18s;position:relative;}
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

/* MAIN */
.main{flex:1;display:flex;flex-direction:column;min-width:0;}
.content{padding:2.25rem 2.25rem 3rem;overflow-y:auto;flex:1;}

/* PAGE HEADER */
.page-hdr{display:flex;align-items:flex-end;justify-content:space-between;margin-bottom:1.75rem;padding-bottom:1.5rem;border-bottom:1.5px solid var(--border);}
.page-eyebrow{font-size:.65rem;font-weight:700;color:var(--sage);letter-spacing:.14em;text-transform:uppercase;margin-bottom:.5rem;display:flex;align-items:center;gap:8px;}
.page-eyebrow::before{content:'';width:20px;height:2px;background:var(--sage);border-radius:2px;}
.page-title{font-family:'Playfair Display',serif;font-size:2rem;font-weight:700;color:var(--forest);line-height:1.05;letter-spacing:-.02em;}
.page-title em{font-style:italic;color:var(--sage);}
.page-sub{font-size:.875rem;color:var(--muted);margin-top:.5rem;}
.page-hdr-right{display:flex;align-items:center;gap:.75rem;flex-shrink:0;}
.btn-primary{display:flex;align-items:center;gap:7px;padding:.6rem 1.25rem;background:var(--forest);color:#fff;font-weight:700;font-size:.8125rem;font-family:'Outfit',sans-serif;border:none;border-radius:10px;cursor:pointer;box-shadow:0 4px 14px rgba(27,58,45,.22);transition:background .2s;text-decoration:none;}
.btn-primary:hover{background:var(--fern);}
.btn-primary svg{width:14px;height:14px;}
.btn-outline{display:flex;align-items:center;gap:7px;padding:.6rem 1.125rem;background:var(--white);border:1.5px solid var(--border);color:var(--muted);font-weight:600;font-size:.8125rem;font-family:'Outfit',sans-serif;border-radius:10px;cursor:pointer;text-decoration:none;transition:background .2s,border-color .2s;}
.btn-outline:hover{background:var(--fog);border-color:var(--sage);color:var(--fern);}
.btn-outline svg{width:14px;height:14px;}

/* STATS */
.stats-row{display:grid;grid-template-columns:repeat(5,1fr);gap:1rem;margin-bottom:1.75rem;}
.st-card{background:var(--white);border:1.5px solid var(--border);border-radius:14px;padding:1rem 1.125rem;display:flex;align-items:center;gap:.875rem;transition:box-shadow .2s;}
.st-card:hover{box-shadow:0 4px 18px rgba(27,58,45,.08);}
.st-icon{width:40px;height:40px;border-radius:11px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.st-icon svg{width:20px;height:20px;}
.st-icon.g{background:rgba(74,140,104,.12);color:var(--sage);}
.st-icon.a{background:var(--amber-bg);color:var(--amber);}
.st-icon.r{background:var(--rust-bg);color:var(--rust);}
.st-icon.b{background:var(--blue-bg);color:var(--blue);}
.st-icon.p{background:rgba(109,189,142,.15);color:var(--mint);}
.st-num{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:var(--forest);line-height:1;}
.st-lbl{font-size:.68rem;font-weight:600;color:var(--muted);margin-top:2px;}

/* TOOLBAR */
.toolbar{display:flex;align-items:center;gap:.625rem;margin-bottom:1.375rem;flex-wrap:wrap;}
.f-tab{display:flex;align-items:center;gap:5px;padding:.4rem 1rem;border-radius:20px;border:1.5px solid var(--border);background:var(--white);color:var(--muted);font-size:.775rem;font-weight:700;cursor:pointer;transition:all .18s;font-family:'Outfit',sans-serif;}
.f-tab:hover{border-color:var(--sage);color:var(--fern);}
.f-tab.active{background:var(--forest);border-color:var(--forest);color:#fff;}
.ft-count{background:rgba(255,255,255,.25);border-radius:20px;padding:1px 7px;font-size:.6rem;font-weight:700;}
.f-tab:not(.active) .ft-count{background:var(--fog);color:var(--muted);}
.toolbar-right{display:flex;align-items:center;gap:.625rem;margin-left:auto;}
.search-wrap{display:flex;align-items:center;gap:6px;background:var(--white);border:1.5px solid var(--border);border-radius:10px;padding:.4rem .875rem;}
.search-wrap:focus-within{border-color:var(--sage);}
.search-wrap svg{width:14px;height:14px;color:var(--muted);}
.search-wrap input{border:none;outline:none;background:transparent;font-size:.8rem;font-family:'Outfit',sans-serif;color:var(--text);width:160px;}
.search-wrap input::placeholder{color:#aab5a4;}
.sort-sel{background:var(--white);border:1.5px solid var(--border);border-radius:10px;padding:.4rem .75rem;font-size:.775rem;font-family:'Outfit',sans-serif;color:var(--muted);cursor:pointer;outline:none;}

/* TABLE */
.table-wrap{background:var(--white);border:1.5px solid var(--border);border-radius:18px;overflow:hidden;}
.t-head{display:grid;grid-template-columns:2.4fr 1.2fr 1.1fr 1fr 1fr 1fr 1fr 0.9fr;padding:.7rem 1.25rem;background:var(--fog);border-bottom:1.5px solid var(--border);}
.th{font-size:.62rem;font-weight:800;letter-spacing:.08em;text-transform:uppercase;color:var(--muted);display:flex;align-items:center;gap:4px;cursor:pointer;}
.th:hover{color:var(--fern);}
.th svg{width:10px;height:10px;opacity:.5;}
.t-row{display:grid;grid-template-columns:2.4fr 1.2fr 1.1fr 1fr 1fr 1fr 1fr 0.9fr;padding:.875rem 1.25rem;border-bottom:1px solid var(--border);align-items:center;transition:background .15s;cursor:pointer;}
.t-row:last-child{border-bottom:none;}
.t-row:hover{background:var(--parch);}

.col-name{display:flex;align-items:center;gap:.875rem;}
.c-thumb{width:40px;height:40px;border-radius:9px;overflow:hidden;flex-shrink:0;border:1.5px solid var(--border);}
.c-thumb img{width:100%;height:100%;object-fit:cover;display:block;}
.c-crop-name{font-family:'Playfair Display',serif;font-size:.9rem;font-weight:700;color:var(--forest);line-height:1.1;}
.c-crop-id{font-size:.65rem;color:var(--muted);margin-top:2px;font-style:italic;}

.col-field{display:flex;align-items:center;gap:6px;font-size:.8rem;font-weight:600;color:var(--text);}
.f-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;}
.da{background:#4a8c68;}.db{background:#2563eb;}.dc{background:#c98a12;}.dd{background:#b84a1e;}

.col-cycle{font-size:.78rem;color:var(--muted);font-weight:500;}

.s-pill{font-size:.65rem;font-weight:700;padding:3px 9px;border-radius:20px;display:inline-flex;align-items:center;gap:3px;white-space:nowrap;}
.sp-spring{background:rgba(74,140,104,.12);color:var(--sage);}
.sp-summer{background:var(--amber-bg);color:var(--amber);}
.sp-autumn{background:var(--rust-bg);color:var(--rust);}
.sp-winter{background:var(--blue-bg);color:var(--blue);}

.col-date{font-size:.775rem;color:var(--text);font-weight:500;}
.col-date-note{font-size:.63rem;color:var(--muted);margin-top:2px;}
.urgent{color:var(--rust)!important;}
.warn{color:var(--amber)!important;}

.st-badge{font-size:.6rem;font-weight:800;letter-spacing:.04em;text-transform:uppercase;padding:4px 9px;border-radius:20px;display:inline-flex;align-items:center;gap:4px;white-space:nowrap;}
.st-badge::before{content:'';width:5px;height:5px;border-radius:50%;flex-shrink:0;}
.stb-plant{background:var(--blue-bg);color:var(--blue);}     .stb-plant::before{background:var(--blue);}
.stb-growth{background:rgba(74,140,104,.12);color:var(--sage);}  .stb-growth::before{background:var(--sage);}
.stb-treat{background:var(--amber-bg);color:var(--amber);}    .stb-treat::before{background:var(--amber);}
.stb-harvest{background:rgba(27,58,45,.1);color:var(--forest);} .stb-harvest::before{background:var(--forest);}
.stb-done{background:rgba(109,189,142,.15);color:var(--mint);} .stb-done::before{background:var(--mint);}

.prog-bar{height:3px;background:var(--fog);border-radius:2px;overflow:hidden;width:70px;margin-top:4px;}
.prog-fill{height:100%;border-radius:2px;}
.pf-plant{background:var(--blue);}.pf-growth{background:var(--mint);}.pf-treat{background:var(--amber);}.pf-harvest{background:var(--sage);}
.prog-pct{font-size:.6rem;color:var(--muted);margin-top:2px;}

.col-user{display:flex;align-items:center;gap:6px;}
.u-av{width:26px;height:26px;border-radius:50%;background:var(--forest);display:flex;align-items:center;justify-content:center;font-size:.58rem;font-weight:700;color:#fff;flex-shrink:0;}
.u-name{font-size:.72rem;color:var(--muted);}

.col-acts{display:flex;align-items:center;gap:.35rem;justify-content:flex-end;}
.a-btn{width:30px;height:30px;border-radius:8px;border:1.5px solid var(--border);background:var(--white);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:all .15s;}
.a-btn:hover{background:var(--fog);border-color:var(--sage);}
.a-btn.del:hover{background:var(--rust-bg);border-color:var(--rust);}
.a-btn svg{width:13px;height:13px;color:var(--muted);}
.a-btn.del svg{color:var(--rust);}

/* PAGINATION */
.pagination{display:flex;align-items:center;justify-content:space-between;padding:1rem 1.25rem;background:var(--fog);border-top:1.5px solid var(--border);}
.pag-info{font-size:.775rem;color:var(--muted);}
.pag-btns{display:flex;gap:.375rem;}
.pag-btn{width:32px;height:32px;border-radius:8px;border:1.5px solid var(--border);background:var(--white);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:.8rem;font-weight:700;color:var(--muted);transition:all .15s;font-family:'Outfit',sans-serif;}
.pag-btn:hover{background:var(--fog);border-color:var(--sage);color:var(--fern);}
.pag-btn.cur{background:var(--forest);border-color:var(--forest);color:#fff;}
.pag-btn svg{width:13px;height:13px;}

/* MODAL */
.overlay{display:none;position:fixed;inset:0;background:rgba(10,20,14,.55);z-index:1000;align-items:center;justify-content:center;backdrop-filter:blur(4px);}
.overlay.open{display:flex;}
.modal{background:var(--white);border-radius:22px;width:min(680px,94vw);max-height:90vh;overflow-y:auto;box-shadow:0 24px 80px rgba(0,0,0,.3);display:flex;flex-direction:column;}
.m-hdr{background:linear-gradient(135deg,var(--forest) 0%,#2d6444 100%);padding:1.375rem 1.75rem;display:flex;align-items:center;justify-content:space-between;flex-shrink:0;border-radius:22px 22px 0 0;}
.m-hdr h3{font-family:'Playfair Display',serif;font-size:1.2rem;font-weight:700;color:#fff;}
.m-hdr p{font-size:.72rem;color:rgba(184,223,200,.82);margin-top:3px;}
.m-close{width:32px;height:32px;border-radius:50%;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);display:flex;align-items:center;justify-content:center;cursor:pointer;transition:background .18s;}
.m-close:hover{background:rgba(255,255,255,.2);}
.m-close svg{width:15px;height:15px;color:#fff;}
.m-body{padding:1.75rem;}
.m-sec{display:flex;align-items:center;gap:7px;font-family:'Playfair Display',serif;font-size:.9rem;color:var(--forest);font-weight:600;padding-bottom:.5rem;border-bottom:1.5px solid var(--border);margin-bottom:1.125rem;}
.m-sec svg{width:14px;height:14px;color:var(--sage);}
.m-sec.gap{margin-top:1.5rem;}
.m-g2{display:grid;grid-template-columns:1fr 1fr;gap:1rem;margin-bottom:1rem;}
.m-field{margin-bottom:1rem;}
.m-lbl{display:flex;align-items:center;justify-content:space-between;font-size:.8125rem;font-weight:600;color:var(--pine);margin-bottom:.375rem;}
.req{color:var(--rust);}
.m-hint{font-size:.68rem;font-weight:400;color:var(--muted);}
.m-inp{width:100%;background:var(--parch);border:1.5px solid var(--border);border-radius:10px;padding:.625rem .875rem;font-size:.875rem;font-family:'Outfit',sans-serif;color:var(--text);outline:none;transition:border-color .2s,box-shadow .2s,background .2s;}
.m-inp::placeholder{color:#aab8a4;}
.m-inp:focus{border-color:var(--sage);background:var(--white);box-shadow:0 0 0 3px rgba(74,140,104,.12);}
select.m-inp{appearance:auto;cursor:pointer;}
.m-iw{position:relative;}
.m-iw .m-inp{padding-left:2.5rem;}
.m-ico{position:absolute;left:.75rem;top:50%;transform:translateY(-50%);color:var(--muted);display:flex;pointer-events:none;}
.m-ico svg{width:15px;height:15px;}

/* Status cards */
.sc-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:.5rem;margin-bottom:1rem;}
.sc{cursor:pointer;display:flex;flex-direction:column;align-items:center;gap:5px;padding:.625rem .5rem;background:var(--parch);border:1.5px solid var(--border);border-radius:11px;transition:all .18s;position:relative;}
.sc:hover{border-color:var(--sage);}
.sc.sel{border-color:var(--fern);background:var(--fog);box-shadow:0 0 0 2px rgba(74,140,104,.15);}
.sc input{display:none;}
.sc-em{font-size:1.25rem;line-height:1;}
.sc-lbl{font-size:.62rem;font-weight:700;text-align:center;color:var(--text);}
.sc-ck{position:absolute;top:5px;right:5px;width:14px;height:14px;background:var(--sage);border-radius:50%;display:flex;align-items:center;justify-content:center;opacity:0;transition:opacity .18s;}
.sc-ck svg{width:8px;height:8px;color:#fff;}
.sc.sel .sc-ck{opacity:1;}

.m-ftr{padding:1.125rem 1.75rem;background:var(--fog);border-top:1.5px solid var(--border);display:flex;align-items:center;justify-content:flex-end;gap:.75rem;flex-shrink:0;}
.btn-cancel{display:flex;align-items:center;gap:6px;padding:.575rem 1.25rem;background:var(--white);border:1.5px solid var(--border);color:var(--muted);font-weight:600;font-size:.8125rem;font-family:'Outfit',sans-serif;border-radius:10px;cursor:pointer;}
.btn-cancel:hover{background:var(--parch);}
.btn-cancel svg{width:13px;height:13px;}
.btn-save{display:flex;align-items:center;gap:6px;padding:.575rem 1.5rem;background:var(--forest);color:#fff;font-weight:700;font-size:.875rem;font-family:'Outfit',sans-serif;border:none;border-radius:10px;cursor:pointer;box-shadow:0 4px 14px rgba(27,58,45,.22);}
.btn-save:hover{background:var(--fern);}
.btn-save svg{width:13px;height:13px;}

/* Delete modal */
.del-box{background:var(--white);border-radius:18px;width:min(400px,92vw);padding:2rem;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,.3);}
.del-ico{width:56px;height:56px;background:var(--rust-bg);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;}
.del-ico svg{width:26px;height:26px;color:var(--rust);}
.del-title{font-family:'Playfair Display',serif;font-size:1.1rem;color:var(--forest);font-weight:700;margin-bottom:.5rem;}
.del-sub{font-size:.8125rem;color:var(--muted);line-height:1.55;margin-bottom:1.5rem;}
.del-acts{display:flex;gap:.75rem;justify-content:center;}
.btn-del{padding:.575rem 1.375rem;background:var(--rust);color:#fff;font-weight:700;font-size:.875rem;font-family:'Outfit',sans-serif;border:none;border-radius:10px;cursor:pointer;}
.btn-del:hover{background:#9a3d18;}
</style>
</head>
<body>

<!-- SIDEBAR -->
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
    </svg>
    <div><div class="sb-brand">AgriNova</div><div class="sb-tagline">Gestion Agricole</div></div>
  </a>
  <div class="sb-nav">
    <div class="sb-sec">Principal</div>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>Dashboard</a>
    <a href="#" class="sb-link active"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>Cultures<span class="sb-badge">12</span></a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/></svg>Recoltes</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg>Stocks</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Parcelles</a>
    <div class="sb-sec">Gestion</div>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Personnel</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Equipements</a>
  </div>
  <div class="sb-footer">
    <div class="sb-user">
      <div class="sb-avatar">MA</div>
      <div><div class="sb-uname">Mohamed Alami</div><div class="sb-urole">Agriculteur</div></div>
    </div>
  </div>
</aside>

<!-- MAIN -->
<div class="main">
<div class="content">

  <!-- Header -->
  <div class="page-hdr">
    <div>
      <div class="page-eyebrow">Exploitation El Haouz · Printemps 2026</div>
      <h1 class="page-title">Gestion des <em>Cultures</em></h1>
      <p class="page-sub">12 cultures actives sur 4 parcelles · Saison Printemps 2026</p>
    </div>
    <div class="page-hdr-right">
      <a href="/cultures/par-parcelle" class="btn-outline">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
        Par parcelle
      </a>
      <button class="btn-primary" onclick="openCreate()">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Nouvelle culture
      </button>
    </div>
  </div>

  <!-- Stats -->
  <div class="stats-row">
    <div class="st-card"><div class="st-icon g"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg></div><div><div class="st-num">12</div><div class="st-lbl">Total cultures</div></div></div>
    <div class="st-card"><div class="st-icon b"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg></div><div><div class="st-num">3</div><div class="st-lbl">Plantation</div></div></div>
    <div class="st-card"><div class="st-icon p"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"/></svg></div><div><div class="st-num">5</div><div class="st-lbl">Croissance</div></div></div>
    <div class="st-card"><div class="st-icon a"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.78 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/></svg></div><div><div class="st-num">2</div><div class="st-lbl">Traitement</div></div></div>
    <div class="st-card"><div class="st-icon r"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg></div><div><div class="st-num">2</div><div class="st-lbl">Recolte</div></div></div>
  </div>

  <!-- Toolbar -->
  <div class="toolbar">
    <button class="f-tab active" onclick="filterTab('all',this)">Toutes <span class="ft-count">12</span></button>
    <button class="f-tab" onclick="filterTab('plant',this)">🌱 Plantation <span class="ft-count">3</span></button>
    <button class="f-tab" onclick="filterTab('growth',this)">🌿 Croissance <span class="ft-count">5</span></button>
    <button class="f-tab" onclick="filterTab('treat',this)">⚗ Traitement <span class="ft-count">2</span></button>
    <button class="f-tab" onclick="filterTab('harvest',this)">🌾 Recolte <span class="ft-count">2</span></button>
    <div class="toolbar-right">
      <div class="search-wrap">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Rechercher...">
      </div>
      <select class="sort-sel">
        <option>Trier: Plantation</option>
        <option>Trier: Recolte proche</option>
        <option>Trier: Progression</option>
        <option>Trier: Parcelle</option>
      </select>
    </div>
  </div>

  <!-- Table -->
  <div class="table-wrap">
    <div class="t-head">
      <div class="th">Culture <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4"/></svg></div>
      <div class="th">Parcelle</div>
      <div class="th">Saison</div>
      <div class="th">Plantation</div>
      <div class="th">Recolte</div>
      <div class="th">Statut</div>
      <div class="th" style="justify-content:flex-end">Actions</div>
    </div>
    @foreach($cultures as $culture)
    <div class="t-row" onclick="openEdit({{$culture->id}})">
      <div class="col-name">
        <div class="c-thumb"><img src="{{asset('storage/Cultures/' . $culture->typeCulture->imgUrl)}}" alt="{{$culture->typeCulture->name}}"></div>
        <div><div class="c-crop-name">{{$culture->typeCulture->name}}</div><div class="c-crop-id">{{$culture->typeCulture->type}}</div></div>
      </div>
      <div class="col-field"><span class="f-dot da"></span>{{$culture->field->name}}</div>
      <div><span class="s-pill sp-spring">{{ucfirst($culture->season)}}</span></div>
      <div><div class="col-date">{{$culture->planting_date->format('d M Y')}}</div><div class="col-date-note">{{$culture->planting_date->diffInDays()}}</div></div>
      <div><div class="col-date">{{$culture->harvest_date->format('d M Y')}}</div></div>
      <div>
        <span class="st-badge stb-harvest">Recolte</span>
        <div class="prog-bar"><div class="prog-fill pf-harvest" style="width:78%"></div></div>
        <div class="prog-pct">78%</div>
      </div>
      <div class="col-acts" onclick="event.stopPropagation()">
        <button class="a-btn" title="Voir" onclick="openEdit(1)"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
        <button class="a-btn" title="Modifier"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
        <button class="a-btn del" onclick="openDel('Tomates Roma')"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
      </div>
    </div>
    @endforeach

    <!-- row 2 -->
    <div class="t-row" onclick="openEdit(2)">
      <div class="col-name">
        <div class="c-thumb"><img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=80&q=80&fit=crop" alt="Ble"></div>
        <div><div class="c-crop-name">Ble Dur</div><div class="c-crop-id">Crop #002 · Triticum durum</div></div>
      </div>
      <div class="col-field"><span class="f-dot db"></span>Parcelle B</div>
      <div class="col-cycle">Cycle C2-2026</div>
      <div><span class="s-pill sp-winter">❄️ Hiver</span></div>
      <div><div class="col-date">10 Dec 2025</div><div class="col-date-note">il y a 106j</div></div>
      <div><div class="col-date">25 Avr 2026</div><div class="col-date-note warn">J-30</div></div>
      <div>
        <span class="st-badge stb-growth">Croissance</span>
        <div class="prog-bar"><div class="prog-fill pf-growth" style="width:55%"></div></div>
        <div class="prog-pct">55%</div>
      </div>
      <div class="col-acts" onclick="event.stopPropagation()">
        <button class="a-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
        <button class="a-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
        <button class="a-btn del" onclick="openDel('Ble Dur')"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
      </div>
    </div>

    <!-- row 3 -->
    <div class="t-row" onclick="openEdit(3)">
      <div class="col-name">
        <div class="c-thumb"><img src="https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2?w=80&q=80&fit=crop" alt="Oignons"></div>
        <div><div class="c-crop-name">Oignons Rouges</div><div class="c-crop-id">Crop #003 · Allium cepa</div></div>
      </div>
      <div class="col-field"><span class="f-dot da"></span>Parcelle A</div>
      <div class="col-cycle">Cycle C3-2026</div>
      <div><span class="s-pill sp-spring">🌸 Printemps</span></div>
      <div><div class="col-date">01 Fev 2026</div><div class="col-date-note">il y a 53j</div></div>
      <div><div class="col-date">15 Mai 2026</div><div class="col-date-note">J-50</div></div>
      <div>
        <span class="st-badge stb-growth">Croissance</span>
        <div class="prog-bar"><div class="prog-fill pf-growth" style="width:52%"></div></div>
        <div class="prog-pct">52%</div>
      </div>
      <div class="col-acts" onclick="event.stopPropagation()">
        <button class="a-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
        <button class="a-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
        <button class="a-btn del" onclick="openDel('Oignons Rouges')"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
      </div>
    </div>

    <!-- row 4 -->
    <div class="t-row" onclick="openEdit(4)">
      <div class="col-name">
        <div class="c-thumb"><img src="https://images.unsplash.com/photo-1628556270448-4d4e4148e1b1?w=80&q=80&fit=crop" alt="Menthe"></div>
        <div><div class="c-crop-name">Menthe Verte</div><div class="c-crop-id">Crop #004 · Mentha spicata</div></div>
      </div>
      <div class="col-field"><span class="f-dot da"></span>Parcelle A</div>
      <div class="col-cycle">Cycle C4-2026</div>
      <div><span class="s-pill sp-spring">🌸 Printemps</span></div>
      <div><div class="col-date">20 Jan 2026</div><div class="col-date-note">il y a 65j</div></div>
      <div><div class="col-date">30 Mar 2026</div><div class="col-date-note warn">J-14</div></div>
      <div>
        <span class="st-badge stb-treat">Traitement</span>
        <div class="prog-bar"><div class="prog-fill pf-treat" style="width:65%"></div></div>
        <div class="prog-pct">65%</div>
      </div>
      <div class="col-acts" onclick="event.stopPropagation()">
        <button class="a-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
        <button class="a-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
        <button class="a-btn del" onclick="openDel('Menthe Verte')"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
      </div>
    </div>

    <!-- row 5 -->
    <div class="t-row" onclick="openEdit(5)">
      <div class="col-name">
        <div class="c-thumb"><img src="https://images.unsplash.com/photo-1530908295418-a12e326966ba?w=80&q=80&fit=crop" alt="Tournesol"></div>
        <div><div class="c-crop-name">Tournesol</div><div class="c-crop-id">Crop #005 · Helianthus annuus</div></div>
      </div>
      <div class="col-field"><span class="f-dot db"></span>Parcelle B</div>
      <div class="col-cycle">Cycle C5-2026</div>
      <div><span class="s-pill sp-spring">🌸 Printemps</span></div>
      <div><div class="col-date">18 Mar 2026</div><div class="col-date-note">il y a 8j</div></div>
      <div><div class="col-date">20 Jul 2026</div><div class="col-date-note">J-124</div></div>
      <div>
        <span class="st-badge stb-plant">Plantation</span>
        <div class="prog-bar"><div class="prog-fill pf-plant" style="width:8%"></div></div>
        <div class="prog-pct">8%</div>
      </div>
      <div class="col-acts" onclick="event.stopPropagation()">
        <button class="a-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg></button>
        <button class="a-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg></button>
        <button class="a-btn del" onclick="openDel('Tournesol')"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></button>
      </div>
    </div>

    <!-- Pagination -->
    <div class="pagination">
      <span class="pag-info">Affichage 1-5 sur 12 cultures</span>
      <div class="pag-btns">
        <button class="pag-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg></button>
        <button class="pag-btn cur">1</button>
        <button class="pag-btn">2</button>
        <button class="pag-btn">3</button>
        <button class="pag-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></button>
      </div>
    </div>
  </div>

</div>
</div>

<!-- CRUD MODAL -->
<div class="overlay" id="crudModal" onclick="closeCrudBg(event)">
  <div class="modal">
    <div class="m-hdr">
      <div>
        <h3 id="mTitle">Nouvelle Culture</h3>
        <p id="mSub">Renseignez tous les champs requis</p>
      </div>
      <div class="m-close" onclick="closeCrud()">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
      </div>
    </div>
    <div class="m-body">

      <!-- Section 1 -->
      <div class="m-sec">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/></svg>
        Identification
      </div>
      <div class="m-g2">
        <!-- crop_id -->
        <div>
          <div class="m-lbl"><span>Type de culture <span class="req">*</span></span></div>
          <div class="m-iw">
            <span class="m-ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg></span>
            <select name="crop_id" class="m-inp" required>
              <option value="">Selectionner une culture</option>
              <optgroup label="Legumes"><option>Tomates</option><option>Oignons</option><option>Pommes de terre</option><option>Carottes</option><option>Piment</option></optgroup>
              <optgroup label="Cereales"><option>Ble dur</option><option>Orge</option><option>Mais</option><option>Tournesol</option></optgroup>
              <optgroup label="Aromates"><option>Menthe</option><option>Coriandre</option><option>Persil</option></optgroup>
            </select>
          </div>
        </div>
        <!-- field_id -->
        <div>
          <div class="m-lbl"><span>Parcelle <span class="req">*</span></span></div>
          <div class="m-iw">
            <span class="m-ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg></span>
            <select name="field_id" class="m-inp" required>
              <option value="">Selectionner une parcelle</option>
              <option value="1">Parcelle A — Nord (4.2 ha)</option>
              <option value="2">Parcelle B — Ouest (6.8 ha)</option>
              <option value="3">Parcelle C — Sud (3.1 ha)</option>
              <option value="4">Parcelle D — Est (2.8 ha)</option>
            </select>
          </div>
        </div>
      </div>
      <div class="m-g2">
        <!-- cycle_id -->
        <div>
          <div class="m-lbl"><span>Cycle de culture <span class="req">*</span></span></div>
          <div class="m-iw">
            <span class="m-ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/></svg></span>
            <select name="cycle_id" class="m-inp" required>
              <option value="">Selectionner un cycle</option>
              <option value="1">Cycle C1-2026 (Jan–Mar)</option>
              <option value="2">Cycle C2-2026 (Fev–Avr)</option>
              <option value="3">Cycle C3-2026 (Mar–Mai)</option>
              <option value="4">Cycle C4-2026 (Avr–Juin)</option>
              <option value="5">Cycle C5-2026 (Mar–Jul)</option>
            </select>
          </div>
        </div>
        <!-- season -->
        <div>
          <div class="m-lbl"><span>Saison <span class="req">*</span></span></div>
          <div class="m-iw">
            <span class="m-ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg></span>
            <select name="season" class="m-inp" required>
              <option value="">Selectionner la saison</option>
              <option value="spring">🌸 Printemps</option>
              <option value="summer">☀️ Ete</option>
              <option value="autumn">🍂 Automne</option>
              <option value="winter">❄️ Hiver</option>
            </select>
          </div>
        </div>
      </div>

      <!-- Section 2 Dates -->
      <div class="m-sec gap">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        Dates
      </div>
      <div class="m-g2">
        <!-- planting_date -->
        <div>
          <div class="m-lbl"><span>Date de plantation <span class="req">*</span></span></div>
          <div class="m-iw">
            <span class="m-ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></span>
            <input type="date" name="planting_date" class="m-inp" required>
          </div>
        </div>
        <!-- harvest_date -->
        <div>
          <div class="m-lbl"><span>Date de recolte prevue <span class="req">*</span></span></div>
          <div class="m-iw">
            <span class="m-ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg></span>
            <input type="date" name="harvest_date" class="m-inp" required>
          </div>
        </div>
      </div>

      <!-- Section 3 Status -->
      <div class="m-sec gap">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
        Statut du cycle
      </div>
      <div class="sc-grid">
        <label class="sc sel" id="sc1">
          <input type="radio" name="status" value="planting" checked onchange="selStatus(this)">
          <div class="sc-em">🌱</div><div class="sc-lbl">Plantation</div>
          <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
        </label>
        <label class="sc" id="sc2">
          <input type="radio" name="status" value="growth" onchange="selStatus(this)">
          <div class="sc-em">🌿</div><div class="sc-lbl">Croissance</div>
          <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
        </label>
        <label class="sc" id="sc3">
          <input type="radio" name="status" value="treatment" onchange="selStatus(this)">
          <div class="sc-em">⚗️</div><div class="sc-lbl">Traitement</div>
          <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
        </label>
        <label class="sc" id="sc4">
          <input type="radio" name="status" value="harvest" onchange="selStatus(this)">
          <div class="sc-em">🌾</div><div class="sc-lbl">Recolte</div>
          <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
        </label>
        <label class="sc" id="sc5">
          <input type="radio" name="status" value="done" onchange="selStatus(this)">
          <div class="sc-em">✅</div><div class="sc-lbl">Termine</div>
          <div class="sc-ck"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
        </label>
      </div>

      <!-- Section 4 user -->
      <div class="m-sec gap">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
        Responsable
      </div>
      <!-- user_id -->
      <div>
        <div class="m-lbl"><span>Agriculteur responsable <span class="req">*</span></span></div>
        <div class="m-iw">
          <span class="m-ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg></span>
          <select name="user_id" class="m-inp" required>
            <option value="">Selectionner un responsable</option>
            <option value="1">Mohamed Alami (Agriculteur)</option>
            <option value="2">Karim Benali (Agriculteur)</option>
            <option value="3">Fatima Ouzir (Agriculteur)</option>
            <option value="4">Said El Mansouri (Ouvrier)</option>
          </select>
        </div>
      </div>
    </div>
    <div class="m-ftr">
      <button class="btn-cancel" onclick="closeCrud()">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>Annuler
      </button>
      <button class="btn-save">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>Enregistrer
      </button>
    </div>
  </div>
</div>

<!-- DELETE MODAL -->
<div class="overlay" id="delModal" onclick="closeDelBg(event)">
  <div class="del-box">
    <div class="del-ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg></div>
    <div class="del-title">Supprimer cette culture ?</div>
    <div class="del-sub" id="delTxt">Cette action est irreversible.</div>
    <div class="del-acts">
      <button class="btn-cancel" onclick="closeDel()">Annuler</button>
      <button class="btn-del">Oui, supprimer</button>
    </div>
  </div>
</div>

<script>
function openCreate(){document.getElementById('mTitle').textContent='Nouvelle Culture';document.getElementById('mSub').textContent='Renseignez tous les champs';document.getElementById('crudModal').classList.add('open');}
function openEdit(id){document.getElementById('mTitle').textContent='Modifier la Culture';document.getElementById('mSub').textContent='Culture #00'+id;document.getElementById('crudModal').classList.add('open');}
function closeCrud(){document.getElementById('crudModal').classList.remove('open');}
function closeCrudBg(e){if(e.target===document.getElementById('crudModal'))closeCrud();}
function openDel(n){document.getElementById('delTxt').textContent='La culture "'+n+'" sera definitivement supprimee.';document.getElementById('delModal').classList.add('open');}
function closeDel(){document.getElementById('delModal').classList.remove('open');}
function closeDelBg(e){if(e.target===document.getElementById('delModal'))closeDel();}
function selStatus(r){document.querySelectorAll('.sc').forEach(c=>c.classList.remove('sel'));r.closest('.sc').classList.add('sel');}
function filterTab(s,b){document.querySelectorAll('.f-tab').forEach(t=>t.classList.remove('active'));b.classList.add('active');}
document.addEventListener('keydown',e=>{if(e.key==='Escape'){closeCrud();closeDel();}});
</script>
</body>
</html>