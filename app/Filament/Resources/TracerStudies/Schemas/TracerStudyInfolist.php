<?php

namespace App\Filament\Resources\TracerStudies\Schemas;

use Filament\Infolists\Components\TextEntry;
use Filament\Support\Enums\TextSize;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Components\Html;
use App\Models\Daerah;
use App\Models\Provinsi;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Schema;

class TracerStudyInfolist
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextEntry::make('nim'),
                TextEntry::make('nama'),
                TextEntry::make('fakultas'),
                TextEntry::make('prodi'),
                Section::make('Data Identitias')
                    ->schema([
                        Fieldset::make('Domisili Saat Ini')->schema([
                            TextEntry::make('domisili')
                                ->formatStateUsing(function ($state, $record) {
                                    $provinsiId = Provinsi::where('id', $state)->first();
                                    $provinsiIdProv = Provinsi::where('id_prov', (int) $state)->first();

                                    return $provinsiId ? $provinsiId->provinsi : ($provinsiIdProv ? $provinsiIdProv->provinsi : null);
                                })
                                ->placeholder('-'),
                            TextEntry::make('daerah')
                                ->formatStateUsing(function ($state, $record) {
                                    $daerah = Daerah::where('id_daerah', (int) $state)->first();
                                    return $daerah ? $daerah->daerah : $state;
                                })
                                ->placeholder('-'),
                        ])->columnSpanFull(),

                        TextEntry::make('alamat')
                            ->placeholder('-'),
                        TextEntry::make('no_telp')
                            ->placeholder('-'),
                        TextEntry::make('thn_lulus')
                            ->label('Tahun Lulus')
                            ->placeholder('-'),
                        TextEntry::make('mail')
                            ->placeholder('-'),
                        TextEntry::make('nik')
                            ->placeholder('-'),
                        TextEntry::make('npwp')
                            ->placeholder('-'),
                    ])
                    ->columnSpanFull()
                    ->columns()
                    ->collapsed()
                    ->collapsible(),

                Section::make('Data Tracer Study')->schema([
                    TextEntry::make('f8')
                        ->label('Status Saat Ini (f8)')
                        ->formatStateUsing(fn($state) => [
                            '1' => 'Bekerja',
                            '2' => 'Belum Memungkinkan Bekerja',
                            '3' => 'Wirausaha',
                            '4' => 'Melanjutkan Studi',
                            '5' => 'Tidak Bekerja tetapi sedang mencari pekerjaan',
                        ][$state] ?? 'Belum Mengisi'),
                    TextEntry::make('f504')
                        ->label('Apakah telah mendapatkan pekerjaan <= 6 bulan sebelum lulus (f504)')
                        ->formatStateUsing(fn($state) => [
                            '1' => 'Ya',
                            '2' => 'Tidak',
                        ][$state] ?? 'Belum Mengisi')
                        ->placeholder('-'),
                    TextEntry::make('f502')
                        ->label('Berapa bulan sebelum lulus mendapatkan pekerjaan (f502)')
                        ->visible(fn(Get $get): bool => $get('f504') == '1')
                        ->placeholder('-'),
                    TextEntry::make('f506')
                        ->label('Berapa bulan setelah lulus mendapatkan pekerjaan (f504)')
                        ->visible(fn(Get $get): bool => $get('f504') == '2')
                        ->placeholder('-'),
                    TextEntry::make('f505')
                        ->label('Gaji pertama kali mendapatkan pekerjaan (f505)')
                        ->money('IDR')
                        ->placeholder('-'),
                    Fieldset::make('Lokasi Pekerjaan')
                        ->columns(2)
                        ->columnSpanFull()
                        ->schema([
                            TextEntry::make('f5a1')
                                ->label('Provinsi (f5a1)')
                                ->formatStateUsing(function ($state, $record) {
                                    $provinsiId = Provinsi::where('id', $state)->first();
                                    $provinsiIdProv = Provinsi::where('id_prov', (int) $state)->first();

                                    return $provinsiId ? $provinsiId->provinsi : ($provinsiIdProv ? $provinsiIdProv->provinsi : null);
                                })
                                ->placeholder('-'),
                            TextEntry::make('f5a2')
                                ->label('Daerah (f5a1)')
                                ->formatStateUsing(function ($state, $record) {
                                    $daerah = Daerah::where('id_daerah', (int) $state)->first();
                                    return $daerah ? $daerah->daerah : $state;
                                })
                                ->placeholder('-'),
                        ]),
                    TextEntry::make('f1101')
                        ->label('Jenis perusahaan / instansi / institusi tempat bekerja sekarang (f1101)')

                        ->formatStateUsing(fn($state) => [
                            '1' => 'Instansi Pemerintah',
                            '6' => 'BUMN/BUMD',
                            '7' => 'Institusi / Organisasi Multilateral',
                            '2' => 'Organisasi nonprofit / Lembaga Swadaya Masyarakat',
                            '3' => 'Perusahaan Swasta',
                            '4' => 'Perusahaan sendiri / Wiraswasta',
                            '5' => 'Lainnya',
                        ][$state] ?? 'Belum Mengisi'),
                    TextEntry::make('f1102')
                        ->label('Jika memilih lainnya sebutkan disini (f1102)')
                        ->visible(fn(Get $get): bool => $get('f504') == '5')
                        ->placeholder('-'),
                    TextEntry::make('f5b')
                        ->label('Nama perusahaan tempat alumni bekerja (f5b)')

                        ->placeholder('-'),
                    TextEntry::make('f5c')
                        ->label('Jabatan alumni di perusahaan jika berwiraswasta (f5c)')
                        ->formatStateUsing(fn($state) => [
                            '1' => 'Founder',
                            '2' => 'Co-Founder',
                            '3' => 'Staff',
                            '4' => 'Freelance',
                        ][$state] ?? 'Belum Mengisi')

                        ->placeholder('-'),
                    TextEntry::make('f5d')
                        ->label('Tingkat perusahaan tempat alumni bekerja (f5d)')
                        ->formatStateUsing(fn($state) => [
                            '1' => 'Lokal / wiraswasta tidak berbadan hukum',
                            '2' => 'Nasional / wiraswasta berbadan hukum',
                            '3' => 'Multinasional / Internasional',
                        ][$state] ?? 'Belum Mengisi')

                        ->placeholder('-'),
                    TextEntry::make('f18a')
                        ->label('Sumber Biaya Studi Lanjut (f18a)')
                        ->formatStateUsing(fn($state) => [
                            '1' => 'Biaya sendiri',
                            '2' => 'Beasiswa',
                        ][$state] ?? 'Belum Mengisi')

                        ->placeholder('-'),
                    TextEntry::make('f18b')
                        ->label('Nama Perguruan Tinggi (f18b)')

                        ->placeholder('-'),
                    TextEntry::make('f18c')
                        ->label('Program Studi (f18c)')

                        ->placeholder('-'),
                    TextEntry::make('f18d')
                        ->label('Tanggal Masuk (f18d)')

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

                            ->placeholder('-'),
                        TextEntry::make('f1202')
                            ->label('Jika memilih lainnya sebutkan disini (f1202)')
                            ->placeholder('-'),
                    ])->columnSpanFull()->columns(),
                    TextEntry::make('f14')
                        ->label('Seberapa erat hubungan antara bidang studi dengan pekerjaan alumni (f14)')
                        ->formatStateUsing(fn($state) => [
                            '1' => 'Sangat Erat',
                            '2' => 'Erat',
                            '3' => 'Cukup Erat',
                            '4' => 'Kurang Erat',
                            '5' => 'Tidak Sama Sekali',
                        ][$state] ?? 'Belum Mengisi'),
                    TextEntry::make('f15')
                        ->label('Tingkat pendidikan yang paling tepat untuk pekerjaan alumni (f15)')
                        ->formatStateUsing(fn($state) => [
                            '1' => 'Setingkat Lebih Tinggi',
                            '2' => 'Setingkat',
                            '3' => 'Setingkat Lebih Rendah',
                            '4' => 'Tidak Perlu Pendidikan Tinggi',
                        ][$state] ?? 'Belum Mengisi')
                        ->placeholder('-'),
                    Section::make('Penilaian Kompetensi')
                        ->description('1 = Sangat Rendah ··· 5 = Sangat Tinggi')
                        ->columns(3)
                        ->columnSpanFull()
                        ->schema([
                            Html::make('1')->content('Kompetensi')->extraAttributes(['class' => 'text-xs font-semibold uppercase']),
                            Html::make('2')->content('Pada tingkat mana kompetensi di bawah ini anda kuasai?')->extraAttributes(['class' => 'text-xs font-semibold uppercase text-center']),
                            Html::make('3')->content('Pada tingkat mana kompetensi di bawah ini diperlukan di pekerjaan?')->extraAttributes(['class' => 'text-xs font-semibold uppercase text-center']),
                            Html::make('x')->content('Etika'),
                            TextEntry::make('f1761')->hiddenLabel(),
                            TextEntry::make('f1762')->hiddenLabel(),
                            Html::make('y')->content('Keahlian berdasarkan bidang ilmu'),
                            TextEntry::make('f1763')->hiddenLabel(),
                            TextEntry::make('f1764')->hiddenLabel(),
                            Html::make('z')->content('Bahasa Inggris'),
                            TextEntry::make('f1765')->hiddenLabel(),
                            TextEntry::make('f1766')->hiddenLabel(),
                            Html::make('a')->content('Penggunaan Teknologi Informasi'),
                            TextEntry::make('f1767')->hiddenLabel(),
                            TextEntry::make('f1768')->hiddenLabel(),
                            Html::make('b')->content('Komunikasi'),
                            TextEntry::make('f1769')->hiddenLabel(),
                            TextEntry::make('f1770')->hiddenLabel(),
                            Html::make('c')->content('Kerja sama tim'),
                            TextEntry::make('f1771')->hiddenLabel(),
                            TextEntry::make('f1772')->hiddenLabel(),
                            Html::make('d')->content('Pengembangan Diri'),
                            TextEntry::make('f1773')->hiddenLabel(),
                            TextEntry::make('f1774')->hiddenLabel(),
                        ]),
                    Section::make('Penekanan Metode Pembelajaran')
                        ->description('Seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi menurut alumni')
                        ->columns(2)
                        ->columnSpanFull()
                        ->schema([
                            Html::make('1')->content('Metode Pembelajaran')->extraAttributes(['class' => 'text-xs font-semibold uppercase']),
                            Html::make('2')->content('Penekanan')->extraAttributes(['class' => 'text-xs font-semibold uppercase text-center']),
                            Html::make('x')->content('Perkuliahan'),
                            TextEntry::make('f21')->formatStateUsing(fn($state) => [
                                '1' => "Sangat Besar",
                                '2' => "Besar",
                                '3' => "Sedang",
                                '4' => "Kurang",
                                '5' => "Tidak Sama Sekali",
                            ][$state] ?? 'Belum Mengisi')->hiddenLabel(),
                            Html::make('x')->content('Demonstrasi'),
                            TextEntry::make('f22')->formatStateUsing(fn($state) => [
                                '1' => "Sangat Besar",
                                '2' => "Besar",
                                '3' => "Sedang",
                                '4' => "Kurang",
                                '5' => "Tidak Sama Sekali",
                            ][$state] ?? 'Belum Mengisi')->hiddenLabel(),
                            Html::make('x')->content('Partisipasi Dalam Proyek Riset'),
                            TextEntry::make('f23')->formatStateUsing(fn($state) => [
                                '1' => "Sangat Besar",
                                '2' => "Besar",
                                '3' => "Sedang",
                                '4' => "Kurang",
                                '5' => "Tidak Sama Sekali",
                            ][$state] ?? 'Belum Mengisi')->hiddenLabel(),
                            Html::make('x')->content('Magang'),
                            TextEntry::make('f24')->formatStateUsing(fn($state) => [
                                '1' => "Sangat Besar",
                                '2' => "Besar",
                                '3' => "Sedang",
                                '4' => "Kurang",
                                '5' => "Tidak Sama Sekali",
                            ][$state] ?? 'Belum Mengisi')->hiddenLabel(),
                            Html::make('x')->content('Praktikum'),
                            TextEntry::make('f25')->formatStateUsing(fn($state) => [
                                '1' => "Sangat Besar",
                                '2' => "Besar",
                                '3' => "Sedang",
                                '4' => "Kurang",
                                '5' => "Tidak Sama Sekali",
                            ][$state] ?? 'Belum Mengisi')->hiddenLabel(),
                            Html::make('x')->content('Kerja Lapangan'),
                            TextEntry::make('f26')->formatStateUsing(fn($state) => [
                                '1' => "Sangat Besar",
                                '2' => "Besar",
                                '3' => "Sedang",
                                '4' => "Kurang",
                                '5' => "Tidak Sama Sekali",
                            ][$state] ?? 'Belum Mengisi')->hiddenLabel(),
                            Html::make('x')->content('Diskusi'),
                            TextEntry::make('f27')->formatStateUsing(fn($state) => [
                                '1' => "Sangat Besar",
                                '2' => "Besar",
                                '3' => "Sedang",
                                '4' => "Kurang",
                                '5' => "Tidak Sama Sekali",
                            ][$state] ?? 'Belum Mengisi')->hiddenLabel(),
                        ]),
                    TextEntry::make('f301')
                        ->label('Kapan alumni mulai mencari pekerjaan full-time (f301)')
                        ->formatStateUsing(fn($state) => [
                            '1' => "Sebelum Lulus",
                            '2' => "Setelah Lulus",
                            '3' => "Belum Mencari Pekerjaan",
                        ][$state] ?? 'Belum Mengisi')
                        ->placeholder('-'),
                    TextEntry::make('f302')
                        ->label('Berapa bulan sebelum lulus alumni mulai mencari pekerjaan (f302)')
                        ->visible(fn(Get $get) => $get('f301') == '1')
                        ->placeholder('-'),
                    TextEntry::make('f303')
                        ->label('Jika setelah lulus, berapa bulan setelah lulus alumni mulai mencari pekerjaan (f302)')
                        ->visible(fn(Get $get) => $get('f301') == '2')
                        ->placeholder('-'),
                    Fieldset::make('Bagaimana alumni mencari pekerjaan tersebut')->schema([
                        TextEntry::make('f401')->formatStateUsing(fn($state) => [1 => 'Melalui iklan di koran / majalah / brosur'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f401') == 1),
                        TextEntry::make('f402')->formatStateUsing(fn($state) => [1 => 'Melamar ke perusahaan tanpa mengetahui lowongan yang ada'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f402') == 1),
                        TextEntry::make('f403')->formatStateUsing(fn($state) => [1 => 'Melalui Bursa Kerja / Job Fair'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f403') == 1),
                        TextEntry::make('f404')->formatStateUsing(fn($state) => [1 => 'Mencari lewat internet / iklan online'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f404') == 1),
                        TextEntry::make('f405')->formatStateUsing(fn($state) => [1 => 'Dihubungi oleh perusahaan'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f405') == 1),
                        TextEntry::make('f406')->formatStateUsing(fn($state) => [1 => 'Menghubungi Kemenakertrans '][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f406') == 1),
                        TextEntry::make('f407')->formatStateUsing(fn($state) => [1 => 'Menghubungi agen tenaga kerja komersial/swasta '][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f407') == 1),
                        TextEntry::make('f408')->formatStateUsing(fn($state) => [1 => 'Melalui informasi dari kantor pengembangan karir universitas'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f408') == 1),
                        TextEntry::make('f409')->formatStateUsing(fn($state) => [1 => 'Menghubungi kantor kemahasiswaan / hubungan alumni'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f409') == 1),
                        TextEntry::make('f410')->formatStateUsing(fn($state) => [1 => 'Membangun jejaring sejak masih kuliah'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f410') == 1),
                        TextEntry::make('f411')->formatStateUsing(fn($state) => [1 => 'Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f411') == 1),
                        TextEntry::make('f412')->formatStateUsing(fn($state) => [1 => 'Membangun bisnis sendiri'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f412') == 1),
                        TextEntry::make('f413')->formatStateUsing(fn($state) => [1 => 'Melalui penempatan kerja atau magang'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f413') == 1),
                        TextEntry::make('f414')->formatStateUsing(fn($state) => [1 => 'Bekerja di tempat yang sama dengan tempat kerja semasa kuliah'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f414') == 1),
                        TextEntry::make('f415')->formatStateUsing(fn($state) => [1 => 'Lainnya'][$state] ?? 'Belum Mengisi')->visible(fn(Get $get) => $get('f415') == 1),
                        TextEntry::make('f416')
                            ->visible(fn(Get $get) => $get('f415') == 1)
                            ->placeholder('-'),
                    ])->columnSpanFull()->columns(),
                    TextEntry::make('f6')
                        ->label('Jumlah perusahaan / instansi / institusi yang sudah alumni lamar sebelum alumni memperoleh pekerjaan pertama (f6)')
                        ->placeholder('-'),
                    TextEntry::make('f7')
                        ->label('Jumlah perusahaan / instansi / institusi yang merespons lamaran alumni (f7)')
                        ->placeholder('-'),
                    TextEntry::make('f7a')
                        ->label('Jumlah perusahaan / instansi / institusi yang mengundang alumni untuk wawancara (f7a)')
                        ->placeholder('-'),
                    TextEntry::make('f1001')
                        ->label('Apakah alumni aktif mencari pekerjaan dalam 4 minggu terakhir (f1001)')
                        ->formatStateUsing(fn($state) => [
                            '1' => 'Tidak',
                            '2' => 'Tidak, tapi saya sedang menunggu hasil lamaran kerja',
                            '3' => 'Ya, saya akan mulai bekerja dalam 2 minggu ke depan',
                            '4' => 'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan',
                            '5' => 'Lainya'
                        ][$state] ?? 'Belum Mengisi')
                        ->placeholder('-'),
                    TextEntry::make('f1002')
                        ->label('Jika memilih lainya tuliskan disini (f1002)')
                        ->visible(fn(callable $get) => $get('f1001') == '5')
                        ->placeholder('-'),

                    Fieldset::make('Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu')->schema([
                        TextEntry::make('f1601')->formatStateUsing(fn($state) => [1 => 'Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya'][$state] ?? '-')->visible(fn(Get $get) => $get('f1601') == 1),
                        TextEntry::make('f1602')->formatStateUsing(fn($state) => [1 => 'Saya belum mendapatkan pekerjaan yang lebih sesuai'][$state] ?? '-')->visible(fn(Get $get) => $get('f1602') == 1),
                        TextEntry::make('f1603')->formatStateUsing(fn($state) => [1 => 'Di pekerjaan ini saya memeroleh prospek karir yang baik'][$state] ?? '-')->visible(fn(Get $get) => $get('f1603') == 1),
                        TextEntry::make('f1604')->formatStateUsing(fn($state) => [1 => 'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya'][$state] ?? '-')->visible(fn(Get $get) => $get('f1604') == 1),
                        TextEntry::make('f1605')->formatStateUsing(fn($state) => [1 => 'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya'][$state] ?? '-')->visible(fn(Get $get) => $get('f1605') == 1),
                        TextEntry::make('f1606')->formatStateUsing(fn($state) => [1 => 'Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini'][$state] ?? '-')->visible(fn(Get $get) => $get('f1606') == 1),
                        TextEntry::make('f1607')->formatStateUsing(fn($state) => [1 => 'Pekerjaan saya saat ini lebih aman/terjamin/secure'][$state] ?? '-')->visible(fn(Get $get) => $get('f1607') == 1),
                        TextEntry::make('f1608')->formatStateUsing(fn($state) => [1 => 'Pekerjaan saya saat ini lebih menarik'][$state] ?? '-')->visible(fn(Get $get) => $get('f1608') == 1),
                        TextEntry::make('f1609')->formatStateUsing(fn($state) => [1 => 'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll'][$state] ?? '-')->visible(fn(Get $get) => $get('f1609') == 1),
                        TextEntry::make('f1610')->formatStateUsing(fn($state) => [1 => 'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya'][$state] ?? '-')->visible(fn(Get $get) => $get('f1610') == 1),
                        TextEntry::make('f1611')->formatStateUsing(fn($state) => [1 => 'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya'][$state] ?? '-')->visible(fn(Get $get) => $get('f1611') == 1),
                        TextEntry::make('f1612')->formatStateUsing(fn($state) => [1 => 'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya'][$state] ?? '-')->visible(fn(Get $get) => $get('f1612') == 1),
                        TextEntry::make('f1613')->formatStateUsing(fn($state) => [1 => 'Lainnya'][$state] ?? '-')->visible(fn(Get $get) => $get('f1613') == 1),
                        TextEntry::make('f1614')
                            ->label('Jika memilih lainnya sebutkan disini (f1614)')
                            ->visible(fn(callable $get): bool => $get('f1613'))
                            ->hiddenLabel(),
                    ])->columnSpanFull()->columns(),
                ])->collapsible()->columnSpanFull()->columns()->collapsed(),
                TextEntry::make('timestamp')
                    ->label('Terakhir Kali di Update')
                    ->dateTime(),
            ]);
    }
}
