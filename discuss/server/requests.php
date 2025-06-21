<?php
session_start();
include("../common/db.php");
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $address = $_POST['address'];

    $user = $conn->prepare("Insert into `users`
(`id`,`username`,`email`,`password`,`address`)
values(NULL,'$username','$email','$password','$address');
");

    $result = $user->execute();
    $user->insert_id;
    if ($result) {

        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user->insert_id];
        header("location:/PROJECTS/discuss");
    } else {
        echo "New user not registered";
    }

} else if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $username = "";
    $user_id = 0;

    $query = "select * from users where email='$email' and password='$password'";
    $result = $conn->query($query);
    if ($result->num_rows == 1) {

        foreach ($result as $row) {

            $username = $row['username'];
            $user_id = $row['id'];
        }

        $_SESSION["user"] = ["username" => $username, "email" => $email, "user_id" => $user_id];
        header("location:/PROJECTS/discuss");
    } else {
        echo "New user not registered";
    }

} else if (isset($_GET['logout'])) {
    session_unset();
    header("location:/PROJECTS/discuss");
} else if (isset($_POST['ask'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $category = $_POST['category'];
    $user_id = $_SESSION['user']['user_id'];

    $question = $conn->prepare("Insert into `questions`
(`id`,`title`,`description`,`category_id`,`user_id`)
values(NULL,'$title','$description','$category','$user_id');
");

    $result = $question->execute();
    $question->insert_id;
    if ($result) {
        header("location:/PROJECTS/discuss");
    } else {
        echo "Question is added to website";
    }

}else if 

(isset($_POST['answer']) ) {
  
    
    $answer = $_POST['answer'];
    $question_id = $_POST['question_id'];
    $user_id = $_SESSION['user']['user_id'];
if($user_id>=1)
{
    $query = $conn->prepare("Insert into `answers`
(`id`,`answer`,`question_id`,`user_id`)
values(NULL,'$answer','$question_id','$user_id');
");

    $result = $query->execute();
    if ($result) {
        header("location:/PROJECTS/discuss?q-id=$question_id");
    } else {
        echo "Answer is not submitted";

    }
}
else{
    header("location:/PROJECTS/discuss");

}
}



else if (isset($_GET['delete'])) {
    echo $qid= $_GET['delete'];
     $query= $conn->prepare("delete from questions where id =$qid");
     $result = $query->execute();
     if($result){
        header("location:/PROJECTS/discuss");
     }else {
        echo "Question not deleted";
     }
}
else 
{
    header("location:/PROJECTS/discuss");

}
?>