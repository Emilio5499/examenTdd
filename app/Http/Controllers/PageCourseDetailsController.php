<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PageCourseDetailsController extends Controller
{
    public function __invoke(Course $course)
    {
        if (! $course->released_at) {
            throw new NotFoundHttpException;
        }

        $course->loadCount('videos')->toSql();

        return view('pages.course-details', compact('course'));
    }

}
