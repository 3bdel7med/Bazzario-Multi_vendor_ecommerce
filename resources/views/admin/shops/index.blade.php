@extends('layouts.admin')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" dir="rtl">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-900">إدارة متاجر البائعين</h1>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-50 border-r-4 border-green-500 text-green-700 rounded-md shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded-lg overflow-hidden border border-gray-100">
        <table class="min-w-full text-right divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">اسم المتجر</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">البائع</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">الحالة الحالية</th>
                    <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase text-left">الإجراءات</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($shops as $shop)
                <tr class="hover:bg-gray-50 transition-colors">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="font-medium text-gray-900">{{ $shop->name }}</div>
                        <div class="text-sm text-gray-500">رابط: /shop/{{ $shop->slug }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $shop->vendor->name }}</div>
                        <div class="text-sm text-gray-500">{{ $shop->vendor->email }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        @if($shop->status === 'approved')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">نشط</span>
                        @elseif($shop->status === 'pending')
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">قيد المراجعة</span>
                        @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">محظور</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-left text-sm font-medium">
                        <form action="{{ route('admin.shops.updateStatus', $shop->id) }}" method="POST" class="inline-flex gap-2">
                            @csrf
                            @method('PATCH')
                            @if($shop->status !== 'approved')
                                <button type="submit" name="status" value="approved" class="bg-green-600 hover:bg-green-700 text-white px-3 py-1.5 rounded-md text-xs font-medium shadow-sm transition-colors">تفعيل المتجر</button>
                            @endif
                            @if($shop->status !== 'suspended')
                                <button type="submit" name="status" value="suspended" class="bg-red-50 hover:bg-red-100 text-red-600 px-3 py-1.5 rounded-md text-xs font-medium border border-red-200 transition-colors">حظر المتجر</button>
                            @endif
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-6 py-10 text-center text-gray-500">لا يوجد متاجر مسجلة حالياً.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="mt-4">
        {{ $shops->links() }}
    </div>
</div>
@endsection
