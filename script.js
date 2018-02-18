var xmlhttp = new XMLHttpRequest();
xmlhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
    }
};
xmlhttp.open("GET", "plugin_dir_url( __FILE__ ).'/a.json'", true);
xmlhttp.send();





ass = JSON.parse(my);
$scope = ass;
/*
$scope.per = 0;
$scope.eachMonth = 0
$scope.interest = 0
$scope.restAmount = 0
$scope.showAlert = false;
///////////////////////////////////////////////////////////////
$scope.durs = [{
    monthes: 6,
}, {
    monthes: 12,
}]

$scope.categ = [{
    type: "air caonditaner",
    installmentDuration: [0.25, 0.35]
}]
//////////////////////////////////////////////////////
*/
$scope.getper = (idx) => {
    $scope.per = $scope.categ[0].installmentDuration[idx]
    $scope.monthes = $scope.durs[idx].monthes
    let amount = 5000;
    if ($scope.inAdvance > 0.2 * amount && $scope.inAdvance < amount) {
        $scope.showAlert = false;

        $scope.restAmount = amount - $scope.inAdvance
        $scope.interest = $scope.restAmount * $scope.per
        $scope.eachMonth = ($scope.restAmount + $scope.interest) / $scope.monthes
    } else {
        $scope.showAlert = true;
    }
}
















console.log(price);
console.log($scope.body);

$scope.getper = (idx) => {
    $scope.body.per = $scope.body.categs[0].installmentDuration[idx]
    $scope.monthes = $scope.body.durs[idx].monthes
    /* let price = price; */
    if ($scope.inAdvance > 0.2 * price && $scope.inAdvance < price) {
        $scope.showAlert = false;

        $scope.body.restprice = price - $scope.inAdvance
        $scope.body.interest = $scope.body.restprice * $scope.body.per
        $scope.body.eachMonth = ($scope.body.restprice + $scope.body.interest) / $scope.monthes
    } else {
        $scope.showAlert = true;
    }
}


///////////////////////////////////







angular.module("installment", []).controller('ctrl', function ($scope) {

    console.log(<?php echo json_encode($resBody) ?>);
    let price = parseInt(<?php echo json_encode($product->price) ?>);
    $scope.body = JSON.parse(<?php echo json_encode($resBody) ?>);

    /*{
  
/*  equated monthly installment (EMI)  
A fixed payment amount made by a borrower to a lender at a specified date each calendar month.

where:  P is the principal amount borrowed, 
    A is the periodic amortization payment, 
    r is the periodic interest rate divided by 100 (annual interest rate also divided by 12 in case of monthly installments), 
    and n is the total number of payments
    P هو المبلغ الرئيسي المقترض،
                    A هو دفع الإطفاء الدوري،
                    r هو سعر الفائدة الدوري مقسوما على 100 (سعر الفائدة السنوي مقسوما أيضا على 12 في حالة الأقساط الشهرية)
                    n هو إجمالي عدد المدفوعات ال شهرية
For example,
    if you borrow 10,000,000 units of a currency from the bank at 10.5% annual interest for a period of 10 years (i.e., 120 months), 
    then EMI = Units of currency 10,000,000 * 0.00875 * (1 + 0.00875)^120 / ((1 + 0.00875)^120 – 1) = Units of currency 134,935. i.e., 
    you will have to pay total currency units 134,935 for 120 months to repay the entire loan amount. 
    The total amount payable will be 134,935 * 120 = 16,192,200 currency units that includes currency units 6,192,200 as interest toward the loan.
*/
    // the formula...
    //EMI = p * r * (1 + r)^n / ((1 + r)^n – 1) = Units of currency 
    // المعلومات المتوفرة
    //السعر الكامل 
    //P باقى المبلغ (المقسط)
    //r هو سعر الفائدة الدوري مقسوما على 100  ثم على 12 باشهر 
    //n هو إجمالي عدد المدفوعات ال شهرية
    // المعلومة المطلوبة
    //A مبلغ القسط

    // تعديل المعادلة لتصبح قابلة للحساب بالكمبيوتر و تقسيم عمليلا الحساب
    //EMI = p * (r * (1 + r)^n / ((1 + r)^n – 1)) = Units of currency 
    // تقسيم العملية و اضافة ال  JavaScript Math Opject

    //EMI A = p * ((r * (Math.pow(1 + r, n)) / ((Math.pow(1 + r, n) – 1))) = Units of currency 
    //تسمية المتغيرات


    ///////////////////////////////////////////////////////////////////////////////
    //A = p * ((r * (Math.pow(1 + r, n)) / ((Math.pow(1 + r, n) – 1))) = Units of currency
    //A = periodicAmortizationPayment
    //p = principalAmountBorrowed
    //r = periodicInterestRateDivided
    //n = totalNumberOfPayments
    //periodicAmortizationPayment = principalAmountBorrowed * ((periodicInterestRateDivided * (Math.pow((1 + periodicInterestRateDivided), totalNumberOfPayments)) / ((Math.pow((1 + periodicInterestRateDivided), totalNumberOfPayments) – 1))) = Units of currency
    ////////////////////////////////////////////////////////////////////////////////

    //loanNetCost = (principal) + (loanTotalInterest);
    //alert('You will owe this much money: + loanNetCost');




    // استخلاص نسبة ال فائدة
    $scope.rate = (idx) => {
        $scope.body.categs[0].installmentDuration[idx]
    }
    //استخلاص نسبة المؤخر سدادة
    $scope.principalAmountBorrowed = () {
        price - $scope.inAdvance;
    }
    //استخلاص نسبة الفائدة على كل شهر 
    $scope.periodicInterestRateDivided = (rate) => {
        (rate / 100) / 12;
    }

    //$scope.totalNumberOfPayments = $scope.inAdvance;

    //استخلاص شهور الدفع
    $scope.totalNumberOfPayments = $scope.durs[idx].monthes;
    //استخلاص دفعة الاستهلاك الدورية 
    $scope.periodicAmortizationPayment = () => {
        principalAmountBorrowed = $scope.principalAmountBorrowed;
        periodicInterestRateDivided = $scope.periodicInterestRateDivided;
        totalNumberOfPayments = $scope.totalNumberOfPayments;
        p = principalAmountBorrowed * ((periodicInterestRateDivided * (Math.pow((1 + periodicInterestRateDivided), totalNumberOfPayments)) / ((Math.pow((1 + periodicInterestRateDivided), totalNumberOfPayments) - 1))));
        return p;
    }

    if ($scope.inAdvance > 0.2 * price && $scope.inAdvance < price) {
        $scope.showAlert = false;
        $scope.body.restprice = $scope.principalAmountBorrowed;
        $scope.body.interest = $scope.rate;
        $scope.body.eachMonth = ($scope.body.restprice + $scope.body.interest) / $scope.monthes;
    } else {
        $scope.showAlert = true;
    }
});