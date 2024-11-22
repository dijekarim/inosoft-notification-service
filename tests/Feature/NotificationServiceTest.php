<?php

it('has notificationservice endpoint', function () {
    $response = $this->get('/api/send-notification');

    $response->assertStatus(404);
});
