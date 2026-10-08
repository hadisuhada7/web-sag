<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GovernanceController extends Controller
{
    public function summary() {
        return view("governance.summary", []);
    }

    public function charter() {
        return view("governance.charter", []);
    }

    public function auditCommitee() {
        return view("governance.auditcommitee", []);
    }

    public function whistleblowingSystem() {
        return view("governance.whistleblowingsystem", []);
    }

    public function riskManagement() {
        return view("governance.riskmanagement", []);
    }
}
