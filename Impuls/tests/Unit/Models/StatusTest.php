<?php

use App\Models\Complaint;
use App\Models\Status;

it('has many complaint', function () {
    $status = Status::factory()->create();
    Complaint::factory(6)->create(['status_id' => $status->id]);
    expect($status->complaints && $status->complaints()->count() === 6)->toBeTrue();
});
