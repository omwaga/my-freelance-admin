<ul class="flex flex-row" style="display: flex; flex-direction: row">
    <li class="{{ request()->routeIs('settings-subject') ? 'border-b border-blue-500 text-blue-500' : '' }} mr-5">
        <a
            href="{{ route('settings-subject') }}" class="hover:text-blue-500">Subject
            Settings</a></li>
    <li class="{{ request()->routeIs('settings-services') ? 'border-b border-blue-500 text-blue-500' : '' }} mr-5">
        <a href="{{ route('settings-services') }}"
           class="hover:text-blue-500">Services
            Settings</a></li>
    <li class="{{ request()->routeIs('settings-type') ? 'border-b border-blue-500 text-blue-500' : '' }} mr-5">
        <a href="{{ route('settings-type') }}"
           class="hover:text-blue-500">Type
            Settings</a></li>
    <li class="{{ request()->routeIs('settings-degree') ? 'border-b border-blue-500 text-blue-500' : '' }} mr-5">
        <a href="{{ route('settings-degree') }}"
           class="hover:text-blue-500">Degree
            Settings</a></li>
    <li class="{{ request()->routeIs('settings-citation') ? 'border-b border-blue-500 text-blue-500' : '' }} mr-5">
        <a href="{{ route('settings-citation') }}"
           class="hover:text-blue-500">Citation
            Settings</a></li>
</ul>
