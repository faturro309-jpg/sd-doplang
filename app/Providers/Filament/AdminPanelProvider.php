<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\Login;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Blade;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login(Login::class)
            ->darkMode()
            ->brandName('SDN Doplang')
            ->brandLogo(fn () => view('filament.logo'))
            ->brandLogoHeight('3rem')
            ->colors([
                'primary' => Color::Blue,
                'secondary' => Color::Indigo,
                'info' => Color::Sky,
                'success' => Color::Emerald,
                'warning' => Color::Amber,
                'danger' => Color::Rose,
                'gray' => Color::Slate,
            ])
            ->font('Nunito')
            ->favicon(asset('favicon.ico'))
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                \App\Filament\Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                \App\Filament\Widgets\StatsOverviewWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ])
            ->renderHook(
                'panels::head.end',
                fn (): string => '<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
                <style>
                    /* Custom Blue Theme injected via Render Hook */
                    :root {
                        --fi-sidebar-bg: #1e40af; /* Blue-800 */
                        --fi-main-bg: #f0fdfa; /* Very light slate/blue */
                    }
                    
                    html, body, .fi-main {
                        background-color: var(--fi-main-bg) !important;
                    }
                    
                    /* Sidebar styling */
                    .fi-sidebar, .fi-sidebar-header {
                        background-color: var(--fi-sidebar-bg) !important;
                        border-right: none !important;
                    }
                    
                    /* Target Filament v3 specific text classes in sidebar */
                    .fi-sidebar .fi-sidebar-item-label, 
                    .fi-sidebar .fi-sidebar-item-icon,
                    .fi-sidebar .fi-sidebar-group-label,
                    .fi-sidebar .fi-logo {
                        color: #ffffff !important;
                    }
                    
                    /* Active Menu Item */
                    .fi-sidebar-item-active > a,
                    .fi-sidebar-item-active > button {
                        background-color: #eff6ff !important; /* Blue-50 */
                        border-radius: 999px !important;
                        margin: 0 0.5rem;
                    }
                    .fi-sidebar-item-active .fi-sidebar-item-label,
                    .fi-sidebar-item-active .fi-sidebar-item-icon {
                        color: var(--fi-sidebar-bg) !important;
                    }
                    
                    /* Hover for inactive items */
                    .fi-sidebar-item:not(.fi-sidebar-item-active) > a:hover,
                    .fi-sidebar-item:not(.fi-sidebar-item-active) > button:hover {
                        background-color: rgba(255,255,255,0.1) !important;
                        border-radius: 999px !important;
                        margin: 0 0.5rem;
                    }
                    
                    /* Topbar styling */
                    .fi-topbar {
                        background-color: transparent !important;
                        border-bottom: none !important;
                        box-shadow: none !important;
                    }
                    
                    /* Table styling to match reference (Floating cards) */
                    .fi-ta-header-cell {
                        background-color: var(--fi-sidebar-bg) !important;
                        border: none !important;
                        padding-top: 1rem !important;
                        padding-bottom: 1rem !important;
                    }
                    .fi-ta-header-cell:first-child {
                        border-top-left-radius: 0.75rem !important;
                        border-bottom-left-radius: 0.75rem !important;
                    }
                    .fi-ta-header-cell:last-child {
                        border-top-right-radius: 0.75rem !important;
                        border-bottom-right-radius: 0.75rem !important;
                    }
                    .fi-ta-header-cell .fi-ta-header-cell-label {
                        color: #ffffff !important;
                        font-weight: bold !important;
                    }
                    
                    .fi-ta-table {
                        border-collapse: separate !important;
                        border-spacing: 0 0.5rem !important;
                    }
                    .fi-ta-row {
                        background-color: #ffffff !important;
                        box-shadow: 0 2px 4px rgba(0,0,0,0.05) !important;
                        border-radius: 0.75rem !important;
                        transition: all 0.2s;
                    }
                    .fi-ta-row:hover {
                        box-shadow: 0 4px 6px rgba(0,0,0,0.08) !important;
                        transform: translateY(-1px);
                    }
                    .fi-ta-row td {
                        border: none !important;
                    }
                    .fi-ta-row td:first-child {
                        border-top-left-radius: 0.75rem !important;
                        border-bottom-left-radius: 0.75rem !important;
                    }
                    .fi-ta-row td:last-child {
                        border-top-right-radius: 0.75rem !important;
                        border-bottom-right-radius: 0.75rem !important;
                    }
                    
                    /* Remove default container styling */
                    .fi-ta-ctn {
                        background-color: transparent !important;
                        box-shadow: none !important;
                        border: none !important;
                        border-radius: 0 !important;
                    }
                    
                    /* Dark mode adjustments */
                    .dark .fi-sidebar { background-color: #0f172a !important; }
                    .dark body, .dark .fi-main { background-color: #020617 !important; }
                    .dark .fi-sidebar-item-active > a { background-color: #1e293b !important; }
                    .dark .fi-sidebar-item-active .fi-sidebar-item-label, 
                    .dark .fi-sidebar-item-active .fi-sidebar-item-icon { color: #60a5fa !important; }
                    .dark .fi-ta-row { background-color: #0f172a !important; }
                    
                    /* Modal Fix: Disable broken Filament modal overlay so screen never turns black */
                    .fi-modal-close-overlay {
                        display: none !important;
                    }

                    /* SweetAlert2 Styling to match Filament Native Modal (Image 1) */
                    .fi-swal-popup {
                        border-radius: 1rem !important;
                        padding: 1.75rem 1.5rem !important;
                        max-width: 440px !important;
                        width: 90% !important;
                        background-color: #ffffff !important;
                        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25) !important;
                        font-family: inherit !important;
                        position: relative !important;
                    }
                    .fi-swal-modal {
                        display: flex !important;
                        flex-direction: column !important;
                        align-items: center !important;
                        text-align: center !important;
                    }
                    .fi-swal-icon-wrp {
                        display: inline-flex !important;
                        align-items: center !important;
                        justify-content: center !important;
                        width: 52px !important;
                        height: 52px !important;
                        border-radius: 9999px !important;
                        background-color: #ffe4e6 !important; /* Rose-100 / soft red badge */
                        color: #e11d48 !important; /* Rose-600 */
                        margin-bottom: 1rem !important;
                    }
                    .fi-swal-icon {
                        width: 26px !important;
                        height: 26px !important;
                    }
                    .fi-swal-title {
                        font-size: 1.15rem !important;
                        font-weight: 700 !important;
                        color: #0f172a !important; /* Slate-900 */
                        line-height: 1.35 !important;
                        margin-bottom: 0.35rem !important;
                    }
                    .fi-swal-desc {
                        font-size: 0.875rem !important;
                        color: #64748b !important; /* Slate-500 */
                        line-height: 1.5 !important;
                    }
                    .fi-swal-actions {
                        display: flex !important;
                        gap: 0.75rem !important;
                        width: 100% !important;
                        margin-top: 1.5rem !important;
                        justify-content: center !important;
                    }
                    .fi-swal-cancel-btn {
                        flex: 1 !important;
                        background-color: #ffffff !important;
                        color: #334155 !important;
                        border: 1px solid #cbd5e1 !important;
                        border-radius: 0.5rem !important;
                        padding: 0.65rem 1.25rem !important;
                        font-weight: 600 !important;
                        font-size: 0.875rem !important;
                        transition: all 0.15s ease !important;
                        cursor: pointer !important;
                    }
                    .fi-swal-cancel-btn:hover {
                        background-color: #f1f5f9 !important;
                        border-color: #94a3b8 !important;
                    }
                    .fi-swal-confirm-btn {
                        flex: 1 !important;
                        background-color: #e11d48 !important; /* Crimson red */
                        color: #ffffff !important;
                        border: none !important;
                        border-radius: 0.5rem !important;
                        padding: 0.65rem 1.25rem !important;
                        font-weight: 600 !important;
                        font-size: 0.875rem !important;
                        transition: all 0.15s ease !important;
                        cursor: pointer !important;
                        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1) !important;
                    }
                    .fi-swal-confirm-btn:hover {
                        background-color: #be123c !important;
                    }
                    .fi-swal-close {
                        position: absolute !important;
                        top: 1rem !important;
                        right: 1rem !important;
                        color: #94a3b8 !important;
                        font-size: 1.25rem !important;
                        transition: color 0.15s !important;
                        box-shadow: none !important;
                    }
                    .fi-swal-close:hover {
                        color: #475569 !important;
                    }
                    .swal2-backdrop-show {
                        background: rgba(15, 23, 42, 0.45) !important;
                        backdrop-filter: blur(2px) !important;
                    }
                </style>
                <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script>
                    function confirmDeleteAction(el, title, text, confirmBtnText) {
                        if (el.dataset.confirmed === "true") {
                            delete el.dataset.confirmed;
                            return true;
                        }
                        if (window.event) {
                            window.event.preventDefault();
                            window.event.stopPropagation();
                            window.event.stopImmediatePropagation();
                        }
                        const modalTitle = title || "Hapus Data";
                        const modalText = text || "Apakah Anda yakin ingin melakukan ini?";
                        const confirmText = confirmBtnText || "Konfirmasi";

                        if (typeof Swal !== "undefined") {
                            Swal.fire({
                                html: `
                                    <div class="fi-swal-modal">
                                        <div class="fi-swal-icon-wrp">
                                            <svg class="fi-swal-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.75" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                            </svg>
                                        </div>
                                        <div class="fi-swal-title">${modalTitle}</div>
                                        <div class="fi-swal-desc">${modalText}</div>
                                    </div>
                                `,
                                showCloseButton: true,
                                showCancelButton: true,
                                confirmButtonText: confirmText,
                                cancelButtonText: "Batal",
                                reverseButtons: false,
                                focusCancel: true,
                                buttonsStyling: false,
                                customClass: {
                                    popup: "fi-swal-popup",
                                    closeButton: "fi-swal-close",
                                    actions: "fi-swal-actions",
                                    confirmButton: "fi-swal-confirm-btn",
                                    cancelButton: "fi-swal-cancel-btn"
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    el.dataset.confirmed = "true";
                                    el.click();
                                }
                            });
                        } else {
                            if (confirm(modalText)) {
                                el.dataset.confirmed = "true";
                                el.click();
                            }
                        }
                        return false;
                    }
                </script>'
            )
            ->renderHook(
                'panels::sidebar.nav.end',
                fn (): string => '
                    <div class="px-4 py-4 mt-auto pt-6 border-t border-white/10 mt-8">
                        <form method="POST" action="' . route('filament.admin.auth.logout') . '">
                            ' . csrf_field() . '
                            <button type="submit" class="flex items-center gap-3 w-full px-3 py-2 text-white hover:bg-white/10 rounded-full font-bold transition-colors">
                                <svg class="w-5 h-5 opacity-70" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9" />
                                </svg>
                                Logout
                            </button>
                        </form>
                    </div>
                '
            );
    }
}
