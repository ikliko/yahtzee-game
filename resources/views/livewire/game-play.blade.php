<div wire:poll>
    @if($game->status === \App\Enums\GameStatuses::$AWAITING_PLAYERS)
        <div class="flex flex-col">
            <h2 class="text-center text-2xl">Loading..</h2>

            <p class="font-bold">Players: </p>
            <ul>
                @foreach($game->players as $player)
                    <li>{{ $player->userData->name }}</li>
                @endforeach
            </ul>

            <p class="mt-3">
                Waiting for players to join: {{ $game->players()->count() }}/{{ $game->players_count }}
            </p>
        </div>
    @else

        <div class="flex flex-col gap-3">
            <livewire:dices-list></livewire:dices-list>


            @if($game->activePlayer->user_id === \Illuminate\Support\Facades\Auth::user()->id)
                <button type="button"
                        class="bg-indigo-500 rounded-xl py-3 text-white"
                        wire:click="rollDices()">
                    Roll dices
                </button>
            @else
                wait your turn
            @endif
        </div>

        <table class="border-collapse border border-slate-500 text-center">
            <thead>
            <tr>
                <th class="border border-slate-600">Round</th>
                <th class="border border-slate-600">Player 1</th>
                <th class="border border-slate-600">Player 2</th>
                <th class="border border-slate-600">Player 3</th>
                <th class="border border-slate-600">Player 4</th>
                <th class="border border-slate-600">Player 5</th>
                <th class="border border-slate-600">Player 6</th>
            </tr>
            </thead>

            <tbody>
            <tr>
                <td class="border border-slate-600">Round 1</td>
                <td class="border border-slate-600">40</td>
                <td class="border border-slate-600">20</td>
                <td class="border border-slate-600">20</td>
                <td class="border border-slate-600">20</td>
                <td class="border border-slate-600">20</td>
                <td class="border border-slate-600">20</td>
            </tr>
            </tbody>
        </table>

    @endif
</div>
