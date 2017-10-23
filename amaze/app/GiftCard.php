<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Carbon\Carbon;

class GiftCard extends Model
{
    
	protected $guarded = [];

	public function transactions () {

		return $this->hasMany(gcTransaction::class);

	}

	public function addTransaction ($amount) {

		$this->transactions()->create(compact('amount'));

	}

	public function scopeFilter($query, $filters)
	{
		
		if (isset($filters['month']) && $month = $filters['month']) {

			$query->whereMonth('created_at', Carbon::parse($month)->month);

		}

		if (isset($filters['year']) && $year = $filters['year']) {

			$query->whereYear('created_at', $year);

		}

	}

	public static function archives () {

		return static::selectRaw('year(created_at) year, monthname(created_at) month, count(*) published')

			->groupBy('year', 'month')

			->orderByRaw('min(created_at) desc')

			->get()

			->toArray();
			

	}

	public static function getTotalSpending () {

		//the total amount that was put on the gift cards when they were created
		$totalStartAmount = static::selectRaw('SUM(amount) as total')->first();

		//the total amount that was added to the gift cards
		$totalIncreaseAmount = \DB::table('gc_transactions')
			->selectRaw('SUM(amount) as total')
			->where('amount', '>', 0)
			->first();

		return $totalStartAmount->total + $totalIncreaseAmount->total;
			

	}

}
