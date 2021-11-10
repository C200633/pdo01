function db_conn() { 

    /* データベース定義 */ 

    define('DSN','mysql:host=localhost;dbname=lesson1;charset=utf8mb4'); 

    define('DB_USER','root'); 

    define('DB_PASS',''); 

    /* データベースに接続　*/ 

    try { 

      

    $dbh = new PDO(DSN,DB_USER,DB_PASS);  

 
    $dbh = db_conn();  

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 

    } catch (PDOException $e){ 

        echo $e->getMessage(); 

        exit; 

    } 

    return $dbh; 

} 

 

/* complete.php 本体側処理  */　 ※どのファイルの、どの箇所に変更を入れるのか考えて下さい 

（途中省略） 

[関数ファイルの読み込み] 

（途中省略） 

$dbh = db_conn(); 

try{ 

    $sql = "INSERT INTO user (email, name, gender) VALUE (:email, :name, :gender)"; 

       $stmt = $pdo->prepare($sql); 

    $stmt->bindValue(':email', $email, PDO::PARAM_STR); 

       $stmt->bindValue(':name', $name, PDO::PARAM_STR); 

      $stmt->bindValue(':gender', $gender, PDO::PARAM_INT); 

    $stmt->execute(); 

      unset($dbh); 

}catch (PDOException $e){ 

    echo($e->getMessage()); 

    die(); 

} 
