<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::with('mentors', 'interns', 'assignments')
            ->latest()
            ->paginate(2);

        return response()->json($groups);
    }

    public function show(Group $group)
    {
        $group->load('mentors', 'interns', 'assignments');

        return response()->json($group);
    }
}
