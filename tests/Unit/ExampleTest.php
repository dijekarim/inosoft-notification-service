<?php

test('example', function () {
    expect(true)->toBeTrue();
});

test('perform-notification', function () {
    $data = ['user_id' => 1, 'name' => 'John Doe'];
    $this->dispatch(new ProcessNotificationJob($data));
});