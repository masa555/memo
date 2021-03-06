<?php
namespace App\Test\TestCase\Controller;

use App\Controller\ArticlesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\ArticlesController Test Case
 */
class ArticlesControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.users',
        'app.articles',
        'app.tags',
        'app.articles_tags'
    ];

    /**
     * Test isAuthorized method
     *
     * @return void
     */
    public function test記事一覧を表示()
    {
        $this->get('/artilces');
        $this->assertResponseOk();
        $this->assertResponseContains('CakePHP3 チュートリアル');
        $this->assertResponseContains('Happy new year');
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function test記事詳細ページが存在しない()
    {
       $this->get('/articles/view/not-found-articles');
       
       $this->assertResponseCode(404);
    }

    /**
     * Test index method
     *
     * @return void
     */
    public function test記事が追加されると記事一覧にリダイレクトする()
    {
        $this->session(['Auth.User.id'=>1]);
        $this->post('/articles/add', [
            'title' => 'Nintendo Switch を購入！',
            'body' => 'クリスマスプレゼントとして買った',
            'tag_string' => 'game,2017',
        ]);
        $this->assertSession('Your article has been saved.', 'Flash.flash.0.message');
        $this->assertRedirect('/articles');
        
        $this->get('/articles');
        $this->assertResponseContains('Nintendo Switch を購入！');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testバリデーションエラーだと追加できずエラーメッセージが表示される()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->post('/articles/add', [
            'title' => 'Nintendo Switch を購入！',
            'body' => '',
            'tag_string' => '',
        ]);
        $this->assertResponseOk();
        $this->assertResponseContains('Unable to add your article.');
        
        $this->get('/articles');
        $this->assertResponseNotContains('Nintendo Switch を購入！');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function test記事編集ページにアクセスできる()
    {
         $this->session(['Auth.User.id' => 1]);
         $this->get('/articles/edit/CakePHP3-chutoriaru');

        $this->assertResponseContains('記事の編集');
        $this->assertResponseContains('CakePHP3 チュートリアル');
    }

    /**
     * Test edit method
     *
     * @return void
     */
     public function test記事を更新し記事一覧にリダイレクトする()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->post('/articles/edit/CakePHP3-chutoriaru', [
            // タイトルを変更する
            'title' => '1時間で分かるCakePHP3 チュートリアル',
            'body' => 'このチュートリアルは簡単な CMS アプリケーションを作ります。 はじめに CakePHP のインストールを行い、データベースの作成、 そしてアプリケーションを素早く仕上げるための CakePHP が提供するツールを使います。',
            'tag_string' => 'PHP,CakePHP',
        ]);
        $this->assertRedirect('/articles');
        $this->assertSession('Your article has been updated.', 'Flash.flash.0.message');

        $this->get('/articles');
        $this->assertResponseContains('1時間で分かるCakePHP3 チュートリアル');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testバリデーションエラーだと更新できずエラーメッセージが表示される()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->post('/articles/edit/CakePHP3-chutoriaru', [
            // タイトルを変更する
            'title' => '1時間で分かるCakePHP3 チュートリアル',
            'body' => '',
        ]);
        $this->assertResponseOk();
        $this->assertResponseContains('Unable to update your article.');

        $this->get('/articles');
        $this->assertResponseNotContains('1時間で分かるCakePHP3 チュートリアル');
    }

    /**
     * Test tags method
     *
     * @return void
     */
    public function test記事を削除してその後記事一覧にリダイレクトする()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->post('/articles/delete/CakePHP3-chutoriaru');

        $this->assertRedirect('/articles');

        $this->get('/articles');
        $this->assertResponseNotContains('CakePHP3 チュートリアル');
    }
    public function testGetリクエストの場合削除しない()
    {
        $this->session(['Auth.User.id' => 1]);
        $this->get('/articles/delete/CakePHP3-chutoriaru');

        $this->assertResponseCode(405);
        $this->get('/articles');
        $this->assertResponseContains('CakePHP3 チュートリアル');
    }
     public function test複数タグを指定してアクセス()
    {
        $this->get('/articles/tagged/php/cakephp');

        $this->assertResponseOk();
        $this->assertResponseRegExp('/Articles tagged with\s+php or cakephp/m');
        $this->assertResponseContains('CakePHP3 チュートリアル');
    }
    public function test存在しないタグを指定してアクセス()
    {
        $this->get('/articles/tagged/undefined-tag');

        $this->assertResponseOk();
        $this->assertResponseRegExp('/Articles tagged with\s+undefined-tag/m');
        $this->assertResponseContains('記事が見つかりませんでした。');
    }

}
