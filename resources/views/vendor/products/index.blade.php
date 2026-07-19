@extends('layouts.vendor')
@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8" dir="rtl">
    <h1 class="text-2xl font-bold text-gray-900 mb-6">إدارة كتالوج المنتجات</h1>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-8">
        <!-- نموذج إضافة منتج -->
        <div class="bg-white p-6 rounded-lg shadow-sm border border-gray-200 h-fit">
            <h3 class="text-lg font-bold text-gray-800 mb-4">إضافة منتج جديد للبيع</h3>
            <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">اسم المنتج</label>
                    <input type="text" name="name" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 p-2 border" required>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">القسم</label>
                    <select name="category_id" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 p-2 border" required>
                        <option value="">اختر القسم المناسب...</option>
                        <!-- المتغير $globalCategories يمرر عبر AppServiceProvider أو الكنترولر -->
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">السعر ($)</label>
                        <input type="number" name="price" step="0.01" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 p-2 border" required>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">الكمية بالمخزن</label>
                        <input type="number" name="stock" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 p-2 border" required>
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">وصف المنتج الكامل</label>
                    <textarea name="description" rows="4" class="w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 p-2 border" required></textarea>
                </div>
                <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-medium py-2 px-4 rounded-md shadow-sm transition-colors text-sm">نشر المنتج في السوق</button>
            </form>
        </div>

        <!-- جدول عرض المنتجات المنشورة -->
        <div class="xl:col-span-2 bg-white shadow-sm rounded-lg border border-gray-200 overflow-hidden">
            <table class="min-w-full text-right divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">المنتج</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">السعر</th>
                        <th class="px-6 py-3 text-xs font-semibold text-gray-500 uppercase">المخزون المتوفر</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($products as $product)
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4 whitespace-nowrap font-medium text-gray-900">{{ $product->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-gray-800">${{ number_format($product->price, 2) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm">
                            @if($product->stock > 5)
                                <span class="text-green-600 bg-green-50 px-2 py-1 rounded font-medium text-xs">{{ $product->stock }} وحدة</span>
                            @elseif($product->stock > 0)
                                <span class="text-yellow-600 bg-yellow-50 px-2 py-1 rounded font-medium text-xs">مخزون حرج ({{ $product->stock }})</span>
                            @else
                                <span class="text-red-600 bg-red-50 px-2 py-1 rounded font-medium text-xs">نفذت الكمية</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="3" class="px-6 py-10 text-center text-gray-400">لم تقم بإضافة أي منتجات للبيع بعد.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
