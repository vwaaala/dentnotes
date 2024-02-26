<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Visitor\Traits\Visitor;
use App\Models\User;
use Shetabit\Visitor\Models\Visit;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();

        $userVisitorCounts = [];
        $visitorCount = 0;
        $allVisitorCounts = Visit::count();

        foreach ($users as $user) {
            $visitorCount += $user->visitLogs()->count();
            $userVisitorCounts[$user->id] = array('name'=>$user->name,'count'=>$visitorCount);
        }
        $todayVisit = Visit::whereDate('created_at', today())
                            ->whereNull('visitable_id')->count();
        $lastSevenDaysVisit = Visit::where('created_at', '>=', now()->subDays(7))
                                ->where('created_at', '<=', now())
                                ->whereNull('visitable_id')
                                ->count();
        $lastThirtyDaysVisit = Visit::where('created_at', '>=', now()->subDays(30))
                                ->where('created_at', '<=', now())
                                ->whereNull('visitable_id')
                                ->count();
        $todayVisitLogged = Visit::whereDate('created_at', today())
                            ->whereNotNull('visitable_id')->count();
        $lastSevenDaysVisitLogged = Visit::where('created_at', '>=', now()->subDays(7))
                                ->where('created_at', '<=', now())
                                ->whereNotNull('visitable_id')
                                ->count();
        $lastThirtyDaysVisitLogged = Visit::where('created_at', '>=', now()->subDays(30))
                                ->where('created_at', '<=', now())
                                ->whereNotNull('visitable_id')
                                ->count();
        $allVisitorCounts = $allVisitorCounts - $visitorCount;
        return view('dashboard', ['userVisitorCounts' => $visitorCount, 'allVisitorCounts' => $allVisitorCounts, 'todayVisit' => $todayVisit, 'lastSevenDaysVisit' => $lastSevenDaysVisit, 'lastThirtyDaysVisit' => $lastThirtyDaysVisit, 'todayVisitLogged' => $todayVisitLogged, 'lastSevenDaysVisitLogged' => $lastSevenDaysVisitLogged, 'lastThirtyDaysVisitLogged' => $lastThirtyDaysVisitLogged]);
    }
    public function getguestvisitbydate(Request $request): \Illuminate\Http\JsonResponse
    {
        if($request->ajax()){
            $todayVisit = Visit::whereDate('created_at', date('Y-m-d', strtotime($request->sdate)))
                            ->whereNull('visitable_id')->count();
            return response()->json(['status'=> "success", 'data'=> $todayVisit]);
        }
        return response()->json(['status'=> "error", 'message'=> 'Error']);
    }
    public function getuservisitbydate(Request $request): \Illuminate\Http\JsonResponse
    {
        if($request->ajax()){
            $todayVisit = Visit::whereDate('created_at', date('Y-m-d', strtotime($request->sdate)))
                            ->whereNotNull('visitable_id')->count();
            return response()->json(['status'=> "success", 'data'=> $todayVisit]);
        }
        return response()->json(['status'=> "error", 'message'=> 'Error']);
    }
}
