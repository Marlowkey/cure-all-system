<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderAuditTrail;

class OrderAuditTrailController extends Controller
{
    public function index()
    {
        $auditTrails = OrderAuditTrail::with('order', 'user')->orderBy('created_at', 'desc')->paginate(10);
        return view('admin.audit_trails.index', compact('auditTrails'));
    }
}
