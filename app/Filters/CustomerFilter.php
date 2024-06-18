<?php
namespace App\Filters;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;

class CustomerFilter extends ApiFilter {
    protected $safeParams = [
        'name' => ['eq'],
        'type' => ['eq'],
        'city' => ['eq'],
        'state' => ['eq']
    ];
    protected $operatorMap = [
        'eq' =>'='
    ];
    protected $columnMap = [];
	
	public function transform(Request $request)
	{
		return parent::transform($request); // Call parent's transform method
		
	}
}
