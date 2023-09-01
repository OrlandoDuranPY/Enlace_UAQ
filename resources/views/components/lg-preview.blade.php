<div
    {{ $attributes->merge(['class' => 'hidden lg:block w-5/12 bg-gris-ph rounded-lg p-6 overflow-y-auto scrollbar-none border-box space-y-5 relative']) }}>
    {{$slot}}
</div>
