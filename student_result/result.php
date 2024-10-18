<?php


function totalMarks($marks) {
    $total = 0;
    foreach ($marks as $sub => $mark) {
        $total += $mark;
    }
    return $total;
}

function calculateResult($marks) {
    // Mark Range Validation
    foreach ($marks as $subject => $mark) {
        if ($mark < 0 || $mark > 100) {
            echo "Mark range is invalid.\n";
            return; 
        }
    }

    // Fail Condition
    foreach ($marks as $subject => $mark) {
        if($mark < 33) {
            echo "Result: Failed\n";
            return;
        }
    }

    // Calculate total and average marks
    $totalMarks = totalMarks($marks);
    $averageMarks = $totalMarks / count($marks);


    // Grade claculation using switch-case
    $grade = "";

    switch(true) {
        case ( $averageMarks >= 80 &&  $averageMarks <= 100):
            $grade = "A+";
            break;
        
        case ($averageMarks >= 70 &&  $averageMarks < 79):
            $grade = "A";
            break;
        
        case ($averageMarks >= 60 && $averageMarks <= 69):
            $grade = 'A-';
            break;

        case ($averageMarks >= 50 && $averageMarks <= 59):
            $grade = 'B';
            break;

        case ($averageMarks >= 40 && $averageMarks <= 49):
            $grade = 'C';
            break;

        case ($averageMarks >= 33 && $averageMarks <= 39):
            $grade = 'D';
            break;
            
        default:
            $grade = 'Invalid Grade';

    }

    // Output
    echo "Total Marks: " . $totalMarks . "\n";
    echo "Average Marks: " . $averageMarks . "\n";
    echo "Grade: " . $grade . "\n";
    
}



// Test Cases

// Case 1: Normal Pass with Grade B
$studentMarks = [ //assoc
    'Math' => 45,
    'English' => 55,
    'Science' => 60,
    'History' => 70,
    'Geography' => 50
];

echo "<h3>Test Case 1:</h3>" . calculateResult($studentMarks) . "<br><br>";

