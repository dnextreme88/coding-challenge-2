<?php

namespace App\Livewire;

use Closure;
use Livewire\Component;

class MoveTower extends Component
{
    public $ones = [];
    public $tens = [];
    public $bigger_scales = [];

    public $input;
    public $final_input;
    public $is_comma_formatting = false;

    public function toggle_comma_formatting()
    {
        $this->final_input = $this->is_comma_formatting ? number_format($this->final_input) : str_replace(',', '', $this->final_input);
    }

    public function submit_input()
    {
        $this->validate(['input' => [
            'required',
            'min:3',
            function (string $attribute, mixed $value, Closure $fail) {
                // Sanitize inputs
                $replaced_whitespaces = preg_replace('/\s+/', ' ', $this->input);
                $replaced_dashes = str_replace(['-'], ' ', $replaced_whitespaces);
                $this->input = trim(strtolower($replaced_dashes));

                $exploded_input = explode(' ', $this->input);

                $temporary_number = 0;
                $final_number = 0;

                foreach ($exploded_input as $word) {
                    if (array_key_exists($word, $this->ones)) {
                        $temporary_number = $temporary_number + $this->ones[$word];
                    } else if (array_key_exists($word, $this->tens)) {
                        $temporary_number = $temporary_number + $this->tens[$word];
                    } else if (array_key_exists($word, $this->bigger_scales)) {
                        $temporary_number *= $this->bigger_scales[$word];

                        // Store the temporary input to the final input before resetting
                        $final_number += $temporary_number;
                        $temporary_number = 0;

                        if ($word !== 'hundred') {
                            $final_number += $temporary_number;
                        }
                    } else {
                        $fail('You have invalid words that cannot be parsed into numbers. Please check your input.');

                        break;
                    }
                }

                $final_number += $temporary_number;

                $this->final_input = $this->is_comma_formatting ? number_format($final_number) : $final_number;
            }
        ]]);
    }

    public function mount()
    {
        $this->ones = [
            'zero' => 0,
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
            'ten' => 10,
            'eleven' => 11,
            'twelve' => 12,
            'thirteen' => 13,
            'fourteen' => 14,
            'fifteen' => 15,
            'sixteen' => 16,
            'seventeen' => 17,
            'eighteen' => 18,
            'nineteen' => 19
        ];

        $this->tens = [
            'twenty' => 20,
            'thirty' => 30,
            'forty' => 40,
            'fifty' => 50,
            'sixty' => 60,
            'seventy' => 70,
            'eighty' => 80,
            'ninety' => 90
        ];

        $this->bigger_scales = [
            'hundred' => 100,
            'thousand' => 1000,
            'million' => 1000000,
        ];
    }

    public function render()
    {
        return view('livewire.move-tower');
    }
}
