<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use App\Models\ProjectOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $orders_count = Order::count();
        $projects = Project::all();

        $projects_big_mega = Project::where('tipe_project', 'big_mega')->get();
        $project_orders_big_mega = ProjectOrder::whereIn('project_id', $projects_big_mega->pluck('id'))->get();
        $orders_big_mega = Order::whereIn('nomor_order', $project_orders_big_mega->pluck('number_order'))->get();

        $projects_regular = Project::where('tipe_project', 'regular')->get();
        $project_orders_regular = ProjectOrder::whereIn('project_id', $projects_regular->pluck('id'))->get();
        $orders_regular = Order::whereIn('nomor_order', $project_orders_regular->pluck('number_order'))->get();

        // $data = DB::table('orders')
        //     ->select('bud', DB::raw('COUNT(bud) as jumlah'))
        //     ->where('bud', 'DPS')
        //     ->groupBy('bud')
        //     ->get();

        $order_dps = Order::where('bud', 'DPS')->count();
        $order_dss = Order::where('bud', 'DSS')->count();
        $order_dgs = Order::where('bud', 'DGS')->count();
        $order_reg = Order::where('bud', 'REG')->count();



        $projects_delay = Project::where('status_project', 'delay')->get();
        $projects_lag = Project::where('status_project', 'lag')->get();
        $projects_lead = Project::where('status_project', 'lead')->get();
        $projects_closed = Project::where('status_project', 'closed')->get();

        // dd($projects_delay);

        return view('pages.index', compact([
            'orders_count',
            'projects_big_mega',
            'projects_regular',
            'orders_big_mega',
            'orders_regular',
            'project_orders_big_mega',
            'project_orders_regular',
            'projects',
            'order_dps',
            'order_dss',
            'order_dgs',
            'order_reg',
            'projects_delay',
            'projects_lag',
            'projects_lead',
            'projects_closed'
        ]));
    }
}
