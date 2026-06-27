<?php

namespace App\Livewire\MortgageCalculator;

use Livewire\Component;

class MortgageCalculatorIndex extends Component
{
    public $purchasePrice = 250000;
    public $mortgageTerm = 30;
    public $downPayment = 12500;
    public $annualTaxes = 2500;
    public $interestRate = 5;
    public $annualInsurance = 600;
    public $monthlyHOA = 50;
    public $email = '';

    protected $rules = [
        'email' => 'nullable|email',
    ];

    public function calculateMonthlyPayment()
    {
        $loanAmount = $this->purchasePrice - $this->downPayment;
        $monthlyInterestRate = ($this->interestRate / 100) / 12;
        $numberOfPayments = $this->mortgageTerm * 12;

        // Calculate principal & interest
        if ($monthlyInterestRate > 0) {
            $principalInterest = $loanAmount * 
                ($monthlyInterestRate * pow(1 + $monthlyInterestRate, $numberOfPayments)) / 
                (pow(1 + $monthlyInterestRate, $numberOfPayments) - 1);
        } else {
            $principalInterest = $loanAmount / $numberOfPayments;
        }

        // Calculate other monthly costs
        $monthlyTaxes = $this->annualTaxes / 12;
        $monthlyInsurance = $this->annualInsurance / 12;

        return [
            'principalInterest' => round($principalInterest, 2),
            'monthlyTaxes' => round($monthlyTaxes, 2),
            'monthlyInsurance' => round($monthlyInsurance, 2),
            'totalPayment' => round($principalInterest + $monthlyTaxes + $monthlyInsurance + $this->monthlyHOA, 2)
        ];
    }

    public function updated($propertyName)
    {
        // Validate only the email field when it changes
        if ($propertyName === 'email') {
            $this->validateOnly('email');
        }
    }

    public function render()
    {
        $paymentDetails = $this->calculateMonthlyPayment();

        return view('livewire.mortgage-calculator.mortgage-calculator-index', [
            'paymentDetails' => $paymentDetails,
            'monthlyHOA' => $this->monthlyHOA,
        ])->title('Calculator');
    }
}