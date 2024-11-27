<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Orders;
use Encore\Admin\Admin;
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
                        $orders[$value->month - 1] = $value->sum('total');
                    }
                    $column->append(view('admin.chart', ['title'=> 'Orders'])->with('orders', $orders));
                    Admin::js(asset('template/outside/js/chart.js'));
                    Admin::script("
    const labels = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ];
    
    var array = " . json_encode($orders) . ";
    
    const data = {
        labels: labels,
        datasets: [{
            label: 'Orders Total Income per each month ($)',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: array,
        }]
    };
    
    const config = {
        type: 'line',
        data: data,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    };
    
    const myChart = new Chart(
        document.getElementById('myChart2'),
        config
    );
");

                });
            });
    }
}
