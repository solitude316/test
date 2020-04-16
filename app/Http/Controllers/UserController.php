<?php

namespace App\Http\Controllers;
use App\Services\User\AuthService;
use Illuminate\Http\Request;
use Exception, Log;
use App\Models\Users;

class UserController extends Controller
{
    private $request;

    private $login_key = 'user';

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function main()
    {
        if ($this->request->session()->exists($this->login_key)) {
            return redirect('/');
        }

        return view('user.login_form');
    }

    public function logout()
    {
        $this->request->session()->forget($this->login_key);
        return redirect('/login');
    }

    public function doLogin()
    {
        try {
            $account = $this->request->account;
            $password = $this->request->password;

            $service = new AuthService();
            $user = $service->doLogin($account, $password);

            if (! $user instanceof Users) {
                throw new Exception('登入失敗');
            }

            session([$this->login_key => $user->account]);

            $output = [
                'result' => 'success',
                'message' => '登入成功'
            ];
        } catch (Exception $exception) {
            Log::error($exception);

            $output = [
                'result' => 'faild',
                'message' => $exception->getMessage()
            ];
        }

        return response()->json($output);
    }
}
