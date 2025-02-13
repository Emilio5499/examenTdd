<?php

use App\Models\User;

use function Pest\Laravel\get;

it('can only be accessed by admin', function () {
    //Arrange
    $user = User::factory()
        ->has(User::factory()->count(1)->state([$user_role = 'admin']));

    // Act & Assert
    get(route('pages.Admin-dashboard'))
        ->assertStatus(302);
});

it('cannot be see by user', function () {
    //Arrange
    $user = User::factory()
        ->has(User::factory()->count(1)->state([$user_role = 'user']));

    //Act & Assert
    get(route('pages.Admin-dashboard'))
        ->assertRedirect(route('pages.dashboard'));
});
