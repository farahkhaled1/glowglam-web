<?php
session_start();
include("../includes/chatdb.php");
include("../includes/links.php");

$users = mysqli_query($con, "SELECT * FROM users WHERE id ='" . $_SESSION["userId"] . "' ")
    or die("Failed to query database");
$user = mysqli_fetch_assoc($users);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Chat</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <p>Hi <?php echo $user["firstname"]; ?> </p>
                <input type="text" id="fromUser" value=<?php echo $user["id"]; ?> hidden />

                <p>Send Message to: </p>
                <ul>
                    <?php
                    $msgs = mysqli_query($con, "SELECT * FROM users")
                        or die("Failed to query database" . mysql_error());
                    while ($msg = mysqli_fetch_assoc($msgs)) {
                        echo '<li><a href="?toUser=' . $msg["id"] . '">' . $msg["firstname"] . '.</a></li>';
                    }

                    ?>
                </ul>
                <a href="index.php">
                    <-- Back</a><br>
                        <a href="../index.php">
                            <-- Back To Homepage</a>
            </div>
            <div class="col-md-4">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4><?php
                                if (isset($_GET["toUser"])) {
                                    $username = mysqli_query($con, "SELECT * FROM users WHERE id = '" . $_GET["toUser"] . "'")
                                        or die("Failed to query database" . mysql_error($con));
                                    $uName = mysqli_fetch_assoc($username);
                                    echo '<input type="text" value=' . $_GET["toUser"] . ' id="toUser" hidden />';
                                    echo $uName["firstname"];
                                } else {
                                    $username = mysqli_query($con, "SELECT * FROM users")
                                        or die("Failed to query database" . mysql_error());
                                    $uName = mysqli_fetch_assoc($username);
                                    $_SESSION["toUser"] = $uName["id"];
                                    echo '<input type="text" value=' . $_SESSION["toUser"] . ' id="toUser" hidden />';
                                    echo $uName["firstname"];
                                }
                                ?>
                            </h4>
                        </div>
                        <div class="modal-body" id="msgBody" style="height:400px; overflow-y: scroll; overflow-x: hidden;">
                            <?php
                            if (isset($_GET["toUser"]))
                                $chats = mysqli_query($con, "SELECT * FROM messages WHERE (FromUser = '" . $_SESSION["userId"] . "' AND    ToUser = '" . $_GET["toUser"] . "') OR (FromUser = '" . $_GET["toUser"] . "' AND ToUser = '" . $_SESSION["userId"] . "')")
                                    or die("Failed to query database" . mysql_error());
                            else
                                $chats = mysqli_query($con, "SELECT * FROM messages WHERE (FromUser = '" . $_SESSION["userId"] . "' AND    ToUser = '" . $_SESSION["toUser"] . "') OR (FromUser = '" . $_SESSION["toUser"] . "' AND ToUser = '" . $_SESSION["userId"] . "')")
                                    or die("Failed to query database" . mysql_error());


                            while ($chat = mysqli_fetch_assoc($chats)) {
                                if ($chat["FromUser"] == $_SESSION["userId"])
                                    echo "<div style='text-align:right;'>
                                    <p style='background-color:lightblue; word-wrap:break-word; display:inline-block; padding:5px; border-radius:10px; max-width:70%;'>
                                    " . $chat["Message"] . "
                                    </p>
                                    </div>";
                                else
                                    echo "<div style='text-align:left;'>
                                    <p style='background-color:yellow; word-wrap:break-word; display:inline-block; padding:5px; border-radius:10px; max-width:70%;'>
                                    " . $chat["Message"] . "
                                    </p>
                                    </div>";
                            }
                            ?>
                        </div>
                        <div class="modal-footer">
                            <textarea id="message" class="form-control" style="height:70px;"></textarea>
                            <button id="send" class="btn btn-primary" style="height:70%;">Send</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">

            </div>
        </div>
    </div>
</body>
<script type="text/javascript">
    $(document).ready(function() {

        $("#send").on("click", function() {
            $.ajax({
                url: 'insertMessage.php',
                method: "POST",
                data: {
                    fromUser: $("#fromUser").val(),
                    toUser: $("#toUser").val(),
                    message: $("#message").val()
                },
                dataType: "text",
                success: function(data) {
                    $("#message").val("");
                    setInterval('refreshPage()', 100);
                }
            });
        });

        setInterval(function() {
            $.ajax({
                url: 'realTimeChat.php',
                method: "POST",
                data: {
                    fromUser: $("#fromUser").val(),
                    toUser: $("#toUser").val()
                },
                dataType: "text",
                success: function(data) {
                    $("#msgBody").htm;
                    (data);
                }
            });
        }, 700);
    });


    function refreshPage() {
        location.reload(true);
    }
</script>

</html>