@props(['disabled' => false, 'placeholder' => ''])

<input placeholder="{{$placeholder}}" @disabled($disabled) {{ $attributes->merge(['class' => 'border-red-300 focus:border-red-300 focus:border-red-300 rounded-md shadow-sm']) }}>
