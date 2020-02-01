<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FullTest extends TestCase
{
    public function test_get_Seriestv()
    {
        $response = $this->json('GET', '/api/seriestvsapi');
        $response->assertStatus(200);
        $response->assertJsonStructure(
            [
                [
                    "id",
                    "title",
                    "description",
                    "showtime",
                    "imgSeries",
                    "created_at",
                    "updated_at"
                ]
            ]
        );
    }
    
    public function test_get_user(){
            $response = $this->json('GET', '/api/usersapi');
            $response->assertStatus(200);
            $response->assertJsonStructure(
                [
                    [
                        "id",
                        "name",
                        "email",
                        "password",
                        "userimg",
                        "rule",
                        "created_at",
                        "updated_at"
                    ]
                ]
            );
        }
        public function test_episode_user(){
            $response = $this->json('GET', '/api/episodeapi');
            $response->assertStatus(200);
            $response->assertJsonStructure(
                [
                    [
                        "id",
                        "title",
                        "description",
                        "duration",
                        "airing_time",
                        "thumbnail",
                        "video_content",
                        "seriesID",
                        "created_at",
                        "updated_at"
                    ]
                ]
            );
        }
        public function test_user_can_view_login_page()
        {
            $response = $this->get('/login');
    
            $response->assertSuccessful();
            $response->assertViewIs('auth.login');
        }
        public function test_tvshows()
        {
            $response = $this->get('/tvshows');

            $response->assertStatus(200);
        }
        public function register_creates_user()
        {
            $name = $this->faker->name;
            $email = $this->faker->safeEmail;
            $password = $this->faker->password(8);

            $response = $this->post('register', [
                'name' => $name,
                'email' => $email,
                'password' => $password,
                'password_confirmation' => $password,
            ]);

            $response->assertRedirect(route('/'));

            $this->assertDatabaseHas('users', [
                'name' => $name,
                'email' => $email
            ]);
        }
}
