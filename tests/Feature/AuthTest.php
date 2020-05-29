<?php

    namespace Tests\Feature;

    use App\User;
    use Illuminate\Foundation\Testing\DatabaseMigrations;
    use Tests\TestCase;

    class AuthTest extends TestCase
    {

        use DatabaseMigrations;

        public function testAnoRedirectToLogin() {
            $resp = $this->get('/home');

            $resp->assertRedirect(route('login'));
        }

        public function testLogin()
        {
            $user = factory(User::class)->create([
                'password' => bcrypt($password = 'password'),
            ]);

            $response = $this->post('/login', [
                'email' => $user->email,
                'password' => $password,
            ]);

            $response->assertRedirect('/home');
            $this->assertAuthenticatedAs($user);
        }

        public function testLoggedInSeeHome()
        {
            $user = factory(User::class)->create();

            $this->actingAs($user)
                ->withSession(['foo' => 'bar'])
                ->get('/home')
                //this text is on the home.blade.php page
                ->assertSee('You are logged in!');
        }
    }
