<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <title>chat with {{ $receiver->name }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>

<body class="bg-gray-100 antialiased" x-data="presenceHandler()">

<div class="flex flex-row h-screen w-full">
    <div class="w-1/3 max-w-sm bg-white border-l border-gray-200 p-6 flex flex-col">
        <h2 class="text-xl font-bold mb-4 text-gray-800">Team Members</h2>

        <ul class="divide-y divide-gray-200 overflow-y-auto flex-1">
            @foreach($users as $user)
                <li class="py-3 flex items-center justify-between">
                    <a href="{{ route('chat.show', $user->id) }}" class="flex items-center space-x-reverse space-x-3">
                        <div class="flex items-center space-x-reverse space-x-3">
                            <div class="font-medium {{ $user->id == $receiver->id ? 'text-blue-600 font-bold' : 'text-gray-900' }}">
                                {{ $user->name }}
                            </div>
                        </div>
                    </a>
                    <div>
                        <template x-if="activeUserIds.includes({{ $user->id }})">
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
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <div class="flex-1 flex flex-col justify-between"
         x-data="chatComponent('{{ $chatId }}', {{ auth()->id() }}, {{ $receiver->id }})">

        <div class="bg-blue-600 text-white p-4 text-lg font-bold shadow">
            Chat with: {{ $receiver->name }}
        </div>

        <div class="flex-1 p-4 overflow-y-auto space-y-4 bg-gray-50" id="chat-box">

            @foreach($messages as $msg)
                <div class="flex w-full {{ $msg->sender_id == auth()->id() ? 'justify-end' : 'justify-start' }}">
                    <div class="flex flex-col items-end max-w-[70%]">
                        <div class="p-3 rounded-2xl shadow-sm text-sm
                            {{ $msg->sender_id == auth()->id()
                                ? 'bg-blue-600 text-white rounded-tr-none'
                                : 'bg-white text-gray-800 rounded-tl-none border border-gray-200' }}">
                            {{ $msg->message }}
                        </div>
                        @if($msg->sender_id == auth()->id())
                            <div class="text-[10px] text-gray-400 mt-1 old-read-status">
                                {{ $msg->read_at ? 'تمت القراءة' : 'لم تتم القراءة بعد' }}
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach

            <template x-for="msg in newMessages" :key="msg.id || Math.random()">
                <div class="flex w-full" :class="msg.sender_id == currentUserId ? 'justify-end' : 'justify-start'">
                    <div class="flex flex-col items-end max-w-[70%]">
                        <div class="p-3 rounded-2xl shadow-sm text-sm"
                             :class="msg.sender_id == currentUserId
                                ? 'bg-blue-600 text-white rounded-tr-none'
                                : 'bg-white text-gray-800 rounded-tl-none border border-gray-200'">
                            <span x-text="msg.message"></span>
                        </div>
                        <template x-if="msg.sender_id == currentUserId">
                            <div class="text-[10px] text-gray-400 mt-1"
                                 x-text="msg.read_at || allMessagesRead ? 'تمت القراءة' : 'لم تتم القراءة بعد'">
                            </div>
                        </template>
                    </div>
                </div>
            </template>
              <div class="p-4 bg-white border-t border-gray-200">
            <form @submit.prevent="sendMessage">
                <div class="flex gap-2">
                    <input type="text" x-model="newMessageText" placeholder="Type your message here..."
                        class="flex-1 border rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700">Send</button>
                </div>
            </form>
        </div>

        </div>


    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {

        // (Online Presence)
        Alpine.data('presenceHandler', () => ({
            activeUserIds: [],

            init() {
                const checkEcho = setInterval(() => {
                    if (window.Echo) {
                        clearInterval(checkEcho);
                        this.listenToPresence();
                    }
                }, 100);
            },

            listenToPresence() {
                window.Echo.join('online-users')
                    .here((users) => {
                        this.activeUserIds = users.map(user => user.id);
                        console.log(this.activeUserIds)
                    })
                    .joining((user) => {
                        if (!this.activeUserIds.includes(user.id)) {
                            this.activeUserIds.push(user.id);
                        }
                    })
                    .leaving((user) => {
                        this.activeUserIds = this.activeUserIds.filter(id => id !== user.id);

                    })
                    .error((error) => {
                        console.error('Reverb Presence Error:', error);
                    });
            }
        }));
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
</script>
</body>
</html>
