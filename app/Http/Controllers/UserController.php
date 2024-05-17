<?php

namespace App\Http\Controllers;

use App\Models\Polda;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data['page_name'] = 'User Management';
    $data['roles'] = Role::all();
    $data['poldas'] = Polda::all();
    return view('pages.user.index', $data);
  }

  public function list(Request $request)
  {
    $url = url('/');
    $query = User::with('Roles');
    return DataTables::of($query)
      ->addIndexColumn()
      ->addColumn('action', function ($data) {
        $id = $data->id;
        $html = "<div class='d-flex align-items-center gap-2'>";
        $html .= "<button class='btn btn-primary btn-sm' data-id='$id' data-full='$data' onclick='editUser($id)' title='Edit User'><i class='fa fa-edit'></i></button>";
        if ($data->username == 'administrator') {
          $html .= "<button class='btn btn-danger btn-sm' title='Hapus User' disabled><i class='fa fa-trash'></i></button>";
        } else {
          $html .= "<button class='btn btn-danger btn-sm' data-id='$id' onclick='deleteUser($id)' title='Hapus User'><i class='fa fa-trash'></i></button>";
        }
        $html .= "</div>";
        return $html;
      })
      ->addColumn('role', function ($data) {
        return $data->getRoleNames()[0];
      })
      ->rawColumns(['action'])
      ->make(true);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $data['page_name'] = 'Tambah User';
    $data['poldas'] = Polda::all();
    $data['roles'] = Role::all();

    return view('pages.user.create', $data);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {
    $division = '';
    if ($request->mabesRole != '') {
      $division = $request->mabesRole;
    } else if ($request->poldaRole != '') {
      $division = $request->poldaRole;
    }

    DB::beginTransaction();
    try {
      $user = User::create([
        'name' => $request->name,
        'username' => $request->username,
        'polda' => $request->poldaWilayah,
        'division' => $division,
        'password' => bcrypt(env('DEFAULT_USER_PASSWORD')),
      ]);

      $user->save();
      // $role = Role::find($request->role);
      // $user->assignRole($role->name);

      $user->assignRole($request->mainRole);
      DB::commit();
      if ($user) {
        $data = [
          'user' => $user,
        ];
        return $this->response_json(200, 'Berhasil Membuat User Baru', $data);
      }

      return $this->response_json(500, 'Gagal Membuat User', null);
    } catch (\Throwable $th) {
      DB::rollBack();
      return $this->response_json(401, $th->getMessage(), null);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(string $id)
  {
    $data['page_name'] = 'Kelola User';
    $data['user'] = User::where('id', $id)->with('Roles')->first();
    $data['poldas'] = Polda::all();
    $data['roles'] = Role::all();

    return view('pages.user.edit', $data);
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(Request $request)
  {
    $division = '';
    $poldaWilayah = '';
    if ($request->mabesRole != '') {
      $division = $request->mabesRole;
    } else if ($request->poldaRole != '') {
      $division = $request->poldaRole;
      $poldaWilayah = $request->poldaWilayah;
    }
    DB::beginTransaction();
    try {
      $user = User::where('id', $request->id)->update(['username' => $request->username, 'name' => $request->name, 'polda' => $poldaWilayah, 'division' => $division]);
      $user = User::where('id', $request->id)->with('Roles')->first();
      $user->syncRoles($request->mainRole);
      // $user->assignRole($request->mainRole);
      // if ($request->username != $user->username){
      //   $user->username = $request->username;
      // };
      // if ($request->name != $user->name){
      //   $user->name = $request->name;
      // };
      $user->save();
      DB::commit();
      if ($user) {
        $data = [
          'user' => $user,
        ];
        return $this->response_json(200, 'Berhasil Mengelola User Baru', $data);
      }

      return $this->response_json(500, 'Gagal Mengelola User', null);
    } catch (\Throwable $th) {
      DB::rollBack();
      return $this->response_json(401, $th->getMessage(), null);
    }
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, string $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(string $id)
  {
    $delete = User::find($id)->delete();

    if ($delete) {
      return $this->response_json(200, 'Berhasil Menghapus User', $delete);
    }

    return $this->response_json(500, 'Gagal Menghapus User', null);
  }

  public function reset(string $id)
  {
    $user = User::find($id);

    $user->update([
      'password' => bcrypt(env('PASSWORD_DEFAULT', 123456)),
    ]);

    if ($user) {
      return $this->response_json(200, 'Berhasil Mereset User', $user);
    } else {
      return $this->response_json(500, 'Gagal Mereset User', null);
    }
  }
}
