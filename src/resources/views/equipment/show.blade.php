<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AgriNova — Detail Equipement</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --forest:#1b3a2d;--pine:#254d3a;--fern:#2e6b4f;
  --sage:#4a8c68;--mint:#6dbd8e;--dew:#b8dfc8;
  --fog:#e6f2eb;--parch:#f8f4ed;
  --muted:#5a6b55;--border:#c8dcc0;--text:#1a2318;
  --amber:#c98a12;--rust:#b84a1e;--blue:#2563eb;
  --purple:#7c3aed;--teal:#0d9488;
  --white:#ffffff;--sidebar-w:250px;
  --amber-bg:rgba(201,138,18,.1);
  --rust-bg:rgba(184,74,30,.08);
  --blue-bg:rgba(37,99,235,.08);
  --sage-bg:rgba(74,140,104,.1);
  --purple-bg:rgba(124,58,237,.08);
}
html,body{height:100%;}
body{font-family:'Outfit',sans-serif;background:var(--parch);color:var(--text);display:flex;min-height:100vh;}
::-webkit-scrollbar{width:5px;} ::-webkit-scrollbar-thumb{background:var(--dew);border-radius:4px;}

/* ══ SIDEBAR ══ */
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
.sb-badge.red{background:var(--rust);}
.sb-footer{padding:1rem .625rem;border-top:1px solid var(--border);}
.sb-user{display:flex;align-items:center;gap:10px;padding:.625rem .75rem;border-radius:10px;background:var(--fog);}
.sb-avatar{width:34px;height:34px;border-radius:50%;background:var(--forest);display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;color:#fff;flex-shrink:0;}
.sb-uname{font-size:.8125rem;font-weight:600;color:var(--text);}
.sb-urole{font-size:.65rem;color:var(--muted);margin-top:1px;}

/* ══ MAIN ══ */
.main{flex:1;min-width:0;display:flex;flex-direction:column;overflow:hidden;}
.scroll{overflow-y:auto;flex:1;}

/* ══ HERO BANNER ══ */
.hero{
  height:260px;position:relative;overflow:hidden;flex-shrink:0;
  background:linear-gradient(140deg,#1a2f3d 0%,var(--forest) 55%,#243d2b 100%);
}
.hero-deco{
  position:absolute;right:0;top:0;bottom:0;width:320px;
  background:url('https://images.unsplash.com/photo-1593508512255-86ab42a8e620?w=600&q=50&fit=crop') right center/cover;
  opacity:.07;
  mask-image:linear-gradient(to left,rgba(0,0,0,.5),transparent);
  -webkit-mask-image:linear-gradient(to left,rgba(0,0,0,.5),transparent);
}
.hero-glow{position:absolute;top:-10%;right:30%;width:500px;height:500px;background:radial-gradient(circle,rgba(109,189,142,.08) 0%,transparent 65%);pointer-events:none;}
.hero-inner{position:relative;z-index:2;height:100%;display:flex;flex-direction:column;justify-content:space-between;padding:1.5rem 2.25rem 0;}

.hero-topbar{display:flex;align-items:center;justify-content:space-between;}
.hero-breadcrumb{display:flex;align-items:center;gap:.5rem;font-size:.72rem;color:rgba(255,255,255,.45);}
.hero-breadcrumb a{color:rgba(255,255,255,.45);text-decoration:none;transition:color .18s;}
.hero-breadcrumb a:hover{color:rgba(255,255,255,.8);}
.hero-breadcrumb-sep{color:rgba(255,255,255,.22);}
.hero-breadcrumb-cur{color:rgba(255,255,255,.85);font-weight:600;}
.hero-actions{display:flex;align-items:center;gap:.625rem;}
.hbtn{display:flex;align-items:center;gap:6px;padding:.5rem 1.125rem;border-radius:10px;font-size:.8rem;font-weight:700;font-family:'Outfit',sans-serif;cursor:pointer;transition:all .18s;text-decoration:none;}
.hbtn-ghost{background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.2);color:rgba(255,255,255,.82);}
.hbtn-ghost:hover{background:rgba(255,255,255,.18);border-color:rgba(255,255,255,.35);}
.hbtn-amber{background:rgba(201,138,18,.25);border:1.5px solid rgba(201,138,18,.4);color:#f5c842;}
.hbtn-amber:hover{background:rgba(201,138,18,.4);}
.hbtn-rust{background:rgba(184,74,30,.2);border:1.5px solid rgba(184,74,30,.35);color:#f4907a;}
.hbtn-rust:hover{background:rgba(184,74,30,.35);}
.hbtn svg{width:13px;height:13px;}

.hero-bottom{padding-bottom:0;display:flex;align-items:flex-end;justify-content:space-between;}
.hero-left{}
.hero-eyebrow{display:inline-flex;align-items:center;gap:6px;font-size:.65rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(184,223,200,.65);margin-bottom:.625rem;}
.hero-eyebrow::before{content:'';width:16px;height:1.5px;background:rgba(184,223,200,.35);}
.hero-title{font-family:'Playfair Display',serif;font-size:2.25rem;font-weight:700;color:#fff;line-height:1.05;letter-spacing:-.025em;}
.hero-title em{font-style:italic;color:rgba(184,223,200,.85);}
.hero-meta{font-size:.8125rem;color:rgba(255,255,255,.4);margin-top:.5rem;display:flex;align-items:center;gap:.625rem;flex-wrap:wrap;}
.hero-meta-dot{width:3px;height:3px;border-radius:50%;background:rgba(255,255,255,.25);}
.hero-right{display:flex;align-items:flex-end;gap:1rem;padding-bottom:1.75rem;flex-shrink:0;}

/* Status glassy badge in hero */
.hero-status{
  display:inline-flex;align-items:center;gap:6px;
  backdrop-filter:blur(12px);border-radius:14px;
  padding:.75rem 1.125rem;
  font-size:.8rem;font-weight:700;
}
.hs-op    {background:rgba(74,140,104,.2);border:1px solid rgba(74,140,104,.3);color:var(--mint);}
.hs-mnt   {background:rgba(201,138,18,.2);border:1px solid rgba(201,138,18,.3);color:#f5c842;}
.hs-hs    {background:rgba(184,74,30,.2);border:1px solid rgba(184,74,30,.3);color:#f4907a;}
.hs-idle  {background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);color:rgba(255,255,255,.6);}
.hs-dot{width:8px;height:8px;border-radius:50%;}
.hs-op .hs-dot{background:var(--mint);box-shadow:0 0 0 3px rgba(109,189,142,.25);}
.hs-mnt .hs-dot{background:#f5c842;box-shadow:0 0 0 3px rgba(245,200,66,.25);}
.hs-hs .hs-dot{background:#f4907a;box-shadow:0 0 0 3px rgba(244,144,122,.25);}

/* ══ CONTENT ══ */
.content{padding:1.75rem 2.25rem 3rem;display:flex;flex-direction:column;gap:1.5rem;}

/* ══ BODY GRID ══ */
.body-grid{display:grid;grid-template-columns:1fr 340px;gap:1.5rem;align-items:start;}

/* ══ LEFT COLUMN ══ */
.left-col{display:flex;flex-direction:column;gap:1.25rem;}

/* ══ PANELS ══ */
.panel{background:var(--white);border:1.5px solid var(--border);border-radius:18px;overflow:hidden;}
.panel-hd{display:flex;align-items:center;justify-content:space-between;padding:.875rem 1.25rem;background:var(--fog);border-bottom:1.5px solid var(--border);}
.panel-title{font-family:'Playfair Display',serif;font-size:.975rem;font-weight:700;color:var(--forest);display:flex;align-items:center;gap:7px;}
.panel-title svg{width:15px;height:15px;color:var(--sage);}
.panel-link{font-size:.72rem;font-weight:700;color:var(--fern);text-decoration:none;cursor:pointer;}
.panel-link:hover{text-decoration:underline;}
.panel-body{padding:1.125rem 1.25rem;}

/* Info grid — equipment details */
.info-grid{display:grid;grid-template-columns:1fr 1fr;gap:.875rem;}
.info-item{
  background:var(--parch);border-radius:12px;
  padding:.875rem 1rem;
  border:1.5px solid var(--border);
  transition:border-color .18s;
}
.info-item:hover{border-color:var(--dew);}
.info-item.full{grid-column:span 2;}
.info-lbl{font-size:.6rem;font-weight:800;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);margin-bottom:5px;display:flex;align-items:center;gap:5px;}
.info-lbl svg{width:11px;height:11px;color:var(--sage);}
.info-val{font-size:.9375rem;font-weight:700;color:var(--forest);}
.info-val.mono{font-family:'DM Mono',monospace;}
.info-val.green{color:var(--sage);}
.info-val.amber{color:var(--amber);}
.info-val.rust {color:var(--rust);}
.info-sub{font-size:.68rem;color:var(--muted);margin-top:3px;}

/* Type badge inline */
.type-pill{display:inline-flex;align-items:center;gap:5px;font-size:.72rem;font-weight:700;padding:4px 10px;border-radius:20px;}
.tp-moto  {background:var(--amber-bg);color:var(--amber);}
.tp-irrig {background:var(--blue-bg);color:var(--blue);}
.tp-recolte{background:var(--sage-bg);color:var(--sage);}
.tp-stock {background:var(--purple-bg);color:var(--purple);}
.tp-transport{background:rgba(13,148,136,.08);color:var(--teal);}
.tp-autre {background:var(--fog);color:var(--muted);}

/* ══ ASSIGNED FIELDS SECTION ══ */
.assigned-list{display:flex;flex-direction:column;gap:.625rem;}
.field-row{
  display:flex;align-items:center;gap:.875rem;
  padding:.875rem 1rem;
  background:var(--parch);border:1.5px solid var(--border);
  border-radius:12px;transition:border-color .18s,background .18s;
}
.field-row:hover{border-color:var(--dew);background:var(--fog);}
.fr-dot-col{
  width:40px;height:40px;border-radius:11px;flex-shrink:0;
  display:flex;align-items:center;justify-content:center;font-size:1.125rem;
  border:1.5px solid var(--border);background:var(--white);
}
.fr-info{flex:1;min-width:0;}
.fr-name{font-family:'Playfair Display',serif;font-size:.9rem;font-weight:700;color:var(--forest);}
.fr-meta{font-size:.68rem;color:var(--muted);margin-top:3px;display:flex;align-items:center;gap:.375rem;flex-wrap:wrap;}
.fr-meta-dot{width:3px;height:3px;border-radius:50%;background:var(--dew);}
.fr-badges{display:flex;align-items:center;gap:.375rem;flex-shrink:0;}
.fr-ha{
  font-family:'DM Mono',monospace;font-size:.72rem;font-weight:700;
  background:var(--fog);color:var(--muted);
  border:1px solid var(--border);border-radius:6px;padding:2px 8px;
}
.fr-status{
  font-size:.6rem;font-weight:800;padding:3px 9px;border-radius:20px;
  text-transform:uppercase;letter-spacing:.04em;
}
.frs-active{background:var(--sage-bg);color:var(--sage);}
.frs-warn  {background:var(--amber-bg);color:var(--amber);}

/* Remove assignment button */
.fr-remove{
  display:flex;align-items:center;gap:5px;
  padding:5px 12px;border-radius:8px;
  background:var(--white);border:1.5px solid rgba(184,74,30,.25);
  color:var(--rust);font-size:.72rem;font-weight:700;
  font-family:'Outfit',sans-serif;cursor:pointer;
  transition:all .18s;flex-shrink:0;
}
.fr-remove:hover{background:var(--rust);color:#fff;border-color:var(--rust);}
.fr-remove svg{width:12px;height:12px;}

/* Empty state */
.empty-assigned{
  padding:2rem 1.5rem;text-align:center;
  border:2px dashed var(--border);border-radius:12px;
}
.ea-icon{font-size:2rem;margin-bottom:.625rem;}
.ea-title{font-size:.875rem;font-weight:700;color:var(--text);margin-bottom:.25rem;}
.ea-sub{font-size:.75rem;color:var(--muted);}

/* ══ ASSIGN FORM ══ */
.assign-form-card{
  background:var(--white);border:1.5px solid var(--border);border-radius:18px;
  overflow:hidden;
}
.afc-hdr{
  background:linear-gradient(135deg,var(--forest),#2d6444);
  padding:1.125rem 1.25rem;
  display:flex;align-items:center;gap:.75rem;
  position:relative;overflow:hidden;
}
.afc-hdr::after{content:'';position:absolute;top:-30px;right:-30px;width:140px;height:140px;background:radial-gradient(circle,rgba(109,189,142,.15) 0%,transparent 70%);pointer-events:none;}
.afc-icon{width:40px;height:40px;border-radius:12px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.afc-icon svg{width:20px;height:20px;color:var(--dew);}
.afc-title{font-family:'Playfair Display',serif;font-size:1rem;font-weight:700;color:#fff;}
.afc-sub{font-size:.68rem;color:rgba(184,223,200,.7);margin-top:2px;}

.afc-body{padding:1.25rem;}

/* Select field */
.afc-lbl{font-size:.8125rem;font-weight:600;color:var(--pine);margin-bottom:.4rem;display:block;}
.afc-select-wrap{position:relative;margin-bottom:1rem;}
.afc-select-wrap .ico{position:absolute;left:.75rem;top:50%;transform:translateY(-50%);color:var(--muted);display:flex;pointer-events:none;}
.afc-select-wrap .ico svg{width:15px;height:15px;}
.afc-sel{
  width:100%;background:var(--parch);border:1.5px solid var(--border);
  border-radius:10px;padding:.675rem .9rem .675rem 2.5rem;
  font-size:.875rem;font-family:'Outfit',sans-serif;color:var(--text);
  outline:none;appearance:auto;cursor:pointer;
  transition:border-color .2s,box-shadow .2s,background .2s;
}
.afc-sel:focus{border-color:var(--sage);background:var(--white);box-shadow:0 0 0 3px rgba(74,140,104,.12);}

/* Date fields side by side */
.afc-dates{display:grid;grid-template-columns:1fr 1fr;gap:.75rem;margin-bottom:1rem;}
.afc-date-field{}
.afc-date-lbl{font-size:.72rem;font-weight:600;color:var(--muted);margin-bottom:.3rem;display:block;}
.afc-date-inp{
  width:100%;background:var(--parch);border:1.5px solid var(--border);
  border-radius:9px;padding:.55rem .75rem;font-size:.8125rem;
  font-family:'Outfit',sans-serif;color:var(--text);outline:none;
  transition:border-color .2s,background .2s;
}
.afc-date-inp:focus{border-color:var(--sage);background:var(--white);}

/* Notes textarea */
.afc-notes{
  width:100%;background:var(--parch);border:1.5px solid var(--border);
  border-radius:10px;padding:.625rem .875rem;font-size:.8125rem;
  font-family:'Outfit',sans-serif;color:var(--text);
  outline:none;resize:none;line-height:1.6;height:72px;
  margin-bottom:1rem;
  transition:border-color .2s,background .2s;
}
.afc-notes:focus{border-color:var(--sage);background:var(--white);}
.afc-notes::placeholder{color:#aab5a4;}

/* Submit button */
.afc-submit{
  width:100%;display:flex;align-items:center;justify-content:center;gap:7px;
  padding:.7rem;background:var(--forest);color:#fff;
  font-weight:800;font-size:.875rem;font-family:'Outfit',sans-serif;
  border:none;border-radius:10px;cursor:pointer;
  box-shadow:0 4px 14px rgba(27,58,45,.22);
  transition:background .2s,transform .15s;
}
.afc-submit:hover{background:var(--fern);transform:translateY(-1px);}
.afc-submit svg{width:15px;height:15px;}

/* Field preview card when selected */
.field-preview{
  background:var(--fog);border:1.5px solid var(--dew);border-radius:10px;
  padding:.75rem .875rem;margin-bottom:1rem;
  display:none;
}
.field-preview.show{display:flex;align-items:center;gap:.75rem;}
.fp-icon{font-size:1.375rem;flex-shrink:0;}
.fp-name{font-family:'Playfair Display',serif;font-size:.875rem;font-weight:700;color:var(--forest);}
.fp-meta{font-size:.68rem;color:var(--muted);margin-top:2px;}

/* ══ RIGHT SIDEBAR ══ */
.right-col{display:flex;flex-direction:column;gap:1.125rem;position:sticky;top:1.75rem;}

/* Infos card */
.info-card{background:var(--white);border:1.5px solid var(--border);border-radius:16px;overflow:hidden;}
.ic-hdr{background:linear-gradient(135deg,var(--forest),#2a5c40);padding:.875rem 1.125rem;}
.ic-hdr span{font-family:'Playfair Display',serif;font-size:.95rem;color:#fff;font-weight:700;}
.ic-row{display:flex;align-items:center;justify-content:space-between;padding:.625rem 1.125rem;border-bottom:1px solid var(--border);font-size:.8125rem;}
.ic-row:last-child{border-bottom:none;}
.ic-key{color:var(--muted);}
.ic-val{font-weight:700;color:var(--text);}
.ic-val.green{color:var(--sage);}
.ic-val.amber{color:var(--amber);}
.ic-val.rust{color:var(--rust);}

/* Timeline / history */
.timeline{display:flex;flex-direction:column;gap:0;}
.tl-item{display:flex;align-items:flex-start;gap:.75rem;padding:.75rem 0;border-bottom:1px solid var(--border);position:relative;}
.tl-item:last-child{border-bottom:none;}
.tl-dot-col{position:relative;display:flex;flex-direction:column;align-items:center;}
.tl-dot{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:.7rem;}
.tl-dot.g{background:var(--sage-bg);color:var(--sage);}
.tl-dot.a{background:var(--amber-bg);color:var(--amber);}
.tl-dot.b{background:var(--blue-bg);color:var(--blue);}
.tl-dot.r{background:var(--rust-bg);color:var(--rust);}
.tl-line{width:2px;background:var(--border);flex:1;min-height:14px;margin-top:3px;}
.tl-item:last-child .tl-line{display:none;}
.tl-body{flex:1;}
.tl-text{font-size:.78rem;font-weight:500;color:var(--text);line-height:1.45;}
.tl-text strong{font-weight:700;color:var(--forest);}
.tl-time{font-size:.62rem;color:var(--muted);margin-top:3px;font-family:'DM Mono',monospace;}

/* Danger zone */
.danger-card{background:var(--white);border:1.5px solid rgba(184,74,30,.2);border-radius:16px;overflow:hidden;}
.dz-hdr{background:var(--rust-bg);border-bottom:1px solid rgba(184,74,30,.15);padding:.8rem 1.125rem;}
.dz-title{font-family:'Playfair Display',serif;font-size:.88rem;font-weight:700;color:var(--rust);display:flex;align-items:center;gap:6px;}
.dz-title svg{width:13px;height:13px;}
.dz-body{padding:.875rem 1.125rem;}
.dz-text{font-size:.75rem;color:var(--muted);line-height:1.55;margin-bottom:.875rem;}
.btn-del{width:100%;display:flex;align-items:center;justify-content:center;gap:7px;padding:.6rem;background:var(--white);border:1.5px solid rgba(184,74,30,.3);color:var(--rust);font-weight:700;font-size:.8125rem;font-family:'Outfit',sans-serif;border-radius:9px;cursor:pointer;transition:all .2s;}
.btn-del:hover{background:var(--rust);color:#fff;border-color:var(--rust);}
.btn-del svg{width:13px;height:13px;}
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
    </svg>
    <div><div class="sb-brand">AgriNova</div><div class="sb-tagline">Gestion Agricole</div></div>
  </a>
  <div class="sb-nav">
    <div class="sb-sec">Principal</div>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>Dashboard</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>Cultures</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>Recoltes</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg>Stocks</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Parcelles</a>
    <div class="sb-sec">Gestion</div>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Personnel</a>
    <a href="#" class="sb-link active"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Equipements</a>
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
<div class="scroll">

  <!-- HERO -->
  <div class="hero">
    <div class="hero-deco"></div>
    <div class="hero-glow"></div>
    <div class="hero-inner">

      <!-- topbar -->
      <div class="hero-topbar">
        <div class="hero-breadcrumb">
          <a href="/equipements">Equipements</a>
          <span class="hero-breadcrumb-sep">›</span>
          <span class="hero-breadcrumb-cur">Tracteur Massey Ferguson 135</span>
        </div>
        <div class="hero-actions">
          <a href="" class="hbtn hbtn-amber">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/></svg>
            Modifier
          </a>
          <a href="" class="hbtn hbtn-ghost">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
            Retour
          </a>
        </div>
      </div>

      <!-- bottom -->
      <div class="hero-bottom">
        <div class="hero-left">
          <div class="hero-eyebrow">Equipement agricole</div>
          <h1 class="hero-title">
            🚜 <em>{{ $equipement->name }}</em>
          </h1>
          <div class="hero-meta">
            <span>Ref. EQ-{{ str_pad($equipement->id, 3, '0', STR_PAD_LEFT) }}</span>
            <span class="hero-meta-dot"></span>
            <span>Achat : {{ $equipement->purchase_date->format('d M Y') }}</span>
            <span class="hero-meta-dot"></span>
            <span>{{ number_format($equipement->purchase_price, 0, ',', ' ') }} DH</span>
          </div>
        </div>
        <div class="hero-right">
          <div class="hero-status hs-op">
            <span class="hs-dot"></span>
            Operationnel
          </div>
        </div>
      </div>

    </div>
  </div>

  <!-- CONTENT -->
  <div class="content">
    <div class="body-grid">

      <!-- LEFT COLUMN -->
      <div class="left-col">

        <!-- Equipment Details -->
        <div class="panel">
          <div class="panel-hd">
            <span class="panel-title">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>
              Informations de l'equipement
            </span>
            <a href="" class="panel-link">Modifier →</a>
          </div>
          <div class="panel-body">
            <div class="info-grid">

              <div class="info-item">
                <div class="info-lbl"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066"/></svg>Nom</div>
                <div class="info-val">{{ $equipement->name }}</div>
              </div>

              <div class="info-item">
                <div class="info-lbl"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7"/></svg>Type</div>
                <div class="info-val">
                  <span class="type-pill tp-moto">🚜 {{ ucfirst($equipement->type) }}</span>
                </div>
              </div>

              <div class="info-item">
                <div class="info-lbl"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Statut</div>
                <div class="info-val green">✅ Operationnel</div>
                <div class="info-sub">Aucune maintenance requise</div>
              </div>

              <div class="info-item">
                <div class="info-lbl"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7"/></svg>Date d'achat</div>
                <div class="info-val mono">{{ $equipement->purchase_date->format('d M Y') }}</div>
                <div class="info-sub">il y a {{ $equipement->purchase_date->diffInYears(now()) }} ans</div>
              </div>

              <div class="info-item">
                <div class="info-lbl"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17"/></svg>Prix d'achat</div>
                <div class="info-val green mono">{{ number_format($equipement->purchase_price, 0, ',', ' ') }} DH</div>
                <div class="info-sub">Valeur d'acquisition</div>
              </div>

              <div class="info-item">
                <div class="info-lbl"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/></svg>Parcelles assignees</div>
                <div class="info-val">{{ $equipement->fields->count() }}</div>
                <div class="info-sub">{{ $equipement->fields->count() > 0 ? $equipement->fields->pluck('name')->join(', ') : 'Aucune parcelle' }}</div>
              </div>

            </div>
          </div>
        </div>

        <!-- ASSIGNED FIELDS -->
        <div class="panel">
          <div class="panel-hd">
            <span class="panel-title">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
              Parcelles assignees
            </span>
            <span style="font-size:.72rem;font-weight:700;color:var(--muted);">{{ $equipement->fields->count() }} parcelle(s)</span>
          </div>
          <div class="panel-body">

            @if ($equipement->fields->count() > 0)
            <div class="assigned-list">
              @foreach ($equipement->fields as $field)
              <div class="field-row">
                <div class="fr-dot-col">
                  @php
                    $emojis = ['A'=>'🌿','B'=>'🌾','C'=>'🌱','D'=>'🌻'];
                    $letter = strtoupper(substr($field->name, 0, 1));
                  @endphp
                  {{ $emojis[$letter] ?? '🌱' }}
                </div>
                <div class="fr-info">
                  <div class="fr-name">{{ $field->name }}</div>
                  <div class="fr-meta">
                    <span>{{ $field->location }}</span>
                    <span class="fr-meta-dot"></span>
                    <span>{{ $field->cultures_count ?? $field->cultures->count() }} culture(s)</span>
                    @if(isset($field->pivot->assigned_at))
                    <span class="fr-meta-dot"></span>
                    <span>Depuis {{ \Carbon\Carbon::parse($field->pivot->assigned_at)->format('d M Y') }}</span>
                    @endif
                  </div>
                </div>
                <div class="fr-badges">
                  <span class="fr-ha">{{ $field->size }} ha</span>
                  <span class="fr-status frs-active">Active</span>
                </div>
                <!-- Remove assignment -->
                <form action="" method="POST" onsubmit="return confirm('Retirer l\'assignation de cette parcelle ?')">
                  @csrf @method('DELETE')
                  <button type="submit" class="fr-remove">
                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                    Retirer
                  </button>
                </form>
              </div>
              @endforeach
            </div>
            @else
            <div class="empty-assigned">
              <div class="ea-icon">🌾</div>
              <div class="ea-title">Aucune parcelle assignee</div>
              <div class="ea-sub">Utilisez le formulaire ci-dessous pour assigner cet equipement a une parcelle</div>
            </div>
            @endif

          </div>
        </div>

        <!-- ASSIGN FORM — not a modal, inline form -->
        <div class="assign-form-card">
          <div class="afc-hdr">
            <div class="afc-icon">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            </div>
            <div>
              <div class="afc-title">Assigner a une parcelle</div>
              <div class="afc-sub">Choisissez une parcelle disponible pour cet equipement</div>
            </div>
          </div>

          <form action="" method="POST">
            @csrf
            <div class="afc-body">

              <!-- Field select -->
              <label class="afc-lbl">Parcelle <span style="color:var(--rust)">*</span></label>
              <div class="afc-select-wrap">
                <span class="ico"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg></span>
                <select name="field_id" class="afc-sel" onchange="previewField(this)" required>
                  <option value="">Choisir une parcelle...</option>
                  @foreach ($availableFields as $field)
                    <option value="{{ $field->id }}" data-size="{{ $field->size }}" data-loc="{{ $field->location }}" data-cultures="{{ $field->cultures->count() }}">
                      {{ $field->name }} — {{ $field->location }} ({{ $field->size }} ha)
                    </option>
                  @endforeach
                </select>
              </div>

              <!-- Field preview -->
              <div class="field-preview" id="fieldPreview">
                <div class="fp-icon" id="fpIcon">🌿</div>
                <div>
                  <div class="fp-name" id="fpName">-</div>
                  <div class="fp-meta" id="fpMeta">-</div>
                </div>
              </div>

              <!-- Dates -->
              <div class="afc-dates">
                <div class="afc-date-field">
                  <label class="afc-date-lbl">Date de debut</label>
                  <input type="date" name="start_date" class="afc-date-inp" value="{{ now()->format('Y-m-d') }}">
                </div>
                <div class="afc-date-field">
                  <label class="afc-date-lbl">Date de fin prevue</label>
                  <input type="date" name="end_date" class="afc-date-inp">
                </div>
              </div>

              <!-- Notes -->
              <textarea name="notes" class="afc-notes" placeholder="Notes sur l'utilisation de cet equipement sur cette parcelle (optionnel)..."></textarea>

              <button type="submit" class="afc-submit">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                Assigner l'equipement a cette parcelle
              </button>

            </div>
          </form>
        </div>

      </div><!-- /left-col -->

      <!-- RIGHT COLUMN -->
      <div class="right-col">

        <!-- Quick info card -->
        <div class="info-card">
          <div class="ic-hdr"><span>Fiche equipement</span></div>
          <div class="ic-row"><span class="ic-key">Nom</span><span class="ic-val">{{ $equipement->name }}</span></div>
          <div class="ic-row"><span class="ic-key">Type</span><span class="ic-val">🚜 {{ ucfirst($equipement->type) }}</span></div>
          <div class="ic-row"><span class="ic-key">Statut</span><span class="ic-val green">Operationnel</span></div>
          <div class="ic-row"><span class="ic-key">Date achat</span><span class="ic-val">{{ $equipement->purchase_date->format('d M Y') }}</span></div>
          <div class="ic-row"><span class="ic-key">Prix</span><span class="ic-val amber">{{ number_format($equipement->purchase_price, 0, ',', ' ') }} DH</span></div>
          <div class="ic-row"><span class="ic-key">Age</span><span class="ic-val">{{ $equipement->purchase_date->diffInYears(now()) }} ans</span></div>
          <div class="ic-row"><span class="ic-key">Parcelles</span><span class="ic-val">{{ $equipement->fields->count() }} assignee(s)</span></div>
        </div>

        <!-- Activity timeline -->
        <div class="panel">
          <div class="panel-hd">
            <span class="panel-title">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
              Historique
            </span>
          </div>
          <div class="panel-body" style="padding:.875rem 1.125rem;">
            <div class="timeline">
              <div class="tl-item">
                <div class="tl-dot-col"><div class="tl-dot g">✅</div><div class="tl-line"></div></div>
                <div class="tl-body">
                  <div class="tl-text">Assigne a <strong>Parcelle A</strong></div>
                  <div class="tl-time">15 Jan 2026 · Mohamed Alami</div>
                </div>
              </div>
              <div class="tl-item">
                <div class="tl-dot-col"><div class="tl-dot a">⚙️</div><div class="tl-line"></div></div>
                <div class="tl-body">
                  <div class="tl-text">Revision annuelle effectuee</div>
                  <div class="tl-time">10 Dec 2025 · Technicien</div>
                </div>
              </div>
              <div class="tl-item">
                <div class="tl-dot-col"><div class="tl-dot b">📋</div><div class="tl-line"></div></div>
                <div class="tl-body">
                  <div class="tl-text">Equipement enregistre dans le systeme</div>
                  <div class="tl-time">12 Jan 2020 · Admin</div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Danger zone -->
        <div class="danger-card">
          <div class="dz-hdr">
            <div class="dz-title"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>Zone dangereuse</div>
          </div>
          <div class="dz-body">
            <div class="dz-text">La suppression est <strong>irreversible</strong>. Toutes les assignations seront supprimees.</div>
            <form action="" method="POST" onsubmit="return confirm('Supprimer cet equipement ?')">
              @csrf @method('DELETE')
              <button type="submit" class="btn-del">
                <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/></svg>
                Supprimer l'equipement
              </button>
            </form>
          </div>
        </div>

      </div><!-- /right-col -->
    </div><!-- /body-grid -->
  </div><!-- /content -->

</div>
</div>

<script>
const fieldEmojis = {'A':'🌿','B':'🌾','C':'🌱','D':'🌻'};

function previewField(sel) {
  const opt = sel.options[sel.selectedIndex];
  const preview = document.getElementById('fieldPreview');

  if (!sel.value) {
    preview.classList.remove('show');
    return;
  }

  const name = opt.text.split(' — ')[0];
  const letter = name.trim().charAt(name.indexOf(' ') + 1).toUpperCase();
  const size = opt.dataset.size;
  const loc  = opt.dataset.loc;
  const cultures = opt.dataset.cultures;

  document.getElementById('fpIcon').textContent = fieldEmojis[letter] || '🌱';
  document.getElementById('fpName').textContent = name;
  document.getElementById('fpMeta').textContent = loc + ' · ' + size + ' ha · ' + cultures + ' culture(s)';
  preview.classList.add('show');
}
</script>
</body>
</html>