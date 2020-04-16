<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\User\RegistService;

class RegistController extends Controller
{
    private $request;
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function main()
    {
        return view('user.regist_form');
    }

    public function doRegist()
    {
        try {
            $service = new RegistService();

            $params = [
                'account' => $this->request->input('account'),
                'password' => $this->request->input('password')
            ];

            $user = $service->doRegist($params);

            $output = [
                'result' => 'success',
                'message' => '帳號建立完成'
            ];
        } catch (Exception $exception) {
            $error_message = $exception->getMessage();
            $output = [
                'result' => 'success',
                'message' => $error_message
            ];
        }

        return response()->json($output);
    }
}
