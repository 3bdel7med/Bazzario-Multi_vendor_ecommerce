

// ====== CHAT ENGINE INTEGRATION LOGIC ======
let activeVendorName = "";
const mockReplies = {
  "soundwave": ["Hello! Thanks for reaching out. Are you inquiring about our ANC Pro Wireless headphones or technical specifications?", "Excellent question! All our acoustic components carry a full 1-year modular factory replacement warranty.", "We process audio shipments within 24 hours. Your order updates will post directly into your checkout ledger."],
  "loomthread": ["Greetings! Welcome to our custom atelier channel. Looking for sizing charts or summer collection restocking updates?", "Our linen components are strictly crafted from natural fiber ecosystems.", "Absolutely! You can choose custom modifications at the checkout layout stage."],
  "glowlab": ["Hi there! GlowLab representative here. Let us know if you need assistance identifying your optimal skincare serum variant.", "Our entire batch inventory passes comprehensive independent patch testing.", "We currently have a 15% discount voucher available for our multi-pack bundles! Just apply it in your checkout bag."],
  "default": ["Thank you for messaging our marketplace store network! An assistant will respond to your custom account query shortly."]
};

function toggleChatWidget() {
  const widget = document.getElementById('chatWidget');
  widget.classList.toggle('open');
  if (widget.classList.contains('open')) {
    document.getElementById('chatLauncher').textContent = "✕";
  } else {
    document.getElementById('chatLauncher').textContent = "💬";
  }
}

function openChatWithVendor(vendorName, avatarIcon) {
  activeVendorName = vendorName;

  // Update Widget Top Panel UI
  document.getElementById('chatVendorName').textContent = vendorName;
  document.getElementById('chatVendorStatus').textContent = "Online • Verified Vendor";
  document.querySelector('#chatActiveProfile .chat-vendor-avatar').textContent = avatarIcon;

  // Slide Switch panels
  document.getElementById('chatChannels').style.display = "none";
  document.getElementById('chatViewport').style.display = "flex";
  document.getElementById('chatFooter').style.display = "flex";
  document.getElementById('chatBackBtn').style.display = "block";

  // Clear layout & spin an introductory welcome statement
  const viewport = document.getElementById('chatViewport');
  viewport.innerHTML = `
    <div class="chat-msg-bubble vendor">
      Hello! Welcome to the official <b>${vendorName}</b> customer service desk. How can we optimize your marketplace experience today?
    </div>
  `;

  // Ensure widget itself is showing
  const widget = document.getElementById('chatWidget');
  if (!widget.classList.contains('open')) {
    toggleChatWidget();
  }
}

function exitToChannelList() {
  document.getElementById('chatChannels').style.display = "block";
  document.getElementById('chatViewport').style.display = "none";
  document.getElementById('chatFooter').style.display = "none";
  document.getElementById('chatBackBtn').style.display = "none";

  document.getElementById('chatVendorName').textContent = "Vendor Channels";
  document.getElementById('chatVendorStatus').textContent = "Select an open dialogue";
  document.querySelector('#chatActiveProfile .chat-vendor-avatar').textContent = "🏪";
}

function handleChatKeyPress(event) {
  if (event.key === 'Enter') {
    dispatchUserChatMessage();
  }
}

function dispatchUserChatMessage() {
  const input = document.getElementById('chatInputField');
  const text = input.value.trim();
  if (!text) return;

  const viewport = document.getElementById('chatViewport');

  // Append user node
  const userBubble = document.createElement('div');
  userBubble.className = 'chat-msg-bubble user';
  userBubble.textContent = text;
  viewport.appendChild(userBubble);

  input.value = "";
  viewport.scrollTop = viewport.scrollHeight;

  // Trigger simulated vendor background latency delay loops
  setTimeout(() => {
    const key = activeVendorName.toLowerCase();
    const list = mockReplies[key] || mockReplies["default"];
    const randomReply = list[Math.floor(Math.random() * list.length)];

    const vendorBubble = document.createElement('div');
    vendorBubble.className = 'chat-msg-bubble vendor';
    vendorBubble.innerHTML = randomReply;

    viewport.appendChild(vendorBubble);
    viewport.scrollTop = viewport.scrollHeight;
  }, 1100);
}

