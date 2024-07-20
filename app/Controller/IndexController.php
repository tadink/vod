<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\Controller;

use Hyperf\Context\ResponseContext;
use Hyperf\Contract\SessionInterface;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Session\SessionProxy;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Hyperf\ViewEngine\Contract\ViewInterface;
use Psr\Http\Message\ResponseInterface as MessageResponseInterface;
use function Hyperf\ViewEngine\view;

class IndexController
{
    /**
     * @var SessionProxy $session
     */
    private SessionInterface $session;

    private ValidatorFactoryInterface $validatorFactory;

    public function __construct(SessionInterface $session, ValidatorFactoryInterface $validatorFactory)
    {
        $this->session = $session;
        $this->validatorFactory = $validatorFactory;
    }

    public function loginView(): ViewInterface
    {
        $errors = $this->session->get('errors');
        $old = $this->session->get('old');
        return view('login', ['errors' => $errors, 'old' => $old]);
    }

    public function login(RequestInterface $request): MessageResponseInterface
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $validator = $this->validatorFactory->make(
            ['email' => $email, 'password' => $password],
            ['email' => 'required|email|alpha', 'password' => 'required'],
            ['email.required' => '请输入邮箱地址', 'email.email' => '邮箱格式不正确', 'email.alpha' => '邮箱不能包含特殊字符']
        );
        if ($validator->fails()) {
            $this->session->flash('errors', $validator->errors());
            $this->session->flash('old', ['email' => $email]);
            return response()->redirect('/login');
        }
        $redirectUrl = $this->session->previousUrl() ?? "/";
        return response()->redirect($redirectUrl);
    }

    public function register(RequestInterface $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $comfirmPassword = $request->input('comfirm_password');
        $validator = $this->validatorFactory->make(
            ['email' => $email, 'password' => $password, 'comfirm_password' => $comfirmPassword],
            [
                'email' => 'required|email',
                'password' => 'required',
                'comfirm_password' => 'required|same:password',
            ],
            [
                'email.required' => '请输入邮箱地址',
                'email.email' => '邮箱格式不正确',
                'password.required' => '请输入密码',
                'comfirm_password.required' => '请确认密码',
                'comfirm_password.same:password' => '两次密码不一致'
            ]
        );
        if ($validator->fails()) {
            $this->session->flash('errors', $validator->errors());
            $this->session->flash('old', ['email' => $email]);
            return response()->redirect('/register');
        }

        $redirectUrl = $this->session->previousUrl() ?? "/";
        return response()->redirect($redirectUrl);
    }

    public function captcha(RequestInterface $request): MessageResponseInterface
    {
        $image = imagecreatetruecolor(50, 150);
        $color = imagecolorallocate($image, 20, 43, 22);
        imagefill($image, 0, 0, $color);
        imagechar($image, 15, 10, 10, 'MB', imagecolorallocate($image, 255, 255, 255));
        ob_start();
        imagepng($image, null, 9);
        $buffer = ob_get_clean();
        return ResponseContext::get()->withHeader('Content-Type', 'image/png')->withBody(new SwooleStream($buffer));
    }
}
