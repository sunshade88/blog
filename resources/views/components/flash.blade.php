@if (session()->has('success'))
<div x-data="{show: true}"
    x-init="setTimeout(()=> show = false, 4000)"
    x-show="show"
    class="fixed bg-blue-500 text-white p-4 rounded bottom-10 right-10 text-sm">
    <p>{{ session('success') }}</p>
</div>
@endif
