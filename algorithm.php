<?php
function convertion($maxPoints,$convertTo,$quizMarks){

    for($i=0;$i<count($quizMarks);$i++){
        $quizMarks[$i] = ($quizMarks[$i] / $maxPoints[$i]) * $convertTo;
        $quizMarks[$i] = number_format((float)$quizMarks[$i],2,'.','');
    }
    return $quizMarks;
}

function average($num_quizzes,$num_best_quizzes,$quiz_scores){
    rsort($quiz_scores);
    $best_quizzes = array_slice($quiz_scores, 0, $num_best_quizzes);
    $sum = 0;
    foreach ($best_quizzes as $quiz_score) {
        $sum += $quiz_score;
    }
    $average_score = $sum / $num_best_quizzes;
    return number_format((float)$average_score,2,'.','');
}

function grade($mark){
    if($mark<60){
        $grade="F";
    }
    else if($mark>=60 && $mark<67){
        $grade="D";
    }
    else if($mark>=67 && $mark<70){
        $grade="D+";
    }
    else if($mark>=70 && $mark<73){
        $grade="C-";
    }
    else if($mark>=73 && $mark<77){
        $grade="C";
    }
    else if($mark>=77 && $mark<80){
        $grade="C+";
    }
    else if($mark>=80 && $mark<83){
        $grade="B-";
    }
    else if($mark>=83 && $mark<87){
        $grade="B";
    }
    else if($mark>=87 && $mark<90){
        $grade="B+";
    }
    else if($mark>=90 && $mark<93){
        $grade="A-";
    }
    else if($mark>92){
        $grade="A";
    }
    return $grade;
}

function category($mark){
    $mark=number_format((float)$mark, 2, '.', '');
    if($mark>=80){
        $category="Examplary";
    }
    else if($mark>=60 && $mark<80){
        $category="Satisfactory";
    }
    else if($mark>=40 && $mark<60){
        $category="Developing";
    }
    else if($mark<40){
        $category="Unsatisfactory";
    }
    return $category;
}

function percent($points,$percent){
    $result = ($percent / 100) *$points;
    return number_format((float)$result, 2, '.', '');
}

function converter($taken,$goal,$got){
    $got = ($got / $taken) * $goal;
    return number_format((float)$got, 2, '.', '');
}

function avg($arr){
    $tot=0;
    foreach($arr as $res){
        $tot+=$res;
    }
    $final=$tot/count($arr);
    return number_format((float)$final, 2, '.', '');
}
?>