@props(['disabled' => false])

<input {{ $attributes->merge([
    'class' => 'border-gray-300 rounded-full bg-[#ebe6f9] focus:border-purple-600 focus:ring-purple-600 shadow-sm'
]) }} />
