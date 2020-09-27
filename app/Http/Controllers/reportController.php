<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orders;

class reportController extends Controller
{
    //
    public function getForm(Request $req)
    {
        if ($req) {
            $report = orders::Where('Trangthai', 'Giao thành công')->whereDate('updated_at', $req->date1)->get();
            $date1 = $req->date1;
            return view('admin.report.form', compact('report', 'date1'));
        } else {
            return view('admin.report.form');
        }
    }
    public function formMonth(Request $req)
    {
        if ($req) {
            $replace = str_replace("-", "", $req->month);
            $year = substr($replace, 0, 4);
            $month1 = substr($replace, 4, 2);
            $report = orders::select(orders::raw('sum(Tong) as total,day(updated_at) as day'))->Where('Trangthai', 'Giao thành công')->whereMonth('updated_at', '=', $month1)
                ->whereYear('updated_at', $year)->groupBy('day')->get();
            $report2 = orders::Where('Trangthai', 'Giao thành công')->whereMonth('updated_at', '=', $month1)
                ->whereYear('updated_at', $year)->get();
            $month = $req->month;
            return view('admin.report.month', compact('report', 'month', 'report2','year','month1'));
        } else {
            return view('admin.report.month');
        }
    }
    public function formYear(Request $req)
    {
        if ($req) {
            $report = orders::select(orders::raw('sum(Tong) as total,Year(updated_at) as Year'))->where('Trangthai', 'Giao thành công')->whereYear('updated_at', $req->year)->groupBy('Year')->get();
            
            $year = $req->year;
            return view('admin.report.year', compact('report', 'year'));
        } else {
            return view('admin.report.year');
        }
    }
    public function detailsYear($year)
    {
        $report = orders::select(orders::raw('sum(Tong) as total,month(updated_at) as month'))->where('Trangthai', 'Giao thành công')
            ->whereYear('updated_at', $year)->groupBy('month')->get();
        return view('admin.report.detailsYear', compact('report', 'year'));
    }
    public function detailsMonth($year, $month)
    {
        $report = orders::select(orders::raw('sum(Tong) as total,day(updated_at) as day'))->where('Trangthai', 'Giao thành công')
            ->whereMonth('updated_at', $month)->whereYear('updated_at', $year)->groupBy('day')->get();
        return view('admin.report.detailsMonth', compact('report', 'month', 'year'));
    }
    public function detailsDay($year, $month, $day)
    {
        $report = orders::where('Trangthai', 'Giao thành công')->whereYear('updated_at', $year)->whereMonth('updated_at', $month)
            ->whereDay('updated_at', $day)->get();

        return view('admin.report.detialsDay', compact('report', 'month','day'));
    }
}
