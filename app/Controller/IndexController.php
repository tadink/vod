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

use App\Model\Vod;
use App\Service\VodService;
use App\Service\VodTypeService;
use Hyperf\Context\ApplicationContext;
use Hyperf\Context\ResponseContext;
use Hyperf\Contract\SessionInterface;
use Hyperf\HttpMessage\Exception\NotFoundHttpException;
use Hyperf\HttpMessage\Stream\SwooleStream;
use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\Session\SessionProxy;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;
use Hyperf\ViewEngine\Contract\ViewInterface;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface as MessageResponseInterface;

use function Hyperf\Config\config;
use function Hyperf\ViewEngine\view;

class IndexController
{
    private SessionProxy $session;

    

    public function __construct(SessionInterface $session, ContainerInterface $container)
    {
        $this->session = $session;
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
        $validator = ApplicationContext::getContainer()->get(ValidatorFactoryInterface::class)->make(
            ['email' => $email, 'password' => $password],
            ['email' => 'required|email|alpha', 'password' => 'required|alpha'],
            ['email.required' => '请输入邮箱地址', 'email.alpha' => '邮箱不能包含特殊字符']
        );
        if ($validator->fails()) {
            $this->session->flash('errors', $validator->errors());
            $this->session->flash('old', ['email' => $email]);
            return response()->redirect('/login');
        }

        return response()->redirect('/login');
    }

    public function register(RequestInterface $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $comfirmPassword = $request->input('comfirm_password');
        $validator = ApplicationContext::getContainer()->get(ValidatorFactoryInterface::class)->make(
            ['email' => $email, 'password' => $password],
            ['email' => 'required|email', 'password' => 'required', 'comfirm_password' => 'required|same:password']
        );
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }
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
