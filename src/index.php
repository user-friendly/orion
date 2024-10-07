<?php

namespace UserFriendly\Orion;

$data = [
  'status' => '500',
  'message' => 'TODO Implement service',
  'example' => [1, 2, 3.5, '123', 'Hello!', new \stdClass()]
];

$output = \json_encode($data, JSON_FORCE_OBJECT);

header('content-type: application/json');

print($output);
