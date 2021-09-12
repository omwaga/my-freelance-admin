<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-blue-500 font-bold leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <x-slot name="slot">
        <div class="flex lg:flex-row sm:flex-col p-6 justify-around">
            <div>
                @livewire('completed-orders')
            </div>
            <div>
                @livewire('online-users')
            </div>
            <div>
                @livewire('writers-online')
            </div>
            <div>
                @livewire('registered-users')
            </div>
        </div>

        <div class="mt-2 p-4 flex flex-row justify-around">
            @livewire('users-trend')
            @livewire('revenue-trend')
            @livewire('orders-trend')
        </div>
        <div class="mt-5 mb-5 p-3">
            <h1 class="pl-5 pr-5 pt-2 pb-2 text-2xl">Writers Awaiting Approval</h1>
            <table class="table table-fixed min-w-full leading-normal">
                <thead>
                <tr>
                    <th class="px-5 py-3 bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-t">
                        #
                    </th>
                    <th class="px-5 py-3 bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-t">
                        Nickname
                    </th>
                    <th class="px-5 py-3 bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-t">
                        Writer Email
                    </th>
                    <th class="px-5 py-3 bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-t">
                        Gender
                    </th>
                    <th class="px-5 py-3 bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-t">
                        Country
                    </th>
                    <th class="px-5 py-3 bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-t">
                        Approved
                    </th>
                    <th class="px-5 py-3 bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-t">
                        Email Verified
                    </th>
                    <th class="px-5 py-3 bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-t">
                        Grammar Test Score
                    </th>
                    <th class="px-5 py-3 bwriter-b-2 bwriter-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider border-b border-t">
                        Approve
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach ($writers as $index=>$writer)
                    <tr>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $index+1 }}</td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $writer->name }}</td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ $writer->email }}</td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            {{ ucfirst($writer->gender) }}
                        </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">{{ $writer->country }}</td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            @if($writer->approved == 0)
                                No
                            @else
                                Yes
                            @endif
                        </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            @if($writer->email_verified == 0)
                                No
                            @else
                                Yes
                            @endif
                        </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b">
                            <?php
                            $score = Illuminate\Support\Facades\DB::table('grammar_test_scores')->where('email', '=', $writer->email)->value('score');

                            ?>
                            @if($score)
                                {{$score}}/20
                            @else
                                <span class="text-red-500 font-bold">Test Not Done</span>
                                @endif
                        </td>
                        <td class="px-5 py-2 bwriter-b bwriter-gray-200 bg-white text-sm border-b border-t">
                            @livewire('buttons.activate-writer', ['writer_id' => $writer->id])
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="p-5">
            {{ $writers->links() }}
        </div>
    </x-slot>
</x-app-layout>
