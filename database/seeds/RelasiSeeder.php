<?php

use Illuminate\Database\Seeder;
use App\dosen;
use App\jurusan;
use App\mahasiswa;
use App\matkul;
use App\wali;

class UlanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dosens')->delete();
        DB::table('jurusans')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('matkuls')->delete();
        DB::table('matkul_mahasiswas')->delete();

        $dosen1 = dosen::create(array(
        	'nama' => 'fitri','nipd'=>'111222333','alamat'=>'Bojong','mata_kuliah'=>'TIK'
        ));
        $dosen2 = dosen::create(array(
        	'nama' => 'diah','nipd'=>'222','alamat'=>'Ranca kasiat','mata_kuliah'=>'Kimia'
        ));
        $this->command->info('Dosen Parantos Diisi !');

        $rpl = jurusan::create(array(
         	'nama_jurusan'=>'Rekayasa Perangkat Lunak'
         ));
        $tkr = jurusan::create(array(
         	'nama_jurusan'=>'Teknik Kendaraan Ringan'
         ));
        $tabut = jurusan::create(array(
         	'nama_jurusan'=>'Tata Busana'
         ));
        $this->command->info('Jurusan Parantos Diisi !');

        $fitri = mahasiswa::create(array(
        'nama_mahasiswa'=> 'fitri','nis'=>'1234','id_dosen'=>$dosen1->id,'id_jurusan'=> $tkr->id
        ));

        $deni = mahasiswa::create(array(
        'nama_mahasiswa'=> 'deni ','nis'=>'01236','id_dosen'=>$dosen1->id,'id_jurusan'=> $rpl->id
        ));
        $icih = mahasiswa::create(array(
        'nama_mahasiswa'=> 'icih','nis'=>'15603','id_dosen'=>$dosen2->id,'id_jurusan'=> $tabut->id
        ));

        $this->command->info('Mahasiswa Parantos Diisi!');

        wali::create(array(
        'nama'=>'Bpk. Fitri',
        'alamat'=>'bojong soang manuk',
        'id_mahasiswa'=>$fitri->id
        ));
        wali::create(array(
        'nama'=>'Bpk. deni ',
        'alamat'=>'cangkuang kulon',
        'id_mahasiswa'=>$deni->id
        ));
        wali::create(array(
        'nama'=>'mamah. icih',
        'alamat'=>'baleendah',
        'id_mahasiswa'=>$icih->id
        ));

		$this->command->info('Wali Parantos Diisi Okey !');

		$fisika = matkul::create(array('nama_matkul'=>'Fisika','kkm'=>'80'));
		$kimia = matkul::create(array('nama_matkul'=>'Kimia','kkm'=>'85'));

		$fitri->matkul()->attach($fisika->id);
		$deni->matkul()->attach($kimia->id);
		$deni->matkul()->attach($kimia->id);
		$icih->matkul()->attach($fisika->id);

		$this->command->info('Mahasiswa dan Mata Kuliah Parantos Diisi !'); 
    }
}
