<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use App\Models\ProjectOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders_count = Order::count();

        $projects_big_mega = Project::where('tipe_project', 'big_mega')->get();
        $project_orders_big_mega = ProjectOrder::whereIn('project_id', $projects_big_mega->pluck('id'))->get();
        $orders_big_mega = Order::whereIn('nomor_order', $project_orders_big_mega->pluck('number_order'))->get();

        $projects_regular = Project::where('tipe_project', 'regular')->get();
        $project_orders_regular = ProjectOrder::whereIn('project_id', $projects_regular->pluck('id'))->get();
        $orders_regular = Order::whereIn('nomor_order', $project_orders_regular->pluck('number_order'))->get();

        return view('pages.index', compact(['orders_count', 'projects_big_mega', 'projects_regular', 'orders_big_mega', 'orders_regular', 'project_orders_big_mega', 'project_orders_regular']));
    }
}
