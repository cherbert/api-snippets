<?php
// Get the Twilio-PHP library from twilio.com/docs/libraries/php, 
// following the instructions to install it with Composer.
require_once "vendor/autoload.php";

// Your Account SID from www.twilio.com/console
$accountSid = "AC1a44c7a9ac6ec9d03e67d0944a7a9f01"; //"ACXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX";
// Your Auth Token from www.twilio.com/console
$authToken = "1ae5fc5de0aa5ccc6189a7e0d38a5faf"; //"your_auth_token";
$workspaceSid = 'WS30d0414c1651d84e81b8501d9baa8197'; //'WSXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX'; 

$workerSid = $_REQUEST['WorkerSid'];

$workerCapability = new Twilio\Jwt\TaskRouter\WorkerCapability(
    $accountSid, $authToken, $workspaceSid, $workerSid);
$workerCapability->allowActivityUpdates();
$workerToken = $workerCapability->generateToken();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Customer Care - Voice Agent Screen</title>
    <link rel="stylesheet" href="//media.twiliocdn.com/taskrouter/quickstart/agent.css"/>
    <script src="//media.twiliocdn.com/taskrouter/js/v1.4/taskrouter.min.js"></script>
    <script src="agent.js"></script>
</head>
<body>
<div class="content">
    <section class="agent-activity offline">
        <p class="activity">Offline</p>
        <button class="change-activity" data-next-activity="Idle">Go Available</button>
    </section>
    <section class="agent-activity idle">
        <p class="activity"><span>Available</span></p>
        <button class="change-activity" data-next-activity="Offline">Go Offline</button>
    </section>
    <section class="agent-activity reserved">
        <p class="activity">Reserved</p>
    </section>
    <section class="agent-activity busy">
        <p class="activity">Busy</p>
    </section>
    <section class="agent-activity wrapup">
        <p class="activity">Wrap-Up</p>
        <button class="change-activity" data-next-activity="Idle">Go Available</button>
        <button class="change-activity" data-next-activity="Offline">Go Offline</button>
    </section>
    <section class="log">
      <textarea id="log" readonly="true"></textarea>
    </section>
</div>
<script>
  window.workerToken = "<?= $workerToken ?>";
</script>
</body>
</html>