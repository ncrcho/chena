<?php

$directory = '/www/chena.pro/htdocs';

exec("git -C $directory pull", $output, $returnCode);

if ($returnCode === 0) {
    echo 'Git pull successful';
} else {
    echo 'Git pull failed';
}


// // Retrieve the payload data sent by GitHub
// $payload = file_get_contents('php://input');
// $data = json_decode($payload, true);

// // Verify the payload and its authenticity (optional but recommended)
// $signature = $_SERVER['HTTP_X_HUB_SIGNATURE'] ?? '';
// $secret = 'your_webhook_secret'; // Replace with your actual secret
// $isPayloadValid = verifyPayloadSignature($payload, $signature, $secret);

// if ($isPayloadValid) {
//     // Process the webhook event based on its type
//     $event = $_SERVER['HTTP_X_GITHUB_EVENT'] ?? '';

//     switch ($event) {
//         case 'push':
//             // Handle the push event
//             processPushEvent($data);
//             break;
//         case 'pull_request':
//             // Handle the pull request event
//             processPullRequestEvent($data);
//             break;
//         // Add other event types as needed
//         default:
//             // Unsupported event type
//             http_response_code(400);
//             exit('Unsupported event type');
//     }

//     // Respond with a success status
//     http_response_code(200);
//     exit('Webhook event processed successfully');
// } else {
//     // Respond with an error status
//     http_response_code(401);
//     exit('Invalid payload signature');
// }

// // Function to verify the authenticity of the payload
// function verifyPayloadSignature($payload, $signature, $secret) {
//     list($algo, $hash) = explode('=', $signature, 2);
//     $payloadHash = hash_hmac($algo, $payload, $secret);

//     return $hash === $payloadHash;
// }

// // Function to handle the push event
// function processPushEvent($data) {
//     // Perform actions based on the push event
//     // For example, pull the latest code, run build processes, etc.
//     // You can use system commands or execute custom PHP code here

//     // Replace `/www/chena.pro/htdocs` with your actual directory path
//     $directory = '/www/chena.pro/htdocs';

//     // Change the ownership of the directory to the web server user
//     exec("sudo chown -R www-data:www-data $directory");

//     // Execute `git pull` with `sudo` privileges
//     exec("sudo -u www-data git -C $directory pull");
// }

// // Function to handle the pull request event
// function processPullRequestEvent($data) {
//     // Perform actions based on the pull request event
//     // For example, validate the pull request, run tests, etc.
//     // You can use system commands or execute custom PHP code here

//     // Replace `/www/chena.pro/htdocs` with your actual directory path
//     $directory = '/www/chena.pro/htdocs';

//     // Change the ownership of the directory to the web server user
//     exec("chown -R www-data:www-data $directory");

//     // Execute `git pull` with `sudo` privileges
//     exec("-u www-data git -C $directory pull");
// }
