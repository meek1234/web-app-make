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
           echo '<li><a href="http://localhost/index.php?id='.$row['id'].'">'.htmlspecialchars($row['title']).'</a></li>'."\n";
        }
        ?>
            </ol>
        </nav>
        <div id="control">
            <input type="button" value="white" onclick="document.getElementById('target').className='white'" />
            <input type="button" value="black" onclick="document.getElementById('target').className='black'" />
            <a href="http://localhost/write.php" onclick="return confirm('글을 작성하시겠습니까?')">쓰기</a>
            <a href="http://localhost/update.php" onclick="return confirm('글을 수정하시겠습니까?')">수정</a>
            <a href="http://localhost/delete.php" onclick="return confirm('글을 삭제하시겠습니까?')">삭제</a>
            <a href="help.txt" onclick="return confirm('도움말을 보시겠습니까?')">도움말</a>
            <script>
              function down(help.txt){
                URL = "http://localhost/help.txt"
                location.href = URL;
              }
            </script>
            <form enctype='multipart/form-data' action='upload_ok.php' method='post'>
	            <input type='file' name='myfile'>
	            <button>업로드</button>
            </form>
        </div>
        <article>
          <?php
            if(empty($_GET['id'])===false){
              $sql = "SELECT topic.id,title,name,description  FROM topic LEFT  JOIN user ON topic.author = user.id WHERE topic.id=".$_GET['id'];
              $result = mysqli_query($conn, $sql);
              $row = mysqli_fetch_assoc($result);
              echo '<h2>'.htmlspecialchars($row['title']).'</h2>';
              echo '<p>'.htmlspecialchars($row['name']).'</P>';
              echo strip_tags($row['description'],'<a><h1><h2><h3><h4><h5><h6><h7><li><ul><ol>');
            }
          ?>
          <div id="disqus_thread"></div>
            <script>
            (function() { // DON'T EDIT BELOW THIS LINE
            var d = document, s = d.createElement('script');
            s.src = 'https://saenghwalkodingwebaepeulrikeisyeonmandeulgi-4.disqus.com/embed.js';
            s.setAttribute('data-timestamp', +new Date());
            (d.head || d.body).appendChild(s);
            })();
            </script>
            <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a>
            </noscript>              
        </article>
    </body>
</html>