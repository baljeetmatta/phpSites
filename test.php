<html>
    <body>
        <?php

$cookie_name="user";
$cookie_value="John Doe";

setcookie($cookie_name,$cookie_value,time()+60*60*60*24,"/");
# 4. Path ="/"
#5. domain
# 6. Secure-> true https://
# httponly -> true. //Serer side script can access the cookie 
# Client side script cannot access the cookie

# test.abc.com
# www.abc.com -> test.abc.com
# expiry -> Date
# timeout
print_r($_COOKIE);

        ?>
    </body>
</html>