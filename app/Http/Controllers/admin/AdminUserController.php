<?php

namespace App\Http\Controllers\admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $role = $request->input('role');
        $sort = $request->input('sort');
        $perPage = $request->input('per_page', 10);

        $query = User::query();

        if ($search) {
            $query->where(function($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        }

        if ($role) {
            $query->where('is_admin', $role === 'admin');
        }

        if ($sort) {
            $query->orderBy('name', $sort);
        }

        $users = $query->paginate($perPage);

        return view('admin.pages.user.index', [
            'users' => $users,
            'search' => $search,
            'role' => $role,
            'sort' => $sort,
            'per_page' => $perPage,
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


}
