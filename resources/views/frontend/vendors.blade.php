@extends('layouts.app')
@section('title')
Vendors
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/pages.css') }}">
@endsection
@section('content')
  <div class="vendor-section">
    <div class="vendor-inner">
      <div class="section-header">
        <div class="section-title">Top Vendors</div>
        <a onclick="showModularPage('vendors')" class="section-link" style="cursor:pointer">Meet All Vendors →</a>
      </div>



      <div class="vendor-grid" x-data="presenceHandler()" >
            @foreach ($vendors as $vendor )

        <div class="vendor-card" onclick="openChatWithVendor('SoundWave', '🎧')">
            <span class="vendor-badge verified">Verified</span>
            <div class="vendor-avatar" style="background:#e8e4fb">🎧</div>
            <div class="vendor-name">{{ $vendor->name }}</div>
            <div class="vendor-cat">Electronics · Audio</div>
            <div class="vendor-stats"><div class="vstat">
                <strong>4.9 ★</strong>Rating</div>
                <div class="vstat"><strong>12.4k</strong>Sales</div><div class="vstat">
                    <strong>248</strong>Products</div></div>
                    <small class="text-primary mt-2 d-block">💬 Click to Chat</small>
                    <template x-if="activeUserIds.includes({{ $vendor->id }})">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                <span class="w-2 h-2 ml-1.5 bg-green-500 rounded-full animate-pulse"></span>
                                Active Now
                            </span>
                        </template>

                        <template x-if="!activeUserIds.includes({{ $vendor->id }})">
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                <span class="w-2 h-2 ml-1.5 bg-gray-400 rounded-full"></span>
                                Offline
                            </span>
                        </template>

                </div>

            @endforeach
    </div>

    {{ $vendors->links() }}
    </div>
  </div>
@endsection
@section('script')

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
 });
</script>
@endsection
