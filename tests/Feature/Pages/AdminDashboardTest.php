<?php

use App\Models\User;

it('can only be accessed by admin', function () {
    //Arrange
    $user = User::factory()
        ->has(User::factory()->role('admin'));

    // Act & Assert
    get(route('pages.Admin-dashboard'))
        ->assertStatus(302);
});

it('cannot be see by user', function () {
    //Arrange
    $user = User::factory()
        ->has(User::factory()->role('user'));

    //Act & Assert
    get(route('pages.Admin-dashboard'))
        ->assertDontSeeText();
});
