<?php

namespace App\Models\Observers;

use App\Models\Course;

class CourseObserver
{

    public function deleting(Course $course)
    {
        $course->comments()->delete();
    }
}
