<?php

namespace App\Http\Controllers\Admin;

use App\Filters\UserFilter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\ApiResponser;
use App\Http\Requests\User\AdminUserCreateRequest;
use App\Http\Requests\User\UserUpdateRequest;
use App\Mail\AdminCreateUser;
use App\Models\Role;
use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Services\User\UserGetter;
use App\Services\User\UserUpdater;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{

    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $users = $this->userRepository->all();
        $roles = Role::all();
        return view('admin.pages.user.index', compact('users', 'request', 'roles'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.pages.user.create', compact('roles'));
    }


    public function store(AdminUserCreateRequest $request)
    {
        $data = $request->all();
        try {
            $data['token'] = str_pad(rand(1, 9999), 4, '0', STR_PAD_LEFT);
            $role = Role::where('name', $data['role'])->first();
            $data['password'] = 'Nepal@123';
            $data['reference'] = $data['password'];
            $data['password'] = bcrypt($data['password']);
            $user = $this->userRepository->store($data);
            if ($user === false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $user->roles()->attach($role);
            session()->flash('success', 'Account has been created successfully.');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function edit($id)
    {
        $user = $this->userRepository->findOrFail($id);
        $roles = Role::all();
        return view('admin.pages.user.edit', compact('user', 'roles'));
    }

    public function show(UserGetter $userGetter, $id)
    {
        return $userGetter->show($id);
    }

    public function destroy(UserUpdater $userUpdater, $id)
    {
        return $userUpdater->delete($id);
    }

    public function update(UserUpdateRequest $userUpdateRequest, $id)
    {
        $data = $userUpdateRequest->all();
        try {
            $role = Role::where('name', $data['role'])->first();
            $user = $this->userRepository->update($id, $data);
            $users = $this->userRepository->findOrFail($id);
            if ($user == false) {
                session()->flash('danger', 'Oops! Something went wrong.');
                return redirect()->back()->withInput();
            }
            $users->roles()->sync([$role->id]);
            session()->flash('success', 'Account has been updated successfully.');
            return redirect()->route('user.index');
        } catch (Exception $e) {
            session()->flash('danger', 'Oops! Something went wrong.');
            return redirect()->back()->withInput();
        }
    }

    public function passwordChangeIndex()
    {
        return view('admin.pages.user.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:8',
        ]);

        $user = Auth()->user();
        if (!Hash::check($request->input('current_password'), $user->password)) {
            session()->flash('error', 'Current password is incorrect.');
            return redirect()->back()->withInput();
        }
        $data['password'] = Hash::make($request->input('new_password'));
        $user = $this->userRepository->update($user->id, $data);
        session()->flash('success', 'Password has been successfully changed.');
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
