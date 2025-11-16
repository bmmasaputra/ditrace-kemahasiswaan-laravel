<?php

namespace App\Filament\Alumni\Resources\Identitas\Schemas;

use Filament\Schemas\Components\Wizard\Step;
use Filament\Forms\Components\DatePicker;
use Filament\Schemas\Components\Fieldset;
use Filament\Schemas\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Wizard;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Checkbox;
use Filament\Schemas\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Html;
use Filament\Forms\Components\Radio;
use Filament\Schemas\Schema;
use Filament\Support\RawJs;
use App\Models\Fakprodi;
use App\Models\Provinsi;
use App\Models\Daerah;

class IdentitaForm
{
    public static function configure(Schema $schema): Schema
    {
        // $provinsi = ProvinsiNDB::all()->pluck('provinsi', 'id');
        // // $provinsi = Provinsi::query()
        // //     ->pluck('provinsi', (string) 'id_prov')
        // //     ->toArray();

        // dd($provinsi);
        return $schema
            ->components([
                Wizard::make([
                    Step::make('Data Identitas')->schema([
                        TextInput::make('nama')
                            ->required(),
                        Select::make('fakultas')
                            ->options(
                                Fakprodi::query()
                                    ->distinct()
                                    ->pluck('fakultas', 'fakultas')
                                    ->toArray()
                            )
                            ->reactive()
                            ->required(),
                        Select::make('prodi')
                            ->options(function (callable $get) {
                                $fakultas = $get('fakultas');

                                if (! $fakultas) {
                                    return [];
                                }

                                return Fakprodi::query()
                                    ->where('fakultas', $fakultas)
                                    ->pluck('prodi', 'prodi')
                                    ->toArray();
                            })
                            ->label('Program Studi')
                            ->required(),
                        Select::make('thn_lulus')
                            ->label('Tahun Lulus')
                            ->options(
                                array_combine(
                                    range(date('Y'), date('Y') - 7),
                                    range(date('Y'), date('Y') - 7)
                                )
                            )
                            ->required(),
                        Fieldset::make('Domisili Saat Ini')->schema([
                            Select::make('domisili')
                                ->label('Provinsi')
                                ->options(
                                    Provinsi::query()
                                        ->pluck('provinsi', 'id')
                                        ->toArray()
                                )
                                ->reactive()
                                ->preload()
                                ->required(),
                            Select::make('daerah')
                                ->label('Kota / Kabupaten')
                                ->options(function (callable $get) {
                                    $id = $get('domisili');

                                    if (! $id) {
                                        return [];
                                    }
                                    return Daerah::query()
                                        ->where('id_prov2', $id)
                                        ->pluck('daerah', 'daerah')
                                        ->toArray();
                                })
                                ->reactive()
                                ->preload()
                                ->required(),
                        ]),
                        Textarea::make('alamat')
                            ->columnSpanFull()
                            ->required(),
                        TextInput::make('no_telp')
                            ->label('No. Telepon / HP')
                            ->tel()
                            ->required(),
                        TextInput::make('mail')
                            ->label('Email')
                            ->email()
                            ->required(),
                        TextInput::make('nik')
                            ->label('NIK')
                            ->required(),
                        TextInput::make('npwp')
                            ->label('NPWP')
                            ->required(),
                    ])->columnSpanFull(),
                    Step::make('Status Anda')->schema([
                        Radio::make('f8')
                            ->label('Apa status Anda saat ini?')
                            ->options([
                                '1' => 'Bekerja',
                                '3' => 'Wirausaha',
                                '4' => 'Melanjutkan Studi',
                                '5' => 'Tidak Bekerja Tetapi Sedang Mencari Pekerjaan',
                                '2' => 'Belum Memungkinkan Bekerja',
                            ])
                            ->columnSpanFull()
                            ->live()
                            ->required(),
                    ])->columnSpanFull(),
                    Step::make('Kapan Mulai Bekerja')->schema([
                        Radio::make('f504')
                            ->label('Apakah anda telah mendapatkan pekerjaan kurang dari atau sama dengan 6 bulan sebelum lulus?')
                            ->options([
                                '1' => 'Ya',
                                '2' => 'Tidak',
                            ])
                            ->live()
                            ->columnSpanFull()
                            ->requiredIf('f8', ['1', '3']),
                        TextInput::make('f502')
                            ->label('Jika ya, berapa bulan anda mendapatkan pekerjaan sebelum lulus?')
                            ->maxValue(6)
                            ->minValue(0)
                            ->visible(fn(callable $get) => $get('f504') == '1')
                            ->requiredIf('f504', '1')
                            ->numeric(),
                        TextInput::make('f506')
                            ->label('Jika tidak, berapa bulan anda mendapatkan pekerjaan setelah lulus?')
                            ->minValue(0)
                            ->visible(fn(callable $get) => $get('f504') == '2')
                            ->requiredIf('f504', '2')
                            ->numeric(),
                        TextInput::make('f505')
                            ->label('Berapa rata-rata pendapatan anda per bulan?')
                            ->minValue(0)
                            ->mask(RawJs::make('$money($input)'))
                            ->stripCharacters(',')
                            ->numeric()
                            ->requiredIf('f8', ['1', '3']),
                    ])->visible(fn(callable $get) => in_array(($get('f8')), ['1', '3']))->columnSpanFull(),

                    Step::make('Lokasi Pekerjaan')->schema([
                        Select::make('f5a1')
                            ->label('Provinsi')
                            ->options(
                                Provinsi::query()
                                    ->pluck('provinsi', 'id')
                                    ->toArray()
                            )
                            ->live(onBlur: true)
                            ->preload()
                            ->reactive()
                            ->requiredIf('f8', ['1', '3']),
                        Select::make('f5a2')
                            ->label('Kota / Kabupaten')
                            ->options(function (callable $get) {
                                $id = $get('f5a1');

                                if (! $id) {
                                    return [];
                                }

                                return Daerah::query()
                                    ->where('id_prov2', $id)
                                    ->pluck('daerah', 'daerah')
                                    ->toArray();
                            })
                            ->preload()
                            ->reactive()
                            ->requiredIf('f8', ['1', '3']),
                    ])->visible(fn(callable $get) => in_array(($get('f8')), ['1', '3']))->columnSpanFull(),

                    Step::make('Detail perusahaan')->schema([
                        Radio::make('f1101')
                            ->label('Apa jenis perusahaan / instansi / institusi tempat anda bekerja sekarang?')
                            ->options([
                                '1' => 'Instansi Pemerintah',
                                '6' => 'BUMN/BUMD',
                                '7' => 'Institusi / Organisasi Multilateral',
                                '2' => 'Organisasi nonprofit / Lembaga Swadaya Masyarakat',
                                '3' => 'Perusahaan Swasta',
                                '4' => 'Perusahaan sendiri / Wiraswasta',
                                '5' => 'Lainnya (tuliskan)',
                            ])
                            ->columns()
                            ->live()
                            ->requiredIf('f8', ['1', '3']),
                        TextInput::make('f1102')
                            ->label('Jika memilih lainnya sebutkan disini')
                            ->visible(fn(callable $get) => $get('f1101') == '5')
                            ->maxLength(100),
                        Radio::make('f5d')
                            ->label('Apa tingkat tempat kerja Anda?')
                            ->options([
                                '1' => 'Lokal / wiraswasta tidak berbadan hukum',
                                '2' => 'Nasional / wiraswasta berbadan hukum',
                                '3' => 'Multinasional / Internasional',
                            ])
                            ->requiredIf('f8', ['1', '3']),
                        TextInput::make('f5b')
                            ->label('Apa nama perusahaan tempat Anda bekerja?')
                            ->requiredIf('f8', ['1', '3']),
                        Select::make('f5c')
                            ->label('Bila berwiraswasta jelaskan apa jabatan Anda saat ini?')
                            ->options([
                                '1' => 'Founder',
                                '2' => 'Co-Founder',
                                '3' => 'Staff',
                                '4' => 'Freelance',
                            ])
                            ->columnSpanFull()
                            ->visible(fn(callable $get) => $get('f8') == '3')
                            ->requiredIf('f8', '3'),
                    ])->visible(fn(callable $get) => in_array(($get('f8')), ['1', '3']))->columnSpanFull(),

                    Step::make('Detail Studi Lanjut')->schema([
                        Fieldset::make("Pertanyaan Studi Lanjut")->schema([
                            Radio::make('f18a')
                                ->label('Sumber Biaya Studi Lanjut')
                                ->options([
                                    '1' => 'Biaya sendiri',
                                    '2' => 'Beasiswa',
                                ])
                                ->columns()
                                ->requiredIf('f8', '4'),
                            TextInput::make('f18b')
                                ->label('Nama Perguruan Tinggi')
                                ->requiredIf('f8', '4'),
                            TextInput::make('f18c')
                                ->label('Program Studi')
                                ->requiredIf('f8', '4'),
                            DatePicker::make('f18d')
                                ->label('Tanggal Masuk')
                                ->requiredIf('f8', '4'),
                        ])->columnSpanFull()->columns(),
                        Fieldset::make("Sumber Dana Selama S1")->schema([
                            Radio::make('f1201')
                                ->label('Dari mana sumber dana dalam pembiayaan kuliah anda selama S1?')
                                ->options([
                                    '1' => 'Biaya Sendiri / Keluarga',
                                    '2' => 'Beasiswa ADIK',
                                    '3' => 'Beasiswa BIDIKMISI',
                                    '4' => 'Beasiswa PPA',
                                    '5' => 'Beasiswa AFIRMASI',
                                    '6' => 'Beasiswa Perusahaan / Swasta',
                                    '7' => 'Lainya',
                                ])
                                ->columns()
                                ->live()
                                ->requiredIf('f8', '4'),
                            TextInput::make('f1202')
                                ->label('Jika memilih lainnya sebutkan disini')
                                ->visible(fn(callable $get) => in_array($get('f1201'), ['7']))
                                ->requiredIf('f1201', '7'),
                        ])->columnSpanFull()->columns(),
                        Radio::make('f14')
                            ->label('Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?')
                            ->options([
                                '1' => 'Sangat Erat',
                                '2' => 'Erat',
                                '3' => 'Cukup Erat',
                                '4' => 'Kurang Erat',
                                '5' => 'Tidak Sama Sekali',
                            ])
                            ->requiredIf('f8', '4'),
                        Radio::make('f15')
                            ->label('Tingkat pendidikan apa yang paling tepat / sesuai untuk pekerjaan anda saat ini?')
                            ->options([
                                '1' => 'Setingkat Lebih Tinggi',
                                '2' => 'Setingkat',
                                '3' => 'Setingkat Lebih Rendah',
                                '4' => 'Tidak Perlu Pendidikan Tinggi',
                            ])
                            ->requiredIf('f8', '4'),
                    ])->visible(fn(callable $get) => in_array(($get('f8')), ['4']))->columns(2),

                    Step::make('Penilaian Kompetensi')
                        ->schema([
                            Section::make()
                                ->description('1 = Sangat Rendah ··· 5 = Sangat Tinggi')
                                ->schema([
                                    // Header row
                                    Grid::make(3)->schema([
                                        Html::make('1')->content('Kompetensi')->extraAttributes(['class' => 'text-xs font-semibold uppercase']),
                                        Html::make('2')->content('Pada tingkat mana kompetensi di bawah ini anda kuasai?')->extraAttributes(['class' => 'text-xs font-semibold uppercase text-center']),
                                        Html::make('3')->content('Pada tingkat mana kompetensi di bawah ini diperlukan di pekerjaan?')->extraAttributes(['class' => 'text-xs font-semibold uppercase text-center']),
                                    ])->columnSpanFull(),

                                    // Row 1 — Etika
                                    Group::make()->schema([
                                        Html::make('x')->content('Etika'),
                                        Radio::make('f1761')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                        Radio::make('f1762')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                    ])->columns(3),

                                    // Row 2 — Keahlian berdasarkan bidang ilmu
                                    Group::make()->schema([
                                        Html::make('y')->content('Keahlian berdasarkan bidang ilmu'),
                                        Radio::make('f1763')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                        Radio::make('f1764')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                    ])->columns(3),

                                    // Row 3 — Bahasa Inggris
                                    Group::make()->schema([
                                        Html::make('z')->content('Bahasa Inggris'),
                                        Radio::make('f1765')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                        Radio::make('f1766')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                    ])->columns(3),

                                    // Row 4 — Penggunaan Teknologi Informasi
                                    Group::make()->schema([
                                        Html::make('a')->content('Penggunaan Teknologi Informasi'),
                                        Radio::make('f1767')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                        Radio::make('f1768')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                    ])->columns(3),

                                    // Row 5 — Komunikasi
                                    Group::make()->schema([
                                        Html::make('b')->content('Komunikasi'),
                                        Radio::make('f1769')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                        Radio::make('f1770')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                    ])->columns(3),

                                    // Row 6 — Kerja sama tim
                                    Group::make()->schema([
                                        Html::make('c')->content('Kerja sama tim'),
                                        Radio::make('f1771')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                        Radio::make('f1772')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                    ])->columns(3),

                                    // Row 7 — Pengembangan Diri
                                    Group::make()->schema([
                                        Html::make('d')->content('Pengembangan Diri'),
                                        Radio::make('f1773')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                        Radio::make('f1774')->options(['1', '2', '3', '4', '5'])->inline()->hiddenLabel()->required(),
                                    ])->columns(3),
                                ])
                        ])
                        ->columns(1)   // keep rows stacked
                        ->columnSpanFull(),

                    Step::Make('Penekanan Metode Pembelajaran')
                        ->schema([
                            Section::make('Menurut anda seberapa besar penekanan pada metode pembelajaran di bawah ini dilaksanakan di program studi anda?')
                                ->schema([
                                    Grid::make(3)->schema([
                                        Html::make('1')->content('Metode Pembelajaran')->extraAttributes(['class' => 'text-xs font-semibold uppercase']),
                                        Html::make('2')->content('Penekanan Metode Pembelajaran')->extraAttributes(['class' => 'text-xs font-semibold uppercase text-center'])->columnSpan(2),
                                    ])->columnSpanFull(),
                                    Group::make()->schema([
                                        Html::make('x')->content('Perkuliahan'),
                                        Radio::make('f21')->options(["1" => "Sangat Besar", "2" => "Besar", "3" => "Sedang", "4" => "Kurang", "5" => "Tidak Sama Sekali"])->columnSpan(2)->inline()->hiddenLabel()->required(),
                                    ])->columns(3),
                                    Group::make()->schema([
                                        Html::make('x')->content('Demonstrasi'),
                                        Radio::make('f22')->options(["1" => "Sangat Besar", "2" => "Besar", "3" => "Sedang", "4" => "Kurang", "5" => "Tidak Sama Sekali"])->columnSpan(2)->inline()->hiddenLabel()->required(),
                                    ])->columns(3),
                                    Group::make()->schema([
                                        Html::make('x')->content('Partisipasi Dalam Proyek Riset'),
                                        Radio::make('f23')->options(["1" => "Sangat Besar", "2" => "Besar", "3" => "Sedang", "4" => "Kurang", "5" => "Tidak Sama Sekali"])->columnSpan(2)->inline()->hiddenLabel()->required(),
                                    ])->columns(3),
                                    Group::make()->schema([
                                        Html::make('x')->content('Magang'),
                                        Radio::make('f24')->options(["1" => "Sangat Besar", "2" => "Besar", "3" => "Sedang", "4" => "Kurang", "5" => "Tidak Sama Sekali"])->columnSpan(2)->inline()->hiddenLabel()->required(),
                                    ])->columns(3),
                                    Group::make()->schema([
                                        Html::make('x')->content('Praktikum'),
                                        Radio::make('f25')->options(["1" => "Sangat Besar", "2" => "Besar", "3" => "Sedang", "4" => "Kurang", "5" => "Tidak Sama Sekali"])->columnSpan(2)->inline()->hiddenLabel()->required(),
                                    ])->columns(3),
                                    Group::make()->schema([
                                        Html::make('x')->content('Kerja Lapangan'),
                                        Radio::make('f26')->options(["1" => "Sangat Besar", "2" => "Besar", "3" => "Sedang", "4" => "Kurang", "5" => "Tidak Sama Sekali"])->columnSpan(2)->inline()->hiddenLabel()->required(),
                                    ])->columns(3),
                                    Group::make()->schema([
                                        Html::make('x')->content('Diskusi'),
                                        Radio::make('f27')->options(["1" => "Sangat Besar", "2" => "Besar", "3" => "Sedang", "4" => "Kurang", "5" => "Tidak Sama Sekali"])->columnSpan(2)->inline()->hiddenLabel()->required(),
                                    ])->columns(3),
                                ])
                        ])->columnSpanFull(),

                    Step::make('Mencari Pekerjaan')->schema([
                        Fieldset::make()->schema([
                            Radio::make('f301')
                                ->label('Kapan anda mulai mencari pekerjaan? Mohon pekerjaan sambilan tidak dimasukkan')
                                ->options([
                                    '1' => 'Sebelum Lulus',
                                    '2' => 'Setelah Lulus',
                                    '3' => 'Belum Mencari Pekerjaan',
                                ])
                                ->live()
                                ->requiredIf('f8', ['1', '3']),
                            TextInput::make('f302')
                                ->label('Jika sebelum lulus, berapa bulan sebelum lulus anda mulai mencari pekerjaan?')
                                ->numeric()
                                ->visible(fn(callable $get) => $get('301') == '1')
                                ->requiredIf('f301', '1'),
                            TextInput::make('f303')
                                ->label('Jika setelah lulus, berapa bulan setelah lulus anda mulai mencari pekerjaan?')
                                ->numeric()
                                ->visible(fn(callable $get) => $get('301') == '2')
                                ->requiredIf('f301', '2'),
                        ])->columnSpanFull()->columns(1),
                        Fieldset::make('Bagaimana anda mencari pekerjaan tersebut? Jawaban bisa lebih dari satu')->schema([
                            Checkbox::make('f401')->label('Melalui iklan di koran / majalah / brosur'),
                            Checkbox::make('f402')->label('Melamar ke perusahaan tanpa mengetahui lowongan yang ada'),
                            Checkbox::make('f403')->label('Melalui Bursa Kerja / Job Fair'),
                            Checkbox::make('f404')->label('Mencari lewat internet / iklan online'),
                            Checkbox::make('f405')->label('Dihubungi oleh perusahaan'),
                            Checkbox::make('f406')->label('Menghubungi Kemenakertrans '),
                            Checkbox::make('f407')->label('Menghubungi agen tenaga kerja komersial/swasta '),
                            Checkbox::make('f408')->label('Melalui informasi dari kantor pengembangan karir universitas'),
                            Checkbox::make('f409')->label('Menghubungi kantor kemahasiswaan / hubungan alumni'),
                            Checkbox::make('f410')->label('Membangun jejaring sejak masih kuliah'),
                            Checkbox::make('f411')->label('Melalui relasi (misalnya dosen, orang tua, saudara, teman, dll.)'),
                            Checkbox::make('f412')->label('Membangun bisnis sendiri'),
                            Checkbox::make('f413')->label('Melalui penempatan kerja atau magang'),
                            Checkbox::make('f414')->label('Bekerja di tempat yang sama dengan tempat kerja semasa kuliah'),
                            Checkbox::make('f415')->label('Lainnya')->live(),
                            TextInput::make('f1416')
                                ->label('Jika memilih lainnya sebutkan disini')
                                ->placeholder('Jika memilih lainya, tuliskan di sini')
                                ->visible(fn(callable $get): bool => $get('f415'))
                                ->hiddenLabel(),
                        ])->columnSpanFull()->columns(2),
                    ])->visible(fn(callable $get) => in_array(($get('f8')), ['1', '3']))->columns(2),

                    Step::make('Melamar Pekerjaan')->schema([
                        TextInput::make('f6')
                            ->label('Berapa perusahaan / instansi / institusi yang sudah anda lamar sebelum anda memperoleh pekerjaan pertama?')
                            ->requiredIf('f8', ['1', '3', '5']),
                        TextInput::make('f7')
                            ->label('Berapa banyak perusahaan / instansi / institusi yang merespons lamaran anda?')
                            ->requiredIf('f8', ['1', '3', '5']),
                        TextInput::make('f7a')
                            ->label('Berapa banyak perusahaan / instansi / institusi yang mengundang anda untuk wawancara?')
                            ->requiredIf('f8', ['1', '3', '5']),

                        Fieldset::make()->schema([
                            Radio::make('f1001')
                                ->label('Apakah anda aktif mencari pekerjaan dalam 4 minggu terakhir?')
                                ->live()
                                ->options([
                                    '1' => 'Tidak',
                                    '2' => 'Tidak, tapi saya sedang menunggu hasil lamaran kerja',
                                    '3' => 'Ya, saya akan mulai bekerja dalam 2 minggu ke depan',
                                    '4' => 'Ya, tapi saya belum pasti akan bekerja dalam 2 minggu ke depan',
                                    '5' => 'Lainya'
                                ])
                                ->visible(fn(callable $get) => $get('f8') == '5')
                                ->requiredIf('f8', '5'),
                            TextInput::make('f1002')
                                ->visible(fn(callable $get) => $get('f1001') == '5')
                                ->label('Jika memilih lainnya sebutkan disini')
                        ])->visible(fn(callable $get) => $get('f8') == '5')->columnSpanFull()->columns(1),

                        Fieldset::make('Jika menurut anda pekerjaan anda saat ini tidak sesuai dengan pendidikan anda, mengapa anda mengambilnya? Jawaban bisa lebih dari satu')->schema([
                            Checkbox::make('f1601')->label('Pertanyaan tidak sesuai; pekerjaan saya sekarang sudah sesuai dengan pendidikan saya'),
                            Checkbox::make('f1602')->label('Saya belum mendapatkan pekerjaan yang lebih sesuai'),
                            Checkbox::make('f1603')->label('Di pekerjaan ini saya memeroleh prospek karir yang baik'),
                            Checkbox::make('f1604')->label('Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya'),
                            Checkbox::make('f1605')->label('Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya'),
                            Checkbox::make('f1606')->label('Saya dapat memeroleh pendapatan yang lebih tinggi di pekerjaan ini'),
                            Checkbox::make('f1607')->label('Pekerjaan saya saat ini lebih aman/terjamin/secure'),
                            Checkbox::make('f1608')->label('Pekerjaan saya saat ini lebih menarik'),
                            Checkbox::make('f1609')->label('Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll'),
                            Checkbox::make('f1610')->label('Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya'),
                            Checkbox::make('f1611')->label('Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya'),
                            Checkbox::make('f1612')->label('Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya'),
                            Checkbox::make('f1613')->label('Lainya')->live(),
                            TextInput::make('f1614')
                                ->label('Jika memilih lainnya sebutkan disini')
                                ->placeholder('Jika memilih lainya, tuliskan di sini')
                                ->visible(fn(callable $get): bool => $get('f1613'))
                                ->hiddenLabel(),
                        ])->visible(fn(callable $get) => in_array(($get('f8')), ['1', '3']))->columnSpanFull()->columns(1),

                    ])->visible(fn(callable $get) => in_array(($get('f8')), ['1', '3', '5']))->columnSpanFull(),
                ])->columnSpanFull(),
            ]);
    }
}