// ====== PAGE NAVIGATION ROUTER SYSTEM ======


// ====== TEMPLATE 1 SCRIPTS ======
function toggleMenu(){
  const ham=document.getElementById('ham');
  const menu=document.getElementById('mobileMenu');
  ham.classList.toggle('open');
  menu.classList.toggle('open');
  document.body.style.overflow=menu.classList.contains('open')?'hidden':'';
}

let cur=0,sliderTimer;
const slides=document.querySelectorAll('.slide');
const sdots=document.querySelectorAll('.sdot');
function goSlide(n){
  if(!slides.length) return;
  slides[cur].classList.remove('active');
  sdots[cur].classList.remove('active');
  cur=(n+slides.length)%slides.length;
  slides[cur].classList.add('active');
  sdots[cur].classList.add('active');
}
function slideNext(){clearInterval(sliderTimer);goSlide(cur+1);startSlider()}
function slidePrev(){clearInterval(sliderTimer);goSlide(cur-1);startSlider()}
function startSlider(){sliderTimer=setInterval(()=>goSlide(cur+1),4500)}
if(slides.length) startSlider();
/*

function tick(){
  const h=document.getElementById('ch'),m=document.getElementById('cm'),s=document.getElementById('cs');
  if(!h || !m || !s) return;
  let sv=parseInt(s.textContent),mv=parseInt(m.textContent),hv=parseInt(h.textContent);
  sv--;if(sv<0){sv=59;mv--;if(mv<0){mv=59;hv--;if(hv<0)hv=23}}
  s.textContent=String(sv).padStart(2,'0');
  m.textContent=String(mv).padStart(2,'0');
  h.textContent=String(hv).padStart(2,'0');
}
setInterval(tick,1000);

// ====== TEMPLATE 2 RENDERING ENGINE ======
function setFilter(el) {
  el.parentNode.querySelectorAll('.filter-pill-t2').forEach(p => p.classList.remove('active'));
  el.classList.add('active');
  showToastCustom(`Filter preset structural variant: ${el.textContent}`);
}

function renderArrivals(data) {
  const grid = document.getElementById('arrivalsGrid');
  if(!grid) return;
  grid.innerHTML = data.map(p => `
    <div class="col-6 col-md-4">
      <div class="product-card-t2">
        <div class="product-img-placeholder-t2">
          <span>${p.icon}</span>
          <button class="wish-btn" style="position:absolute; top:10px; right:10px; background:white; border:none; border-radius:50%; width:30px; height:30px;">🤍</button>
        </div>
        <div class="product-body">
          <div class="product-vendor">${p.vendor}</div>
          <div class="fw-bold fs-6 my-1">${p.name}</div>
          <div class="text-warning small">${'★'.repeat(p.stars)}</div>
          <div class="mt-2">
            <span class="fw-bold text-danger">$${p.price}</span>
            <del class="text-muted small ms-2">$${p.old}</del>
          </div>
          <button class="btn-cart-t2" onclick="addToCartStack(${p.id},'${p.name.replace(/'/g,"\\'")}','${p.vendor}',${p.price},'${p.icon}')">Add to Cart</button>
        </div>
      </div>
    </div>
  `).join('');
}

function filterArrivals() {
  const q = document.getElementById('arrivalSearch').value.toLowerCase();
  const filtered = arrivalsData.filter(p => p.name.toLowerCase().includes(q) || p.vendor.toLowerCase().includes(q));
  renderArrivals(filtered);
}

function renderCategories() {
  const grid = document.getElementById('categoriesGrid');
  if(!grid) return;
  grid.innerHTML = categoriesData.map(c => `
    <div class="col-6 col-md-4">
      <div class="category-card-t2">
        <div style="font-size:32px" class="mb-2">${c.icon}</div>
        <div class="fw-bold">${c.name}</div>
        <div class="text-muted small">${c.count}</div>
      </div>
    </div>
  `).join('');
}

function renderVendors() {
  const grid = document.getElementById('vendorsGrid');
  if(!grid) return;
  grid.innerHTML = vendorsData.map(v => `
    <div class="col-12 col-md-4">
      <div class="vendor-card-t2">
        <div class="vendor-banner-t2" style="background:${v.banner};"></div>
        <div class="vendor-logo-t2">${v.icon}</div>
        <div class="p-3 pt-4">
          <div class="fw-bold fs-5">${v.name}</div>
          <div class="text-muted small mb-2">${v.cat}</div>
          <div class="d-flex justify-content-between text-center border-top pt-2 mt-2">
            <div><small class="text-muted d-block">Rating</small><b>${v.rating} ★</b></div>
            <div><small class="text-muted d-block">Sales</small><b>${v.sales}</b></div>
          </div>
        </div>
      </div>
    </div>
  `).join('');
}

function renderFlash() {
  const grid = document.getElementById('flashGrid');
  if(!grid) return;
  grid.innerHTML = flashData.map(p => `
    <div class="col-6 col-md-4">
      <div class="product-card-t2">
        <div class="product-img-placeholder-t2">
          <span>${p.icon}</span>
        </div>
        <div class="product-body">
          <div class="product-vendor">${p.vendor}</div>
          <div class="fw-bold my-1">${p.name}</div>
          <div><span class="text-danger fw-bold">$${p.price}</span> <del class="text-muted small">$${p.old}</del></div>
          <div class="progress mt-2" style="height:6px"><div class="progress-bar bg-danger" style="width:${p.sold}%"></div></div>
          <div class="small text-muted mt-1">${p.sold}% Claimed</div>
          <button class="btn-cart-t2" onclick="addToCartStack(${p.id},'${p.name.replace(/'/g,"\\'")}','${p.vendor}',${p.price},'${p.icon}')">Grab Deal</button>
        </div>
      </div>
    </div>
  `).join('');
}

function renderBlog() {
  const grid = document.getElementById('blogGrid');
  if(!grid) return;
  grid.innerHTML = blogData.map(b => `
    <div class="col-12 col-md-4">
      <div class="blog-card-t2">
        <div class="blog-img-t2"><span>${b.icon}</span><span class="blog-tag-t2">${b.tag}</span></div>
        <div class="p-3">
          <small class="text-muted">${b.date}</small>
          <h5 class="my-2">${b.title}</h5>
          <p class="text-muted small">${b.excerpt}</p>
        </div>
      </div>
    </div>
  `).join('');
}

function renderCart() {
  const el = document.getElementById('cartContent');
  if(!el) return;
  const total = cartItems.reduce((s, i) => s + i.price * i.qty, 0);

  if (cartItems.length === 0) {
    el.innerHTML = `<div class="p-5 text-center bg-white rounded-4 border"><h5>Your e-basket looks empty!</h5><button class="btn btn-dark btn-sm mt-2" onclick="showModularPage('home')">Back to Mall</button></div>`;
    return;
  }

  el.innerHTML = `
    ${cartItems.map(item => `
      <div class="cart-item-t2">
        <div class="d-flex gap-3 align-items-center">
          <div class="cart-item-img-t2">${item.icon}</div>
          <div class="flex-grow-1">
            <div class="fw-bold">${item.name}</div>
            <small class="text-muted">${item.vendor}</small>
            <div class="d-flex align-items-center justify-content-between mt-2">
              <div class="qty-ctrl-t2">
                <button class="qty-btn-t2" onclick="changeQtyStack(${item.id},-1)">−</button>
                <span class="mx-2 fw-bold">${item.qty}</span>
                <button class="qty-btn-t2" onclick="changeQtyStack(${item.id},1)">+</button>
              </div>
              <div class="fw-bold text-dark">$${(item.price * item.qty).toFixed(2)}</div>
            </div>
          </div>
          <button class="btn btn-sm btn-light border" onclick="removeFromCartStack(${item.id})">✕</button>
        </div>
      </div>
    `).join('')}
    <div class="bg-white border rounded-4 p-4 mt-3">
      <div class="d-flex justify-content-between mb-2"><span>Subtotal</span><b>$${total.toFixed(2)}</b></div>
      <div class="d-flex justify-content-between mb-2"><span>Shipping</span><span class="text-success">FREE</span></div>
      <div class="d-flex justify-content-between border-top pt-2 fs-5 fw-bold"><span>Total Summary</span><span>$${total.toFixed(2)}</span></div>
      <button class="btn btn-danger w-100 py-2 mt-3 rounded-3" onclick="showToastCustom('✅ Final order request compiled successfully!')">Submit Checkout Order</button>
    </div>`;
  updateCartGlobalBadge();
}

function changeQtyStack(id, delta) {
  const item = cartItems.find(i => i.id === id);
  if (item) {
    item.qty = Math.max(1, item.qty + delta);
    renderCart();
  }
}

function removeFromCartStack(id) {
  cartItems = cartItems.filter(i => i.id !== id);
  renderCart();
  updateCartGlobalBadge();
  showToastCustom('🗑️ Extracted variant out of basket stack');
}

// Global scope tracker addition handler
function addToCartStack(id, name, vendor, price, icon) {
  const existing = cartItems.find(i => i.id === id);
  if (existing) {
    existing.qty++;
  } else {
    cartItems.push({ id, name, vendor, price, qty: 1, icon });
  }
  updateCartGlobalBadge();
  showToastCustom('🛒 Item processed inside state checkout registry!');
}

function updateCartGlobalBadge() {
  const total = cartItems.reduce((s, i) => s + i.qty, 0);
  const badge = document.getElementById('globalCartBadge');
  if(badge) badge.textContent = total;
}

function renderOrders(filter = 'all') {
  const el = document.getElementById('ordersContent');
  if(!el) return;
  const filtered = filter === 'all' ? ordersData : ordersData.filter(o => o.status === filter);

  if (filtered.length === 0) {
    el.innerHTML = `<div class="p-4 text-center text-muted">No state orders detected for current filter variant.</div>`;
    return;
  }

  el.innerHTML = filtered.map(o => `
    <div class="order-card-t2">
      <div class="d-flex justify-content-between align-items-center mb-3">
        <div><span class="fw-bold">${o.id}</span><div class="text-muted small">${o.date}</div></div>
        <span class="order-status-t2 status-delivered-t2">${o.status}</span>
      </div>
      <div class="d-flex gap-2">
        ${o.items.map(i => `<div class="bg-light p-2 rounded">${i.icon} <small>${i.name}</small></div>`).join('')}
      </div>
    </div>
  `).join('');
}

function filterOrders(status, tab) {
  document.querySelectorAll('.order-tab-t2').forEach(t => t.classList.remove('active'));
  tab.classList.add('active');
  renderOrders(status);
}

// ====== SECOND TEMPLATE COUNTDOWN ======
let cdSeconds = 4 * 3600 + 32 * 60;
function updateCountdownTemplateTwo() {
  cdSeconds--;
  if (cdSeconds < 0) cdSeconds = 4 * 3600;
  const h = Math.floor(cdSeconds / 3600);
  const m = Math.floor((cdSeconds % 3600) / 60);
  const s = cdSeconds % 60;
  const hEl = document.getElementById('cd-h');
  if(hEl) {
    hEl.textContent = String(h).padStart(2, '0');
    document.getElementById('cd-m').textContent = String(m).padStart(2, '0');
    document.getElementById('cd-s').textContent = String(s).padStart(2, '0');
  }
}
setInterval(updateCountdownTemplateTwo, 1000);

function showToastCustom(msg) {
  const container = document.getElementById('toastContainer');
  const toast = document.createElement('div');
  toast.className = 'toast-custom';
  toast.innerHTML = msg;
  container.appendChild(toast);
  setTimeout(() => {
    toast.style.animation = 'slideOut 0.3s ease forwards';
    setTimeout(() => toast.remove(), 300);
  }, 2500);
}

// Initial triggers
updateCartGlobalBadge();



*/
