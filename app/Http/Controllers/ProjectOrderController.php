<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Project;
use App\Models\ProjectOrder;
use Illuminate\Http\Request;

class ProjectOrderController extends Controller
{
    public function index($project_id) {
        $project_id = $project_id;
        $project_orders = ProjectOrder::where('project_id', $project_id)->get();

        $orders = Order::whereIn('nomor_order', $project_orders->pluck('number_order'))->get();

        return view('pages.project.order.index', compact('orders', 'project_id'));
    }

    public function create($project_id) {
        $project = Project::find($project_id);

        return view('pages.project.order.create', compact('project'));
    }

    public function store(Request $request, $project_id) {
        $project = Project::find($project_id);

        $request->validate([
            'project_orders.*.number_order' => 'required',
        ]);

        $project_orders = $request->input('project_orders');

        foreach ($project_orders as $number_order) {
            ProjectOrder::create([
                'project_id' => $project->id,
                'number_order' => $number_order['number_order'],
            ]);
        }

        return redirect()->route('orders.index', $project->id);
    }
}
