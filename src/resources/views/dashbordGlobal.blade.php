<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AgriNova — Tableau de Bord</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --forest:#1b3a2d; --pine:#254d3a; --fern:#2e6b4f;
  --sage:#4a8c68;   --mint:#6dbd8e; --dew:#b8dfc8;
  --fog:#e6f2eb;    --parch:#f8f4ed; --cream:#fdfbf7;
  --straw:#e8d5a0;  --muted:#5a6b55; --border:#c8dcc0;
  --text:#1a2318;   --amber:#c98a12; --rust:#b84a1e;
  --blue:#2563eb;   --white:#ffffff;
  --sidebar-w:250px;
  --amber-bg:rgba(201,138,18,.1);
  --rust-bg:rgba(184,74,30,.08);
  --blue-bg:rgba(37,99,235,.08);
  --sage-bg:rgba(74,140,104,.1);
}

html,body{height:100%;}
body{font-family:'Outfit',sans-serif;background:var(--parch);color:var(--text);display:flex;min-height:100vh;}
::-webkit-scrollbar{width:5px;} ::-webkit-scrollbar-thumb{background:var(--dew);border-radius:4px;}

/* ══ SIDEBAR ══ */
.sidebar{width:var(--sidebar-w);flex-shrink:0;background:var(--white);border-right:1.5px solid var(--border);display:flex;flex-direction:column;height:100vh;position:sticky;top:0;overflow-y:auto;}
.sb-logo{background:linear-gradient(135deg,var(--forest) 0%,#2d6444 100%);padding:1.375rem 1.25rem;display:flex;align-items:center;gap:11px;text-decoration:none;flex-shrink:0;}
.sb-logo-svg{width:40px;height:40px;flex-shrink:0;}
.sb-brand{font-family:'Playfair Display',serif;font-size:1.3rem;font-weight:700;color:#fff;letter-spacing:.01em;line-height:1;}
.sb-tagline{font-size:.6rem;color:rgba(184,223,200,.75);letter-spacing:.1em;text-transform:uppercase;margin-top:3px;}
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
.sb-avatar{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,var(--fern),var(--mint));display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:800;color:#fff;flex-shrink:0;}
.sb-uname{font-size:.8125rem;font-weight:700;color:var(--forest);}
.sb-urole{font-size:.65rem;color:var(--muted);margin-top:1px;}

/* ══ MAIN ══ */
.main{flex:1;min-width:0;display:flex;flex-direction:column;overflow:hidden;}
.scroll{overflow-y:auto;flex:1;}

/* ══ HERO BANNER ══ */
.hero{
  height:300px;position:relative;overflow:hidden;flex-shrink:0;
}
.hero-bg{
  position:absolute;inset:0;
  background:url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1600&q=80&fit=crop') center/cover;
}
.hero-overlay{
  position:absolute;inset:0;
  background:linear-gradient(
    170deg,
    rgba(10,24,14,.72) 0%,
    rgba(27,58,45,.58) 50%,
    rgba(18,38,24,.48) 100%
  );
}

/* topbar inside hero */
.hero-topbar{
  position:relative;z-index:3;
  display:flex;align-items:center;justify-content:space-between;
  padding:1.375rem 2.25rem;
}
.hero-topbar-left{display:flex;flex-direction:column;}
.tb-eyebrow{font-size:.62rem;color:rgba(255,255,255,.45);font-weight:500;letter-spacing:.06em;text-transform:uppercase;}
.tb-title{font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:700;color:#fff;margin-top:2px;}
.tb-right{display:flex;align-items:center;gap:.875rem;}

.tb-date{
  font-size:.78rem;color:rgba(255,255,255,.55);
  background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);
  border-radius:20px;padding:5px 13px;display:flex;align-items:center;gap:6px;
}
.tb-date svg{width:13px;height:13px;}

.tb-notif{
  width:36px;height:36px;border-radius:50%;
  background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.18);
  display:flex;align-items:center;justify-content:center;cursor:pointer;position:relative;
  transition:background .18s;
}
.tb-notif:hover{background:rgba(255,255,255,.18);}
.tb-notif svg{width:17px;height:17px;color:#fff;}
.notif-dot{position:absolute;top:7px;right:7px;width:7px;height:7px;background:var(--amber);border-radius:50%;border:2px solid transparent;}

.tb-add{
  display:flex;align-items:center;gap:7px;
  padding:.5rem 1.125rem;
  background:var(--mint);border:none;border-radius:10px;
  color:var(--forest);font-size:.8125rem;font-weight:800;
  font-family:'Outfit',sans-serif;cursor:pointer;
  box-shadow:0 4px 14px rgba(109,189,142,.3);
  transition:background .2s;
}
.tb-add:hover{background:#7ed4a0;}
.tb-add svg{width:14px;height:14px;}

/* Hero main content */
.hero-content{
  position:absolute;z-index:2;
  bottom:0;left:0;right:0;
  padding:0 2.25rem 1.5rem;
  display:flex;align-items:flex-end;justify-content:space-between;
}
.hero-left{}
.hero-eyebrow{
  display:inline-flex;align-items:center;gap:7px;
  font-size:.65rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;
  color:rgba(184,223,200,.75);margin-bottom:.625rem;
}
.hero-eyebrow::before{content:'';width:18px;height:1.5px;background:rgba(184,223,200,.4);}
.hero-title{
  font-family:'Playfair Display',serif;
  font-size:2.5rem;font-weight:700;
  color:#fff;line-height:1.05;letter-spacing:-.03em;
}
.hero-title em{font-style:italic;color:rgba(184,223,200,.85);}
.hero-sub{font-size:.875rem;color:rgba(255,255,255,.45);margin-top:.5rem;}

/* Hero glassy stats strip */
.hero-stats{
  display:flex;gap:1rem;align-items:flex-end;padding-bottom:.25rem;
}
.hstat{
  background:rgba(255,255,255,.1);
  border:1px solid rgba(255,255,255,.15);
  border-radius:14px;
  backdrop-filter:blur(12px);
  padding:.875rem 1.125rem;text-align:center;min-width:90px;
}
.hstat-num{font-family:'Playfair Display',serif;font-size:1.625rem;font-weight:700;color:#fff;line-height:1;}
.hstat-lbl{font-size:.6rem;color:rgba(255,255,255,.45);text-transform:uppercase;letter-spacing:.08em;margin-top:3px;}
.hstat-trend{font-size:.62rem;font-weight:700;margin-top:4px;}
.ht-up{color:var(--mint);}
.ht-dn{color:#f4907a;}

/* ══ CONTENT ══ */
.content{padding:1.75rem 2.25rem 3rem;}

/* ══ KPI STRIP ══ */
.kpi-strip{
  display:grid;grid-template-columns:repeat(4,1fr);
  gap:1rem;margin-bottom:1.625rem;
}
.kpi-card{
  background:var(--white);border:1.5px solid var(--border);border-radius:16px;
  padding:1.125rem 1.25rem;
  display:flex;align-items:center;gap:.875rem;
  transition:box-shadow .2s,transform .2s;cursor:default;
}
.kpi-card:hover{box-shadow:0 6px 22px rgba(27,58,45,.09);transform:translateY(-2px);}
.kpi-icon{width:42px;height:42px;border-radius:12px;display:flex;align-items:center;justify-content:center;flex-shrink:0;}
.kpi-icon svg{width:21px;height:21px;}
.ki-g{background:var(--sage-bg);color:var(--sage);}
.ki-a{background:var(--amber-bg);color:var(--amber);}
.ki-r{background:var(--rust-bg);color:var(--rust);}
.ki-b{background:var(--blue-bg);color:var(--blue);}
.kpi-num{font-family:'Playfair Display',serif;font-size:1.75rem;font-weight:700;color:var(--forest);line-height:1;}
.kpi-lbl{font-size:.7rem;font-weight:600;color:var(--muted);margin-top:2px;}
.kpi-sub{font-size:.63rem;color:var(--muted);margin-top:1px;}

/* ══ MAIN GRID LAYOUT ══ */
.main-grid{display:grid;grid-template-columns:1fr 330px;gap:1.5rem;margin-bottom:1.625rem;}

/* ══ PANEL SHARED ══ */
.panel{background:var(--white);border:1.5px solid var(--border);border-radius:18px;overflow:hidden;}
.panel-head{
  display:flex;align-items:center;justify-content:space-between;
  padding:.875rem 1.25rem;
  background:var(--fog);border-bottom:1.5px solid var(--border);
}
.panel-title{
  font-family:'Playfair Display',serif;font-size:.975rem;font-weight:700;color:var(--forest);
  display:flex;align-items:center;gap:7px;
}
.panel-title svg{width:15px;height:15px;color:var(--sage);}
.panel-link{font-size:.72rem;font-weight:700;color:var(--fern);text-decoration:none;}
.panel-link:hover{text-decoration:underline;}
.panel-body{padding:1rem 1.25rem;}

/* ══ ACTIVITY FEED (left panel) ══ */
.act-list{display:flex;flex-direction:column;}
.act-item{
  display:flex;align-items:flex-start;gap:.875rem;
  padding:.875rem 0;border-bottom:1px solid var(--border);
  position:relative;
}
.act-item:last-child{border-bottom:none;}
.act-dot-col{display:flex;flex-direction:column;align-items:center;gap:0;flex-shrink:0;}
.act-dot{
  width:32px;height:32px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;font-size:.8rem;
  flex-shrink:0;
}
.act-dot.g{background:var(--sage-bg);}
.act-dot.a{background:var(--amber-bg);}
.act-dot.r{background:var(--rust-bg);}
.act-dot.b{background:var(--blue-bg);}
.act-line{width:2px;background:var(--border);flex:1;margin-top:4px;min-height:20px;}
.act-item:last-child .act-line{display:none;}
.act-body{flex:1;}
.act-text{font-size:.8125rem;font-weight:500;color:var(--text);line-height:1.45;}
.act-text strong{font-weight:700;color:var(--forest);}
.act-time{font-size:.65rem;color:var(--muted);margin-top:3px;font-family:'DM Mono',monospace;}
.act-badge{
  font-size:.58rem;font-weight:800;padding:2px 8px;border-radius:20px;
  margin-left:6px;vertical-align:middle;
}
.ab-g{background:var(--sage-bg);color:var(--sage);}
.ab-a{background:var(--amber-bg);color:var(--amber);}
.ab-r{background:var(--rust-bg);color:var(--rust);}

/* ══ QUICK ACCESS MODULES (right panel) ══ */
.modules-grid{
  display:grid;grid-template-columns:1fr 1fr;
  gap:.625rem;padding:1rem 1.25rem;
}
.module-btn{
  display:flex;flex-direction:column;align-items:center;gap:.5rem;
  padding:.875rem .5rem 1rem;
  border-radius:14px;border:1.5px solid var(--border);
  background:var(--parch);cursor:pointer;text-decoration:none;
  transition:all .2s;
}
.module-btn:hover{border-color:var(--sage);background:var(--fog);transform:translateY(-2px);box-shadow:0 6px 18px rgba(27,58,45,.09);}
.mb-icon{width:44px;height:44px;border-radius:12px;display:flex;align-items:center;justify-content:center;}
.mb-icon svg{width:22px;height:22px;}
.mb-i-g{background:var(--sage-bg);color:var(--sage);}
.mb-i-a{background:var(--amber-bg);color:var(--amber);}
.mb-i-r{background:var(--rust-bg);color:var(--rust);}
.mb-i-b{background:var(--blue-bg);color:var(--blue);}
.mb-i-p{background:rgba(124,58,237,.08);color:#7c3aed;}
.mb-i-t{background:rgba(13,148,136,.08);color:#0d9488;}
.mb-lbl{font-size:.72rem;font-weight:700;color:var(--text);text-align:center;}
.mb-count{font-size:.6rem;color:var(--muted);text-align:center;}

/* ══ BOTTOM ROW: 3 panels ══ */
.bottom-row{display:grid;grid-template-columns:1fr 1fr 1fr;gap:1.5rem;margin-bottom:1.625rem;}

/* Stock alerts */
.stock-item{
  display:flex;align-items:center;gap:.875rem;
  padding:.75rem 1.25rem;border-bottom:1px solid var(--border);
  cursor:pointer;transition:background .15s;
}
.stock-item:last-child{border-bottom:none;}
.stock-item:hover{background:rgba(248,244,237,.6);}
.stock-icon{
  width:36px;height:36px;border-radius:10px;
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.stock-icon.r{background:var(--rust-bg);}  .stock-icon.r svg{color:var(--rust);}
.stock-icon.a{background:var(--amber-bg);} .stock-icon.a svg{color:var(--amber);}
.stock-icon svg{width:17px;height:17px;}
.stock-info{flex:1;}
.stock-name{font-size:.8rem;font-weight:700;color:var(--text);}
.stock-sub{font-size:.68rem;color:var(--muted);margin-top:2px;}
.stock-qty{text-align:right;flex-shrink:0;}
.stock-num{font-family:'DM Mono',monospace;font-size:1rem;font-weight:700;}
.stock-num.r{color:var(--rust);}  .stock-num.a{color:var(--amber);}
.stock-unit{font-size:.62rem;color:var(--muted);}

/* Upcoming harvests */
.uh-item{
  display:flex;align-items:center;gap:.875rem;
  padding:.75rem 1.25rem;border-bottom:1px solid var(--border);
  cursor:pointer;transition:background .15s;
}
.uh-item:last-child{border-bottom:none;}
.uh-item:hover{background:rgba(248,244,237,.6);}
.uh-cal{
  width:40px;height:40px;border-radius:10px;flex-shrink:0;
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  border:1.5px solid transparent;
}
.uh-cal.ur{background:rgba(184,74,30,.08);border-color:rgba(184,74,30,.18);}
.uh-cal.wn{background:rgba(201,138,18,.08);border-color:rgba(201,138,18,.18);}
.uh-cal.ok{background:var(--sage-bg);border-color:rgba(74,140,104,.18);}
.uh-day{font-family:'Playfair Display',serif;font-size:.95rem;font-weight:700;line-height:1;}
.uh-cal.ur .uh-day{color:var(--rust);}
.uh-cal.wn .uh-day{color:var(--amber);}
.uh-cal.ok .uh-day{color:var(--sage);}
.uh-mon{font-size:.5rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-top:1px;}
.uh-cal.ur .uh-mon{color:var(--rust);}
.uh-cal.wn .uh-mon{color:var(--amber);}
.uh-cal.ok .uh-mon{color:var(--sage);}
.uh-info{flex:1;}
.uh-name{font-size:.8rem;font-weight:700;color:var(--text);}
.uh-sub{font-size:.68rem;color:var(--muted);margin-top:2px;}
.uh-tag{font-size:.58rem;font-weight:800;padding:2px 8px;border-radius:20px;}
.uht-ur{background:var(--rust-bg);color:var(--rust);}
.uht-wn{background:var(--amber-bg);color:var(--amber);}
.uht-ok{background:var(--sage-bg);color:var(--sage);}

/* Weather panel */
.weather-body{padding:0;}
.weather-top{
  background:linear-gradient(135deg,var(--forest),#2a5c40);
  padding:1.25rem;display:flex;align-items:center;justify-content:space-between;
}
.w-left{}
.w-loc{font-size:.62rem;color:rgba(255,255,255,.42);text-transform:uppercase;letter-spacing:.07em;}
.w-temp{font-family:'Playfair Display',serif;font-size:2.25rem;font-weight:700;color:#fff;line-height:1;}
.w-desc{font-size:.72rem;color:rgba(255,255,255,.5);margin-top:3px;}
.w-emoji{font-size:2.25rem;}
.w-grid{display:grid;grid-template-columns:1fr 1fr;gap:.5rem;padding:.875rem 1.25rem;}
.w-item{background:var(--fog);border-radius:9px;padding:.5rem .75rem;}
.w-item-lbl{font-size:.58rem;color:var(--muted);text-transform:uppercase;letter-spacing:.06em;margin-bottom:2px;}
.w-item-val{font-size:.875rem;font-weight:700;color:var(--text);}
.w-advice{
  margin:.5rem 1.25rem 1.25rem;
  background:var(--sage-bg);border:1.5px solid rgba(74,140,104,.2);
  border-left:3px solid var(--sage);border-radius:10px;
  padding:.6rem .875rem;font-size:.72rem;color:var(--muted);line-height:1.5;
}
.w-advice strong{color:var(--forest);}

/* ══ PARCELLES SECTION ══ */
.parcelles-wrap{margin-bottom:1.625rem;}
.section-hdr{display:flex;align-items:center;justify-content:space-between;margin-bottom:1rem;}
.section-title{
  font-family:'Playfair Display',serif;font-size:1.2rem;font-weight:700;color:var(--forest);
  display:flex;align-items:center;gap:8px;
}
.section-title svg{width:18px;height:18px;color:var(--sage);}
.section-link{font-size:.78rem;font-weight:700;color:var(--fern);text-decoration:none;display:flex;align-items:center;gap:4px;}
.section-link:hover{text-decoration:underline;}

.parcelles-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:1rem;}
.parc-card{
  background:var(--white);border:1.5px solid var(--border);border-radius:16px;
  overflow:hidden;cursor:pointer;transition:box-shadow .2s,transform .2s;
}
.parc-card:hover{box-shadow:0 8px 26px rgba(27,58,45,.12);transform:translateY(-3px);}
.parc-photo{height:100px;position:relative;overflow:hidden;}
.parc-photo img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .35s;}
.parc-card:hover .parc-photo img{transform:scale(1.06);}
.parc-overlay{position:absolute;inset:0;background:linear-gradient(to bottom,rgba(10,24,14,.1),rgba(10,24,14,.6));}
.parc-ha{
  position:absolute;bottom:8px;left:10px;
  font-family:'Playfair Display',serif;font-size:1.1rem;font-weight:700;
  color:#fff;text-shadow:0 2px 8px rgba(0,0,0,.4);
}
.parc-ha span{font-size:.6rem;font-weight:400;opacity:.7;}
.parc-status{
  position:absolute;top:8px;right:8px;
  font-size:.58rem;font-weight:800;padding:3px 9px;border-radius:20px;
  text-transform:uppercase;letter-spacing:.05em;
}
.ps-active{background:rgba(74,140,104,.88);color:#fff;}
.ps-warn  {background:rgba(201,138,18,.88);color:#fff;}
.parc-body{padding:.875rem 1rem;}
.parc-name{font-family:'Playfair Display',serif;font-size:.95rem;font-weight:700;color:var(--forest);}
.parc-loc{font-size:.68rem;color:var(--muted);margin-top:2px;display:flex;align-items:center;gap:4px;}
.parc-loc svg{width:11px;height:11px;color:var(--sage);}
.parc-kpis{display:flex;gap:0;margin-top:.75rem;padding-top:.625rem;border-top:1px solid var(--border);}
.parc-kpi{flex:1;text-align:center;border-right:1px solid var(--border);}
.parc-kpi:last-child{border-right:none;}
.parc-kpi-n{font-family:'Playfair Display',serif;font-size:1.05rem;font-weight:700;color:var(--forest);}
.parc-kpi-l{font-size:.55rem;color:var(--muted);text-transform:uppercase;letter-spacing:.06em;margin-top:1px;}

/* ══ CULTURES SECTION ══ */
.cultures-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:1rem;margin-bottom:1.625rem;}
.cult-card{
  background:var(--white);border:1.5px solid var(--border);border-radius:16px;
  overflow:hidden;cursor:pointer;transition:box-shadow .2s,transform .2s;
  display:flex;flex-direction:column;
}
.cult-card:hover{box-shadow:0 8px 26px rgba(27,58,45,.12);transform:translateY(-3px);}
.cult-photo{height:130px;position:relative;overflow:hidden;}
.cult-photo img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .35s;}
.cult-card:hover .cult-photo img{transform:scale(1.06);}
.cult-overlay{position:absolute;inset:0;background:linear-gradient(to top,rgba(10,24,14,.85) 0%,rgba(10,24,14,.2) 50%,transparent 100%);}
.cult-stage{
  position:absolute;top:9px;left:9px;
  font-size:.6rem;font-weight:800;padding:4px 10px;border-radius:20px;
  text-transform:uppercase;letter-spacing:.05em;backdrop-filter:blur(4px);
}
.cs-plant  {background:rgba(37,99,235,.88);color:#fff;}
.cs-growth {background:rgba(46,107,79,.9); color:#fff;}
.cs-treat  {background:rgba(184,74,30,.88);color:#fff;}
.cs-harvest{background:rgba(27,58,45,.92); color:#fff;}
.cult-yield{
  position:absolute;top:9px;right:9px;
  background:rgba(255,255,255,.92);border-radius:9px;
  padding:3px 8px;text-align:center;
}
.cult-yield-n{font-family:'Playfair Display',serif;font-size:.9rem;font-weight:700;color:var(--forest);line-height:1;}
.cult-yield-l{font-size:.5rem;color:var(--muted);letter-spacing:.06em;text-transform:uppercase;}
.cult-photo-bottom{position:absolute;bottom:0;left:0;right:0;padding:.75rem .875rem .625rem;}
.cult-crop-name{font-family:'Playfair Display',serif;font-size:1rem;font-weight:700;color:#fff;line-height:1.1;}
.cult-parc{font-size:.63rem;color:rgba(255,255,255,.5);margin-top:2px;}
.cult-body{padding:.8rem .875rem .875rem;flex:1;display:flex;flex-direction:column;gap:.625rem;}
.cult-prog-steps{display:flex;gap:3px;}
.cult-step{flex:1;height:4px;border-radius:3px;background:var(--fog);}
.cult-step.done{background:var(--sage);}
.cult-step.cur{background:var(--mint);}
.cult-meta{display:flex;align-items:center;justify-content:space-between;}
.cult-dates{font-size:.68rem;color:var(--muted);}
.cult-date-sep{color:var(--dew);margin:0 4px;}
.cult-resp{font-size:.68rem;font-weight:600;color:var(--muted);display:flex;align-items:center;gap:4px;}
.cult-resp-av{width:18px;height:18px;border-radius:50%;background:var(--fern);display:flex;align-items:center;justify-content:center;font-size:.52rem;font-weight:700;color:#fff;}

/* ══ ROLE WELCOME CARD ══ */
.welcome-card{
  background:linear-gradient(140deg,var(--forest),#1a4232 60%,#243d2b);
  border-radius:18px;overflow:hidden;margin-bottom:1.625rem;
  padding:1.75rem 2rem;display:flex;align-items:center;gap:2rem;
  border:1.5px solid rgba(255,255,255,.06);
}
.wc-icon{
  width:72px;height:72px;border-radius:20px;
  background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.15);
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
  font-size:2rem;
}
.wc-text{flex:1;}
.wc-eyebrow{font-size:.65rem;color:rgba(184,223,200,.65);letter-spacing:.12em;text-transform:uppercase;margin-bottom:.5rem;}
.wc-title{font-family:'Playfair Display',serif;font-size:1.5rem;font-weight:700;color:#fff;line-height:1.1;}
.wc-title em{font-style:italic;color:rgba(184,223,200,.85);}
.wc-sub{font-size:.8125rem;color:rgba(255,255,255,.45);margin-top:.5rem;line-height:1.55;max-width:480px;}
.wc-actions{display:flex;gap:.75rem;margin-top:1.125rem;}
.wc-btn{
  display:inline-flex;align-items:center;gap:6px;
  padding:.55rem 1.125rem;border-radius:9px;
  font-size:.8rem;font-weight:700;font-family:'Outfit',sans-serif;
  cursor:pointer;transition:all .18s;text-decoration:none;
}
.wc-btn-mint{background:var(--mint);border:none;color:var(--forest);box-shadow:0 4px 12px rgba(109,189,142,.25);}
.wc-btn-mint:hover{background:#7ed4a0;}
.wc-btn-ghost{background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.18);color:rgba(255,255,255,.82);}
.wc-btn-ghost:hover{background:rgba(255,255,255,.17);}
.wc-btn svg{width:13px;height:13px;}
.wc-right{flex-shrink:0;}
.wc-stat-grid{display:grid;grid-template-columns:1fr 1fr;gap:.625rem;}
.wc-stat{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.1);border-radius:11px;padding:.7rem .875rem;}
.wc-stat-n{font-family:'Playfair Display',serif;font-size:1.35rem;font-weight:700;color:#fff;line-height:1;}
.wc-stat-l{font-size:.6rem;color:rgba(255,255,255,.38);margin-top:2px;text-transform:uppercase;letter-spacing:.06em;}
</style>
</head>
<body>

<!-- ══ SIDEBAR ══ -->
<aside class="sidebar">
  <a href="{{ route('dashboard') }}" class="sb-logo">
    <svg class="sb-logo-svg" viewBox="0 0 48 48" fill="none">
      <circle cx="24" cy="24" r="22" fill="rgba(255,255,255,0.1)" stroke="rgba(255,255,255,0.22)" stroke-width="1.5"/>
      <path d="M8 36 Q24 30 40 36" stroke="rgba(255,255,255,0.18)" stroke-width="1.5" fill="none" stroke-linecap="round"/>
      <path d="M24 38 L24 18" stroke="#a8e6c0" stroke-width="2.8" stroke-linecap="round"/>
      <path d="M24 29 C19 25 13 23 11 17 C17 16 23 22 24 29Z" fill="#6dbd8e"/>
      <path d="M24 24 C29 20 36 18 38 12 C31 11 25 17 24 24Z" fill="#a8e6c0"/>
      <path d="M24 33 C28 31 32 29 33 25 C29 25 25 28 24 33Z" fill="#6dbd8e" opacity=".7"/>
      <circle cx="24" cy="11" r="3.2" fill="#f7e96e" opacity=".9"/>
      <line x1="24" y1="6.5" x2="24" y2="5" stroke="#f7e96e" stroke-width="1.4" stroke-linecap="round"/>
      <line x1="28" y1="7.5" x2="29" y2="6.3" stroke="#f7e96e" stroke-width="1.3" stroke-linecap="round" opacity=".72"/>
      <line x1="20" y1="7.5" x2="19" y2="6.3" stroke="#f7e96e" stroke-width="1.3" stroke-linecap="round" opacity=".72"/>
    </svg>
    <div><div class="sb-brand">AgriNova</div><div class="sb-tagline">Gestion agricole</div></div>
  </a>
  <div class="sb-nav">
    <div class="sb-sec">Principal</div>
    <a href="{{ route('dashboard') }}" class="sb-link active"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>Tableau de bord</a>
    <a href="{{ route('cultures.index') }}" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>Cultures<span class="sb-badge">12</span></a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>Récoltes<span class="sb-badge red">2</span></a>
    <a href="{{ route('stocks.index') }}" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg>Stocks<span class="sb-badge red">3</span></a>
    <a href="{{ route('fields.index') }}" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Parcelles</a>
    <div class="sb-sec">Gestion</div>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Personnel</a>
    <a href="{{ route('equipments.index') }}" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Équipements</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>Rapports</a>
    <div class="sb-sec">Compte</div>
    <a href="{{ route('profile.show') }}" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>Profil</a>
  </div>
  <div class="sb-footer">
    <a href="{{ route('profile.show') }}" class="sb-user">
      <div class="sb-avatar">MA</div>
      <div><div class="sb-uname">Mohamed Alami</div><div class="sb-urole">Agriculteur</div></div>
    </a>
  </div>
</aside>

<!-- ══ MAIN ══ -->
<div class="main">
<div class="scroll">

  <!-- HERO BANNER -->
  <div class="hero">
    <div class="hero-bg"></div>
    <div class="hero-overlay"></div>

    <!-- Topbar -->
    <div class="hero-topbar">
      <div class="hero-topbar-left">
        <span class="tb-eyebrow">Tableau de bord · Printemps 2026</span>
        <span class="tb-title">Exploitation El Haouz, Marrakech</span>
      </div>
      <div class="tb-right">
        <div class="tb-date">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
          Jeudi, 16 Avr 2026
        </div>
        <div class="tb-notif">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
          <span class="notif-dot"></span>
        </div>
        <button class="tb-add">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
          Nouvelle culture
        </button>
      </div>
    </div>

    <!-- Hero content -->
    <div class="hero-content">
      <div class="hero-left">
        <div class="hero-eyebrow">Bonjour, Mohamed Alami</div>
        <h1 class="hero-title"><em>Votre exploitation</em><br>vous attend aujourd'hui</h1>
        <p class="hero-sub">4 parcelles actives · 12 cultures en cours · 2 récoltes imminentes</p>
      </div>
      <div class="hero-stats">
        <div class="hstat">
          <div class="hstat-num">12</div>
          <div class="hstat-lbl">Cultures</div>
          <div class="hstat-trend ht-up">↑ +2</div>
        </div>
        <div class="hstat">
          <div class="hstat-num">78%</div>
          <div class="hstat-lbl">Cycle moy.</div>
          <div class="hstat-trend ht-up">Bon rythme</div>
        </div>
        <div class="hstat">
          <div class="hstat-num">3.2t</div>
          <div class="hstat-lbl">Rendement</div>
          <div class="hstat-trend ht-up">↑ +8%</div>
        </div>
        <div class="hstat">
          <div class="hstat-num">2</div>
          <div class="hstat-lbl">Alertes</div>
          <div class="hstat-trend ht-dn">Action requise</div>
        </div>
      </div>
    </div>
  </div>

  <!-- CONTENT -->
  <div class="content">

    <!-- WELCOME ROLE CARD -->
    <div class="welcome-card">
      <div class="wc-icon">🌾</div>
      <div class="wc-text">
        <div class="wc-eyebrow">Espace Agriculteur · Printemps 2026</div>
        <h2 class="wc-title">Bienvenue sur <em>AgriNova</em>, Mohamed</h2>
        <p class="wc-sub">Votre tableau de bord centralise toutes vos cultures, récoltes, stocks et équipements. Suivez chaque cycle en temps réel et prenez des décisions basées sur les données.</p>
        <div class="wc-actions">
          <a href="/cultures" class="wc-btn wc-btn-mint">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>
            Voir mes cultures
          </a>
          <a href="/recoltes" class="wc-btn wc-btn-ghost">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
            Récoltes imminentes
          </a>
          <a href="/cultures/create" class="wc-btn wc-btn-ghost">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Ajouter une culture
          </a>
        </div>
      </div>
      <div class="wc-right">
        <div class="wc-stat-grid">
          <div class="wc-stat"><div class="wc-stat-n">4</div><div class="wc-stat-l">Parcelles</div></div>
          <div class="wc-stat"><div class="wc-stat-n">12</div><div class="wc-stat-l">Cultures actives</div></div>
          <div class="wc-stat"><div class="wc-stat-n">14.2t</div><div class="wc-stat-l">Rendement prévu</div></div>
          <div class="wc-stat"><div class="wc-stat-n">6.4%</div><div class="wc-stat-l">Pertes moy.</div></div>
        </div>
      </div>
    </div>

    <!-- KPI STRIP -->
    <div class="kpi-strip">
      <div class="kpi-card">
        <div class="kpi-icon ki-g"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg></div>
        <div><div class="kpi-num">12</div><div class="kpi-lbl">Cultures actives</div><div class="kpi-sub">↑ +2 ce mois</div></div>
      </div>
      <div class="kpi-card">
        <div class="kpi-icon ki-a"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg></div>
        <div><div class="kpi-num">2</div><div class="kpi-lbl">Récoltes imminentes</div><div class="kpi-sub">J−6 · J−14</div></div>
      </div>
      <div class="kpi-card">
        <div class="kpi-icon ki-r"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg></div>
        <div><div class="kpi-num">3</div><div class="kpi-lbl">Alertes stock</div><div class="kpi-sub">2 critiques · 1 warning</div></div>
      </div>
      <div class="kpi-card">
        <div class="kpi-icon ki-b"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
        <div><div class="kpi-num">8</div><div class="kpi-lbl">Personnel actif</div><div class="kpi-sub">4 parcelles assignées</div></div>
      </div>
    </div>

    <!-- MAIN GRID: Activity + Modules -->
    <div class="main-grid">

      <!-- Activity Feed -->
      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Activité récente
          </span>
          <a href="#" class="panel-link">Tout voir →</a>
        </div>
        <div class="panel-body">
          <div class="act-list">

            <div class="act-item">
              <div class="act-dot-col">
                <div class="act-dot r">🌾</div>
                <div class="act-line"></div>
              </div>
              <div class="act-body">
                <div class="act-text"><strong>Tomates Roma</strong> — Cycle passé en <span class="act-badge ab-r">Récolte</span></div>
                <div class="act-time">Aujourd'hui · 09:14 · Mohamed Alami</div>
              </div>
            </div>

            <div class="act-item">
              <div class="act-dot-col">
                <div class="act-dot a">⚗️</div>
                <div class="act-line"></div>
              </div>
              <div class="act-body">
                <div class="act-text">Traitement pesticide appliqué sur <strong>Parcelle A</strong> <span class="act-badge ab-a">Traitement</span></div>
                <div class="act-time">Hier · 07:30 · Karim Benali</div>
              </div>
            </div>

            <div class="act-item">
              <div class="act-dot-col">
                <div class="act-dot g">✅</div>
                <div class="act-line"></div>
              </div>
              <div class="act-body">
                <div class="act-text"><strong>Blé Dur</strong> récolté avec succès — Rendement : 2.1t <span class="act-badge ab-g">+8%</span></div>
                <div class="act-time">10 Mar 2026 · Parcelle B</div>
              </div>
            </div>

            <div class="act-item">
              <div class="act-dot-col">
                <div class="act-dot g">👤</div>
                <div class="act-line"></div>
              </div>
              <div class="act-body">
                <div class="act-text">Said El Mansouri assigné à la <strong>Parcelle C</strong></div>
                <div class="act-time">08 Mar 2026 · Admin</div>
              </div>
            </div>

            <div class="act-item">
              <div class="act-dot-col">
                <div class="act-dot r">🚫</div>
              </div>
              <div class="act-body">
                <div class="act-text"><strong>Pompe d'irrigation #2</strong> signalée hors service — Parcelle C</div>
                <div class="act-time">06 Mar 2026 · Maintenance</div>
              </div>
            </div>

          </div>
        </div>
      </div>

      <!-- Quick Access Modules -->
      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zm10 0a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/></svg>
            Accès rapide
          </span>
        </div>
        <div class="modules-grid">
          <a href="/cultures" class="module-btn">
            <div class="mb-icon mb-i-g"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg></div>
            <div class="mb-lbl">Cultures</div>
            <div class="mb-count">12 actives</div>
          </a>
          <a href="/recoltes" class="module-btn">
            <div class="mb-icon mb-i-a"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg></div>
            <div class="mb-lbl">Récoltes</div>
            <div class="mb-count">2 imminentes</div>
          </a>
          <a href="/stocks" class="module-btn">
            <div class="mb-icon mb-i-r"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg></div>
            <div class="mb-lbl">Stocks</div>
            <div class="mb-count">3 alertes</div>
          </a>
          <a href="/parcelles" class="module-btn">
            <div class="mb-icon mb-i-g"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
            <div class="mb-lbl">Parcelles</div>
            <div class="mb-count">4 actives</div>
          </a>
          <a href="/personnel" class="module-btn">
            <div class="mb-icon mb-i-b"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
            <div class="mb-lbl">Personnel</div>
            <div class="mb-count">8 employés</div>
          </a>
          <a href="/equipements" class="module-btn">
            <div class="mb-icon mb-i-p"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
            <div class="mb-lbl">Équipements</div>
            <div class="mb-count">18 · 1 HS</div>
          </a>
        </div>
      </div>
    </div>

    <!-- BOTTOM ROW: Stocks · Récoltes · Météo -->
    <div class="bottom-row">

      <!-- Stock alerts -->
      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            Alertes Stock
          </span>
          <a href="/stocks" class="panel-link">Voir stock →</a>
        </div>
        <div>
          <div class="stock-item">
            <div class="stock-icon r"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg></div>
            <div class="stock-info"><div class="stock-name">Engrais NPK</div><div class="stock-sub">Seuil minimal atteint</div></div>
            <div class="stock-qty"><div class="stock-num r">12</div><div class="stock-unit">kg restants</div></div>
          </div>
          <div class="stock-item">
            <div class="stock-icon r"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg></div>
            <div class="stock-info"><div class="stock-name">Pesticide Cuivre</div><div class="stock-sub">Expiration: 30 Avr 2026</div></div>
            <div class="stock-qty"><div class="stock-num r">3</div><div class="stock-unit">litres</div></div>
          </div>
          <div class="stock-item">
            <div class="stock-icon a"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg></div>
            <div class="stock-info"><div class="stock-name">Semences Tomates</div><div class="stock-sub">Stock bas · Réapprovisionnement conseillé</div></div>
            <div class="stock-qty"><div class="stock-num a">0.8</div><div class="stock-unit">kg</div></div>
          </div>
        </div>
      </div>

      <!-- Upcoming harvests -->
      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            Prochaines récoltes
          </span>
          <a href="/recoltes" class="panel-link">Tout voir →</a>
        </div>
        <div>
          <div class="uh-item">
            <div class="uh-cal ur"><div class="uh-day">22</div><div class="uh-mon">Mar</div></div>
            <div class="uh-info"><div class="uh-name">Tomates Roma</div><div class="uh-sub">Parcelle A · 1.8t prévu</div></div>
            <span class="uh-tag uht-ur">Retard 🚨</span>
          </div>
          <div class="uh-item">
            <div class="uh-cal wn"><div class="uh-day">30</div><div class="uh-mon">Mar</div></div>
            <div class="uh-info"><div class="uh-name">Menthe Verte</div><div class="uh-sub">Parcelle A · 0.3t prévu</div></div>
            <span class="uh-tag uht-wn">J−14</span>
          </div>
          <div class="uh-item">
            <div class="uh-cal ok"><div class="uh-day">15</div><div class="uh-mon">Mai</div></div>
            <div class="uh-info"><div class="uh-name">Oignons Rouges</div><div class="uh-sub">Parcelle A · 0.8t prévu</div></div>
            <span class="uh-tag uht-ok">J−50</span>
          </div>
        </div>
      </div>

      <!-- Weather -->
      <div class="panel" style="overflow:hidden;">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
            Météo Agronomique
          </span>
          <span style="font-size:.68rem;color:var(--muted);">El Haouz</span>
        </div>
        <div class="weather-body">
          <div class="weather-top">
            <div class="w-left">
              <div class="w-loc">📍 El Haouz, Marrakech</div>
              <div class="w-temp">24°C</div>
              <div class="w-desc">Ensoleillé · Conditions idéales</div>
            </div>
            <div class="w-emoji">☀️</div>
          </div>
          <div class="w-grid">
            <div class="w-item"><div class="w-item-lbl">Humidité</div><div class="w-item-val">38%</div></div>
            <div class="w-item"><div class="w-item-lbl">Vent</div><div class="w-item-val">14 km/h</div></div>
            <div class="w-item"><div class="w-item-lbl">Pluie prévue</div><div class="w-item-val">0 mm</div></div>
            <div class="w-item"><div class="w-item-lbl">UV</div><div class="w-item-val">Élevé</div></div>
          </div>
          <div class="w-advice">
            <strong>Conseil :</strong> Idéal pour la récolte matinale. Évitez les traitements chimiques en plein soleil.
          </div>
        </div>
      </div>
    </div>

    <!-- PARCELLES SECTION -->
    <div class="parcelles-wrap">
      <div class="section-hdr">
        <h2 class="section-title">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          Mes Parcelles
        </h2>
        <a href="/parcelles" class="section-link">
          Tout voir →
        </a>
      </div>
      <div class="parcelles-grid">

        <div class="parc-card">
          <div class="parc-photo">
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=400&q=75&fit=crop" alt="Parcelle A">
            <div class="parc-overlay"></div>
            <div class="parc-ha">4.2<span> ha</span></div>
            <span class="parc-status ps-active">Active</span>
          </div>
          <div class="parc-body">
            <div class="parc-name">Parcelle A — Nord</div>
            <div class="parc-loc"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>El Haouz · Zone maraîchère</div>
            <div class="parc-kpis">
              <div class="parc-kpi"><div class="parc-kpi-n">4</div><div class="parc-kpi-l">Cultures</div></div>
              <div class="parc-kpi"><div class="parc-kpi-n">78%</div><div class="parc-kpi-l">Cycle</div></div>
              <div class="parc-kpi"><div class="parc-kpi-n">3.2t</div><div class="parc-kpi-l">Rendement</div></div>
            </div>
          </div>
        </div>

        <div class="parc-card">
          <div class="parc-photo">
            <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=400&q=75&fit=crop" alt="Parcelle B">
            <div class="parc-overlay"></div>
            <div class="parc-ha">6.8<span> ha</span></div>
            <span class="parc-status ps-active">Active</span>
          </div>
          <div class="parc-body">
            <div class="parc-name">Parcelle B — Ouest</div>
            <div class="parc-loc"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>El Haouz · Zone céréalière</div>
            <div class="parc-kpis">
              <div class="parc-kpi"><div class="parc-kpi-n">3</div><div class="parc-kpi-l">Cultures</div></div>
              <div class="parc-kpi"><div class="parc-kpi-n">52%</div><div class="parc-kpi-l">Cycle</div></div>
              <div class="parc-kpi"><div class="parc-kpi-n">3.6t</div><div class="parc-kpi-l">Rendement</div></div>
            </div>
          </div>
        </div>

        <div class="parc-card">
          <div class="parc-photo">
            <img src="https://images.unsplash.com/photo-1518977676405-a97d9e26d8c3?w=400&q=75&fit=crop" alt="Parcelle C">
            <div class="parc-overlay"></div>
            <div class="parc-ha">3.1<span> ha</span></div>
            <span class="parc-status ps-warn">Attention</span>
          </div>
          <div class="parc-body">
            <div class="parc-name">Parcelle C — Sud</div>
            <div class="parc-loc"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>El Haouz · Zone tubercules</div>
            <div class="parc-kpis">
              <div class="parc-kpi"><div class="parc-kpi-n">2</div><div class="parc-kpi-l">Cultures</div></div>
              <div class="parc-kpi"><div class="parc-kpi-n">35%</div><div class="parc-kpi-l">Cycle</div></div>
              <div class="parc-kpi"><div class="parc-kpi-n">1.6t</div><div class="parc-kpi-l">Rendement</div></div>
            </div>
          </div>
        </div>

        <div class="parc-card">
          <div class="parc-photo">
            <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400&q=75&fit=crop" alt="Parcelle D">
            <div class="parc-overlay"></div>
            <div class="parc-ha">2.8<span> ha</span></div>
            <span class="parc-status ps-active">Active</span>
          </div>
          <div class="parc-body">
            <div class="parc-name">Parcelle D — Est</div>
            <div class="parc-loc"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>El Haouz · Zone aromates</div>
            <div class="parc-kpis">
              <div class="parc-kpi"><div class="parc-kpi-n">3</div><div class="parc-kpi-l">Cultures</div></div>
              <div class="parc-kpi"><div class="parc-kpi-n">61%</div><div class="parc-kpi-l">Cycle</div></div>
              <div class="parc-kpi"><div class="parc-kpi-n">2.1t</div><div class="parc-kpi-l">Rendement</div></div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- CULTURES EN COURS -->
    <div class="section-hdr">
      <h2 class="section-title">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>
        Cultures en cours
      </h2>
      <a href="/cultures" class="section-link">Voir toutes →</a>
    </div>
    <div class="cultures-grid">

      <!-- Culture 1 -->
      <div class="cult-card">
        <div class="cult-photo">
          <img src="https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=400&q=75&fit=crop" alt="Tomates">
          <div class="cult-overlay"></div>
          <span class="cult-stage cs-harvest">🌾 Récolte</span>
          <div class="cult-yield"><div class="cult-yield-n">1.8t</div><div class="cult-yield-l">Prévu</div></div>
          <div class="cult-photo-bottom">
            <div class="cult-crop-name">Tomates Roma</div>
            <div class="cult-parc">🌸 Printemps · Parcelle A</div>
          </div>
        </div>
        <div class="cult-body">
          <div class="cult-prog-steps">
            <div class="cult-step done"></div>
            <div class="cult-step done"></div>
            <div class="cult-step done"></div>
            <div class="cult-step cur"></div>
          </div>
          <div class="cult-meta">
            <div class="cult-dates">15 Jan<span class="cult-date-sep">→</span>22 Mar 2026</div>
            <div class="cult-resp"><div class="cult-resp-av">MA</div>Mohamed A.</div>
          </div>
        </div>
      </div>

      <!-- Culture 2 -->
      <div class="cult-card">
        <div class="cult-photo">
          <img src="https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2?w=400&q=75&fit=crop" alt="Oignons">
          <div class="cult-overlay"></div>
          <span class="cult-stage cs-growth">🌿 Croissance</span>
          <div class="cult-yield"><div class="cult-yield-n">0.8t</div><div class="cult-yield-l">Prévu</div></div>
          <div class="cult-photo-bottom">
            <div class="cult-crop-name">Oignons Rouges</div>
            <div class="cult-parc">🌸 Printemps · Parcelle A</div>
          </div>
        </div>
        <div class="cult-body">
          <div class="cult-prog-steps">
            <div class="cult-step done"></div>
            <div class="cult-step done"></div>
            <div class="cult-step cur"></div>
            <div class="cult-step"></div>
          </div>
          <div class="cult-meta">
            <div class="cult-dates">01 Fév<span class="cult-date-sep">→</span>15 Mai 2026</div>
            <div class="cult-resp"><div class="cult-resp-av">KB</div>Karim B.</div>
          </div>
        </div>
      </div>

      <!-- Culture 3 -->
      <div class="cult-card">
        <div class="cult-photo">
          <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=400&q=75&fit=crop" alt="Blé">
          <div class="cult-overlay"></div>
          <span class="cult-stage cs-growth">🌿 Croissance</span>
          <div class="cult-yield"><div class="cult-yield-n">2.4t</div><div class="cult-yield-l">Prévu</div></div>
          <div class="cult-photo-bottom">
            <div class="cult-crop-name">Blé Dur Karim</div>
            <div class="cult-parc">❄️ Hiver · Parcelle B</div>
          </div>
        </div>
        <div class="cult-body">
          <div class="cult-prog-steps">
            <div class="cult-step done"></div>
            <div class="cult-step done"></div>
            <div class="cult-step cur"></div>
            <div class="cult-step"></div>
          </div>
          <div class="cult-meta">
            <div class="cult-dates">10 Nov<span class="cult-date-sep">→</span>25 Avr 2026</div>
            <div class="cult-resp"><div class="cult-resp-av">SM</div>Said M.</div>
          </div>
        </div>
      </div>

    </div>

  </div><!-- /content -->

</div><!-- /scroll -->
</div><!-- /main -->

</body>
</html>
