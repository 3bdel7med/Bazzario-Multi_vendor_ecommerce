
// ── Mobile menu
function toggleMenu(){
  const ham=document.getElementById('ham');
  const menu=document.getElementById('mobileMenu');
  ham.classList.toggle('open');
  menu.classList.toggle('open');
  document.body.style.overflow=menu.classList.contains('open')?'hidden':'';
}

// ── Hero slider
let cur=0,sliderTimer;
const slides=document.querySelectorAll('.slide');
const sdots=document.querySelectorAll('.sdot');
function goSlide(n){
  slides[cur].classList.remove('active');
  sdots[cur].classList.remove('active');
  cur=(n+slides.length)%slides.length;
  slides[cur].classList.add('active');
  sdots[cur].classList.add('active');
}
function slideNext(){clearInterval(sliderTimer);goSlide(cur+1);startSlider()}
function slidePrev(){clearInterval(sliderTimer);goSlide(cur-1);startSlider()}
function startSlider(){sliderTimer=setInterval(()=>goSlide(cur+1),4500)}
startSlider();

// ── Countdown
function tick(){
  const h=document.getElementById('ch'),m=document.getElementById('cm'),s=document.getElementById('cs');
  let sv=parseInt(s.textContent),mv=parseInt(m.textContent),hv=parseInt(h.textContent);
  sv--;if(sv<0){sv=59;mv--;if(mv<0){mv=59;hv--;if(hv<0)hv=23}}
  s.textContent=String(sv).padStart(2,'0');
  m.textContent=String(mv).padStart(2,'0');
  h.textContent=String(hv).padStart(2,'0');
}
setInterval(tick,1000);

// ── Tabs
document.querySelectorAll('.tab').forEach(t=>{
  t.addEventListener('click',()=>{
    document.querySelectorAll('.tab').forEach(x=>x.classList.remove('active'));
    t.classList.add('active');
  });
});

// ── Filter checkboxes
document.querySelectorAll('.filter-item').forEach(item=>{
  item.addEventListener('click',()=>{
    const c=item.querySelector('.check');
    c.classList.toggle('checked');
    c.textContent=c.classList.contains('checked')?'✓':'';
  });
});

// ── Mobile filter toggle
function toggleFilter(){
  const s=document.getElementById('filterSidebar');
  const a=document.getElementById('filterArrow');
  s.classList.toggle('open');
  a.textContent=s.classList.contains('open')?'▴':'▾';
}

// ── Wishlist toggle
document.querySelectorAll('.prod-wish').forEach(w=>{
  w.addEventListener('click',e=>{
    e.stopPropagation();
    w.textContent=w.textContent==='🤍'?'❤️':'🤍';
  });
});

// ── Scroll-based fade-in
const observer=new IntersectionObserver(entries=>{
  entries.forEach(e=>{
    if(e.isIntersecting){
      e.target.style.animationPlayState='running';
      observer.unobserve(e.target);
    }
  });
},{threshold:0.1});
document.querySelectorAll('.prod-card,.vendor-card,.cat-item').forEach(el=>{
  el.style.opacity='0';
  el.style.animation='fadeup 0.5s ease both paused';
  observer.observe(el);
});
