<?php
    if (!empty($_POST['id'])) {
    $json = json_decode(curl('https://www.googleapis.com/oauth2/v3/tokeninfo?id_token='.$_POST['id']), true);
    // print_r($json);
    print_r($json['sub'] . ' <br> ' . $json['given_name'] . ' ' . $json['family_name']);
  }

  function curl($url,$post = false, $cookie = false, $header = false, $follow_location = false, $referer=false,$proxy=false){
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FAILONERROR, true);
    curl_setopt($ch, CURLOPT_REFERER, $referer);
    curl_setopt($ch, CURLOPT_HEADER, $header);
    curl_setopt($ch, CURLOPT_PROXY, $proxy);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, $follow_location);
    if ($cookie) {
        curl_setopt ($ch, CURLOPT_COOKIE, $cookie);
    }
    if ($post) {
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    }
    $response = curl_exec ($ch);
    curl_close($ch);
    return $response;
}
?>
