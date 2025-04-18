<x-form submit="filters"
    class="p-6 mb-5 overflow-hidden text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-900 ring ring-gray-200 dark:ring-gray-700 rounded-lg">
    <div class="flex items-center justify-between pb-2">
        <h3 class="font-medium text-blue-600 dark:text-blue-400">Filtres</h3>
        <x-heroicon-o-x-mark @click="openFilters = false" class="size-4 cursor-pointer" />
    </div>

    <div class="flex flex-wrap gap-x-10 space-y-5">
        {{-- <div class="flex gap-10"> --}}
        <fieldset class="">
            <legend class="text-sm/6 font-medium text-gray-900 dark:text-gray-100">Genre</legend>
            <div
                class="mt-2 flex gap-4 py-1.5 px-3 rounded-md bg-gray-100 dark:bg-white/5 outline -outline-offset-1 outline-gray-300 dark:outline-white/10">
                @foreach (\App\Enums\CollaborateurGenre::cases() as $genre)
                    <x-form.checkbox name="genre" value="{{ $genre->value }}" label="{{ $genre->label() }}" :live="false" />
                @endforeach
            </div>
        </fieldset>


        <fieldset class="">
            <legend class="text-sm/6 font-medium text-gray-900 dark:text-gray-100">Statut</legend>
            <div
                class="mt-2 flex gap-4 py-1.5 px-3 rounded-md bg-gray-100 dark:bg-white/5 outline -outline-offset-1 outline-gray-300 dark:outline-white/10">
                <x-form.checkbox name="statut" label="Actif" value="true" :live="false" />
                <x-form.checkbox name="statut" label="Inactif" value="false" :live="false" />
            </div>
        </fieldset>
        {{-- </div> --}}


        <div>
            <label class="block text-sm/6 font-medium text-gray-900 dark:text-gray-100">Date d'embauche</label>
            <div
                class="mt-2 flex w-full rounded-md bg-gray-100 dark:bg-white/5 px-3 py-2 text-sm text-gray-900 dark:text-white outline -outline-offset-1 outline-gray-300 dark:outline-white/10">
                <input type="date" wire:model="start" name="start" class="focus:outline-0">
                <span class="mx-4 text-gray-500">à</span>
                <input type="date" wire:model="end" name="end" class="focus:outline-0">
            </div>
        </div>
        {{-- <div>
            <div class="flex items-end ">
                <div>
                    <x-form.group name="start" label="Date d'embauche">
                        <x-form.input type="date" name="start" />
                    </x-form.group>
                </div>
                <span class="mx-4 text-gray-500">à</span>
                <div>
                    <x-form.group name="end">
                        <x-form.input type="date" name="end" />
                    </x-form.group>
                </div>
            </div>
        </div> --}}
        <div class="">
            <x-form.group name="pays_id" label="Pays de résidence">
                <x-form.select name="pays_id" :options="$pays->pluck('nom', 'id')->toArray()" :live="false" />
            </x-form.group>
        </div>
        {{-- <div class="">
            <x-form.group name="departement_id" label="Département">
                <x-form.select name="departement_id" :options="$departements->pluck('nom', 'id')->toArray()" />
            </x-form.group>
        </div>
        <div class="">
            <x-form.group name="poste_id" label="Poste">
                <x-form.select name="poste_id" :options="$postes->pluck('nom', 'id')->toArray()" :live="false" />
            </x-form.group>
        </div> --}}

        {{-- Todo alternative de datarange --}}
        {{-- <div class="space-y-5">
            <x-form.group name="daterange" label="Date d'embauche">
                <x-form.input name="daterange" />
            </x-form.group>
            <div>
                <div id="date-range-picker" date-rangepicker class="flex items-end">
                    <div class="relative">
                        <x-form.group name="start" label="Date d'embauche">
                            <x-form.input name="start" autocomplete="off" placeholder="Début" />
                        </x-form.group>
                    </div>
                    <span class="mx-4 text-gray-500">à</span>
                    <div class="relative">
                        <x-form.group name="end">
                            <x-form.input name="end" autocomplete="off" placeholder="Fin" />
                        </x-form.group>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
    <div class="flex justify-end mt-6 md:mt-4 gap-3">
        <div wire:click="resetFilters">
            <x-button.outlined color="gray">Réinitialiser</x-button.outlined>
        </div>
        <x-button.primary type="submit">Filtrer</x-button.primary>
    </div>

    <script>
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left',
                // autoApply: true,
                // autoUpdateInput: false,
            }, function(start, end, label) {
                console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end
                    .format('YYYY-MM-DD'));
            });
        });
    </script>
</x-form>
