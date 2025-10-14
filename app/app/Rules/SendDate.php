<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Validation\Rules\Date;

class SendDate implements ValidationRule
{
    protected $sendIn;
    protected $sendDate;

    /**
     * Create a new rule instance.
     */
    public function __construct($sendIn, $sendDate)
    {
        $this->sendIn = $sendIn;
        $this->sendDate = $sendDate;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (empty($this->sendIn) && empty($this->sendDate)) {
            $fail('Please select a send date or interval.');
        }

        if (!empty($this->sendDate)) {

            $dateRule = (new Date)->afterOrEqual('today');
            $result = $dateRule->passes($attribute, $this->sendDate);


            $fail('Please select either a send date or an interval, not both.');


        }
    }
}
