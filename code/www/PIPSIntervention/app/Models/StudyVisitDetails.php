<?php

namespace App\Models;

class StudyVisitDetails
{
    protected $table = 'study_visit_details';

    protected $fillable = [
        'study_id',
        'visit_display_name',
        'visit_event_name',
        'offset',
        'range',
        'comment',
        'last_login_at',
        'last_login_ip',
    ];
}
