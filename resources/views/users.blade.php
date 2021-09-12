<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 font-bold leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
        <div class="flex lg:flex-row sm:flex-col p-6 justify-around">
            <div>
                @livewire('total-users')
            </div>
            <div>
                @livewire('verified-users')
            </div>
            <div>
                @livewire('un-verified-users')
            </div>
            <div>
                @livewire('new-users')
            </div>
        </div>
        <div class="mt-5 mb-5 p-3">
            <h1 class="pl-5 pr-5 pt-2 pb-2 text-2xl">Users</h1>
            <table class="table table-fixed min-w-full leading-normal">
                <thead>
                <tr>
                    <th class="px-3 py-3 border-b border-t bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b">
                        #
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Nickname
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Balance
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        User Email
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Member Since
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        No. Of Orders
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Is Email Verified
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Active
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($users as $index=>$user)
                    <tr>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $index+1 }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $user->name }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $user->balance }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">{{ $user->email }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">{{ $user->member_since }}</td>
                        <?php
                        $orders = Illuminate\Support\Facades\DB::table('orders')->where('user_id', '=', $user->id)->count();
                        ?>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">{{ $orders }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            @if($user->email_verified_at != null)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            @if($user->active == 1)
                                Yes
                            @else
                                No
                            @endif
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            @livewire('buttons.users.activate', ['user_id' => $user->id, 'active' => $user->active])
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    <div class="p-5">
        {{ $users->links() }}
        </div>

</x-app-layout>
