<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use App\PaymentGateways\PaymentGatewayFactory;
use Illuminate\Http\Request;

class PaymentMethodsController extends Controller
{

    public function index()
    {
        $data['pagename'] = 'بوابات الدفع';
        $data['methods']  = PaymentMethod::paginate(5);
        return view('dashboard.payment-method.index',$data);
    }


    public function create()
    {
        $data['pagename'] = 'إضافة بوابة دفع';
        return view('dashboard.payment-method.create',$data);
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        return view('dashboard.payment-method.show');
    }


    public function edit($id)
    {
        $data['method']   = PaymentMethod::findOrFail($id);
        $data['gateway']  = PaymentGatewayFactory::create($data['method']->slug);
        $data['options']  = $data['gateway']->formOptions();
        $data['pagename'] = "تعديل بوابة ".$data['method']->name;

        return view('dashboard.payment-method.edit',$data);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $method = PaymentMethod::findOrFail($id);

        $method->update($request->all());

        toast('تم تعديل بوابة الدفع','success');

        return redirect()->route('admin.payment-methods.index');
    }

    public function destroy($id)
    {
        //
    }
}
