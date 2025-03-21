<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Update Ekstraksi') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-sm">
                <div class="mx-auto py-4 px-4 sm:px-6 lg:px-8 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('ekstraksi.update', $ekstraksi->id) }}">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="bahanbaku_id" :value="__('bahanbaku_id')" />
                            <x-text-input id="bahanbaku_id" class="block mt-1 w-full" type="text" name="bahanbaku_id"
                                :value="$ekstraksi->bahanbaku_id ?? old('bahanbaku_id')" required autofocus autocomplete="bahanbaku_id" />
                            <x-input-error :messages="$errors->get('bahanbaku_id')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="hasil_ekstraksi" :value="__('hasil_ekstraksi')" />
                            <x-text-input id="hasil_ekstraksi" class="block mt-1 w-full" type="text" name="hasil_ekstraksi"
                                :value="$ekstraksi->hasil_ekstraksi ?? old('hasil_ekstraksi')" required autofocus autocomplete="hasil_ekstraksi" />
                            <x-input-error :messages="$errors->get('hasil_ekstraksi')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="satuan_hasil" :value="__('satuan_hasil')" />
                            <x-text-input id="satuan_hasil" class="block mt-1 w-full" type="text" name="satuan_hasil"
                                :value="$ekstraksi->satuan_hasil ?? old('satuan_hasil')" required autofocus autocomplete="satuan_hasil" />
                            <x-input-error :messages="$errors->get('satuan_hasil')" class="mt-2" />
                        </div>

                        <div>
                            <x-input-label for="tanggal_ekstraksi" :value="__('tanggal_ekstraksi')" />
                            <x-text-input id="tanggal_ekstraksi" class="block mt-1 w-full" type="text" name="tanggal_ekstraksi"
                                :value="$ekstraksi->tanggal_ekstraksi ?? old('tanggal_ekstraksi')" required autofocus autocomplete="tanggal_ekstraksi" />
                            <x-input-error :messages="$errors->get('tanggal_ekstraksi')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-danger-link-button class="ms-4" :href="route('ekstraksi.index')">
                                {{ __('Back') }}
                            </x-danger-link-button>
                            <x-primary-button class="ms-4">
                                {{ __('Save') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>