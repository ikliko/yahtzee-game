<div class="flex gap-3">
    @foreach($dices as $dice)
        <livewire:dice :key="uniqid()"
                       :value="$dice"></livewire:dice>
    @endforeach
</div>
