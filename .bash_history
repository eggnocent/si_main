php artisan migrate
mariadb
php artisan make:model Siswa
php artisan make:controller SiswaController
php artisan tinker
mariadb
a2enmod rewrite 
systemctl restart apache2
ls
cd routes/
ls
mv resources/ /var/www/siswakoding/
cd ..
cd public/
mv views/ /var/www/siswakoding/resources/
cd ..
cd resources/
ls
exit
ping 8.8.8.8
apt update
apt install apache2
init 0
ip a
mariadb
init 0
ip a
init 0
cd /var/www/siswakoding/
ls
init 0
cd /var/www/siswakoding/resources/views/
ls
cd siswa
ls
nano index.blade.php 
init 0
php artisan make:migration create_barang_table --create=baran
php artisan migrate
mariadb
php artisan make:migration create_kategori_table --create=kategori
php artisan migrate
mariadb
php artisan make:migration create_kategori_table --create=kategori
php artisan migrate
php artisan make:migration create_barang_table --create=barang
php artisan migrate
mariadb
php artisan make:controller BarangController
php artisan make:model Barang

php artisan make:model Kategori
php artisan make:controller AuthController
php artisan make:controller HomeController
php artisan route:clear
cd resources/views/
chmod 755 layout
chmod 755 siswa
clear
<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class SiswaController extends Controller
{     /**;      * Display a listing of the resource.;      */;     public function index(Request $request)
    {         $siswa = Siswa::latest()->paginate(10);        
        return view('siswa.index',compact('siswa'));
        // return DB::table('siswa')->get();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {         return view('siswa.create');
    }
    /**
 * Display the specified resource.
 */
public function show($id)
{     $siswa = Siswa::find($id);
    if (;siswa) {
        return redirect()->route('siswa.index')->with('error', 'Data siswa tidak ditemukan');
    }
    return view('siswa.show', compact('siswa'));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {         // Validasi input dari form;         $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required',
            'gender' => 'required|in:M,F',
            'rombel' => 'required|in:A,B',
            'kelas' => 'required|in:X,XI,XII,XIII',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // Tambahkan validasi lain sesuai kebutuhan
        ]);
        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/foto_siswa', $foto->hashName());
        // Simpan data siswa ke database
        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'rombel' => $request->rombel,
            'kelas' => $request->kelas, 
            'foto' => $foto->hashName()
        ]);
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }
    // ...
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {         $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {         // Validasi input dari form;         $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $id,
            'nama' => 'required',
            'gender' => 'required|in:M,F',
            'rombel' => 'required|in:A,B',
            'kelas' => 'required|in:X,XI,XII,XIII',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // Tambahkan validasi lain sesuai kebutuhan
        ]);
        // Cari data siswa berdasarkan ID
        $siswa = Siswa::find($id);
        if ($request->hasFile('foto')) {
            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/foto_siswa', $foto->hashName());
            //delete old image
            Storage::delete('public/foto_siswa/'.$siswa->foto);
            //update post with new image
            $siswa->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'rombel' => $request->rombel,
                'kelas' => $request->kelas, 
                'foto' => $foto->hashName()
            ]);
        } else {
            //update post without image
            $siswa->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'rombel' => $request->rombel,
                'kelas' => $request->kelas, 
            ]);
        }
        // // Perbarui data siswa
        // $siswa->update($request->all());
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }
    // ...
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {         $siswa = Siswa::find($id);
        //delete image
        Storage::delete('public/foto_siswa/'. $siswa->foto);
        //delete post
        $siswa->delete();
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil dihapus');
    }
}<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
class SiswaController extends Controller
{     /**;      * Display a listing of the resource.;      */;     public function index(Request $request)
    {         $siswa = Siswa::latest()->paginate(10);        
        return view('siswa.index',compact('siswa'));
        // return DB::table('siswa')->get();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {         return view('siswa.create');
    }
    /**
 * Display the specified resource.
 */
public function show($id)
{     $siswa = Siswa::find($id);
    if (;siswa) {
        return redirect()->route('siswa.index')->with('error', 'Data siswa tidak ditemukan');
    }
    return view('siswa.show', compact('siswa'));
}
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {         // Validasi input dari form;         $request->validate([
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required',
            'gender' => 'required|in:M,F',
            'rombel' => 'required|in:A,B',
            'kelas' => 'required|in:X,XI,XII,XIII',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // Tambahkan validasi lain sesuai kebutuhan
        ]);
        //upload image
        $foto = $request->file('foto');
        $foto->storeAs('public/foto_siswa', $foto->hashName());
        // Simpan data siswa ke database
        Siswa::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'gender' => $request->gender,
            'rombel' => $request->rombel,
            'kelas' => $request->kelas, 
            'foto' => $foto->hashName()
        ]);
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil ditambahkan');
    }
    // ...
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {         $siswa = Siswa::find($id);
        return view('siswa.edit', compact('siswa'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {         // Validasi input dari form;         $request->validate([
            'nis' => 'required|unique:siswa,nis,' . $id,
            'nama' => 'required',
            'gender' => 'required|in:M,F',
            'rombel' => 'required|in:A,B',
            'kelas' => 'required|in:X,XI,XII,XIII',
            'foto' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            // Tambahkan validasi lain sesuai kebutuhan
        ]);
        // Cari data siswa berdasarkan ID
        $siswa = Siswa::find($id);
        if ($request->hasFile('foto')) {
            //upload new image
            $foto = $request->file('foto');
            $foto->storeAs('public/foto_siswa', $foto->hashName());
            //delete old image
            Storage::delete('public/foto_siswa/'.$siswa->foto);
            //update post with new image
            $siswa->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'rombel' => $request->rombel,
                'kelas' => $request->kelas, 
                'foto' => $foto->hashName()
            ]);
        } else {
            //update post without image
            $siswa->update([
                'nis' => $request->nis,
                'nama' => $request->nama,
                'gender' => $request->gender,
                'rombel' => $request->rombel,
                'kelas' => $request->kelas, 
            ]);
        }
        // // Perbarui data siswa
        // $siswa->update($request->all());
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('siswa.index')
            ->with('success', 'Data siswa berhasil diperbarui');
    }
    // ...
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {         $siswa = Siswa::find($id);
        //delete image
        Storage::delete('public/foto_siswa/'. $siswa->foto);
        //delete post
        $siswa->delete();
        // Redirect ke halaman index dengan pesan sukses
        ret
clear
chmod 755 barang
cd ..
cd ..
cd /storage/app/public
php artisan storage:link
php artisan make:seeder KategoriSeeder
php artisan db:seed --class=KategoriSeeder
php artisan make:seeder BarangSeeder
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=BarangSeeder
ip a
ping 8.8.8.8
init 0
php artisan storage:link
php artisan cache:clear
mariadb
php artisan rollback
php artisan migrate:rollback
php artisan migrate
mariadb
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=BarangSeeder
php artisan migrate:rollback
php artisan migrate
php artisan db:seed --class=BarangSeeder
php artisan migrate:refresh
php artisan migrate --pretend
php artisan migrate
mariadb
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=BarangSeeder
php artisan tinker
mariadb
ip a
cd /var/www/siswakoding/
php artisan migrate:rollback
php artisan migrate
init 0
ip a
init 0
ipa
ip a
init
init 0
php artisan make:controller KategoriController
ip a
init 0
mariadb
php artisan migration:refresh
php artisan migrate:refresh
mariadb
init 6
ip a
init 0
php artisan migrate
php artisan migrate:refresh
php artisan migrate:refresh
php artisan migrate:rollback
php artisan migrate
php artisan migrate:refresh
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=BarangSeeder
php artisan migrate:refresh
php artisan migrate
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=KategoriSeeder
clear
mariadb
php artisan migrate
php artisan migrate:rollback
php artisan migrate
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=KategoriSeeder
php artisan migrate:refresh
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=KategoriSeeder
php artisan migrate:rollback
php artisan db:seed --class=BarangSeeder
php artisan migrate:reset
php artisan migrate
php artisan db:seed --class=BarangSeeder
php artisan migrate:refresh
php artisan migrate:rollback
php artisan migrate:refresh
php artisan migrate
php artisan migrate:rollback
php artisan migrate
mariadb
mariadb
ip a
init 6
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=KategoriSeeder
php artisan migrate
php artisan migrate:refresh
php artisan migrate:refresh
php artisan db:seed --class=BarangSeeder
php artisan migrate:rollback
php artisan migrate
cd /var/www/siswakoding/
php artisan migrate:rollback
php artisan migrate
init 0
ip a
init 0
php artisan db:seed --class=BarangSeeder
cd /var/www/siswakoding/
php artisan db:seed --class=BarangSeeder
init 6
php artisan migrate --seed
php artisan db:seed --class=BarangSeeder
php artisan migrate
php artisan migrate:refresh
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=BarangSeeder
php artisan migrate:refresh
mariadb
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=BarangSeeder
mariadb
php artisan migrate:refresh
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=BarangSeeder
php artisan tinker
php artisan config:clear
php artisan config:clear
php artisan migrate:refresh
php artisan tinker
php artisan db:seed --class=BarangSeeder
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=BarangSeeder
composer dump-autoload
nano .env
php artisan migrate:refresh
php artisan db:seed --class=KategoriSeeder
php artisan db:seed --class=BarangSeeder
php artisan tinker
mariadb
php artisan make:migration barangmasuk_table --table barangmasuk
php artisan migrate
php artisan make:model BarangMasuk
php artisan make:controller BarangMasukController
php artisan make:migration barangkeluar_table --table barangkeluar
php artisan make:model BarangKeluar
php artisan make:controller BarangKeluarController
php artisan migrate
php artisan migrate
cd database/migrations/
ls
rm 2023_12_08_024720_barangkeluar_table.php 
cd ../..
php artisan make:migration barangkeluar_table --table barangkeluar
php artisan migrate
mariadb
init 0
ip a
init 0
ip a
init 0
ip a
nano /etc/hosts
nano /etc/hosts
init 0
ip a
nano /etc/network/interfaces
nano /etc/hosts
service networking restart 
init 6
ip a
apt install git
init 0
nano /etc/network/interfaces
init 0
nano /etc/network/interfaces
reboot
cd /var/www/siswakoding/
git init .
git config --global user.email "egiwiratamaaa@gmail.com"
git config --global user.name "eggnocent"
git remote add origin https://github.com/eggnocent/si_main.git
git config --global --add safe.directory /var/www/siswakoding
git remote add origin https://github.com/eggnocent/si_main.git
git branch -M main
git commit -m "first commit"
git add .
git commit -m "first commit"
git push -u origin main
git config --global --unset http.proxy
git push -u origin main
