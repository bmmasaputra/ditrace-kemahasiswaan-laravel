<?php

namespace App\Filament\OperatorFakultas\Pages;

use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Pages\Dashboard\Concerns\HasFiltersForm;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Schemas\Schema;
use Illuminate\Support\Facades\Auth;
use App\Filament\Widgets\PresentaseAgribisnis;
use App\Filament\Widgets\PresentaseAgroteknologi;
use App\Filament\Widgets\PresentaseAkutansi;
use App\Filament\Widgets\PresentaseBimbinganKonseling;
use App\Filament\Widgets\PresentaseBiologi;
use App\Filament\Widgets\PresentaseBudidayaPerairan;
use App\Filament\Widgets\PresentaseEkoPem;
use App\Filament\Widgets\PresentaseFisika;
use App\Filament\Widgets\PresentaseIHukum;
use App\Filament\Widgets\PresentaseIlmuAdministrasiNegara;
use App\Filament\Widgets\PresentaseIlmuPemerintahan;
use App\Filament\Widgets\PresentaseISosiologi;
use App\Filament\Widgets\PresentaseKedokteran;
use App\Filament\Widgets\PresentaseKehutanan;
use App\Filament\Widgets\PresentaseKimia;
use App\Filament\Widgets\PresentaseManajemen;
use App\Filament\Widgets\PresentaseManajemenPendidikan;
use App\Filament\Widgets\PresentaseManajemenPerikanan;
use App\Filament\Widgets\PresentasePendidikanBahasaInggris;
use App\Filament\Widgets\PresentasePendidikanBiologi;
use App\Filament\Widgets\PresentasePendidikanEkonomi;
use App\Filament\Widgets\PresentasePendidikanFisika;
use App\Filament\Widgets\PresentasePendidikanGPAUD;
use App\Filament\Widgets\PresentasePendidikanGSD;
use App\Filament\Widgets\PresentasePendidikanJKR;
use App\Filament\Widgets\PresentasePendidikanKimia;
use App\Filament\Widgets\PresentasePendidikanLuarSekolah;
use App\Filament\Widgets\PresentasePendidikanMatematika;
use App\Filament\Widgets\PresentasePendidikanPDK;
use App\Filament\Widgets\PresentasePendidikanProfesiGuru;
use App\Filament\Widgets\PresentasePendidikanSastraIndo;
use App\Filament\Widgets\PresentasePendidikanSDTM;
use App\Filament\Widgets\PresentasePeternakan;
use App\Filament\Widgets\PresentaseProfesiKedokteran;
use App\Filament\Widgets\PresentaseTeknikArsitektur;
use App\Filament\Widgets\PresentaseTeknikBangunan;
use App\Filament\Widgets\PresentaseTeknikInformatika;
use App\Filament\Widgets\PresentaseTeknikMesin;
use App\Filament\Widgets\PresentaseTeknikPertambangan;
use App\Filament\Widgets\PresentaseTeknikSipil;
use App\Filament\Widgets\PresentaseTeknologIHasilPeri;
use App\Filament\Widgets\PresentaseTeknologIndustriPert;
use App\Filament\Widgets\PresentaseTeknologiPendidikan;


class OperatorFakultasDashboard extends BaseDashboard
{
    use HasFiltersForm;
    // protected string $view = 'filament.operator-fakultas.pages.operator-fakultas-dashboard';

