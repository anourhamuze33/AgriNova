<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>AgriNova — Récoltes</title>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,600;0,700;1,600&family=Outfit:wght@300;400;500;600;700&family=DM+Mono:wght@400;500&display=swap" rel="stylesheet">
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}
:root{
  --forest:#1b3a2d;--pine:#254d3a;--fern:#2e6b4f;
  --sage:#4a8c68;--mint:#6dbd8e;--dew:#b8dfc8;
  --fog:#e6f2eb;--parch:#f8f4ed;
  --muted:#5a6b55;--border:#c8dcc0;--text:#1a2318;
  --amber:#c98a12;--rust:#b84a1e;--blue:#2563eb;
  --white:#ffffff;--sidebar-w:250px;
  --amber-bg:rgba(201,138,18,.1);--rust-bg:rgba(184,74,30,.08);
  --blue-bg:rgba(37,99,235,.08);--sage-bg:rgba(74,140,104,.1);
  --mint-bg:rgba(109,189,142,.14);
}
html,body{height:100%;}
body{font-family:'Outfit',sans-serif;background:var(--parch);color:var(--text);display:flex;min-height:100vh;}
::-webkit-scrollbar{width:5px;} ::-webkit-scrollbar-thumb{background:var(--dew);border-radius:4px;}

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
.sb-badge.red{background:var(--rust);}
.sb-footer{padding:1rem .625rem;border-top:1px solid var(--border);}
.sb-user{display:flex;align-items:center;gap:10px;padding:.625rem .75rem;border-radius:10px;background:var(--fog);}
.sb-avatar{width:34px;height:34px;border-radius:50%;background:var(--forest);display:flex;align-items:center;justify-content:center;font-size:.75rem;font-weight:700;color:#fff;flex-shrink:0;}
.sb-uname{font-size:.8125rem;font-weight:600;color:var(--text);}
.sb-urole{font-size:.65rem;color:var(--muted);margin-top:1px;}

/* MAIN */
.main{flex:1;min-width:0;display:flex;flex-direction:column;overflow:hidden;}
.scroll{overflow-y:auto;flex:1;}

/* HERO */
.hero{
  background:linear-gradient(140deg,var(--forest) 0%,#1a4232 55%,#243d2b 100%);
  padding:2.5rem 2.5rem 0;position:relative;overflow:hidden;
}
.hero::before{
  content:'';position:absolute;inset:0;pointer-events:none;
  background:
    radial-gradient(ellipse at 80% 0%,rgba(109,189,142,.15) 0%,transparent 55%),
    radial-gradient(ellipse at 15% 110%,rgba(201,138,18,.08) 0%,transparent 45%);
}
.hero-deco{
  position:absolute;right:0;top:0;bottom:0;width:300px;
  background:url('https://images.unsplash.com/photo-1500382017468-9049fed747ef?w=600&q=50&fit=crop') right center/cover;
  opacity:.06;
  mask-image:linear-gradient(to left,rgba(0,0,0,.6),transparent);
  -webkit-mask-image:linear-gradient(to left,rgba(0,0,0,.6),transparent);
}
.hero-z{position:relative;z-index:2;}
.hero-top{display:flex;align-items:flex-start;justify-content:space-between;margin-bottom:2rem;gap:1rem;}
.hero-eyebrow{
  display:flex;align-items:center;gap:7px;
  font-size:.63rem;font-weight:700;letter-spacing:.14em;text-transform:uppercase;
  color:rgba(184,223,200,.65);margin-bottom:.625rem;
}
.hero-eyebrow::before{content:'';width:16px;height:1.5px;background:rgba(184,223,200,.35);}
.hero-title{
  font-family:'Playfair Display',serif;font-size:2.25rem;font-weight:700;
  color:#fff;line-height:1.05;letter-spacing:-.025em;
}
.hero-title em{font-style:italic;color:rgba(184,223,200,.8);}
.hero-sub{font-size:.875rem;color:rgba(255,255,255,.4);margin-top:.5rem;}
.hero-btns{display:flex;align-items:center;gap:.625rem;flex-shrink:0;}
.hbtn{display:flex;align-items:center;gap:7px;padding:.575rem 1.25rem;border-radius:10px;font-size:.8125rem;font-weight:700;font-family:'Outfit',sans-serif;cursor:pointer;transition:all .2s;text-decoration:none;}
.hbtn-ghost{background:rgba(255,255,255,.1);border:1.5px solid rgba(255,255,255,.2);color:rgba(255,255,255,.85);}
.hbtn-ghost:hover{background:rgba(255,255,255,.18);border-color:rgba(255,255,255,.35);}
.hbtn-mint{background:var(--mint);border:none;color:var(--forest);box-shadow:0 4px 16px rgba(109,189,142,.3);}
.hbtn-mint:hover{background:#7ed4a0;}
.hbtn svg{width:14px;height:14px;}

/* KPI strip */
.hero-kpis{display:grid;grid-template-columns:repeat(5,1fr);border-top:1px solid rgba(255,255,255,.09);}
.hk{padding:1.125rem 1.25rem;border-right:1px solid rgba(255,255,255,.07);transition:background .2s;}
.hk:last-child{border-right:none;}
.hk:hover{background:rgba(255,255,255,.05);}
.hk-em{font-size:1rem;margin-bottom:.375rem;line-height:1;}
.hk-n{font-family:'Playfair Display',serif;font-size:1.625rem;font-weight:700;color:#fff;line-height:1;}
.hk-l{font-size:.63rem;color:rgba(255,255,255,.38);margin-top:3px;}
.hk-t{display:inline-flex;align-items:center;font-size:.6rem;font-weight:700;padding:2px 7px;border-radius:20px;margin-top:5px;}
.ht-up{background:rgba(109,189,142,.18);color:var(--mint);}
.ht-dn{background:rgba(184,74,30,.2);color:#f4907a;}
.ht-nt{background:rgba(255,255,255,.07);color:rgba(255,255,255,.38);}

/* ALERTS */
.alerts{padding:.875rem 2.5rem;background:var(--white);border-bottom:1.5px solid var(--border);display:flex;flex-direction:column;gap:.5rem;}
.al{
  display:flex;align-items:center;gap:.875rem;
  padding:.75rem 1rem;border-radius:12px;border:1.5px solid transparent;
  animation:alin .3s ease both;
}
@keyframes alin{from{opacity:0;transform:translateY(-5px)}to{opacity:1;transform:translateY(0)}}
.al.late{background:rgba(184,74,30,.06);border-color:rgba(184,74,30,.18);}
.al.warn{background:rgba(201,138,18,.07);border-color:rgba(201,138,18,.2);}
.al.good{background:rgba(74,140,104,.07);border-color:rgba(74,140,104,.18);}
.al-dot{width:8px;height:8px;border-radius:50%;flex-shrink:0;}
.al.late .al-dot{background:var(--rust);box-shadow:0 0 0 3px rgba(184,74,30,.15);}
.al.warn .al-dot{background:var(--amber);box-shadow:0 0 0 3px rgba(201,138,18,.15);}
.al.good .al-dot{background:var(--sage);box-shadow:0 0 0 3px rgba(74,140,104,.15);}
.al-body{flex:1;min-width:0;}
.al-title{font-size:.8125rem;font-weight:700;color:var(--text);}
.al-sub{font-size:.7rem;color:var(--muted);margin-top:1px;}
.al-cta{font-size:.72rem;font-weight:700;color:var(--fern);text-decoration:none;white-space:nowrap;flex-shrink:0;}
.al-cta:hover{text-decoration:underline;}
.al-x{width:22px;height:22px;border-radius:50%;background:rgba(0,0,0,.05);border:none;cursor:pointer;display:flex;align-items:center;justify-content:center;color:var(--muted);flex-shrink:0;}
.al-x:hover{background:rgba(0,0,0,.1);}
.al-x svg{width:11px;height:11px;}

/* CONTENT */
.body{padding:1.75rem 2.5rem 3rem;display:flex;flex-direction:column;gap:1.5rem;}

/* FILTER BAR */
.fbar{
  background:var(--white);border:1.5px solid var(--border);
  border-radius:16px;padding:1rem 1.25rem;
  display:flex;flex-wrap:wrap;align-items:center;gap:.625rem;
}
.fl{font-size:.62rem;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--muted);white-space:nowrap;}
.fpipe{width:1px;height:20px;background:var(--border);flex-shrink:0;}
.fc{display:inline-flex;align-items:center;gap:5px;padding:.35rem .875rem;border-radius:20px;border:1.5px solid var(--border);background:var(--white);color:var(--muted);font-size:.775rem;font-weight:600;cursor:pointer;transition:all .18s;font-family:'Outfit',sans-serif;white-space:nowrap;}
.fc:hover{border-color:var(--sage);color:var(--fern);background:var(--fog);}
.fc.on{background:var(--forest);border-color:var(--forest);color:#fff;}
.fc-n{font-size:.58rem;font-weight:700;padding:1px 6px;border-radius:20px;background:rgba(255,255,255,.2);}
.fc:not(.on) .fc-n{background:var(--fog);color:var(--muted);}
.fsel{background:var(--parch);border:1.5px solid var(--border);border-radius:9px;padding:.375rem .75rem;font-size:.8rem;font-family:'Outfit',sans-serif;color:var(--text);cursor:pointer;outline:none;}
.fsel:focus{border-color:var(--sage);}
.fsrch{display:flex;align-items:center;gap:6px;background:var(--parch);border:1.5px solid var(--border);border-radius:9px;padding:.375rem .875rem;margin-left:auto;}
.fsrch:focus-within{border-color:var(--sage);background:var(--white);}
.fsrch svg{width:13px;height:13px;color:var(--muted);}
.fsrch input{border:none;outline:none;background:transparent;font-size:.8rem;font-family:'Outfit',sans-serif;color:var(--text);width:140px;}
.fsrch input::placeholder{color:#aab5a4;}

/* LAYOUT */
.layout{display:grid;grid-template-columns:1fr 310px;gap:1.5rem;align-items:start;}

/* TABLE */
.tcard{background:var(--white);border:1.5px solid var(--border);border-radius:18px;overflow:hidden;}
.thead{display:grid;grid-template-columns:minmax(0,2.4fr) 1.1fr 1.05fr 1fr 1fr 1fr .8fr;padding:.7rem 1.25rem;background:var(--fog);border-bottom:1.5px solid var(--border);}
.th{font-size:.61rem;font-weight:800;letter-spacing:.09em;text-transform:uppercase;color:var(--muted);display:flex;align-items:center;gap:4px;cursor:pointer;user-select:none;}
.th:hover{color:var(--fern);}
.th svg{width:10px;height:10px;opacity:.4;}
.trow{display:grid;grid-template-columns:minmax(0,2.4fr) 1.1fr 1.05fr 1fr 1fr 1fr .8fr;padding:.9rem 1.25rem;border-bottom:1px solid var(--border);align-items:center;transition:background .15s;cursor:pointer;}
.trow:last-child{border-bottom:none;}
.trow:hover{background:rgba(248,244,237,.7);}

.ccrop{display:flex;align-items:center;gap:.875rem;min-width:0;}
.cthumb{width:42px;height:42px;border-radius:9px;overflow:hidden;flex-shrink:0;border:1.5px solid var(--border);}
.cthumb img{width:100%;height:100%;object-fit:cover;display:block;}
.cn{font-family:'Playfair Display',serif;font-size:.9rem;font-weight:700;color:var(--forest);overflow:hidden;text-overflow:ellipsis;white-space:nowrap;}
.cm{font-size:.63rem;color:var(--muted);margin-top:2px;font-style:italic;}

.cparc{display:flex;align-items:center;gap:6px;font-size:.8rem;font-weight:600;color:var(--text);}
.pd{width:8px;height:8px;border-radius:50%;flex-shrink:0;}
.da{background:#4a8c68;}.db{background:#2563eb;}.dc{background:#c98a12;}.dd{background:#b84a1e;}

.cdate{font-size:.8rem;font-weight:600;color:var(--text);}
.dtag{display:inline-flex;font-size:.6rem;font-weight:700;padding:2px 7px;border-radius:20px;margin-top:3px;white-space:nowrap;}
.dt-l{background:rgba(184,74,30,.1);color:var(--rust);}
.dt-s{background:rgba(201,138,18,.1);color:var(--amber);}
.dt-o{background:rgba(74,140,104,.1);color:var(--sage);}
.dt-f{background:var(--fog);color:var(--muted);}

.cyield .yn{font-family:'DM Mono',monospace;font-size:.88rem;font-weight:700;color:var(--forest);}
.cyield .yu{font-size:.63rem;color:var(--muted);}
.ybar{height:4px;background:var(--fog);border-radius:2px;overflow:hidden;width:62px;margin-top:4px;}
.yfill{height:100%;border-radius:2px;background:linear-gradient(to right,var(--sage),var(--mint));}

.closs .lv{font-family:'DM Mono',monospace;font-size:.875rem;font-weight:700;}
.lv.ok{color:var(--sage);}
.lv.warn{color:var(--amber);}
.lv.crit{color:var(--rust);}
.lv.na{font-family:'Outfit',sans-serif;font-style:italic;font-size:.78rem;color:var(--muted);}

.sbadge{display:inline-flex;align-items:center;gap:4px;font-size:.6rem;font-weight:800;letter-spacing:.04em;text-transform:uppercase;padding:4px 10px;border-radius:20px;white-space:nowrap;}
.sbadge::before{content:'';width:5px;height:5px;border-radius:50%;}
.s-l{background:rgba(184,74,30,.1);color:var(--rust);}   .s-l::before{background:var(--rust);}
.s-s{background:var(--amber-bg);color:var(--amber);}     .s-s::before{background:var(--amber);}
.s-d{background:var(--sage-bg);color:var(--sage);}       .s-d::before{background:var(--sage);}
.s-p{background:var(--mint-bg);color:#28855a;}           .s-p::before{background:var(--mint);}
.s-pl{background:var(--blue-bg);color:var(--blue);}      .s-pl::before{background:var(--blue);}

/* Pagination */
.pagrow{display:flex;align-items:center;justify-content:space-between;padding:.875rem 1.25rem;background:var(--fog);border-top:1.5px solid var(--border);}
.pag-info{font-size:.75rem;color:var(--muted);}
.pag-btns{display:flex;gap:.3rem;}
.pag-btn{min-width:30px;height:30px;padding:0 .25rem;border-radius:8px;border:1.5px solid var(--border);background:var(--white);display:flex;align-items:center;justify-content:center;cursor:pointer;font-size:.78rem;font-weight:700;color:var(--muted);font-family:'Outfit',sans-serif;transition:all .15s;text-decoration:none;}
.pag-btn:hover{background:var(--fog);border-color:var(--sage);color:var(--fern);}
.pag-btn.cur{background:var(--forest);border-color:var(--forest);color:#fff;}
.pag-btn.off{opacity:.3;cursor:not-allowed;pointer-events:none;}
.pag-btn svg{width:12px;height:12px;}

/* SIDE */
.side{display:flex;flex-direction:column;gap:1.125rem;}
.panel{background:var(--white);border:1.5px solid var(--border);border-radius:16px;overflow:hidden;}
.phd{display:flex;align-items:center;justify-content:space-between;padding:.8rem 1.125rem;background:var(--fog);border-bottom:1.5px solid var(--border);}
.pht{font-family:'Playfair Display',serif;font-size:.9rem;font-weight:700;color:var(--forest);display:flex;align-items:center;gap:6px;}
.pht svg{width:14px;height:14px;color:var(--sage);}
.phl{font-size:.7rem;font-weight:700;color:var(--fern);text-decoration:none;}
.phl:hover{text-decoration:underline;}

/* Upcoming */
.upc-list{display:flex;flex-direction:column;}
.ui{display:flex;align-items:center;gap:.875rem;padding:.8rem 1.125rem;border-bottom:1px solid var(--border);transition:background .15s;cursor:pointer;}
.ui:last-child{border-bottom:none;}
.ui:hover{background:rgba(248,244,237,.7);}
.ucal{width:42px;height:42px;border-radius:11px;flex-shrink:0;display:flex;flex-direction:column;align-items:center;justify-content:center;border:1.5px solid transparent;}
.ucal.ur{background:rgba(184,74,30,.08);border-color:rgba(184,74,30,.18);}
.ucal.wn{background:rgba(201,138,18,.08);border-color:rgba(201,138,18,.18);}
.ucal.ok{background:rgba(74,140,104,.08);border-color:rgba(74,140,104,.18);}
.ucal.fr{background:var(--fog);border-color:var(--border);}
.uday{font-family:'Playfair Display',serif;font-size:1.05rem;font-weight:700;line-height:1;}
.ucal.ur .uday{color:var(--rust);}
.ucal.wn .uday{color:var(--amber);}
.ucal.ok .uday{color:var(--sage);}
.ucal.fr .uday{color:var(--muted);}
.umon{font-size:.52rem;font-weight:700;letter-spacing:.06em;text-transform:uppercase;margin-top:1px;}
.ucal.ur .umon{color:var(--rust);}
.ucal.wn .umon{color:var(--amber);}
.ucal.ok .umon{color:var(--sage);}
.ucal.fr .umon{color:var(--muted);}
.uinfo{flex:1;min-width:0;}
.uname{font-size:.8125rem;font-weight:700;color:var(--text);}
.usub{font-size:.68rem;color:var(--muted);margin-top:2px;}
.ubadge{font-size:.58rem;font-weight:800;padding:2px 8px;border-radius:20px;flex-shrink:0;}
.ub-ur{background:rgba(184,74,30,.1);color:var(--rust);}
.ub-wn{background:rgba(201,138,18,.1);color:var(--amber);}
.ub-ok{background:rgba(74,140,104,.1);color:var(--sage);}
.ub-fr{background:var(--fog);color:var(--muted);}

/* Chart */
.cbody{padding:1rem 1.125rem 1.125rem;}
.csubt{font-size:.65rem;color:var(--muted);margin-bottom:.875rem;}
.bars{display:flex;align-items:flex-end;gap:.375rem;height:80px;margin-bottom:.625rem;}
.bcol{display:flex;flex-direction:column;align-items:center;gap:3px;flex:1;}
.btrack{width:100%;border-radius:4px 4px 0 0;background:var(--fog);position:relative;min-height:4px;}
.bfill{position:absolute;bottom:0;left:0;right:0;border-radius:4px 4px 0 0;}
.bf-y{background:linear-gradient(to top,var(--sage),var(--mint));}
.bf-l{background:linear-gradient(to top,var(--rust),rgba(184,74,30,.45));}
.blbl{font-size:.54rem;color:var(--muted);text-align:center;font-weight:600;}
.bdiv{width:1px;background:var(--border);align-self:stretch;margin:0 2px;}
.legend{display:flex;gap:.875rem;justify-content:center;margin-top:.25rem;}
.leg{display:flex;align-items:center;gap:5px;font-size:.65rem;color:var(--muted);}
.legdot{width:8px;height:8px;border-radius:2px;}
.ly{background:var(--sage);} .ll{background:var(--rust);}

/* Loss breakdown */
.lbody{padding:.875rem 1.125rem;display:flex;flex-direction:column;gap:.6rem;}
.lr{display:flex;align-items:center;gap:.75rem;}
.lname{font-size:.775rem;font-weight:600;color:var(--text);width:92px;flex-shrink:0;}
.ltrack-w{flex:1;} .ltrack{height:7px;background:var(--fog);border-radius:4px;overflow:hidden;}
.lfill{height:100%;border-radius:4px;}
.lf-w{background:var(--blue);}
.lf-p{background:var(--rust);}
.lf-d{background:#8b5cf6;}
.lf-m{background:var(--amber);}
.lpct{font-size:.7rem;font-weight:700;color:var(--muted);width:30px;text-align:right;flex-shrink:0;}

/* Season card */
.scard{background:linear-gradient(140deg,var(--forest),#1a4232 60%,#243d2b);border-radius:16px;padding:1.125rem 1.25rem;border:1.5px solid rgba(255,255,255,.05);}
.sc-ttl{font-family:'Playfair Display',serif;font-size:.95rem;color:#fff;font-weight:700;margin-bottom:.875rem;}
.sc-g{display:grid;grid-template-columns:1fr 1fr;gap:.5rem;margin-bottom:.875rem;}
.sc-s{background:rgba(255,255,255,.08);border-radius:10px;padding:.6rem .75rem;}
.sc-l{font-size:.57rem;color:rgba(255,255,255,.38);text-transform:uppercase;letter-spacing:.07em;margin-bottom:2px;}
.sc-v{font-family:'Playfair Display',serif;font-size:1.15rem;font-weight:700;color:#fff;}
.sc-pl{display:flex;justify-content:space-between;font-size:.65rem;color:rgba(255,255,255,.4);margin-bottom:.35rem;}
.sc-pt{height:7px;background:rgba(255,255,255,.1);border-radius:4px;overflow:hidden;}
.sc-pf{height:100%;border-radius:4px;background:linear-gradient(90deg,var(--mint),#b8f0d0);}
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
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064"/></svg>Cultures<span class="sb-badge">12</span></a>
    <a href="#" class="sb-link active"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>Récoltes<span class="sb-badge red">2</span></a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 10V7"/></svg>Stocks</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Parcelles</a>
    <div class="sb-sec">Gestion</div>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Personnel</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>Rapports</a>
    <a href="#" class="sb-link"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>Paramètres</a>
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
<div class="scroll">

  <!-- HERO -->
  <div class="hero">
    <div class="hero-deco"></div>
    <div class="hero-z">
      <div class="hero-top">
        <div>
          <div class="hero-eyebrow">Exploitation El Haouz · Printemps 2026</div>
          <h1 class="hero-title">Gestion des <em>Récoltes</em></h1>
          <p class="hero-sub">Planification · Rendement · Pertes · Alertes · 4 parcelles actives</p>
        </div>
        <div class="hero-btns">
          <a href="#" class="hbtn hbtn-ghost">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
            Exporter CSV
          </a>
          <button class="hbtn hbtn-mint">
            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
            Planifier récolte
          </button>
        </div>
      </div>
      <div class="hero-kpis">
        <div class="hk">
          <div class="hk-em">🌾</div>
          <div class="hk-n">12</div>
          <div class="hk-l">Récoltes planifiées</div>
          <div class="hk-t ht-up">↑ +2 vs saison préc.</div>
        </div>
        <div class="hk">
          <div class="hk-em">📦</div>
          <div class="hk-n">14.2t</div>
          <div class="hk-l">Rendement total prévu</div>
          <div class="hk-t ht-up">↑ +8% vs objectif</div>
        </div>
        <div class="hk">
          <div class="hk-em">📉</div>
          <div class="hk-n">6.4%</div>
          <div class="hk-l">Pertes moyennes</div>
          <div class="hk-t ht-dn">Objectif : &lt;8%</div>
        </div>
        <div class="hk">
          <div class="hk-em">🚨</div>
          <div class="hk-n">2</div>
          <div class="hk-l">En retard</div>
          <div class="hk-t ht-nt">Action requise</div>
        </div>
        <div class="hk">
          <div class="hk-em">✅</div>
          <div class="hk-n">5</div>
          <div class="hk-l">Terminées ce cycle</div>
          <div class="hk-t ht-up">↑ 93.6% efficacité</div>
        </div>
      </div>
    </div>
  </div>

  <!-- ALERTS -->
  <div class="alerts">
    <div class="al late" id="a1">
      <div class="al-dot"></div>
      <div class="al-body">
        <div class="al-title">Récolte en retard — Tomates Roma · Parcelle A</div>
        <div class="al-sub">Prévue le 22 Mar 2026 · J+2 de retard · Risque de surmaturation élevé — intervenir immédiatement</div>
      </div>
      <a href="#" class="al-cta">Voir la culture →</a>
      <button class="al-x" onclick="dismiss('a1')"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    </div>
    <div class="al warn" id="a2">
      <div class="al-dot"></div>
      <div class="al-body">
        <div class="al-title">Récolte dans 5 jours — Menthe Verte · Parcelle A</div>
        <div class="al-sub">Prévue le 30 Mar 2026 · Préparer équipes et équipements · Vérifier météo avant intervention</div>
      </div>
      <a href="#" class="al-cta">Planifier →</a>
      <button class="al-x" onclick="dismiss('a2')"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    </div>
    <div class="al good" id="a3">
      <div class="al-dot"></div>
      <div class="al-body">
        <div class="al-title">Récolte réussie — Blé Dur · Parcelle B · +8% vs prévisions</div>
        <div class="al-sub">Rendement final : 2.1t · Pertes : 4.0% · Stock disponible en attente de traitement</div>
      </div>
      <a href="#" class="al-cta">Voir rapport →</a>
      <button class="al-x" onclick="dismiss('a3')"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg></button>
    </div>
  </div>

  <!-- BODY -->
  <div class="body">

    <!-- FILTER BAR -->
    <div class="fbar">
      <span class="fl">Filtrer</span>
      <div class="fpipe"></div>
      <button class="fc on" onclick="chip(this)">Toutes <span class="fc-n">12</span></button>
      <button class="fc" onclick="chip(this)">🚨 En retard <span class="fc-n">2</span></button>
      <button class="fc" onclick="chip(this)">⏰ À venir <span class="fc-n">4</span></button>
      <button class="fc" onclick="chip(this)">✅ Terminées <span class="fc-n">5</span></button>
      <button class="fc" onclick="chip(this)">📋 Planifiées <span class="fc-n">1</span></button>
      <div class="fpipe"></div>
      <select class="fsel">
        <option value="">Toutes les cultures</option>
        <option>Tomates Roma</option><option>Blé Dur</option>
        <option>Oignons Rouges</option><option>Menthe Verte</option>
        <option>Tournesol</option><option>Pommes de terre</option>
      </select>
      <select class="fsel">
        <option value="">Toutes les parcelles</option>
        <option>Parcelle A — Nord</option><option>Parcelle B — Ouest</option>
        <option>Parcelle C — Sud</option><option>Parcelle D — Est</option>
      </select>
      <select class="fsel">
        <option>🌸 Printemps 2026</option><option>☀️ Été 2025</option>
        <option>🍂 Automne 2025</option><option>❄️ Hiver 2025</option>
      </select>
      <input type="month" class="fsel" value="2026-03">
      <div class="fsrch">
        <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
        <input type="text" placeholder="Rechercher...">
      </div>
    </div>

    <!-- LAYOUT -->
    <div class="layout">

      <!-- TABLE -->
      <div class="tcard">
        <div class="thead">
          <div class="th">Culture <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16V4m0 0L3 8m4-4l4 4M17 8v12m0 0l4-4m-4 4l-4-4"/></svg></div>
          <div class="th">Parcelle</div>
          <div class="th">Date récolte</div>
          <div class="th">Yield prévu</div>
          <div class="th">Yield réel</div>
          <div class="th">Pertes</div>
          <div class="th" style="justify-content:flex-end">Statut</div>
        </div>

        <!-- Row 1 Late -->
        <div class="trow">
          <div class="ccrop">
            <div class="cthumb"><img src="https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=84&q=80&fit=crop" alt=""></div>
            <div><div class="cn">Tomates Roma</div><div class="cm">🌸 Printemps · C1-2026</div></div>
          </div>
          <div class="cparc"><span class="pd da"></span>Parcelle A</div>
          <div><div class="cdate">22 Mar 2026</div><span class="dtag dt-l">J+2 · Retard 🚨</span></div>
          <div class="cyield"><div><span class="yn">1.8</span><span class="yu"> t</span></div><div class="ybar"><div class="yfill" style="width:100%"></div></div></div>
          <div><span class="lv na">—</span></div>
          <div class="closs"><span class="lv na">—</span></div>
          <div style="display:flex;justify-content:flex-end"><span class="sbadge s-l">En retard</span></div>
        </div>

        <!-- Row 2 Warn -->
        <div class="trow">
          <div class="ccrop">
            <div class="cthumb"><img src="https://images.unsplash.com/photo-1628556270448-4d4e4148e1b1?w=84&q=80&fit=crop" alt=""></div>
            <div><div class="cn">Menthe Verte</div><div class="cm">🌸 Printemps · C4-2026</div></div>
          </div>
          <div class="cparc"><span class="pd da"></span>Parcelle A</div>
          <div><div class="cdate">30 Mar 2026</div><span class="dtag dt-s">Dans 5 jours ⚠️</span></div>
          <div class="cyield"><div><span class="yn">0.3</span><span class="yu"> t</span></div><div class="ybar"><div class="yfill" style="width:70%"></div></div></div>
          <div><span class="lv na">—</span></div>
          <div class="closs"><span class="lv na">—</span></div>
          <div style="display:flex;justify-content:flex-end"><span class="sbadge s-s">À venir</span></div>
        </div>

        <!-- Row 3 Coming -->
        <div class="trow">
          <div class="ccrop">
            <div class="cthumb"><img src="https://images.unsplash.com/photo-1601004890684-d8cbf643f5f2?w=84&q=80&fit=crop" alt=""></div>
            <div><div class="cn">Oignons Rouges</div><div class="cm">🌸 Printemps · C3-2026</div></div>
          </div>
          <div class="cparc"><span class="pd da"></span>Parcelle A</div>
          <div><div class="cdate">15 Mai 2026</div><span class="dtag dt-o">Dans 50 j.</span></div>
          <div class="cyield"><div><span class="yn">0.8</span><span class="yu"> t</span></div><div class="ybar"><div class="yfill" style="width:55%"></div></div></div>
          <div><span class="lv na">—</span></div>
          <div class="closs"><span class="lv na">—</span></div>
          <div style="display:flex;justify-content:flex-end"><span class="sbadge s-s">À venir</span></div>
        </div>

        <!-- Row 4 Done good -->
        <div class="trow">
          <div class="ccrop">
            <div class="cthumb"><img src="https://images.unsplash.com/photo-1574943320219-553eb213f72d?w=84&q=80&fit=crop" alt=""></div>
            <div><div class="cn">Blé Dur</div><div class="cm">❄️ Hiver · C2-2026</div></div>
          </div>
          <div class="cparc"><span class="pd db"></span>Parcelle B</div>
          <div><div class="cdate">10 Mar 2026</div><span class="dtag dt-o">✓ Récolté</span></div>
          <div class="cyield"><div><span class="yn">2.0</span><span class="yu"> t</span></div><div class="ybar"><div class="yfill" style="width:100%"></div></div></div>
          <div><div class="cyield"><span class="yn" style="color:var(--sage)">2.1</span><span class="yu"> t</span></div><div style="font-size:.6rem;color:var(--sage);margin-top:2px">+5% prévu</div></div>
          <div class="closs"><div class="lv ok">4.0%</div></div>
          <div style="display:flex;justify-content:flex-end"><span class="sbadge s-d">Terminé</span></div>
        </div>

        <!-- Row 5 Done loss -->
        <div class="trow">
          <div class="ccrop">
            <div class="cthumb"><img src="https://images.unsplash.com/photo-1518977676405-a97d9e26d8c3?w=84&q=80&fit=crop" alt=""></div>
            <div><div class="cn">Pommes de terre</div><div class="cm">🌸 Printemps · C3-2025</div></div>
          </div>
          <div class="cparc"><span class="pd dc"></span>Parcelle C</div>
          <div><div class="cdate">05 Mar 2026</div><span class="dtag dt-o">✓ Récolté</span></div>
          <div class="cyield"><div><span class="yn">1.2</span><span class="yu"> t</span></div><div class="ybar"><div class="yfill" style="width:78%"></div></div></div>
          <div><div class="cyield"><span class="yn" style="color:var(--amber)">0.9</span><span class="yu"> t</span></div><div style="font-size:.6rem;color:var(--rust);margin-top:2px">−25% prévu</div></div>
          <div class="closs"><div class="lv crit">14.2%</div></div>
          <div style="display:flex;justify-content:flex-end"><span class="sbadge s-p">Partiel</span></div>
        </div>

        <!-- Row 6 Planned -->
        <div class="trow">
          <div class="ccrop">
            <div class="cthumb"><img src="https://images.unsplash.com/photo-1530908295418-a12e326966ba?w=84&q=80&fit=crop" alt=""></div>
            <div><div class="cn">Tournesol</div><div class="cm">🌸 Printemps · C5-2026</div></div>
          </div>
          <div class="cparc"><span class="pd db"></span>Parcelle B</div>
          <div><div class="cdate">20 Jul 2026</div><span class="dtag dt-f">Dans 124 j.</span></div>
          <div class="cyield"><div><span class="yn">0.6</span><span class="yu"> t</span></div><div class="ybar"><div class="yfill" style="width:10%"></div></div></div>
          <div><span class="lv na">—</span></div>
          <div class="closs"><span class="lv na">—</span></div>
          <div style="display:flex;justify-content:flex-end"><span class="sbadge s-pl">Planifiée</span></div>
        </div>

        <!-- Pagination -->
        <div class="pagrow">
          <span class="pag-info">Affichage 1–6 sur 12 récoltes</span>
          <div class="pag-btns">
            <span class="pag-btn off"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg></span>
            <a href="#" class="pag-btn cur">1</a>
            <a href="#" class="pag-btn">2</a>
            <a href="#" class="pag-btn"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg></a>
          </div>
        </div>
      </div>

      <!-- SIDE -->
      <div class="side">

        <!-- Upcoming -->
        <div class="panel">
          <div class="phd">
            <span class="pht"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>Prochaines récoltes</span>
            <a href="#" class="phl">Tout voir →</a>
          </div>
          <div class="upc-list">
            <div class="ui"><div class="ucal ur"><div class="uday">22</div><div class="umon">Mar</div></div><div class="uinfo"><div class="uname">Tomates Roma</div><div class="usub">Parcelle A · 1.8 t prévu</div></div><span class="ubadge ub-ur">Retard</span></div>
            <div class="ui"><div class="ucal wn"><div class="uday">30</div><div class="umon">Mar</div></div><div class="uinfo"><div class="uname">Menthe Verte</div><div class="usub">Parcelle A · 0.3 t prévu</div></div><span class="ubadge ub-wn">5 jours</span></div>
            <div class="ui"><div class="ucal wn"><div class="uday">25</div><div class="umon">Avr</div></div><div class="uinfo"><div class="uname">Blé Dur · lot 2</div><div class="usub">Parcelle B · 1.4 t prévu</div></div><span class="ubadge ub-wn">35 j.</span></div>
            <div class="ui"><div class="ucal ok"><div class="uday">15</div><div class="umon">Mai</div></div><div class="uinfo"><div class="uname">Oignons Rouges</div><div class="usub">Parcelle A · 0.8 t prévu</div></div><span class="ubadge ub-ok">50 j.</span></div>
            <div class="ui"><div class="ucal fr"><div class="uday">20</div><div class="umon">Jul</div></div><div class="uinfo"><div class="uname">Tournesol</div><div class="usub">Parcelle B · 0.6 t prévu</div></div><span class="ubadge ub-fr">124 j.</span></div>
          </div>
        </div>

        <!-- Yield vs Loss -->
        <div class="panel">
          <div class="phd">
            <span class="pht"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/></svg>Rendement vs Pertes</span>
          </div>
          <div class="cbody">
            <div class="csubt">Par parcelle — saison en cours</div>
            <div class="bars">
              <div class="bcol"><div class="btrack" style="height:75px"><div class="bfill bf-y" style="height:75%"></div></div><div class="blbl">A·2.1t</div></div>
              <div class="bcol"><div class="btrack" style="height:75px"><div class="bfill bf-l" style="height:11%"></div></div><div class="blbl">8%</div></div>
              <div class="bdiv"></div>
              <div class="bcol"><div class="btrack" style="height:75px"><div class="bfill bf-y" style="height:100%"></div></div><div class="blbl">B·3.5t</div></div>
              <div class="bcol"><div class="btrack" style="height:75px"><div class="bfill bf-l" style="height:5%"></div></div><div class="blbl">4%</div></div>
              <div class="bdiv"></div>
              <div class="bcol"><div class="btrack" style="height:75px"><div class="bfill bf-y" style="height:50%"></div></div><div class="blbl">C·0.9t</div></div>
              <div class="bcol"><div class="btrack" style="height:75px"><div class="bfill bf-l" style="height:21%"></div></div><div class="blbl">14%</div></div>
            </div>
            <div class="legend">
              <div class="leg"><div class="legdot ly"></div>Rendement</div>
              <div class="leg"><div class="legdot ll"></div>Pertes</div>
            </div>
          </div>
        </div>

        <!-- Loss causes -->
        <div class="panel">
          <div class="phd">
            <span class="pht"><svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 14l6-6m-5.5.5h.01m4.99 5h.01M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16l3.5-2 3.5 2 3.5-2 3.5 2z"/></svg>Causes des pertes</span>
          </div>
          <div class="lbody">
            <div class="lr"><span class="lname">Météo</span><div class="ltrack-w"><div class="ltrack"><div class="lfill lf-w" style="width:42%"></div></div></div><span class="lpct">42%</span></div>
            <div class="lr"><span class="lname">Nuisibles</span><div class="ltrack-w"><div class="ltrack"><div class="lfill lf-p" style="width:28%"></div></div></div><span class="lpct">28%</span></div>
            <div class="lr"><span class="lname">Maladies</span><div class="ltrack-w"><div class="ltrack"><div class="lfill lf-d" style="width:18%"></div></div></div><span class="lpct">18%</span></div>
            <div class="lr"><span class="lname">Manipulation</span><div class="ltrack-w"><div class="ltrack"><div class="lfill lf-m" style="width:12%"></div></div></div><span class="lpct">12%</span></div>
          </div>
        </div>

        <!-- Season bilan -->
        <div class="scard">
          <div class="sc-ttl">Bilan Saison Printemps 2026</div>
          <div class="sc-g">
            <div class="sc-s"><div class="sc-l">Récolté</div><div class="sc-v">3.0 t</div></div>
            <div class="sc-s"><div class="sc-l">Restant</div><div class="sc-v">11.2 t</div></div>
            <div class="sc-s"><div class="sc-l">Efficacité</div><div class="sc-v">93.6%</div></div>
            <div class="sc-s"><div class="sc-l">Pertes totales</div><div class="sc-v">0.21 t</div></div>
          </div>
          <div class="sc-pl"><span>Avancement saison</span><span>21%</span></div>
          <div class="sc-pt"><div class="sc-pf" style="width:21%"></div></div>
        </div>

      </div>
    </div>
  </div>
</div>
</div>

<script>
function dismiss(id){
  const el=document.getElementById(id);
  el.style.transition='all .3s ease';
  el.style.opacity='0';el.style.maxHeight='0';
  el.style.padding='0';el.style.overflow='hidden';
  setTimeout(()=>el.remove(),320);
}
function chip(el){
  document.querySelectorAll('.fc').forEach(c=>c.classList.remove('on'));
  el.classList.add('on');
}
</script>
</body>
</html>