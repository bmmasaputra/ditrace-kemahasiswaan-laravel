<?php

namespace App\Filament\Resources\TracerStudies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\TextSize;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class TracerStudyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nim')
                    ->size(TextSize::Large),
                TextEntry::make('fakultas')
                    ->size(TextSize::Large),
                TextEntry::make('prodi')
                    ->size(TextSize::Large),
                TextEntry::make('thn_lulus')
                    ->label('Tahun Lulus')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('nama')
                    ->size(TextSize::Large),
                TextEntry::make('domisili')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('daerah')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('alamat')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('no_telp')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('mail')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('nik')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('npwp')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f8')
                    ->label('Status Saat Ini (f8)')
                    ->formatStateUsing(fn($state) => [
                        '1' => 'Bekerja',
                        '2' => 'Belum Memungkinkan Bekerja',
                        '3' => 'Wirausaha',
                        '4' => 'Melanjutkan Studi',
                        '5' => 'Tidak Bekerja tetapi sedang mencari pekerjaan',
                    ][$state] ?? 'Belum Mengisi')
                    ->size(TextSize::Large),
                TextEntry::make('f504')
                    ->label('Apakah telah mendapatkan pekerjaan <= 6 bulan sebelum lulus (f504)')
                    ->size(TextSize::Large)
                    ->formatStateUsing(fn($state) => [
                        '1' => 'Ya',
                        '2' => 'Tidak',
                    ][$state] ?? 'Belum Mengisi')
                    ->placeholder('-'),
                TextEntry::make('f502')
                    ->label('Berapa bulan sebelum lulus mendapatkan pekerjaan (f502)')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f506')
                    ->label('Berapa bulan sebelum lulus mendapatkan pekerjaan (f504)')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f505')
                    ->label('Gaji pertama kali mendapatkan pekerjaan (f505)')
                    ->money('IDR')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                Fieldset::make('Lokasi Pekerjaan')
                    ->columns(2)
                    ->columnSpanFull()
                    ->schema([
                        TextEntry::make('f5a1')
                            ->label('Provinsi (f5a1)')
                            ->size(TextSize::Large)
                            ->placeholder('-'),
                        TextEntry::make('f5a2')
                            ->label('Daerah (f5a1)')
                            ->size(TextSize::Large)
                            ->placeholder('-'),
                    ]),
                TextEntry::make('f1101')
                    ->label('Jenis perusahaan / instansi / institusi tempat bekerja sekarang (f1101)')
                    ->size(TextSize::Large)
                    ->formatStateUsing(fn($state) => [
                        '1' => 'Instansi Pemerintah',
                        '6' => 'BUMN/BUMD',
                        '7' => 'Institusi / Organisasi Multilateral',
                        '2' => 'Organisasi nonprofit / Lembaga Swadaya Masyarakat',
                        '3' => 'Perusahaan Swasta',
                        '4' => 'Perusahaan sendiri / Wiraswasta',
                        '5' => 'Lainnya',
                    ][$state] ?? 'Belum Mengisi')
                    ->size(TextSize::Large),
                TextEntry::make('f1102')
                    ->label('Jika memilih lainnya sebutkan disini (f1102)')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f5b')
                    ->label('Nama perusahaan tempat alumni bekerja (f5b)')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f5c')
                    ->label('Jabatan alumni di perusahaan jika berwiraswasta (f5c)')
                    ->formatStateUsing(fn($state) => [
                        '1' => 'Founder',
                        '2' => 'Co-Founder',
                        '3' => 'Staff',
                        '4' => 'Freelance',
                    ][$state] ?? 'Belum Mengisi')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f5d')
                    ->label('Tingkat perusahaan tempat alumni bekerja (f5d)')
                    ->formatStateUsing(fn($state) => [
                        '1' => 'Lokal / wiraswasta tidak berbadan hukum',
                        '2' => 'Nasional / wiraswasta berbadan hukum',
                        '3' => 'Multinasional / Internasional',
                    ][$state] ?? 'Belum Mengisi')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f18a')
                    ->label('Sumber Biaya Studi Lanjut (f18a)')
                    ->formatStateUsing(fn($state) => [
                        '1' => 'Biaya sendiri',
                        '2' => 'Beasiswa',
                    ][$state] ?? 'Belum Mengisi')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f18b')
                    ->label('Nama Perguruan Tinggi (f18b)')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f18c')
                    ->label('Program Studi (f18c)')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f18d')
                    ->label('Tanggal Masuk (f18d)')
                    ->size(TextSize::Large)
                    ->date()
                    ->placeholder('-'),
                Fieldset::make("Sumber Dana Selama S1")->schema([
                    TextEntry::make('f1201')
                        ->label('Sumber dana alumni dalam pembiayaan kuliah anda selama S1 (f1201)')
                        ->formatStateUsing(fn($state) => [
                            '1' => 'Biaya Sendiri / Keluarga',
                            '2' => 'Beasiswa ADIK',
                            '3' => 'Beasiswa BIDIKMISI',
                            '4' => 'Beasiswa PPA',
                            '5' => 'Beasiswa AFIRMASI',
                            '6' => 'Beasiswa Perusahaan / Swasta',
                            '7' => 'Lainya',
                        ][$state] ?? 'Belum Mengisi')
                        ->size(TextSize::Large)
                        ->placeholder('-'),
                    TextEntry::make('f1202')
                        ->label('Jika memilih lainnya sebutkan disini (f1202)')
                        ->size(TextSize::Large)
                        ->placeholder('-'),
                ])->columnSpanFull()->columns(),
                TextEntry::make('f14')
                    ->label('Seberapa erat hubungan antara bidang studi dengan pekerjaan alumni')
                    ->size(TextSize::Large)
                    ->formatStateUsing(fn($state) => [
                        '1' => 'Sangat Erat',
                        '2' => 'Erat',
                        '3' => 'Cukup Erat',
                        '4' => 'Kurang Erat',
                        '5' => 'Tidak Sama Sekali',
                    ][$state] ?? 'Belum Mengisi'),
                TextEntry::make('f15')
                    ->size(TextSize::Large)
                    ->placeholder('-'),
                TextEntry::make('f1761'),
                TextEntry::make('f1762'),
                TextEntry::make('f1763'),
                TextEntry::make('f1764'),
                TextEntry::make('f1765'),
                TextEntry::make('f1766'),
                TextEntry::make('f1767'),
                TextEntry::make('f1768'),
                TextEntry::make('f1769'),
                TextEntry::make('f1770'),
                TextEntry::make('f1771'),
                TextEntry::make('f1772'),
                TextEntry::make('f1773'),
                TextEntry::make('f1774'),
                TextEntry::make('f21'),
                TextEntry::make('f22'),
                TextEntry::make('f23'),
                TextEntry::make('f24'),
                TextEntry::make('f25'),
                TextEntry::make('f26'),
                TextEntry::make('f27'),
                TextEntry::make('f301')
                    ->placeholder('-'),
                TextEntry::make('f302')
                    ->placeholder('-'),
                TextEntry::make('f303')
                    ->placeholder('-'),
                TextEntry::make('f401')
                    ->numeric(),
                TextEntry::make('f402')
                    ->numeric(),
                TextEntry::make('f403')
                    ->numeric(),
                TextEntry::make('f404')
                    ->numeric(),
                TextEntry::make('f405')
                    ->numeric(),
                TextEntry::make('f406')
                    ->numeric(),
                TextEntry::make('f407')
                    ->numeric(),
                TextEntry::make('f408')
                    ->numeric(),
                TextEntry::make('f409')
                    ->numeric(),
                TextEntry::make('f410')
                    ->numeric(),
                TextEntry::make('f411')
                    ->numeric(),
                TextEntry::make('f412')
                    ->numeric(),
                TextEntry::make('f413')
                    ->numeric(),
                TextEntry::make('f414')
                    ->numeric(),
                TextEntry::make('f415')
                    ->numeric(),
                TextEntry::make('f416')
                    ->numeric(),
                TextEntry::make('f6')
                    ->placeholder('-'),
                TextEntry::make('f7')
                    ->placeholder('-'),
                TextEntry::make('f7a')
                    ->placeholder('-'),
                TextEntry::make('f1001')
                    ->placeholder('-'),
                TextEntry::make('f1002')
                    ->placeholder('-'),
                TextEntry::make('f1601')
                    ->numeric(),
                TextEntry::make('f1602')
                    ->numeric(),
                TextEntry::make('f1603')
                    ->numeric(),
                TextEntry::make('f1604')
                    ->numeric(),
                TextEntry::make('f1605')
                    ->numeric(),
                TextEntry::make('f1606')
                    ->numeric(),
                TextEntry::make('f1607')
                    ->numeric(),
                TextEntry::make('f1608')
                    ->numeric(),
                TextEntry::make('f1609')
                    ->numeric(),
                TextEntry::make('f1610')
                    ->numeric(),
                TextEntry::make('f1611')
                    ->numeric(),
                TextEntry::make('f1612')
                    ->numeric(),
                TextEntry::make('f1613')
                    ->numeric(),
                TextEntry::make('f1614')
                    ->numeric(),
                TextEntry::make('timestamp')
                    ->dateTime(),
            ]);
    }
}
