<button class="chat-launcher-btn" onclick="toggleChatWidget()" id="chatLauncher">💬</button>

<div class="chat-widget-card" id="chatWidget">
  <div class="chat-header">
    <div class="chat-vendor-profile" id="chatActiveProfile">
      <div class="chat-vendor-avatar">🏪</div>
      <div>
        <div class="fw-bold fs-6" id="chatVendorName">Vendor Channels</div>
        <small class="text-success" style="font-size:11px" id="chatVendorStatus">Select an open dialogue</small>
      </div>
    </div>
    <button class="btn border-0 text-white p-0 fs-5" onclick="exitToChannelList()" id="chatBackBtn" style="display:none; line-height:1">←</button>
  </div>


  <!-- Active Channel Selector List -->
  <div class="chat-channels-list" id="chatChannels">
    @foreach ($chat['user'] as $user )


    <div class="channel-row" onclick="openChatWithVendor('SoundWave', '🎧')">
      <div class="fs-4">🎧</div>
      <div>
        <div class="fw-bold text-dark" style="font-size:14px">{{ $user->name }}</div>
        <small class="text-muted">Audio Experts ·
               <template x-if="activeUserIds.includes({{  $user}})">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 ml-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                Active Now
                            </span>
                        </template>

                        <template x-if="!activeUserIds.includes({{ $user->id }})">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                <span class="w-2 h-2 ml-1.5 bg-gray-400 rounded-full"></span>
                                Offline
                            </span>
                        </template>
        </small>
      </div>
    </div>
    @endforeach

  </div>

  <!-- Messages Viewport -->

  <div class="chat-viewport" id="chatViewport">

  </div>

  <!-- Footer Input System -->
  <div class="chat-footer" id="chatFooter">
    <input type="text" placeholder="Type a message..." id="chatInputField" onkeypress="handleChatKeyPress(event)"/>
    <button onclick="dispatchUserChatMessage()">➔</button>
  </div>
</div>


<script>
    document.addEventListener('alpine:init', () => {

   Alpine.data('chatComponent', (chatId, currentUserId, receiverId) => ({
            chatId: chatId,
            currentUserId: currentUserId,
            receiverId: receiverId,
            newMessageText: '',
            newMessages: [],
            allMessagesRead: false,

            init() {
                const checkEcho = setInterval(() => {
                    if (window.Echo) {
                        clearInterval(checkEcho);
                        window.Echo.private(`chat.${this.chatId}`)
                            .listen('MessageSent', (e) => {
                                if (e.message.sender_id !== this.currentUserId) {
                                     this.newMessages.push(e.message);
                                    this.scrollToBottom();
                                }
                            })
                            // الاستماع لحدث قراءة الطرف الآخر لرسائلك
                            .listen('MessagesMarkedAsRead', (e) => {
                                if (e.receiverId === this.receiverId) {
                                    this.allMessagesRead = true;

                                    // تحديث حالة نصوص الـ DOM القديمة فوراً
                                    document.querySelectorAll('.old-read-status').forEach(el => {
                                        el.innerText = 'تمت القراءة';
                                    });
                                }
                            });
                    }
                }, 100);

                this.scrollToBottom();
            },

            sendMessage() {
                if (this.newMessageText.trim() === '') return;

                let text = this.newMessageText;
                this.newMessageText = '';
                this.allMessagesRead = false;

                axios.post(`/chat/${this.receiverId}/send`, { message: text })
                    .then(response => {
                        this.newMessages.push(response.data.message);
                        this.scrollToBottom();
                    })
                    .catch(error => {
                        console.error("Error sending message:", error);
                    });
            },

            scrollToBottom() {
                this.$nextTick(() => {
                    const chatBox = document.getElementById('chat-box');
                    if (chatBox) {
                        chatBox.scrollTop = chatBox.scrollHeight;
                    }
                });
            }
        }));
    });

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
</script>

