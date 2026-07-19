@extends('layouts.vendor')
@section('content')<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" dir="rtl">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">طلبات الشراء الواردة لمتجرك</h1>

    <div class="space-y-6">
        @forelse($orders as $subOrder)
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <!-- رأس الطلب الفرعي -->
            <div class="bg-gray-50 p-4 border-b border-gray-200 flex flex-wrap justify-between items-center gap-4">
                <div>
                    <span class="text-sm text-gray-500">رقم الفاتورة العامة:</span>
                    <span class="font-mono font-bold text-gray-900">#{{ $subOrder->order->order_number }}</span>
                    <span class="mx-3 text-gray-300">|</span>
                    <span class="text-sm text-gray-500">تاريخ الطلب:</span>
                    <span class="text-sm text-gray-700 font-medium">{{ $subOrder->created_at->format('Y-m-d H:i') }}</span>
                </div>

                <!-- تحديث حالة الطلب من قبل البائع -->
                <form action="{{ route('vendor.orders.updateStatus', $subOrder->id) }}" method="POST" class="flex items-center gap-2">
                    @csrf
                    @method('PATCH')
                    <select name="status" class="text-sm border-gray-300 rounded-md p-1.5 border focus:ring-blue-500 bg-white">
                        <option value="pending" {{ $subOrder->status == 'pending' ? 'selected' : '' }}>بانتظار التجهيز</option>
                        <option value="processing" {{ $subOrder->status == 'processing' ? 'selected' : '' }}>قيد التعبئة والتحضير</option>
                        <option value="shipped" {{ $subOrder->status == 'shipped' ? 'selected' : '' }}>تم الشحن مع المندوب</option>
                        <option value="delivered" {{ $subOrder->status == 'delivered' ? 'selected' : '' }}>تم التوصيل والوصول</option>
                        <option value="cancelled" {{ $subOrder->status == 'cancelled' ? 'selected' : '' }}>إلغاء الطلب</option>
                    </select>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1.5 rounded-md text-xs font-medium transition-colors">تحديث</button>
                </form>
            </div>

            <!-- المنتجات المطلوبة من هذا البائع تحديداً -->
            <div class="p-6 divide-y divide-gray-100">
                @foreach($subOrder->items as $item)
                <div class="flex justify-between items-center py-3 first:pt-0 last:pb-0">
                    <div>
                        <h4 class="font-medium text-gray-900 text-base">{{ $item->product->name }}</h4>
                        <p class="text-sm text-gray-500 mt-0.5">الكمية المطلوبة: <span class="font-bold text-gray-800">x{{ $item->quantity }}</span></p>
                    </div>
                    <div class="text-sm font-semibold text-gray-900">
                        ${{ number_format($item->price * $item->quantity, 2) }}
                    </div>
                </div>
                @endforeach
            </div>

            <!-- ملخص الحساب الخاص بهذا البائع -->
            <div class="bg-gray-50/50 px-6 py-4 border-t border-gray-100 flex justify-between text-sm">
                <p class="text-gray-600">إجمالي حساب المنتجات: <span class="font-bold text-gray-900">${{ number_format($subOrder->subtotal, 2) }}</span></p>
                <p class="text-red-600 font-medium">عمولة المنصة المستقطعة: -${{ number_format($subOrder->commission, 2) }}</p>
                <p class="text-green-700 font-bold">صافي أرباحك من هذا الطلب: ${{ number_format($subOrder->subtotal - $subOrder->commission, 2) }}</p>
            </div>
        </div>
        @empty
        <div class="bg-white p-12 text-center rounded-lg border border-gray-200 text-gray-400">
            لا توجد مبيعات أو طلبات واردة لمتجرك حتى الآن.
        </div>
        @endforelse
    </div>
    <div class="mt-4">
        {{ $orders->links() }}
    </div>
</div>
@endsection
