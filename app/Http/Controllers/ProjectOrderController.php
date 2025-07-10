<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use App\Models\ProjectOrder;
use Illuminate\Http\Request;

class ProjectOrderController extends Controller
{
    public function index($project_id) {
        $project_orders = ProjectOrder::where('project_id', $project_id)->get();

        $orders = Order::whereIn('nomor_order', $project_orders->pluck('number_order'))->get();

        return view('pages.project.order.index', compact('orders'));
    }
}
