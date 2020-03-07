{"filter":false,"title":"doLogin.class.php","tooltip":"/panel/includes/classes/doLogin.class.php","ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":104,"column":7},"end":{"row":104,"column":7},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"hash":"ffa97c3b8ab487478d71207fda05684d754cb9f7","undoManager":{"mark":73,"position":73,"stack":[[{"start":{"row":0,"column":0},"end":{"row":140,"column":0},"action":"remove","lines":["<?php","","if (!isset($HOME)) {","    die();","}","/*"," * Adaclare IntISP System"," * Copyright Adaclare Technologies 2007-2018"," * https://www.adaclare.com"," * https://github.com/INTisp"," *"," */","","use Defuse\\Crypto\\Crypto;","use Defuse\\Crypto\\Key;","","require 'vendor/autoload.php';","require 'config.php';","","if (isset($_GET['oauth'])) {","    if ('github' == $_GET['oauth']) {","        require 'includes/oauth/github.php';","    }","    if ('google' == $_GET['oauth']) {","        require 'includes/oauth/google.php';","    }","    if ('facebook' == $_GET['oauth']) {","        require 'includes/oauth/facebook.php';","    }","    if ('twitter' == $_GET['oauth']) {","        require 'includes/oauth/twitter.php';","    }","","    $usez = auth();","    $con = mysqli_connect(\"$host\", \"$user\", \"$pass\", \"$data\");","    $sql = \"select * from oauth where link='$usez'\";","    $run_user = mysqli_query($con, $sql);","    $check_user = mysqli_num_rows($run_user);","    if ($check_user > 0) {","        // The user has been found","        $mysqli = new mysqli();","        $con = mysqli_connect(\"$host\", \"$user\", \"$pass\", \"$data\");","        // Check connection","        $sql = \"SELECT name FROM oauth WHERE link =  '$usez' LIMIT 0 , 30\";","        if ($result = mysqli_query($con, $sql)) {","            // Fetch one and one row","            while ($row = mysqli_fetch_row($result)) {","                $theuser = $row[0];","            }","            // Free result set","            mysqli_free_result($result);","        }","        mysqli_close($con);","        $_SESSION['user'] = $theuser;","        header('Location: '.$webroot.'/cp');","        die();","    } else {","        header(\"Location: ' . $webroot . '/?errorx\");","    }","    die();","}","","$con = mysqli_connect(\"$host\", \"$user\", \"$pass\", \"$data\");","if (!isset($_POST['user'])) {","    $email = mysqli_real_escape_string($con, '');","} else {","    $email = mysqli_real_escape_string($con, $_POST['user']);","}","","$sql = \"select * from users where username='$email'\";","$run_user = mysqli_query($con, $sql);","$check_user = mysqli_num_rows($run_user);","if ($check_user > 0) {","    $sql = \"SELECT password FROM users where username='$email'\";","    if ($result = mysqli_query($con, $sql)) {","        // Fetch one and one row","        while ($row = mysqli_fetch_row($result)) {","            $key = Key::loadFromAsciiSafeString($salt);","            $pass = Crypto::decrypt($row[0], $key);","","            if ($pass == $_POST['pass']) {","                $_SESSION['user'] = $_POST['user'];","                if ('admin' == $_POST['pass']) {","                    header('Location: '.$webroot.'/temppass');","                    die();","                }","                header('Location: '.$webroot.'/cp');","                die();","            } else {","                include 'config.php';","","                // Create connection","                $conn = new mysqli('localhost', 'root', \"$pass\", \"$data\");","","                $t = time();","                $sql = \"INSERT INTO failedlogin(id, ip, time)","VALUES ('\".rand(1, 99999).\"', '\".$_SERVER['REMOTE_ADDR'].\"', '\".date('Y-m-d', $t).\"')\";","                $conn->query($sql);","                $conn->close();","                if ('admin' == $_POST['user']) {","                    require 'includes/classes/mail.class.php';","                    sendemailuser('Failed login attempt for admin', '","    <b>The administrator account has had a failed login attempt<b><br>","    <p>The IP address was from '.$_SERVER['REMOTE_ADDR'].' and the time was","    '.date('Y-m-d', $t).\".","    <b>If this wasn't you please change your password immediately or use the internal firewall.</b>","    ","    \");","                }","                header('Location: '.$webroot.'/?error');","                die();","            }","        }","        // Free result set","    }","}","    include 'config.php';","","    // Create connection","    $conn = new mysqli('localhost', 'root', \"$pass\", \"$data\");","","    $t = time();","    $sql = \"INSERT INTO failedlogin(id, ip, time)","VALUES ('\".rand(1, 99999).\"', '\".$_SERVER['REMOTE_ADDR'].\"', '\".date('Y-m-d', $t).\"')\";","    $conn->query($sql);","    $conn->close();","","if ('admin' == $_POST['user']) {","    require 'includes/classes/mail.class.php';","    sendemailuser('Failed login attempt for admin', '","    <b>The administrator account has had a failed login attempt<b><br>","    <p>The IP address was from '.$_SERVER['REMOTE_ADDR'].' and the time was","    '.date('Y-m-d', $t).\".","    <b>If this wasn't you please change your password immediately or use the internal firewall.</b>","    ","    \");","}","","  header('Location: '.$webroot.'/?error');","    die();",""],"id":4}],[{"start":{"row":0,"column":0},"end":{"row":140,"column":0},"action":"insert","lines":["<?php","","if (!isset($HOME)) {","    die();","}","/*"," * Adaclare IntISP System"," * Copyright Adaclare Technologies 2007-2018"," * https://www.adaclare.com"," * https://github.com/INTisp"," *"," */","","use Defuse\\Crypto\\Crypto;","use Defuse\\Crypto\\Key;","","require 'vendor/autoload.php';","require 'config.php';","","if (isset($_GET['oauth'])) {","    if ('github' == $_GET['oauth']) {","        require 'includes/oauth/github.php';","    }","    if ('google' == $_GET['oauth']) {","        require 'includes/oauth/google.php';","    }","    if ('facebook' == $_GET['oauth']) {","        require 'includes/oauth/facebook.php';","    }","    if ('twitter' == $_GET['oauth']) {","        require 'includes/oauth/twitter.php';","    }","","    $usez = auth();","    $con = mysqli_connect(\"$host\", \"$user\", \"$pass\", \"$data\");","    $sql = \"select * from oauth where link='$usez'\";","    $run_user = mysqli_query($con, $sql);","    $check_user = mysqli_num_rows($run_user);","    if ($check_user > 0) {","        // The user has been found","        $mysqli = new mysqli();","        $con = mysqli_connect(\"$host\", \"$user\", \"$pass\", \"$data\");","        // Check connection","        $sql = \"SELECT name FROM oauth WHERE link =  '$usez' LIMIT 0 , 30\";","        if ($result = mysqli_query($con, $sql)) {","            // Fetch one and one row","            while ($row = mysqli_fetch_row($result)) {","                $theuser = $row[0];","            }","            // Free result set","            mysqli_free_result($result);","        }","        mysqli_close($con);","        $_SESSION['user'] = $theuser;","        header('Location: '.$webroot.'/cp');","        die();","    } else {","        header(\"Location: ' . $webroot . '/?errorx\");","    }","    die();","}","","$con = mysqli_connect(\"$host\", \"$user\", \"$pass\", \"$data\");","if (!isset($_POST['user'])) {","    $email = mysqli_real_escape_string($con, '');","} else {","    $email = mysqli_real_escape_string($con, $_POST['user']);","}","","$sql = \"select * from users where username='$email'\";","$run_user = mysqli_query($con, $sql);","$check_user = mysqli_num_rows($run_user);","if ($check_user > 0) {","    $sql = \"SELECT password FROM users where username='$email'\";","    if ($result = mysqli_query($con, $sql)) {","        // Fetch one and one row","        while ($row = mysqli_fetch_row($result)) {","            $key = Key::loadFromAsciiSafeString($salt);","            $pass = Crypto::decrypt($row[0], $key);","","            if ($pass == $_POST['pass']) {","                $_SESSION['user'] = $_POST['user'];","                if ('admin' == $_POST['pass']) {","                    header('Location: '.$webroot.'/temppass');","                    die();","                }","                header('Location: '.$webroot.'/cp');","                die();","            } else {","                include 'config.php';","","                // Create connection","                $conn = new mysqli('localhost', 'root', \"$pass\", \"$data\");","","                $t = time();","                $sql = \"INSERT INTO failedlogin(id, ip, time)","VALUES ('\".rand(1, 99999).\"', '\".$_SERVER['REMOTE_ADDR'].\"', '\".date('Y-m-d', $t).\"')\";","                $conn->query($sql);","                $conn->close();","                if ('admin' == $_POST['user']) {","                    require 'includes/classes/mail.class.php';","                    sendemailuser('Failed login attempt for admin', '","    <b>The administrator account has had a failed login attempt<b><br>","    <p>The IP address was from '.$_SERVER['REMOTE_ADDR'].' and the time was","    '.date('Y-m-d', $t).\".","    <b>If this wasn't you please change your password immediately or use the internal firewall.</b>","    ","    \");","                }","                header('Location: '.$webroot.'/?error');","                die();","            }","        }","        // Free result set","    }","}","    include 'config.php';","","    // Create connection","    $conn = new mysqli('localhost', 'root', \"$pass\", \"$data\");","","    $t = time();","    $sql = \"INSERT INTO failedlogin(id, ip, time)","VALUES ('\".rand(1, 99999).\"', '\".$_SERVER['REMOTE_ADDR'].\"', '\".date('Y-m-d', $t).\"')\";","    $conn->query($sql);","    $conn->close();","","if ('admin' == $_POST['user']) {","    require 'includes/classes/mail.class.php';","    sendemailuser('Failed login attempt for admin', '","    <b>The administrator account has had a failed login attempt<b><br>","    <p>The IP address was from '.$_SERVER['REMOTE_ADDR'].' and the time was","    '.date('Y-m-d', $t).\".","    <b>If this wasn't you please change your password immediately or use the internal firewall.</b>","    ","    \");","}","","  header('Location: '.$webroot.'/?error');","    die();",""],"id":5}],[{"start":{"row":1,"column":0},"end":{"row":4,"column":1},"action":"remove","lines":["","if (!isset($HOME)) {","    die();","}"],"id":6},{"start":{"row":1,"column":0},"end":{"row":1,"column":32},"action":"insert","lines":["if (!defined(\"HOMEBASE\")) die();"]}],[{"start":{"row":2,"column":0},"end":{"row":9,"column":0},"action":"remove","lines":["/*"," * Adaclare IntISP System"," * Copyright Adaclare Technologies 2007-2018"," * https://www.adaclare.com"," * https://github.com/INTisp"," *"," */",""],"id":7}],[{"start":{"row":7,"column":0},"end":{"row":7,"column":21},"action":"remove","lines":["require 'config.php';"],"id":8},{"start":{"row":6,"column":30},"end":{"row":7,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":7,"column":0},"end":{"row":7,"column":1},"action":"insert","lines":["/"],"id":9},{"start":{"row":7,"column":1},"end":{"row":7,"column":2},"action":"insert","lines":["*"]}],[{"start":{"row":50,"column":0},"end":{"row":50,"column":1},"action":"insert","lines":["*"],"id":10},{"start":{"row":50,"column":1},"end":{"row":50,"column":2},"action":"insert","lines":["/"]}],[{"start":{"row":50,"column":2},"end":{"row":51,"column":0},"action":"insert","lines":["",""],"id":11},{"start":{"row":51,"column":0},"end":{"row":52,"column":0},"action":"insert","lines":["",""]},{"start":{"row":52,"column":0},"end":{"row":53,"column":0},"action":"insert","lines":["",""]},{"start":{"row":53,"column":0},"end":{"row":54,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":54,"column":0},"end":{"row":55,"column":0},"action":"insert","lines":["",""],"id":12},{"start":{"row":55,"column":0},"end":{"row":56,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":51,"column":0},"end":{"row":52,"column":0},"action":"insert","lines":["",""],"id":13},{"start":{"row":52,"column":0},"end":{"row":53,"column":0},"action":"insert","lines":["",""]},{"start":{"row":53,"column":0},"end":{"row":54,"column":0},"action":"insert","lines":["",""]}],[{"start":{"row":52,"column":0},"end":{"row":52,"column":1},"action":"insert","lines":["/"],"id":14},{"start":{"row":52,"column":1},"end":{"row":52,"column":2},"action":"insert","lines":["*"]}],[{"start":{"row":52,"column":2},"end":{"row":53,"column":0},"action":"insert","lines":["",""],"id":15},{"start":{"row":53,"column":0},"end":{"row":54,"column":0},"action":"insert","lines":["",""]},{"start":{"row":54,"column":0},"end":{"row":55,"column":0},"action":"insert","lines":["",""]},{"start":{"row":55,"column":0},"end":{"row":56,"column":0},"action":"insert","lines":["",""]},{"start":{"row":56,"column":0},"end":{"row":56,"column":1},"action":"insert","lines":["*"]},{"start":{"row":56,"column":1},"end":{"row":56,"column":2},"action":"insert","lines":["/"]}],[{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"insert","lines":["C"],"id":16},{"start":{"row":54,"column":1},"end":{"row":54,"column":2},"action":"insert","lines":["o"]},{"start":{"row":54,"column":2},"end":{"row":54,"column":3},"action":"insert","lines":["n"]},{"start":{"row":54,"column":3},"end":{"row":54,"column":4},"action":"insert","lines":["v"]}],[{"start":{"row":54,"column":3},"end":{"row":54,"column":4},"action":"remove","lines":["v"],"id":17},{"start":{"row":54,"column":2},"end":{"row":54,"column":3},"action":"remove","lines":["n"]},{"start":{"row":54,"column":1},"end":{"row":54,"column":2},"action":"remove","lines":["o"]},{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"remove","lines":["C"]}],[{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"insert","lines":["C"],"id":18},{"start":{"row":54,"column":1},"end":{"row":54,"column":2},"action":"insert","lines":["o"]},{"start":{"row":54,"column":2},"end":{"row":54,"column":3},"action":"insert","lines":["n"]}],[{"start":{"row":54,"column":2},"end":{"row":54,"column":3},"action":"remove","lines":["n"],"id":19},{"start":{"row":54,"column":1},"end":{"row":54,"column":2},"action":"remove","lines":["o"]},{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"remove","lines":["C"]}],[{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"insert","lines":["I"],"id":20},{"start":{"row":54,"column":1},"end":{"row":54,"column":2},"action":"insert","lines":["n"]}],[{"start":{"row":54,"column":1},"end":{"row":54,"column":2},"action":"remove","lines":["n"],"id":21},{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"remove","lines":["I"]}],[{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"insert","lines":["T"],"id":22},{"start":{"row":54,"column":1},"end":{"row":54,"column":2},"action":"insert","lines":["r"]},{"start":{"row":54,"column":2},"end":{"row":54,"column":3},"action":"insert","lines":["a"]},{"start":{"row":54,"column":3},"end":{"row":54,"column":4},"action":"insert","lines":["n"]},{"start":{"row":54,"column":4},"end":{"row":54,"column":5},"action":"insert","lines":["s"]},{"start":{"row":54,"column":5},"end":{"row":54,"column":6},"action":"insert","lines":["l"]},{"start":{"row":54,"column":6},"end":{"row":54,"column":7},"action":"insert","lines":["a"]},{"start":{"row":54,"column":7},"end":{"row":54,"column":8},"action":"insert","lines":["t"]}],[{"start":{"row":54,"column":8},"end":{"row":54,"column":9},"action":"insert","lines":["e"],"id":23}],[{"start":{"row":54,"column":9},"end":{"row":54,"column":10},"action":"insert","lines":[" "],"id":24},{"start":{"row":54,"column":10},"end":{"row":54,"column":11},"action":"insert","lines":["O"]},{"start":{"row":54,"column":11},"end":{"row":54,"column":12},"action":"insert","lines":["l"]},{"start":{"row":54,"column":12},"end":{"row":54,"column":13},"action":"insert","lines":["d"]}],[{"start":{"row":54,"column":13},"end":{"row":54,"column":14},"action":"insert","lines":[" "],"id":25}],[{"start":{"row":54,"column":13},"end":{"row":54,"column":14},"action":"remove","lines":[" "],"id":26},{"start":{"row":54,"column":12},"end":{"row":54,"column":13},"action":"remove","lines":["d"]},{"start":{"row":54,"column":11},"end":{"row":54,"column":12},"action":"remove","lines":["l"]},{"start":{"row":54,"column":10},"end":{"row":54,"column":11},"action":"remove","lines":["O"]}],[{"start":{"row":54,"column":10},"end":{"row":54,"column":11},"action":"insert","lines":["N"],"id":27},{"start":{"row":54,"column":11},"end":{"row":54,"column":12},"action":"insert","lines":["e"]},{"start":{"row":54,"column":12},"end":{"row":54,"column":13},"action":"insert","lines":["w"]}],[{"start":{"row":54,"column":13},"end":{"row":54,"column":14},"action":"insert","lines":[" "],"id":28},{"start":{"row":54,"column":14},"end":{"row":54,"column":15},"action":"insert","lines":["C"]}],[{"start":{"row":54,"column":14},"end":{"row":54,"column":15},"action":"remove","lines":["C"],"id":29}],[{"start":{"row":54,"column":14},"end":{"row":54,"column":15},"action":"insert","lines":["D"],"id":30},{"start":{"row":54,"column":15},"end":{"row":54,"column":16},"action":"insert","lines":["a"]},{"start":{"row":54,"column":16},"end":{"row":54,"column":17},"action":"insert","lines":["t"]},{"start":{"row":54,"column":17},"end":{"row":54,"column":18},"action":"insert","lines":["a"]},{"start":{"row":54,"column":18},"end":{"row":54,"column":19},"action":"insert","lines":["b"]},{"start":{"row":54,"column":19},"end":{"row":54,"column":20},"action":"insert","lines":["a"]},{"start":{"row":54,"column":20},"end":{"row":54,"column":21},"action":"insert","lines":["s"]},{"start":{"row":54,"column":21},"end":{"row":54,"column":22},"action":"insert","lines":["e"]}],[{"start":{"row":54,"column":22},"end":{"row":54,"column":23},"action":"insert","lines":["s"],"id":31}],[{"start":{"row":54,"column":22},"end":{"row":54,"column":23},"action":"remove","lines":["s"],"id":32},{"start":{"row":54,"column":21},"end":{"row":54,"column":22},"action":"remove","lines":["e"]},{"start":{"row":54,"column":20},"end":{"row":54,"column":21},"action":"remove","lines":["s"]},{"start":{"row":54,"column":19},"end":{"row":54,"column":20},"action":"remove","lines":["a"]},{"start":{"row":54,"column":18},"end":{"row":54,"column":19},"action":"remove","lines":["b"]},{"start":{"row":54,"column":17},"end":{"row":54,"column":18},"action":"remove","lines":["a"]},{"start":{"row":54,"column":16},"end":{"row":54,"column":17},"action":"remove","lines":["t"]}],[{"start":{"row":54,"column":15},"end":{"row":54,"column":16},"action":"remove","lines":["a"],"id":33},{"start":{"row":54,"column":14},"end":{"row":54,"column":15},"action":"remove","lines":["D"]},{"start":{"row":54,"column":13},"end":{"row":54,"column":14},"action":"remove","lines":[" "]},{"start":{"row":54,"column":12},"end":{"row":54,"column":13},"action":"remove","lines":["w"]},{"start":{"row":54,"column":11},"end":{"row":54,"column":12},"action":"remove","lines":["e"]},{"start":{"row":54,"column":10},"end":{"row":54,"column":11},"action":"remove","lines":["N"]},{"start":{"row":54,"column":9},"end":{"row":54,"column":10},"action":"remove","lines":[" "]}],[{"start":{"row":54,"column":9},"end":{"row":54,"column":10},"action":"insert","lines":[" "],"id":34}],[{"start":{"row":54,"column":9},"end":{"row":54,"column":10},"action":"remove","lines":[" "],"id":35},{"start":{"row":54,"column":8},"end":{"row":54,"column":9},"action":"remove","lines":["e"]},{"start":{"row":54,"column":7},"end":{"row":54,"column":8},"action":"remove","lines":["t"]},{"start":{"row":54,"column":6},"end":{"row":54,"column":7},"action":"remove","lines":["a"]},{"start":{"row":54,"column":5},"end":{"row":54,"column":6},"action":"remove","lines":["l"]},{"start":{"row":54,"column":4},"end":{"row":54,"column":5},"action":"remove","lines":["s"]},{"start":{"row":54,"column":3},"end":{"row":54,"column":4},"action":"remove","lines":["n"]}],[{"start":{"row":54,"column":2},"end":{"row":54,"column":3},"action":"remove","lines":["a"],"id":36},{"start":{"row":54,"column":1},"end":{"row":54,"column":2},"action":"remove","lines":["r"]},{"start":{"row":54,"column":0},"end":{"row":54,"column":1},"action":"remove","lines":["T"]}],[{"start":{"row":52,"column":0},"end":{"row":56,"column":2},"action":"remove","lines":["/*","","","","*/"],"id":37},{"start":{"row":51,"column":0},"end":{"row":52,"column":0},"action":"remove","lines":["",""]}],[{"start":{"row":55,"column":0},"end":{"row":55,"column":1},"action":"insert","lines":["r"],"id":38},{"start":{"row":55,"column":1},"end":{"row":55,"column":2},"action":"insert","lines":["e"]},{"start":{"row":55,"column":2},"end":{"row":55,"column":3},"action":"insert","lines":["q"]},{"start":{"row":55,"column":3},"end":{"row":55,"column":4},"action":"insert","lines":["u"]},{"start":{"row":55,"column":4},"end":{"row":55,"column":5},"action":"insert","lines":["i"]},{"start":{"row":55,"column":5},"end":{"row":55,"column":6},"action":"insert","lines":["r"]},{"start":{"row":55,"column":6},"end":{"row":55,"column":7},"action":"insert","lines":["e"]}],[{"start":{"row":55,"column":7},"end":{"row":55,"column":8},"action":"insert","lines":["_"],"id":39},{"start":{"row":55,"column":8},"end":{"row":55,"column":9},"action":"insert","lines":["o"]},{"start":{"row":55,"column":9},"end":{"row":55,"column":10},"action":"insert","lines":["n"]},{"start":{"row":55,"column":10},"end":{"row":55,"column":11},"action":"insert","lines":["c"]},{"start":{"row":55,"column":11},"end":{"row":55,"column":12},"action":"insert","lines":["e"]}],[{"start":{"row":55,"column":12},"end":{"row":55,"column":14},"action":"insert","lines":["()"],"id":40}],[{"start":{"row":55,"column":13},"end":{"row":55,"column":15},"action":"insert","lines":["\"\""],"id":41}],[{"start":{"row":55,"column":14},"end":{"row":55,"column":15},"action":"insert","lines":["u"],"id":42},{"start":{"row":55,"column":15},"end":{"row":55,"column":16},"action":"insert","lines":["n"]},{"start":{"row":55,"column":16},"end":{"row":55,"column":17},"action":"insert","lines":["c"]},{"start":{"row":55,"column":17},"end":{"row":55,"column":18},"action":"insert","lines":["l"]},{"start":{"row":55,"column":18},"end":{"row":55,"column":19},"action":"insert","lines":["u"]},{"start":{"row":55,"column":19},"end":{"row":55,"column":20},"action":"insert","lines":["d"]},{"start":{"row":55,"column":20},"end":{"row":55,"column":21},"action":"insert","lines":["e"]},{"start":{"row":55,"column":21},"end":{"row":55,"column":22},"action":"insert","lines":["s"]},{"start":{"row":55,"column":22},"end":{"row":55,"column":23},"action":"insert","lines":["/"]}],[{"start":{"row":55,"column":23},"end":{"row":55,"column":24},"action":"insert","lines":["n"],"id":43},{"start":{"row":55,"column":24},"end":{"row":55,"column":25},"action":"insert","lines":["o"]},{"start":{"row":55,"column":25},"end":{"row":55,"column":26},"action":"insert","lines":["t"]},{"start":{"row":55,"column":26},"end":{"row":55,"column":27},"action":"insert","lines":["m"]},{"start":{"row":55,"column":27},"end":{"row":55,"column":28},"action":"insert","lines":["i"]},{"start":{"row":55,"column":28},"end":{"row":55,"column":29},"action":"insert","lines":["g"]},{"start":{"row":55,"column":29},"end":{"row":55,"column":30},"action":"insert","lines":["r"]},{"start":{"row":55,"column":30},"end":{"row":55,"column":31},"action":"insert","lines":["a"]}],[{"start":{"row":55,"column":31},"end":{"row":55,"column":32},"action":"insert","lines":["t"],"id":44},{"start":{"row":55,"column":32},"end":{"row":55,"column":33},"action":"insert","lines":["e"]},{"start":{"row":55,"column":33},"end":{"row":55,"column":34},"action":"insert","lines":["d"]},{"start":{"row":55,"column":34},"end":{"row":55,"column":35},"action":"insert","lines":["c"]},{"start":{"row":55,"column":35},"end":{"row":55,"column":36},"action":"insert","lines":["o"]},{"start":{"row":55,"column":36},"end":{"row":55,"column":37},"action":"insert","lines":["n"]},{"start":{"row":55,"column":37},"end":{"row":55,"column":38},"action":"insert","lines":["f"]},{"start":{"row":55,"column":38},"end":{"row":55,"column":39},"action":"insert","lines":["i"]}],[{"start":{"row":55,"column":39},"end":{"row":55,"column":40},"action":"insert","lines":["g"],"id":45},{"start":{"row":55,"column":40},"end":{"row":55,"column":41},"action":"insert","lines":["."]},{"start":{"row":55,"column":41},"end":{"row":55,"column":42},"action":"insert","lines":["p"]},{"start":{"row":55,"column":42},"end":{"row":55,"column":43},"action":"insert","lines":["h"]},{"start":{"row":55,"column":43},"end":{"row":55,"column":44},"action":"insert","lines":["p"]}],[{"start":{"row":55,"column":14},"end":{"row":55,"column":15},"action":"remove","lines":["u"],"id":46}],[{"start":{"row":55,"column":14},"end":{"row":55,"column":15},"action":"insert","lines":["i"],"id":47}],[{"start":{"row":55,"column":46},"end":{"row":55,"column":47},"action":"insert","lines":["l"],"id":48}],[{"start":{"row":55,"column":23},"end":{"row":55,"column":24},"action":"insert","lines":["c"],"id":49},{"start":{"row":55,"column":24},"end":{"row":55,"column":25},"action":"insert","lines":["l"]},{"start":{"row":55,"column":25},"end":{"row":55,"column":26},"action":"insert","lines":["a"]},{"start":{"row":55,"column":26},"end":{"row":55,"column":27},"action":"insert","lines":["s"]},{"start":{"row":55,"column":27},"end":{"row":55,"column":28},"action":"insert","lines":["s"]},{"start":{"row":55,"column":28},"end":{"row":55,"column":29},"action":"insert","lines":["e"]},{"start":{"row":55,"column":29},"end":{"row":55,"column":30},"action":"insert","lines":["s"]},{"start":{"row":55,"column":30},"end":{"row":55,"column":31},"action":"insert","lines":["/"]}],[{"start":{"row":55,"column":54},"end":{"row":55,"column":55},"action":"remove","lines":["l"],"id":50}],[{"start":{"row":55,"column":54},"end":{"row":55,"column":55},"action":"insert","lines":[";"],"id":51}],[{"start":{"row":86,"column":13},"end":{"row":86,"column":37},"action":"remove","lines":["   include 'config.php';"],"id":52}],[{"start":{"row":113,"column":3},"end":{"row":113,"column":25},"action":"remove","lines":[" include 'config.php';"],"id":53}],[{"start":{"row":52,"column":0},"end":{"row":52,"column":1},"action":"insert","lines":["d"],"id":54},{"start":{"row":52,"column":1},"end":{"row":52,"column":2},"action":"insert","lines":["i"]},{"start":{"row":52,"column":2},"end":{"row":52,"column":3},"action":"insert","lines":["e"]}],[{"start":{"row":52,"column":3},"end":{"row":52,"column":5},"action":"insert","lines":["()"],"id":55}],[{"start":{"row":52,"column":4},"end":{"row":52,"column":6},"action":"insert","lines":["\"\""],"id":56}],[{"start":{"row":52,"column":5},"end":{"row":52,"column":6},"action":"insert","lines":["t"],"id":57}],[{"start":{"row":52,"column":8},"end":{"row":52,"column":9},"action":"insert","lines":[";"],"id":58}],[{"start":{"row":52,"column":0},"end":{"row":52,"column":9},"action":"remove","lines":["die(\"t\");"],"id":59}],[{"start":{"row":54,"column":0},"end":{"row":56,"column":0},"action":"remove","lines":["","require_once(\"includes/classes/notmigratedconfig.php\");",""],"id":61}],[{"start":{"row":50,"column":1},"end":{"row":50,"column":2},"action":"remove","lines":["/"],"id":62},{"start":{"row":50,"column":0},"end":{"row":50,"column":1},"action":"remove","lines":["*"]}],[{"start":{"row":7,"column":1},"end":{"row":7,"column":2},"action":"remove","lines":["*"],"id":63},{"start":{"row":7,"column":0},"end":{"row":7,"column":1},"action":"remove","lines":["/"]}],[{"start":{"row":52,"column":0},"end":{"row":52,"column":1},"action":"insert","lines":["d"],"id":64},{"start":{"row":52,"column":1},"end":{"row":52,"column":2},"action":"insert","lines":["i"]},{"start":{"row":52,"column":2},"end":{"row":52,"column":3},"action":"insert","lines":["e"]}],[{"start":{"row":52,"column":3},"end":{"row":52,"column":5},"action":"insert","lines":["()"],"id":65}],[{"start":{"row":52,"column":4},"end":{"row":52,"column":6},"action":"insert","lines":["\"\""],"id":66}],[{"start":{"row":52,"column":5},"end":{"row":52,"column":6},"action":"insert","lines":["t"],"id":67}],[{"start":{"row":52,"column":8},"end":{"row":52,"column":9},"action":"insert","lines":[";"],"id":68}],[{"start":{"row":52,"column":0},"end":{"row":52,"column":9},"action":"remove","lines":["die(\"t\");"],"id":69}],[{"start":{"row":66,"column":41},"end":{"row":67,"column":0},"action":"insert","lines":["",""],"id":70},{"start":{"row":67,"column":0},"end":{"row":67,"column":1},"action":"insert","lines":["d"]},{"start":{"row":67,"column":1},"end":{"row":67,"column":2},"action":"insert","lines":["i"]},{"start":{"row":67,"column":2},"end":{"row":67,"column":3},"action":"insert","lines":["e"]}],[{"start":{"row":67,"column":3},"end":{"row":67,"column":5},"action":"insert","lines":["()"],"id":71}],[{"start":{"row":67,"column":4},"end":{"row":67,"column":6},"action":"insert","lines":["\"\""],"id":72}],[{"start":{"row":67,"column":5},"end":{"row":67,"column":6},"action":"insert","lines":["t"],"id":73}],[{"start":{"row":67,"column":8},"end":{"row":67,"column":9},"action":"insert","lines":["p"],"id":74}],[{"start":{"row":67,"column":8},"end":{"row":67,"column":9},"action":"remove","lines":["p"],"id":75}],[{"start":{"row":67,"column":8},"end":{"row":67,"column":9},"action":"insert","lines":[";"],"id":76}],[{"start":{"row":67,"column":0},"end":{"row":67,"column":9},"action":"remove","lines":["die(\"t\");"],"id":77}],[{"start":{"row":94,"column":31},"end":{"row":95,"column":0},"action":"insert","lines":["",""],"id":79},{"start":{"row":95,"column":0},"end":{"row":95,"column":16},"action":"insert","lines":["                "]}],[{"start":{"row":104,"column":7},"end":{"row":104,"column":16},"action":"insert","lines":["die(\"t\");"],"id":81}]]},"timestamp":1583565901828}