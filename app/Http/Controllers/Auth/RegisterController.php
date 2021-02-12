<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Siswa;
use App\Guru;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\WaliMurid;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:7', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
        ]);
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {

        switch ($request->role) {
            case 'siswa':

                /**
                 * Jika user akan mendaftar sebagai siswa
                 * data nis_nip akan divalidasi dengan menggunakan
                 * method $this->validatorDaftarUntukSiswa($request);
                 */
                $this->validatorDaftarUntukSiswa($request);

                /**
                 * Validasi untuk name
                 * email
                 * password
                 * dan password_confirmation
                 */
                $this->validator($request->all())->validate();

                /**
                 * Mengambil data siswa
                 * dengan nis dari hasil request nis_nip
                 */
                $dataSiswa = Siswa::where('nis', $request->nis_kode_guru)->first();

                /**
                 * Event Registrasi
                 * Ketika user berhasil dibuat akan mengirimkan notifikas
                 */
                event(new Registered( $user = $this->createSiswa($dataSiswa, $request)));

                /**
                 * Login sementara menggunakan user yang telah dibuat
                 *
                 * NB : kita telah mengatur supaya user verifikasi dulu
                 * sebelum bisa masuk ke halaman dashboard
                 */
                $this->guard()->login($user);
                /**
                 * redirect ke dashboard
                 *
                 */
                return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
                break;

            case 'guru':
                $this->validatorDaftarUntukGuru($request);
                $this->validator($request->all())->validate();
                $dataGuru = Guru::where('kode_guru', $request->nis_kode_guru)->first();

                event(new Registered( $user = $this->createGuru($dataGuru, $request)));
                $this->guard()->login($user);

                return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
                break;

            case 'wali_murid':
                $this->validatorDaftarUntukWaliMurid($request);
                $this->validator($request->all())->validate();

                /**
                 * Mengambil data siswa
                 * NB: hanya wali murid yang memiliki anak (yang diwaliin)
                 *
                 */
                $dataSiswa = Siswa::where('nis', $request->nis_kode_guru)->first();

                /**
                 * Event Registrasi
                 */
                event(new Registered( $user = $this->createWaliMurid($dataSiswa, $request)));
                $this->guard()->login($user);

                return $this->registered($request, $user)
                            ?: redirect($this->redirectPath());
                break;

            default:
                return redirect()->back()->withErrors(['role' => 'Hak Akses Tidak Ditemukan']);
                break;
        }
    }

    protected function createSiswa($dataSiswa, $request)
    {
        /**
         * Membuat data siswa
         * dengan name = dari data siswa yang ada di database
         * email = dari request
         * password dari request
         */
        $user = User::create([
            'data_id' => $dataSiswa->id,
            'role' => 'siswa',
            'name' => "$dataSiswa->nama_depan $dataSiswa->nama_belakang",
            'username' => $request->username,
            'password' => Hash::make('RUHPEKA'),
        ]);

        /**
         * akan menambahkan role / hak akses
         * sesuai request
         */
        return $user;
    }

    protected function createGuru($dataGuru, $request)
    {
        $user = User::create([
            'data_id' => $dataGuru->id,
            'role' => 'guru',
            'name' => "$dataGuru->nama_depan $dataGuru->nama_belakang",
            'username' => $request->username,
            'password' => Hash::make('RUHPEKA'),
        ]);

        return $user;
    }

    protected function createWaliMurid($dataSiswa, $request)
    {
        /**
         * Membuat data wali murid
         * dari hasil request yang dikirim
         */
        $waliMurid = WaliMurid::create([
            'nama_depan'=> $request->name,
            'email' => $request->email,
        ]);

        /**
         * Membuat user untuk wali murid
         */
        $userWaliMurid = User::create([
            'data_id' => $waliMurid->id,
            'role' => 'wali_murid',
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make('RUHPEKA'),
        ]);


        /**
         * Dari data siswa yang diperoleh
         * kita hubungkan dengan data wali murid
         *
         * menghubungkan data siswa ke wali murid tanpa menghapus
         * data sebelumnya
         * fungsi dari many to many
         */
        $dataSiswa->waliMurid()->syncWithoutDetaching($waliMurid->id);

        /**
         * dikembalikan ke data user
         */
        return $userWaliMurid;
    }

    protected function validatorDaftarUntukSiswa($request)
    {
        return $request->validate([
            'nis_kode_guru' => 'required|exists:siswa,nis'
        ]);
    }

    protected function validatorDaftarUntukGuru($request)
    {
        return $request->validate([
            'nis_kode_guru' => 'required|exists:guru,kode_guru'
        ]);
    }

    protected function validatorDaftarUntukWaliMurid($request)
    {
        return $request->validate([
            'nis_kode_guru' => 'required|exists:siswa,nis'
        ]);
    }
}
