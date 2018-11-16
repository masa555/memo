<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;
/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.articles',
    ];

    /**
     * ログインページが表示される
     *
     * @return void
     */
    public function testLogin()
    {
        $this->get('/users/login');
        $this->assertResponseOk();
        $this->assertResponseContains('ログイン');
    }

    /**
     * ログイン失敗
     *
     * @return void
     */
    public function testLoginFailed()
    {
        $this->post('/users/login', [
            'email' => 'tyutyumasato@gmail.com',
            'password' => 'test',
        ]);
        $this->assertResponseOk();
        $this->assertResponseContains('ユーザー名またはパスワードが不正です。');
    }

    /**
     * ログイン成功
     *
     * @return void
     */
    public function testLoginSucceed()
    {
        $this->post('/users/login?redirect=%2Farticles%2Fadd', [
            'email' => 'tyutyumasato@gmail.com',
            'password' => 'test',
        ]);
        $this->assertRedirect('/articles/add');
        $this->assertSession(2, 'Auth.User.id');
    }

    /**
     * ログアウト
     *
     * @return void
     */
      public function testLogout()
    {
        $this->session(['Auth.User.id' => 2]);
        $this->get('/users/logout');
        $this->assertSession([], 'Auth');
        $this->assertRedirect('/users/login');
    }
}
