<x-filament-panels::page.simple>
    {{-- Override: Full-screen branded login --}}
    <style>
        /* Full screen override */
        .fi-simple-layout {
            min-height: 100vh !important;
            background: linear-gradient(135deg, #0c4a6e 0%, #0369a1 40%, #0ea5e9 100%) !important;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .fi-simple-main {
            width: 100% !important;
            max-width: 520px !important;
        }

        .fi-simple-page {
            background: rgba(255, 255, 255, 0.97) !important;
            border-radius: 1.5rem !important;
            padding: 2.5rem !important;
            box-shadow: 0 32px 64px rgba(0,0,0,0.25) !important;
            border: none !important;
        }

        .dark .fi-simple-page {
            background: rgba(15, 23, 42, 0.97) !important;
        }

        /* Input fields larger */
        .fi-input {
            font-size: 1rem !important;
            padding: 0.75rem 1rem !important;
            height: auto !important;
        }

        /* Button larger */
        .fi-btn {
            padding: 0.85rem 1.5rem !important;
            font-size: 1rem !important;
        }

        /* Label */
        .fi-fo-field-wrp > label {
            font-size: 0.875rem !important;
            font-weight: 600 !important;
            margin-bottom: 0.35rem !important;
        }
    </style>

    {{-- Header Branding --}}
    <x-slot name="logo">
        <div class="flex flex-col items-center gap-3 mb-2">
            {{-- Logo Tut Wuri Handayani --}}
            <img src="{{ asset('images/tut-wuri-handayani.png') }}"
                 alt="Logo Tut Wuri Handayani"
                 class="h-20 w-auto object-contain drop-shadow-md">

            {{-- Nama Sekolah --}}
            <div class="text-center">
                <h1 class="text-2xl font-bold text-sky-700 dark:text-sky-400 leading-tight">
                    SD Negeri Doplang
                </h1>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1 font-medium">
                    Sistem Informasi Manajemen Sekolah
                </p>
                <div class="w-16 h-1 bg-sky-500 rounded-full mx-auto mt-2"></div>
            </div>
        </div>
    </x-slot>

    {{-- Form Login --}}
    <x-filament-panels::form wire:submit="authenticate">
        {{ $this->form }}

        <x-filament-panels::form.actions
            :actions="$this->getCachedFormActions()"
            :full-width="$this->hasFullWidthFormActions()"
        />
    </x-filament-panels::form>

    {{-- Footer info --}}
    <div class="mt-6 text-center text-xs text-gray-400 dark:text-gray-500 border-t border-gray-100 dark:border-slate-700 pt-4">
        <p>Hanya untuk Administrator SDN Doplang</p>
        <p class="mt-1">Jl. Tentara Pelajar No.16, Purworejo</p>
    </div>
</x-filament-panels::page.simple>