    public function filtersForm(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make()->schema([
                    Select::make('Tahun')
                        ->label('Tahun Kelulusan')
                        ->options(
                            array_combine(
                                range(date('Y'), date('Y') - 10),
                                range(date('Y'), date('Y') - 10)
                            )
                        )
                ])->columns(1)->columnSpanFull(),
            ]);
    }

    public function getWidgets(): array
    {
        $user = Auth::user();

        if ($user->fakultas == "KEDOKTERAN") {
            return [
                PresentaseProfesiKedokteran::class,
                PresentaseKedokteran::class,
            ];
        }

        if ($user->fakultas == "TEKNIK") {
            return [
                PresentaseTeknikArsitektur::class,
                PresentaseTeknikInformatika::class,
                PresentaseTeknikPertambangan::class,
                PresentaseTeknikSipil::class,
            ];
        }

        if ($user->fakultas == "PERTANIAN") {
            return [
                PresentaseAgribisnis::class,
                PresentaseAgroteknologi::class,
                PresentaseBudidayaPerairan::class,
                PresentaseKehutanan::class,
                PresentaseManajemenPerikanan::class,
                PresentasePeternakan::class,
                PresentaseTeknologIndustriPert::class,
                PresentaseTeknologIHasilPeri::class,
            ];
        }

        if ($user->fakultas == "MATEMATIKA DAN ILMU PENGETAHUAN ALAM") {
            return [
                PresentaseBiologi::class,
                PresentaseFisika::class,
                PresentaseKimia::class,
            ];
        }

        if ($user->fakultas == "EKONOMI") {
            return [
                PresentaseAkutansi::class,
                PresentaseManajemen::class,
                PresentaseEkoPem::class,
            ];
        }

        if ($user->fakultas == "ILMU SOSIAL DAN ILMU POLITIK") {
            return [
                PresentaseISosiologi::class,
                PresentaseIlmuAdministrasiNegara::class,
                PresentaseIlmuPemerintahan::class,
            ];
        }

        if ($user->fakultas == "HUKUM") {
            return [
                PresentaseIHukum::class,
            ];
        }

        if ($user->fakultas == "KEGURUAN DAN ILMU PENDIDIKAN") {
            return [
                PresentasePendidikanBahasaInggris::class,
                PresentasePendidikanBiologi::class,
                PresentasePendidikanEkonomi::class,
                PresentasePendidikanFisika::class,
                PresentasePendidikanGPAUD::class,
                PresentasePendidikanGSD::class,
                PresentasePendidikanJKR::class,
                PresentasePendidikanKimia::class,
                PresentasePendidikanLuarSekolah::class,
                PresentasePendidikanMatematika::class,
                PresentasePendidikanPDK::class,
                PresentasePendidikanProfesiGuru::class,
                PresentasePendidikanSastraIndo::class,
                PresentasePendidikanSDTM::class,
                PresentaseTeknikBangunan::class,
                PresentaseTeknikMesin::class,
                PresentaseTeknologiPendidikan::class,
                PresentaseManajemenPendidikan::class,
                PresentaseBimbinganKonseling::class,
            ];
        }

        return [];
    }

    public function getVisibleWidgets(): array
    {
        $user = Auth::user();

        if ($user->fakultas == "KEDOKTERAN") {
            return [
                PresentaseProfesiKedokteran::class,
                PresentaseKedokteran::class,
            ];
        }

        if ($user->fakultas == "TEKNIK") {
            return [
                PresentaseTeknikArsitektur::class,
                PresentaseTeknikInformatika::class,
                PresentaseTeknikPertambangan::class,
                PresentaseTeknikSipil::class,
            ];
        }

        if ($user->fakultas == "PERTANIAN") {
            return [
                PresentaseAgribisnis::class,
                PresentaseAgroteknologi::class,
                PresentaseBudidayaPerairan::class,
                PresentaseKehutanan::class,
                PresentaseManajemenPerikanan::class,
                PresentasePeternakan::class,
                PresentaseTeknologIndustriPert::class,
                PresentaseTeknologIHasilPeri::class,
            ];
        }

        if ($user->fakultas == "MATEMATIKA DAN ILMU PENGETAHUAN ALAM") {
            return [
                PresentaseBiologi::class,
                PresentaseFisika::class,
                PresentaseKimia::class,
            ];
        }

        if ($user->fakultas == "EKONOMI") {
            return [
                PresentaseAkutansi::class,
                PresentaseManajemen::class,
                PresentaseEkoPem::class,
            ];
        }

        if ($user->fakultas == "ILMU SOSIAL DAN ILMU POLITIK") {
            return [
                PresentaseISosiologi::class,
                PresentaseIlmuAdministrasiNegara::class,
                PresentaseIlmuPemerintahan::class,
            ];
        }

        if ($user->fakultas == "HUKUM") {
            return [
                PresentaseIHukum::class,
            ];
        }

        if ($user->fakultas == "KEGURUAN DAN ILMU PENDIDIKAN") {
            return [
                PresentasePendidikanBahasaInggris::class,
                PresentasePendidikanBiologi::class,
                PresentasePendidikanEkonomi::class,
                PresentasePendidikanFisika::class,
                PresentasePendidikanGPAUD::class,
                PresentasePendidikanGSD::class,
                PresentasePendidikanJKR::class,
                PresentasePendidikanKimia::class,
                PresentasePendidikanLuarSekolah::class,
                PresentasePendidikanMatematika::class,
                PresentasePendidikanPDK::class,
                PresentasePendidikanProfesiGuru::class,
                PresentasePendidikanSastraIndo::class,
                PresentasePendidikanSDTM::class,
                PresentaseTeknikBangunan::class,
                PresentaseTeknikMesin::class,
                PresentaseTeknologiPendidikan::class,
                PresentaseManajemenPendidikan::class,
                PresentaseBimbinganKonseling::class,
            ];
        }

        return [];
    }
}
