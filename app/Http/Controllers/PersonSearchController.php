<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonSearchController extends Controller
{
    public function search(Request $request)
    {
        $terms = $request->input('terms');

        $query = Person::select('surname', 'first_name')
            ->where('first_name', 'like', $terms.'%')
            ->orWhere('surname', 'like', $terms.'%')
            ->orderBy('surname')
            ->orderBy('first_name');

        if ($request->input('dupes') !== 'true') {
            $query->distinct();
        }

        return $query->get();
    }
}
