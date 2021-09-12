<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 font-bold leading-tight">
            {{ __('Orders') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="flex lg:flex-row sm:flex-col p-6 justify-around">
            <div>
                @livewire('draft-orders')
            </div>
            <div>
                @livewire('bidding-orders')
            </div>
            <div>
                @livewire('in-progress-orders')
            </div>
            <div>
                @livewire('cancelled-orders')
            </div>
        </div>

        <div class="mt-5 mb-5 p-3">
            <h1 class="pl-5 pr-5 pt-2 pb-2 text-2xl">All Orders</h1>
            <table class="table table-fixed min-w-full leading-normal">
                <thead>
                <tr>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        #
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Order No.
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        User Email
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Type
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Deadline
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Language
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Pages
                    </th><th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Level
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Topic
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Sources
                    </th>
                    <th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        Order Date
                    </th><th class="px-5 py-3 border-b border-t border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">

                    </th>

                </tr>
                </thead>
                <tbody>
                @foreach ($orders as $index=>$order)
                    <tr>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $index+1 }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $order->id }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            <?php
                            $id = $order->user_id;
                            $email = Illuminate\Support\Facades\DB::table('users')->where('id', '=', "$id")->value('email');
                            ?>
                            {{ $email }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">{{ $order->type }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">{{ $order->deadline }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">{{ ucfirst($order->language) }}</td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $order->pages }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $order->level }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $order->topic }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $order->sources }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            {{ $order->order_date }}
                        </td>
                        <td class="px-5 py-2 border-b border-gray-200 bg-white text-sm">
                            <a href="/order/delete/{{ $order->id }}"
                               class="bg-red-400 text-white p-2 rounded-md">Delete</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-5">
            {{ $orders->links() }}
        </div>
    </x-slot>
</x-app-layout>
