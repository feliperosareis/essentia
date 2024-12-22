<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Essentia Group') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="text-gray-900 flex">
                    <div class="grow p-6">
                        <header class="flex items-center justify-between gap-3 mb-6">
                            <div class="w-full border-b-2 border-[#A0894E]">
                                <h2 class="text-xl font-semibold"><i class="fa-solid fa-user-plus"></i> Novo Cliente</h2>
                            </div>
                        </header>
                        <div class="">
                            <form action="{{ route('salvar-cliente') }}" method="post" enctype="multipart/form-data" class="w-full flex gap-4">
                                @csrf

                                <div class="w-full flex-col">
                                    <div class="mb-3">
                                        <x-input-label for="name" :value="__('Nome')" />
                                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="username" />
                                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                    </div>
                                    <div class="mb-3">
                                        <x-input-label for="email" :value="__('E-mail')" />
                                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"/>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>
                                    <div class="mb-4">
                                        <x-input-label for="phone" :value="__('Telefone')" />
                                        <x-phone-input id="phone" class="block mt-1 w-full" type="text" name="phone" placeholder="xx xxxxx-xxxx" :value="old('phone')" :max-length='15'/>
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                    </div>
    
                                    <button class="bg-[#BAA263] hover:bg-[#A0894E] transition-all py-1 w-[100px] rounded-md font-semibold">Salvar</button>
                                </div>
                                
                                <div class="w-full">
                                    <div class="w-full h-[300px] overflow-hidden">
                                        <x-input-label for="photo" :value="__('Foto')" class="text-center"/>
                                        <x-text-input id="photo" class="block mt-1 h-full cursor-pointer opacity-0 absolute z-10" type="file" name="photo" :value="old('photo')"/>

                                        <img src="images/icon-photo.jpg" alt="Preview" id="preview-image" class="object-fit max-w-full max-h-full mx-auto my-auto">
                                    </div>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                    <div class="w-[350px]">
                        <img src="/images/BG_Essentia.webp" alt="Essentia Grouop">
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
