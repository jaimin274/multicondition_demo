<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Rule;
use App\Models\RuleCondition;
use Doctrine\Inflector\Rules\English\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RuleContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rule_data = Rule::get();
        return view('rules.index', ['ruledata'=>$rule_data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rules.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'rule_name' => 'required',
            'rule_tag' => 'required',
        ]);
        $rules = new Rule();
        $rules->rule_name = $request->rule_name;
        $rules->rule_tag = $request->rule_tag;
        $rules->save();

        $data = count($request->rule_selector);

        for ($i=0; $i < $data; $i++) {
            $condition = new RuleCondition();
            $condition->rule_selector = $request->rule_selector[$i];
            $condition->rule_operator = $request->rule_operator[$i];
            $condition->rule_value = $request->rule_value[$i];
            $condition->rule_id = $rules->id;
            $condition->save();
        }
        return redirect()->route('rules.index')->with('success', 'Rules Added'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $rules = Rule::with('rule_condition')->find($id);
        $rule_condition = count($rules->rule_condition);
        $rules_check = $rules->rule_condition;

        //check if rule condition match with products table
        $query = DB::table('products');
        foreach ($rules_check as $key => $value) { 
            $query->where($value->rule_selector, $value->rule_operator, $value->rule_value);
        }
        $data = $query->first();

        //if condition match after add a product tag
        if($data != "" && $data != null)
        {
            $product = Product::find($data->id);
            $product->product_tag = $rules->rule_tag;
            $product->save();
            return redirect()->route('rules.index')->with('success', 'Rule Applied');
        }
        return redirect()->route('rules.index')->with('error', 'Rule Not Applied');
         
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
