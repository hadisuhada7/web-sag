<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    AnnualReport
};
use Illuminate\Support\Facades\DB;

class InvestorController extends Controller
{
    public function summary() {
        return view("investor.summary", []);
    }

    public function rups() {
        return view("investor.rups", []);
    }

    public function annualReport() {
        $list = AnnualReport::select(DB::raw("title, yearperiode, dated, thumbnailId, fileId"))
                ->where("publish", 1)
                ->orderBy("yearperiode", "desc")
                ->get()
                ->chunk(6);
        return view("investor.annualreport", [
            'list'  => $list
        ]);
    }

    public function financialStatement() {
        return view("investor.financialstatement", []);
    }

    public function financialHightlight() {
        return view("investor.financialhightlight", []);
    }

    public function stockInformationChronologies() {
        return view("investor.stockinformationchronologies", []);
    }

    public function devidendInformation() {
        return view("investor.devidendinformation", []);
    }

    public function news() {
        return view("investor.news", []);
    }

    public function stockInformation() {
        return view("investor.stockinformation", []);
    }

    public function stockRealtime() {
        return view("investor.stockrealtime", []);
    }

    public function annualReport2019() {
        // $content = $res->getBody();
        // $content->write(readfile(__DIR__ . "/../Files/Annual-Report-2019.pdf"));

        // return $res->withHeader('Content-Type', "application/pdf")
        //     ->withHeader('Content-Transfer-Encoding', 'binary')
        //     ->withHeader('Content-Disposition', 'inline; filename="Annual-Report-2019.pdf"')
        //     ->withHeader('Expires', '0')
        //     ->withHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0')
        //     ->withHeader('Pragma', 'public');
    }

    public function annualReport2018() {
        // $content = $res->getBody();
        // $content->write(readfile(__DIR__ . "/../Files/Annual-Report.pdf"));

        // return $res->withHeader('Content-Type', "application/pdf")
        //     ->withHeader('Content-Transfer-Encoding', 'binary')
        //     ->withHeader('Content-Disposition', 'inline; filename="Annual-Report.pdf"')
        //     ->withHeader('Expires', '0')
        //     ->withHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0')
        //     ->withHeader('Pragma', 'public');
    }

    public function annualReport2017() {
        // $content = $res->getBody();
        // $content->write(readfile(__DIR__ . "/../Files/Annual-Report-2017.pdf"));

        // return $res->withHeader('Content-Type', "application/pdf")
        //     ->withHeader('Content-Transfer-Encoding', 'binary')
        //     ->withHeader('Content-Disposition', 'inline; filename="Annual-Report-2017.pdf"')
        //     ->withHeader('Expires', '0')
        //     ->withHeader('Cache-Control', 'must-revalidate, post-check=0, pre-check=0')
        //     ->withHeader('Pragma', 'public');
    }
}
