<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AgriNova — Dashboard</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

/* ── Same green palette as register page ── */
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
  --rust:     #b84a1e;
  --white:    #ffffff;
  --sidebar-w:250px;
}

html,body{height:100%;}

body{
  font-family:'Outfit',sans-serif;
  background:var(--parch);
  color:var(--text);
  display:flex;
  min-height:100vh;
}

/* ══════════════════════════════════
   SIDEBAR — white, matches register
══════════════════════════════════ */
.sidebar{
  width:var(--sidebar-w);
  flex-shrink:0;
  background:var(--white);
  border-right:1.5px solid var(--border);
  display:flex;
  flex-direction:column;
  height:100vh;
  position:sticky;
  top:0;
  overflow-y:auto;
}

/* Logo area — forest header strip */
.sb-logo-area{
  background:linear-gradient(135deg,var(--forest) 0%,#2d6444 100%);
  padding:1.375rem 1.25rem;
  display:flex;align-items:center;gap:11px;
  text-decoration:none;
  flex-shrink:0;
}

.sb-logo-svg{width:40px;height:40px;flex-shrink:0;}

.sb-brand{
  font-family:'Playfair Display',serif;
  font-size:1.3rem;font-weight:700;
  color:#fff;letter-spacing:.01em;line-height:1;
}
.sb-tagline{
  font-size:.6rem;color:rgba(184,223,200,.75);
  letter-spacing:.1em;text-transform:uppercase;margin-top:3px;
}

/* Nav sections */
.sb-section-label{
  font-size:.58rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;
  color:var(--muted);padding:.875rem 1.25rem .3rem;
  opacity:.7;
}

.sb-nav{padding:.375rem .625rem;flex:1;}

.sb-link{
  display:flex;align-items:center;gap:10px;
  padding:.6rem .875rem;
  border-radius:10px;
  color:var(--muted);
  text-decoration:none;
  font-size:.8125rem;font-weight:600;
  margin-bottom:2px;
  transition:background .18s,color .18s;
  position:relative;
}
.sb-link:hover{background:var(--fog);color:var(--fern);}
.sb-link.active{
  background:var(--fog);
  color:var(--forest);
}
.sb-link.active::before{
  content:'';
  position:absolute;left:0;top:6px;bottom:6px;
  width:3px;border-radius:0 3px 3px 0;
  background:var(--sage);
  margin-left:-.625rem;
}
.sb-link svg{width:16px;height:16px;flex-shrink:0;}

.sb-badge{
  margin-left:auto;
  font-size:.6rem;font-weight:700;
  padding:2px 7px;border-radius:20px;
  background:var(--sage);color:#fff;
}
.sb-badge.red{background:var(--rust);}

/* Sidebar footer */
.sb-footer{
  border-top:1.5px solid var(--border);
  padding:.875rem .625rem;
  flex-shrink:0;
}

.sb-user{
  display:flex;align-items:center;gap:10px;
  padding:.625rem .875rem;
  border-radius:10px;
  background:var(--fog);
  cursor:pointer;
  transition:background .18s;
}
.sb-user:hover{background:var(--dew);}
.sb-avatar{
  width:34px;height:34px;border-radius:50%;
  background:linear-gradient(135deg,var(--fern),var(--mint));
  display:flex;align-items:center;justify-content:center;
  font-size:.75rem;font-weight:800;color:#fff;
  flex-shrink:0;
}
.sb-uname{font-size:.8125rem;font-weight:700;color:var(--forest);}
.sb-urole{font-size:.65rem;color:var(--muted);margin-top:1px;}
.sb-logout{
  display:flex;align-items:center;gap:6px;
  padding:.5rem .875rem;margin-top:.375rem;
  border-radius:8px;
  color:var(--muted);font-size:.75rem;font-weight:600;
  cursor:pointer;text-decoration:none;
  transition:background .18s,color .18s;
}
.sb-logout:hover{background:rgba(184,74,30,.07);color:var(--rust);}
.sb-logout svg{width:14px;height:14px;}

/* ══════════════════════════════════
   MAIN AREA
══════════════════════════════════ */
.main{
  flex:1;min-width:0;
  display:flex;flex-direction:column;
  background:var(--parch);
}

/* Top bar */
.topbar{
  background:var(--white);
  border-bottom:1.5px solid var(--border);
  height:62px;padding:0 2rem;
  display:flex;align-items:center;justify-content:space-between;
  position:sticky;top:0;z-index:100;flex-shrink:0;
}

.tb-left{display:flex;flex-direction:column;}
.tb-eyebrow{
  font-size:.62rem;color:var(--muted);font-weight:500;
  letter-spacing:.06em;text-transform:uppercase;
}
.tb-title{
  font-family:'Playfair Display',serif;
  font-size:1.175rem;font-weight:700;color:var(--forest);
  line-height:1.1;
}

.tb-right{display:flex;align-items:center;gap:.875rem;}

.tb-date{
  display:flex;align-items:center;gap:5px;
  font-family:'DM Mono',monospace;
  font-size:.68rem;color:var(--muted);
  background:var(--fog);border:1.5px solid var(--border);
  border-radius:20px;padding:5px 12px;
}
.tb-date svg{width:12px;height:12px;}

.tb-notif{
  width:36px;height:36px;border-radius:50%;
  background:var(--fog);border:1.5px solid var(--border);
  display:flex;align-items:center;justify-content:center;
  cursor:pointer;position:relative;transition:background .18s;
}
.tb-notif:hover{background:var(--dew);}
.tb-notif svg{width:16px;height:16px;color:var(--fern);}
.tb-notif-dot{
  position:absolute;top:7px;right:7px;
  width:7px;height:7px;background:var(--amber);
  border-radius:50%;border:2px solid var(--white);
}

/* New button matching register style */
.btn-new{
  display:flex;align-items:center;gap:7px;
  padding:.5rem 1.25rem;
  background:var(--forest);
  border:none;border-radius:10px;
  color:#fff;font-size:.8125rem;font-weight:700;
  font-family:'Outfit',sans-serif;
  cursor:pointer;transition:background .2s;
  text-decoration:none;
}
.btn-new:hover{background:var(--fern);}
.btn-new svg{width:14px;height:14px;}

/* ══════════════════════════════════
   CONTENT
══════════════════════════════════ */
.content{padding:1.75rem 2rem 3rem;overflow-y:auto;flex:1;}

/* Greeting */
.greeting{
  display:flex;align-items:flex-end;justify-content:space-between;
  margin-bottom:1.625rem;
}
.g-eyebrow{
  font-size:.65rem;color:var(--sage);font-weight:700;
  letter-spacing:.12em;text-transform:uppercase;
  margin-bottom:.375rem;
  display:flex;align-items:center;gap:7px;
}
.g-eyebrow::before{content:'';width:18px;height:1.5px;background:var(--sage);}
.g-title{
  font-family:'Playfair Display',serif;
  font-size:clamp(1.75rem,3vw,2.5rem);
  font-weight:700;color:var(--forest);
  line-height:1.05;letter-spacing:-.02em;
}
.g-title em{font-style:italic;color:var(--sage);}
.g-sub{font-size:.78rem;color:var(--muted);margin-top:.4rem;}

.g-right{display:flex;align-items:center;gap:.875rem;}
.season-pill{
  display:flex;align-items:center;gap:6px;
  padding:7px 16px;
  background:var(--fog);border:1.5px solid var(--dew);
  border-radius:30px;font-size:.75rem;font-weight:700;
  color:var(--fern);
}

/* ══════════════════════════════════
   STAT CARDS ROW
══════════════════════════════════ */
.stats-row{
  display:grid;grid-template-columns:repeat(4,1fr);
  gap:1rem;margin-bottom:1.625rem;
}

.stat-card{
  background:var(--white);
  border:1.5px solid var(--border);
  border-radius:16px;padding:1.25rem;
  display:flex;flex-direction:column;gap:.875rem;
  transition:box-shadow .2s,border-color .2s;
}
.stat-card:hover{box-shadow:0 6px 24px rgba(27,58,45,.09);border-color:var(--dew);}

.sc-top{display:flex;align-items:center;justify-content:space-between;}

.sc-icon{
  width:42px;height:42px;border-radius:12px;
  display:flex;align-items:center;justify-content:center;
}
.sc-icon svg{width:21px;height:21px;}
.sc-icon.g {background:rgba(74,140,104,.12);color:var(--sage);}
.sc-icon.a {background:rgba(201,138,18,.12);color:var(--amber);}
.sc-icon.b {background:rgba(59,130,246,.1); color:#3b82f6;}
.sc-icon.r {background:rgba(184,74,30,.1);  color:var(--rust);}

.sc-trend{
  font-size:.68rem;font-weight:700;padding:3px 8px;border-radius:20px;
}
.trend-up  {background:rgba(74,140,104,.12);color:var(--sage);}
.trend-dn  {background:rgba(184,74,30,.1); color:var(--rust);}
.trend-flat{background:rgba(90,107,85,.1); color:var(--muted);}

.sc-num{
  font-family:'Playfair Display',serif;
  font-size:2rem;font-weight:700;color:var(--forest);line-height:1;
}
.sc-label{font-size:.72rem;font-weight:600;color:var(--muted);margin-top:3px;letter-spacing:.04em;}

/* ══════════════════════════════════
   HERO BANNER
/* ===== NEW HERO LAYOUT ===== */

.hero-banner{
  border-radius:20px;
  overflow:hidden;
  position:relative;
  height:500px;
  width: 800px;
  margin-bottom:1.75rem;
}

.hb-img{
  position:absolute;
  inset:0;
  background-image:url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=1400&q=80&fit=crop');
  background-size:cover;
  background-position:center;
  transform:scale(1.02);
}

.hb-overlay{
  position:absolute;
  inset:0;
  background:linear-gradient(
    90deg,
    rgba(12,32,20,.95) 0%,
    rgba(12,32,20,.75) 40%,
    rgba(12,32,20,.25) 75%,
    rgba(12,32,20,.05) 100%
  );
}

.hb-content{
  position:relative;
  z-index:2;
  height:100%;
  display:flex;
  justify-content:space-between;
  align-items:flex-end;
  padding:2rem;
}

/* BIG LOCATION */

.hb-location{
  font-family:'Playfair Display',serif;
  font-size:4rem;
  font-weight:700;
  color:#fff;
  line-height:1;
}
.hb-location span{
  display:block;
  font-size:1.2rem;
  font-family:'Outfit',sans-serif;
  font-weight:500;
  margin-top:6px;
  color:rgba(255,255,255,.65);
}

/* STATS UNDER TITLE */

.hb-stats{
  display:flex;
  gap:2rem;
  margin-top:1rem;
}

.hbs-item{
  text-align:left;
}

.hbs-num{
  font-family:'Playfair Display',serif;
  font-size:1.6rem;
  color:white;
}

.hbs-lbl{
  font-size:.65rem;
  letter-spacing:.08em;
  text-transform:uppercase;
  color:rgba(255,255,255,.45);
}

/* MAP CARD */

.farm-map{
  width:220px;
  height:120px;
  background:rgba(255,255,255,.08);
  backdrop-filter:blur(6px);
  border:1px solid rgba(255,255,255,.15);
  border-radius:14px;
  display:flex;
  align-items:center;
  justify-content:center;
  color:white;
  font-size:.8rem;
  font-weight:600;
}
/* ══════════════════════════════════
   TWO-COL: Cultures + Stock alerts
══════════════════════════════════ */
.two-col{
  display:grid;grid-template-columns:1.2fr 1fr;
  gap:1.125rem;margin-bottom:1.625rem;
}

.panel{
  background:var(--white);
  border:1.5px solid var(--border);
  border-radius:18px;overflow:hidden;
}

.panel-head{
  display:flex;align-items:center;justify-content:space-between;
  padding:.875rem 1.25rem;
  border-bottom:1.5px solid var(--border);
  background:var(--fog);
}
.panel-title{
  font-family:'Playfair Display',serif;
  font-size:.975rem;font-weight:700;color:var(--forest);
  display:flex;align-items:center;gap:7px;
}
.panel-title svg{width:15px;height:15px;color:var(--sage);}
.panel-link{font-size:.72rem;font-weight:700;color:var(--fern);text-decoration:none;}
.panel-link:hover{text-decoration:underline;}
.panel-body{padding:1rem 1.25rem;}

/* Culture rows */
.cu-row{
  display:flex;align-items:center;gap:.875rem;
  padding:.625rem 0;border-bottom:1px solid var(--border);
}
.cu-row:last-child{border-bottom:none;}
.cu-thumb{
  width:42px;height:42px;border-radius:9px;overflow:hidden;flex-shrink:0;
}
.cu-thumb img{width:100%;height:100%;object-fit:cover;display:block;}
.cu-info{flex:1;min-width:0;}
.cu-name{font-size:.875rem;font-weight:700;color:var(--text);}
.cu-meta{font-size:.7rem;color:var(--muted);margin-top:2px;}
.cu-status{
  font-size:.65rem;font-weight:700;padding:3px 9px;border-radius:20px;flex-shrink:0;
}
.s-harvest{background:rgba(201,138,18,.13);color:var(--amber);}
.s-growth {background:rgba(74,140,104,.13);color:var(--sage);}
.s-treat  {background:rgba(184,74,30,.12); color:var(--rust);}
.s-plant  {background:rgba(59,130,246,.11);color:#3b82f6;}

/* ══════════════════════════════════
   STOCK ALERTS — BIGGER
══════════════════════════════════ */
.stock-panel{
  background:var(--white);
  border:1.5px solid var(--border);
  border-radius:18px;overflow:hidden;
}

.stock-panel .panel-head{
  background:var(--fog);
  border-bottom:1.5px solid var(--border);
}

.alert-list{padding:.875rem 1.125rem;display:flex;flex-direction:column;gap:.75rem;}

.al-item{
  display:flex;align-items:center;gap:1rem;
  padding:1rem 1.125rem;
  border-radius:14px;
  border:1.5px solid transparent;
  transition:all .18s;
  cursor:pointer;
}
.al-item.al-red{
  background:rgba(184,74,30,.06);
  border-color:rgba(184,74,30,.18);
}
.al-item.al-red:hover{background:rgba(184,74,30,.1);}
.al-item.al-amber{
  background:rgba(201,138,18,.06);
  border-color:rgba(201,138,18,.18);
}
.al-item.al-amber:hover{background:rgba(201,138,18,.1);}

.al-icon-box{
  width:46px;height:46px;border-radius:12px;
  display:flex;align-items:center;justify-content:center;flex-shrink:0;
}
.al-icon-box.red  {background:rgba(184,74,30,.12);}
.al-icon-box.amber{background:rgba(201,138,18,.12);}
.al-icon-box svg  {width:22px;height:22px;}
.al-icon-box.red svg  {color:var(--rust);}
.al-icon-box.amber svg{color:var(--amber);}

.al-info{flex:1;min-width:0;}
.al-name{font-size:.9rem;font-weight:700;color:var(--text);}
.al-sub{font-size:.73rem;color:var(--muted);margin-top:3px;}

.al-right{text-align:right;flex-shrink:0;}
.al-qty{
  font-family:'DM Mono',monospace;
  font-size:1.05rem;font-weight:600;
  line-height:1;
}
.al-qty.red  {color:var(--rust);}
.al-qty.amber{color:var(--amber);}
.al-unit{font-size:.65rem;color:var(--muted);margin-top:3px;}

/* ══════════════════════════════════
   PARCELLES — single row, wraps at 4
══════════════════════════════════ */
.parcelles-section{margin-bottom:1.625rem;}

.section-hdr{
  display:flex;align-items:center;justify-content:space-between;
  margin-bottom:1rem;
}
.section-hdr-title{
  font-family:'Playfair Display',serif;
  font-size:1.1rem;font-weight:700;color:var(--forest);
  display:flex;align-items:center;gap:8px;
}
.section-hdr-title svg{width:17px;height:17px;color:var(--sage);}

/* THE KEY: flex row, wraps after 4th, each item exactly 25% minus gap */
.parcelles-row{
  display:flex;
  flex-wrap:wrap;
  gap:1rem;
}

.parcelle-card{
  /* exactly 4 per row: (100% - 3 gaps of 1rem) / 4 */
  flex: 0 0 calc(25% - 0.75rem);
  min-width:0;
  border-radius:16px;overflow:hidden;
  background:var(--white);
  border:1.5px solid var(--border);
  transition:box-shadow .2s,transform .2s;
  cursor:pointer;
}
.parcelle-card:hover{
  box-shadow:0 8px 28px rgba(27,58,45,.12);
  transform:translateY(-3px);
}

.pc-photo{
  height:140px;position:relative;overflow:hidden;
}
.pc-photo img{width:100%;height:100%;object-fit:cover;display:block;transition:transform .4s ease;}
.parcelle-card:hover .pc-photo img{transform:scale(1.05);}
.pc-photo-overlay{
  position:absolute;inset:0;
  background:linear-gradient(to top,rgba(15,35,22,.75) 0%,rgba(15,35,22,.15) 55%,transparent 100%);
}
.pc-status-tag{
  position:absolute;top:10px;left:10px;
  background:rgba(255,255,255,.88);
  border-radius:20px;padding:3px 10px;
  font-size:.62rem;font-weight:700;color:var(--forest);
}
.pc-ha{
  position:absolute;bottom:10px;right:10px;
  font-family:'Playfair Display',serif;
  font-size:1.15rem;font-weight:700;color:#fff;
}

.pc-info{padding:.875rem 1rem;}
.pc-name{font-size:.875rem;font-weight:700;color:var(--text);}
.pc-crop{font-size:.72rem;color:var(--muted);margin-top:3px;}

.pc-prog-wrap{margin-top:.625rem;}
.pc-prog-label{
  display:flex;justify-content:space-between;
  font-size:.65rem;color:var(--muted);margin-bottom:4px;
}
.pc-prog-bar{height:5px;background:var(--fog);border-radius:4px;overflow:hidden;}
.pc-prog-fill{
  height:100%;
  background:linear-gradient(90deg,var(--fern),var(--mint));
  border-radius:4px;
}

/* ══════════════════════════════════
   BOTTOM ROW: Tasks + Activity + Weather
══════════════════════════════════ */
.bottom-row{
  display:grid;grid-template-columns:1fr 1fr 1fr;
  gap:1.125rem;
}

/* Shared panel styles already defined above */

.task-list{display:flex;flex-direction:column;}
.task-item{
  display:flex;align-items:flex-start;gap:.75rem;
  padding:.625rem 0;
  border-bottom:1px solid var(--border);
}
.task-item:last-child{border-bottom:none;}
.task-chk{
  width:18px;height:18px;border-radius:5px;
  border:1.5px solid var(--dew);
  flex-shrink:0;margin-top:1px;cursor:pointer;
  display:flex;align-items:center;justify-content:center;
  transition:all .18s;
}
.task-chk.done{background:var(--sage);border-color:var(--sage);}
.task-chk.done svg{width:10px;height:10px;color:#fff;}
.task-txt{font-size:.8rem;color:var(--text);line-height:1.4;}
.task-txt.done{color:var(--muted);text-decoration:line-through;}
.task-time{font-family:'DM Mono',monospace;font-size:.62rem;color:var(--muted);margin-top:2px;}

/* Activity */
.act-item{
  display:flex;align-items:flex-start;gap:.75rem;
  padding:.5625rem 0;border-bottom:1px solid var(--border);
}
.act-item:last-child{border-bottom:none;}
.act-dot{
  width:8px;height:8px;border-radius:50%;
  background:var(--sage);flex-shrink:0;margin-top:5px;
}
.act-dot.a{background:var(--amber);}
.act-dot.b{background:#3b82f6;}
.act-text{font-size:.775rem;color:var(--text);line-height:1.5;}
.act-time{font-family:'DM Mono',monospace;font-size:.62rem;color:var(--muted);margin-top:2px;}

/* Weather panel — forest bg */
.weather-panel{
  background:linear-gradient(145deg,var(--forest) 0%,#2d6444 100%);
  border:1.5px solid rgba(74,140,104,.25);
  border-radius:18px;overflow:hidden;
}
.weather-panel .panel-head{
  background:rgba(255,255,255,.07);
  border-bottom:1px solid rgba(255,255,255,.1);
}
.weather-panel .panel-title{color:#fff;}
.weather-panel .panel-title svg{color:var(--mint);}

.wth-body{padding:1.125rem 1.25rem;display:flex;flex-direction:column;gap:1rem;}
.wth-top{display:flex;align-items:flex-start;justify-content:space-between;}
.wth-loc{font-family:'DM Mono',monospace;font-size:.62rem;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.45);margin-bottom:.375rem;}
.wth-temp{font-family:'Playfair Display',serif;font-size:2.75rem;font-weight:700;color:#fff;line-height:1;}
.wth-emoji{font-size:2.75rem;line-height:1;}
.wth-desc{font-size:.75rem;color:rgba(255,255,255,.55);}
.wth-grid{display:grid;grid-template-columns:1fr 1fr;gap:.5rem;}
.wth-item{background:rgba(0,0,0,.15);border-radius:10px;padding:.625rem .75rem;}
.wth-key{font-size:.58rem;color:rgba(255,255,255,.35);letter-spacing:.08em;text-transform:uppercase;margin-bottom:3px;}
.wth-val{font-size:.875rem;font-weight:700;color:#fff;}

/* scrollbar */
::-webkit-scrollbar{width:5px;}
::-webkit-scrollbar-track{background:transparent;}
::-webkit-scrollbar-thumb{background:var(--dew);border-radius:4px;}
</style>
</head>
<body>

<!-- ══════════ SIDEBAR ══════════ -->
<aside class="sidebar">

  <a href="/dashboard" class="sb-logo-area">
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
    <div>
      <div class="sb-brand">AgriNova</div>
      <div class="sb-tagline">Gestion agricole</div>
    </div>
  </a>

  <div class="sb-nav">

    <div class="sb-section-label">Principal</div>

    <a href="#" class="sb-link active">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
      Dashboard
    </a>

    <a href="#" class="sb-link">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>
      Cultures
      <span class="sb-badge">12</span>
    </a>

    <a href="#" class="sb-link">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"/></svg>
      Récoltes
    </a>

    <a href="#" class="sb-link">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg>
      Stocks
      <span class="sb-badge red">3</span>
    </a>

    <a href="#" class="sb-link">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
      Parcelles
    </a>

    <div class="sb-section-label">Gestion</div>

    <a href="#" class="sb-link">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
      Personnel
    </a>

    <a href="#" class="sb-link">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
      Équipements
    </a>

    <a href="#" class="sb-link">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>
      Rapports
    </a>

    <div class="sb-section-label">Compte</div>

    <a href="#" class="sb-link">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/></svg>
      Paramètres
    </a>

  </div>

  <div class="sb-footer">
    <div class="sb-user">
      <div class="sb-avatar">MA</div>
      <div>
        <div class="sb-uname">Mohamed Alami</div>
        <div class="sb-urole">Agriculteur</div>
      </div>
    </div>
    <a href="/logout" class="sb-logout">
      <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/></svg>
      Déconnexion
    </a>
  </div>

</aside>

<!-- ══════════ MAIN ══════════ -->
<div class="main">

  <!-- Top bar -->
  <div class="topbar">
    <div class="tb-left">
      <span class="tb-eyebrow">Tableau de bord</span>
      <span class="tb-title">Bonjour, Mohamed 👋</span>
    </div>
    <div class="tb-right">
      <div class="tb-date">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
        LUN 16 MAR 2026
      </div>
      <div class="tb-notif">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/></svg>
        <span class="tb-notif-dot"></span>
      </div>
      <a href="#" class="btn-new">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
        Nouvelle culture
      </a>
    </div>
  </div>

  <!-- Content -->
  <div class="content">

    <!-- Greeting -->
    <div class="greeting">
      <div>
        <div class="g-eyebrow">Exploitation El Haouz · Marrakech</div>
        <h1 class="g-title">Vue d'ensemble, <em>Printemps 2026</em></h1>
        <p class="g-sub">3 parcelles actives · 12 cultures · 3 alertes stock à traiter</p>
      </div>
      <div class="g-right">
        <div class="season-pill">🌱 Saison Printemps</div>
        <a href="#" class="btn-new" style="padding:.625rem 1.375rem;border-radius:12px;">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2m-6 9l2 2 4-4"/></svg>
          Voir les tâches
        </a>
      </div>
    </div>

    <!-- Stats row -->
    <div class="stats-row">
      <div class="stat-card">
        <div class="sc-top">
          <div class="sc-icon g"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg></div>
          <span class="sc-trend trend-up">↑ +3</span>
        </div>
        <div><div class="sc-num">12</div><div class="sc-label">Cultures actives</div></div>
      </div>
      <div class="stat-card">
        <div class="sc-top">
          <div class="sc-icon a"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg></div>
          <span class="sc-trend trend-dn">↓ −3</span>
        </div>
        <div><div class="sc-num">847</div><div class="sc-label">Unités en stock</div></div>
      </div>
      <div class="stat-card">
        <div class="sc-top">
          <div class="sc-icon b"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>
          <span class="sc-trend trend-flat">= 8</span>
        </div>
        <div><div class="sc-num">8</div><div class="sc-label">Membres actifs</div></div>
      </div>
      <div class="stat-card">
        <div class="sc-top">
          <div class="sc-icon r"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg></div>
          <span class="sc-trend trend-dn">↑ +1</span>
        </div>
        <div><div class="sc-num">3</div><div class="sc-label">Alertes stock</div></div>
      </div>
    </div>

    <div class="hero-banner">

  <div class="hb-img"></div>
  <div class="hb-overlay"></div>

  <div class="hb-content">

    <!-- LEFT SIDE -->
    <div>

      <div class="hb-tag">📍 Exploitation principale</div>

      <div class="hb-location">
        El Haouz
        <span>Marrakech · Maroc</span>
      </div>

      <div class="hb-stats">

        <div class="hbs-item">
          <div class="hbs-num">14.1 ha</div>
          <div class="hbs-lbl">Surface totale</div>
        </div>

        <div class="hbs-item">
          <div class="hbs-num">8.4t</div>
          <div class="hbs-lbl">Rendement prévu</div>
        </div>

        <div class="hbs-item">
          <div class="hbs-num">94%</div>
          <div class="hbs-lbl">Santé cultures</div>
        </div>

        <div class="hbs-item">
          <div class="hbs-num">J-6</div>
          <div class="hbs-lbl">Prochaine récolte</div>
        </div>

      </div>

    </div>

    <!-- RIGHT SIDE -->
    <div class="farm-map">
      🗺️ Carte des parcelles
    </div>

  </div>

</div>

    <!-- Cultures + Stock alerts -->
    <div class="two-col" style="margin-bottom:1.625rem;">

      <!-- Cultures -->
      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>
            Cultures en cours
          </span>
          <a href="#" class="panel-link">Voir tout →</a>
        </div>
        <div class="panel-body">
          <div class="cu-row">
            <div class="cu-thumb"><img src="https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=100&q=80&fit=crop" alt="Tomates"></div>
            <div class="cu-info"><div class="cu-name">Tomates</div><div class="cu-meta">Parcelle A · Saison Printemps</div></div>
            <span class="cu-status s-harvest">Récolte</span>
          </div>
          <div class="cu-row">
            <div class="cu-thumb"><img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=100&q=80&fit=crop" alt="Blé"></div>
            <div class="cu-info"><div class="cu-name">Blé dur</div><div class="cu-meta">Parcelle B · Saison Printemps</div></div>
            <span class="cu-status s-growth">Croissance</span>
          </div>
          <div class="cu-row">
            <div class="cu-thumb"><img src="https://images.unsplash.com/photo-1518977676405-a97d9e26d8c3?w=100&q=80&fit=crop" alt="Pommes de terre"></div>
            <div class="cu-info"><div class="cu-name">Pommes de terre</div><div class="cu-meta">Parcelle C · Saison Printemps</div></div>
            <span class="cu-status s-treat">Traitement</span>
          </div>
          <div class="cu-row">
            <div class="cu-thumb"><img src="https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2?w=100&q=80&fit=crop" alt="Oignons"></div>
            <div class="cu-info"><div class="cu-name">Oignons</div><div class="cu-meta">Parcelle A · Saison Printemps</div></div>
            <span class="cu-status s-plant">Plantation</span>
          </div>
        </div>
      </div>

      <!-- Stock Alerts — BIGGER -->
      <div class="stock-panel">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            Alertes Stock
          </span>
          <a href="#" class="panel-link">Gérer →</a>
        </div>
        <div class="alert-list">
          <div class="al-item al-red">
            <div class="al-icon-box red">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg>
            </div>
            <div class="al-info">
              <div class="al-name">Engrais NPK</div>
              <div class="al-sub">Stock critique — réapprovisionner immédiatement</div>
            </div>
            <div class="al-right">
              <div class="al-qty red">12</div>
              <div class="al-unit">kg restants</div>
            </div>
          </div>
          <div class="al-item al-amber">
            <div class="al-icon-box amber">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            </div>
            <div class="al-info">
              <div class="al-name">Semences Tomates</div>
              <div class="al-sub">Stock faible — commander bientôt</div>
            </div>
            <div class="al-right">
              <div class="al-qty amber">2.5</div>
              <div class="al-unit">kg restants</div>
            </div>
          </div>
          <div class="al-item al-amber">
            <div class="al-icon-box amber">
              <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <div class="al-info">
              <div class="al-name">Pesticide Cuivre</div>
              <div class="al-sub">Date d'expiration dans 5 jours</div>
            </div>
            <div class="al-right">
              <div class="al-qty amber">15</div>
              <div class="al-unit">litres restants</div>
            </div>
          </div>
        </div>
      </div>

    </div>

    <!-- PARCELLES — one row, wraps at 4+ -->
    <div class="parcelles-section">
      <div class="section-hdr">
        <span class="section-hdr-title">
          <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
          Mes Parcelles
        </span>
        <a href="#" class="panel-link">Voir toutes →</a>
      </div>

      <!-- 3 parcelles shown → all in one row. If you add a 4th it wraps to next line -->
      <div class="parcelles-row">

        <div class="parcelle-card">
          <div class="pc-photo">
            <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=400&q=80&fit=crop" alt="Parcelle A">
            <div class="pc-photo-overlay"></div>
            <span class="pc-status-tag">🟢 Active</span>
            <span class="pc-ha">4.2 ha</span>
          </div>
          <div class="pc-info">
            <div class="pc-name">Parcelle A — Nord</div>
            <div class="pc-crop">Tomates · Oignons</div>
            <div class="pc-prog-wrap">
              <div class="pc-prog-label"><span>Cycle</span><span>78%</span></div>
              <div class="pc-prog-bar"><div class="pc-prog-fill" style="width:78%"></div></div>
            </div>
          </div>
        </div>

        <div class="parcelle-card">
          <div class="pc-photo">
            <img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=400&q=80&fit=crop" alt="Parcelle B">
            <div class="pc-photo-overlay"></div>
            <span class="pc-status-tag">🟢 Active</span>
            <span class="pc-ha">6.8 ha</span>
          </div>
          <div class="pc-info">
            <div class="pc-name">Parcelle B — Ouest</div>
            <div class="pc-crop">Blé dur · Orge</div>
            <div class="pc-prog-wrap">
              <div class="pc-prog-label"><span>Cycle</span><span>52%</span></div>
              <div class="pc-prog-bar"><div class="pc-prog-fill" style="width:52%"></div></div>
            </div>
          </div>
        </div>

        <div class="parcelle-card">
          <div class="pc-photo">
            <img src="https://images.unsplash.com/photo-1416879595882-3373a0480b5b?w=400&q=80&fit=crop" alt="Parcelle C">
            <div class="pc-photo-overlay"></div>
            <span class="pc-status-tag">🟡 Traitement</span>
            <span class="pc-ha">3.1 ha</span>
          </div>
          <div class="pc-info">
            <div class="pc-name">Parcelle C — Sud</div>
            <div class="pc-crop">Pommes de terre</div>
            <div class="pc-prog-wrap">
              <div class="pc-prog-label"><span>Cycle</span><span>35%</span></div>
              <div class="pc-prog-bar"><div class="pc-prog-fill" style="width:35%"></div></div>
            </div>
          </div>
        </div>

        <!-- 4th parcelle — goes to next line automatically -->
        <div class="parcelle-card">
          <div class="pc-photo">
            <img src="https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=400&q=80&fit=crop" alt="Parcelle D">
            <div class="pc-photo-overlay"></div>
            <span class="pc-status-tag">🔵 Plantation</span>
            <span class="pc-ha">2.8 ha</span>
          </div>
          <div class="pc-info">
            <div class="pc-name">Parcelle D — Est</div>
            <div class="pc-crop">Tomates cerise</div>
            <div class="pc-prog-wrap">
              <div class="pc-prog-label"><span>Cycle</span><span>12%</span></div>
              <div class="pc-prog-bar"><div class="pc-prog-fill" style="width:12%"></div></div>
            </div>
          </div>
        </div>

      </div>
    </div>

    <!-- Bottom: Tasks + Activity + Weather -->
    <div class="bottom-row">

      <!-- Tasks -->
      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2m-6 9l2 2 4-4"/></svg>
            Tâches du jour
          </span>
          <a href="#" class="panel-link">Tout voir</a>
        </div>
        <div class="panel-body">
          <div class="task-list">
            <div class="task-item">
              <div class="task-chk done"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
              <div><div class="task-txt done">Irrigation Parcelle A</div><div class="task-time">06:00 · Terminé</div></div>
            </div>
            <div class="task-item">
              <div class="task-chk done"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg></div>
              <div><div class="task-txt done">Contrôle stock engrais</div><div class="task-time">08:30 · Terminé</div></div>
            </div>
            <div class="task-item">
              <div class="task-chk"></div>
              <div><div class="task-txt">Traitement pesticide — Parcelle C</div><div class="task-time">14:00 · En attente</div></div>
            </div>
            <div class="task-item">
              <div class="task-chk"></div>
              <div><div class="task-txt">Préparer récolte tomates</div><div class="task-time">16:00 · En attente</div></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Activity -->
      <div class="panel">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            Activité récente
          </span>
        </div>
        <div class="panel-body">
          <div class="act-item"><div class="act-dot"></div><div><div class="act-text">Récolte tomates — 320 kg ajoutés au stock</div><div class="act-time">Il y a 2h · Mohamed A.</div></div></div>
          <div class="act-item"><div class="act-dot a"></div><div><div class="act-text">⚠ Engrais NPK sous le seuil minimum</div><div class="act-time">Il y a 4h · Système</div></div></div>
          <div class="act-item"><div class="act-dot b"></div><div><div class="act-text">Karim B. assigné à Parcelle C — traitement</div><div class="act-time">Hier · Admin</div></div></div>
          <div class="act-item"><div class="act-dot"></div><div><div class="act-text">Blé dur → phase Croissance confirmée</div><div class="act-time">Hier · Système</div></div></div>
        </div>
      </div>

      <!-- Weather -->
      <div class="weather-panel">
        <div class="panel-head">
          <span class="panel-title">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h9a5 5 0 10-.1-9.999 5.002 5.002 0 10-9.78 2.096A4.001 4.001 0 003 15z"/></svg>
            Météo
          </span>
          <span style="font-size:.68rem;color:rgba(255,255,255,.4);">Marrakech</span>
        </div>
        <div class="wth-body">
          <div class="wth-top">
            <div>
              <div class="wth-loc">📍 Marrakech, MA</div>
              <div class="wth-temp">24°C</div>
              <div class="wth-desc">Ensoleillé · Idéal pour les cultures</div>
            </div>
            <div class="wth-emoji">☀️</div>
          </div>
          <div class="wth-grid">
            <div class="wth-item"><div class="wth-key">Humidité</div><div class="wth-val">38%</div></div>
            <div class="wth-item"><div class="wth-key">Vent</div><div class="wth-val">14 km/h</div></div>
            <div class="wth-item"><div class="wth-key">Pluie</div><div class="wth-val">0 mm</div></div>
            <div class="wth-item"><div class="wth-key">UV</div><div class="wth-val">Élevé</div></div>
          </div>
        </div>
      </div>

    </div>

  </div><!-- /content -->
</div><!-- /main -->

</body>
</html>