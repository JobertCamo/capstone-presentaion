<?php

use App\Models\Applicant;
use App\Models\Interview;

it('belongs to an applicant', function () {
    $applicant = Applicant::factory()->create();
    $interview = Interview::factory()->create([
        'applicant_id' => $applicant->id,
    ]);

    expect($interview->applicant->is($applicant))->toBeTrue();
});