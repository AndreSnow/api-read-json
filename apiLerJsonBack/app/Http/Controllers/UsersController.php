<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    private $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function create(AuthRequest $request)
    {
        try {
            $data = $request->input();
            $data['password'] = bcrypt($data['password']);

            $user = $this->user->create($data);

            return response()
                ->json(['msg' => 'Usuário cadastrado!'], 201);

        } catch (\Throwable $th) {
            return response()
                ->json(['msg' => [$th->getMessage()]], 500);
        }
    }

    public function update(AuthRequest $request, $id)
    {
        try {
            $user = $this->user->find($id);
            $user->update($request->all());

            return response()
                ->json(['msg' => 'Cadastro atualizado!'], 200);
        } catch (\Throwable $th) {
            return response()
                ->json(['msg' => [$th->getMessage()]], 500);
        }
    }

    public function delete($id)
    {
        try {
            $user = $this->user->find($id);
            $user->delete();

            return response()
                ->json(['msg' => 'Cadastro removido!'], 200);
        } catch (\Throwable $th) {
            return response()
                ->json(['msg' => [$th->getMessage()]], 500);
        }
    }

    public function login(Request $request)
    {
        try {

            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $user = Auth::user();
                $user->token = $user->createToken($user->email)->accessToken;
                return response()->json($user, 200);
            }
            return response()
                ->json(['errors' => 'Credenciais inválidas'], 401);
        } catch (\Throwable $th) {
            return response()
                ->json(['msg' => [$th->getMessage()]], 500);
        }
    }

    public function getAll()
    {
        try {
            $user = $this->user->get();
            return response()->json($user, 200);
        } catch (\Throwable $th) {
            return response()
                ->json(['msg' => [$th->getMessage()]], 500);
        }
    }

    public function getById($id)
    {
        try {
            $user = $this->user->where('id', $id)->get();
            return response()->json($user, 200);
        } catch (\Throwable $th) {
            return response()
                ->json(['msg' => [$th->getMessage()]], 500);
        }
    }

    public function logout(Request $request)
    {
        try {
            if (Auth::check())
                Auth::user()->token()->revoke();
            return response()
                ->json(['msg' => 'Logout realizado com sucesso!'], 200);
        } catch (\Throwable $th) {
            return response()
                ->json(['msg' => [$th->getMessage()]], 500);
        }
    }
}
