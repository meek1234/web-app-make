<?php
  $conn = mysqli_connect("localhost", "root", "meek1012");
mysqli_select_db($conn, "opentutorials");
$result = mysqli_query($conn, "SELECT * FROM topic");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" type=text/css href="http://localhost/style.css">
    </head>
    <body id="target">
       <header>
           <img src="https://s3.ap-northeast-2.amazonaws.com/opentutorials-user-file/course/94.png" alt="logo">
           <h1><a href="http://localhost/index.php">JavaScript</a></h1>
       </header>
        <nav>
         <ol>
         <?php
          while($row = mysqli_fetch_assoc($result)){
           echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.$row['title'].'</a></li>'."\n";
        }
        ?>
            </ol>
        </nav>
        <div id="control">
            <input type="button" value="white" onclick="document.getElementById('target').className='white'" />
            <input type="button" value="black" onclick="document.getElementById('target').className='black'" />
        </div>
        <article>
          <form action="del.php" method="post">
            <p>
             ID : <input type="text" name="id">
            <input type="submit" name="name" onclick="return confirm('삭제하시겠습니까?')" value="삭제">
          </form>
        </article>
    </body>
</html>