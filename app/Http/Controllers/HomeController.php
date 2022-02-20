<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoices;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $all_invoices = invoices::count();
        //نسبة الفواتير المدفوعه
        $paid_invoices = invoices::where('Value_Status','paid')->count();
        $paid_percentage = $paid_invoices/$all_invoices*100;
        //نسبة الفواتير المدفوعه جزئيا
        $partial_invoices = invoices::where('Value_Status','partial')->count();
        $partial_percentage = $partial_invoices/$all_invoices*100;
        //نسبة الفواتير الغير مدفوعه
        $unpaid_invoices = invoices::where('Value_Status','unpaid')->count();
        $unpaid_percentage = $unpaid_invoices/$all_invoices*100;

        $chartjs = app()->chartjs
            ->name('barChartTest')
            ->type('bar')
            ->size(['width' => 350, 'height' => 200])
            ->labels(['الفواتير المدفوعه','الفواتير المدفوعه جزئيا','الفواتير الغير مدفوعه'])
            ->datasets([
                [
                    "label" => "الفواتير المدفوعه",
                    'backgroundColor' => ['#029666'],
                    'data' => [$paid_percentage]
                ],
                [
                    "label" => "الفواتير المدفوعه جزئيا",
                    'backgroundColor' => ['#f76a2d'],
                    'data' => [$partial_percentage]
                ],
                [
                    "label" => "الفواتير الغير مدفوعه",
                    'backgroundColor' => ['#f93a5a'],
                    'data' => [$unpaid_percentage]
                ],


            ])
            ->options([]);



        $chartjs2 = app()->chartjs
            ->name('pieChartTest')
            ->type('pie')
            ->size(['width' => 350, 'height' => 200])
            ->labels(['الفواتير المدفوعه','الفواتير المدفوعه جزئيا','الفواتير الغير مدفوعه'])
            ->datasets([
                [
                    "label" => "الفواتير المدفوعه",
                    'backgroundColor' => ['#029666'],
                    'data' => [$paid_percentage]
                ],
                [
                    "label" => "الفواتير المدفوعه جزئيا",
                    'backgroundColor' => ['#f76a2d'],
                    'data' => [$partial_percentage]
                ],
                [
                    "label" => "الفواتير الغير مدفوعه",
                    'backgroundColor' => ['#f93a5a'],
                    'data' => [$unpaid_percentage]
                ],


            ])
            ->options([]);

            return view('home', compact('chartjs','chartjs2'));
            // return view('home');

    }
}
