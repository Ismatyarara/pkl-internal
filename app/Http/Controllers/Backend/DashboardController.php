<?php
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount  = User::count();
        $guruCount  = User::whereIn('isAdmin', [2, 3, 4])->count();
        $siswaCount = User::where('isAdmin', 0)->count();

        return view('backend.dashboard.index', compact('userCount', 'guruCount', 'siswaCount'));
    }
}
