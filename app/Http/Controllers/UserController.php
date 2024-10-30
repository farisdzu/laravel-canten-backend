<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil data users dari database dengan query
        $users = User::query()
            // Jika ada input 'name' di request, tambahkan kondisi pencarian berdasarkan nama
            ->when($request->input('name'), function($query, $name) {
                return $query->where('name', 'like', "%$name%");
            })
            // Mengurutkan data berdasarkan id secara descending
            ->orderBy('id', 'desc')
            // Membatasi hasil menjadi 10 data per halaman
            ->paginate(10);

        // Menampilkan view 'pages.users.index' dengan data users
        return view('pages.users.index', compact('users'));

    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request->all());
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',

        ]);
        $data =([
            'name'=> $request->name,
            'email'=> $request->email,
            'password'=>Hash::make($request->password),
            'role'=> $request->role,
           'phone'=> $request->phone,
        ]);

        User::create($data);

        return redirect()->route('user.index')->with('success', 'User created successfully');

        // Lanjutkan proses penyimpanan data jika validasi berhasil
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return  view('pages.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'role' => 'required',

        ]);
        $data =([
            'name'=> $request->name,
            'email'=> $request->email,
            'role'=> $request->role,
           'phone'=> $request->phone,
        ]);
        if ($request->password){
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);


        return redirect()->route('user.index')->with('success', 'User edit successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
       $user->delete();

       return redirect()->route('user.index')->with('success', 'User deleted successfully');
    }
}
