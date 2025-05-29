<?php

use App\Models\Complaint;
use App\Models\ProblemType;

it('has many complains', function () {
    $problemType = ProblemType::factory()->create();
    Complaint::factory()->count(3)->create(['problem_type_id' => $problemType->id]);
    expect($problemType->complaints()->count())->toBe(3);
});
