<?php

namespace FjordTest\Translation;

use Fjord\Translation\Controllers\SetLocaleController;
use FjordTest\BackendTestCase;
use FjordTest\Traits\CreateFjordUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery as m;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SetLocaleControllerTest extends BackendTestCase
{
    use CreateFjordUsers;

    /** @test */
    public function test_invoke_method()
    {
        app('config')->set('translation.locales', ['en']);

        $user = m::mock('user');
        $guard = m::mock('guard');
        $guard->shouldReceive('user')->andReturn($user);
        $auth = Auth::partialMock();
        $auth->shouldReceive('guard')->withArgs(['fjord'])->andReturn($guard);

        $request = m::mock(Request::class);
        $request->shouldReceive('all')->andReturn(['locale' => 'en']);

        $user->shouldReceive('update')->withArgs([['locale' => 'en']]);

        (new SetLocaleController)($request);
    }

    /** @test */
    public function test_invoke_method_fails_when_local_does_not_exist()
    {
        app('config')->set('translation.locales', ['en']);

        $request = m::mock(Request::class);
        $request->shouldReceive('all')->andReturn(['locale' => 'other']);

        $this->expectException(NotFoundHttpException::class);

        (new SetLocaleController)($request);
    }

    /** @test */
    public function test_route()
    {
        app('config')->set('translation.locales', ['en']);

        $this->actingAs($this->admin, 'fjord');
        $this->assertEquals(null, $this->admin->locale);
        $response = $this->post(fjord()->url('set-locale'), ['locale' => 'en']);
        $response->assertStatus(200);
        $this->assertEquals('en', $this->admin->refresh()->locale);
    }
}
