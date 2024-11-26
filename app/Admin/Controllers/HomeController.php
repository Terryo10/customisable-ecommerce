<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;

class HomeController extends Controller
{
    public function index(Content $content)
    {
        return $content
            ->title('Dashboard')
            ->description('Description...')
            ->row(view('title'))
            ->row(function (Row $row) {

                $row->column(4, function (Column $column) {

                    $orders = array_fill(0, 12, 0);
                    $data = Orders::selectRaw('COUNT(*) as count, YEAR(created_at) year, MONTH(created_at) month')->groupBy('year', 'month')->get();
                    foreach ($data as $key => $value) {
                        $orders[$value->month - 1] = $value->count;
                    }
                    $column->append(view('admin.chart')->with('orders', $orders));
                });
            });
    }
}
