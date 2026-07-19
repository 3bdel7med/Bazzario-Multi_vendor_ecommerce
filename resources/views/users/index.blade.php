
    <div x-data="presenceHandler()" class="max-w-md mx-auto bg-white rounded-lg shadow p-6 col-4" >
        <h2 class="text-xl font-bold mb-4 text-gray-800">Team Members</h2>

        <ul class="divide-y divide-gray-200">
            @foreach($users as $user)
                <li class="py-3 flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="font-medium text-gray-900">{{ $user->name }}</div>
                    </div>

                    <div>
                        <template x-if="activeUserIds.includes({{ $user->id }})">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 mr-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                Active Now
                            </span>
                        </template>

                        <template x-if="!activeUserIds.includes({{ $user->id }})">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                <span class="w-2 h-2 mr-1.5 bg-gray-400 rounded-full"></span>
                                Offline
                            </span>
                        </template>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>



<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('presenceHandler', () => ({
            activeUserIds: [],

            init() {
                // Wait for window.Echo to be defined in case app.js loads slightly slower
                const checkEcho = setInterval(() => {
                    if (window.Echo) {
                        clearInterval(checkEcho);
                        this.listenToPresence();
                    }
                }, 100);
            },

            listenToPresence() {
                console.log('Connecting to Reverb presence channel...');

                window.Echo.join('online-users')
                    .here((users) => {
                        console.log('Users currently online:', users);
                        this.activeUserIds = users.map(user => user.id);
                    })
                    .joining((user) => {
                        console.log('User joined:', user);
                        if (!this.activeUserIds.includes(user.id)) {
                            this.activeUserIds.push(user.id);
                        }
                    })
                    .leaving((user) => {
                        console.log('User left:', user);
                        this.activeUserIds = this.activeUserIds.filter(id => id !== user.id);
                    })
                    .error((error) => {
                        console.error('Reverb Connection Error:', error);
                    });
            }
        }));
    });
</script>

