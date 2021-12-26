<?php
session_destroy();
setcookie('user', false, time() - 1);
redirect('auth/sign-in');