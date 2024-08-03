<x-filament::page>
    <form wire:submit.prevent="send">
        <div class="space-y-4">
            <x-filament::card>
                <x-filament::form>
                    {{ $this->form }}

                    <div class="mt-4">
                        <x-filament::button type="submit">
                            Send SMS
                        </x-filament::button>
                    </div>
                </x-filament::form>
            </x-filament::card>
        </div>
    </form>

    @if (session()->has('success'))
    <x-filament::notification :message="session('success')" type="success" />
    @endif
</x-filament::page>
