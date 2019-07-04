<?php 
// Declare the class
class GoogleUrlApi {
    private $apiurl;
    // Constructor
    public function __construct($key,$apiURL = 'https://www.googleapis.com/urlshortener/v1/url') {
        // Keep the API Url
        $this->apiURL = $apiURL.'?key='.$key;
    }
    
    // Shorten a URL
    public function shorten($url) {
        // Send information along
        $response = $this->send($url);
        // Return the result
        return isset($response['id']) ? $response['id'] : false;
    }
    
    // Expand a URL
    public function expand($url) {
        // Send information along
        $response = $this->send($url,false);
        // Return the result
        return isset($response['longUrl']) ? $response['longUrl'] : false;
    }
    
    // Send information to Google
    public function send($url,$shorten = true) {
        // Create cURL
        $ch = curl_init();
        // If we're shortening a URL...
        if($shorten) {
            curl_setopt($ch,CURLOPT_URL,$this->apiURL);
            curl_setopt($ch,CURLOPT_POST,1);
            curl_setopt($ch,CURLOPT_POSTFIELDS,json_encode(array("longUrl"=>$url)));
            curl_setopt($ch,CURLOPT_HTTPHEADER,array("Content-Type: application/json"));
        }
        else {
            curl_setopt($ch,CURLOPT_URL,$this->apiURL.'&shortUrl='.$url);
        }
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
        // Execute the post
        $result = curl_exec($ch);
        // Close the connection
        curl_close($ch);
        // Return the result
        return json_decode($result,true);
    }       
}
?>

<?php
// https://developers.google.com/url-shortener/v1/getting_started#APIKey
$key = 'AIzaSyBT0M7mC1haYfFlQGrj8Ky2Ee-Zs-uoIBA';
$googer = new GoogleURLAPI($key);
 
// Test: Shorten a URL
$shorURL = $googer->shorten(get_the_permalink());
// echo $shorURL;

 ?>

<?php $post_url = urlencode(get_the_permalink()); ?>
<?php $post_title = rawurlencode(get_the_title()); ?>
<?php $post_summary = rawurlencode(get_the_excerpt()); ?>
<?php $twitter_handle = 'thatsagoal'; // UPDATE THE TWITTER HANDLE ?>
<?php $feat_image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), "full", true); ?>

<?php // print_r($post_title); ?>

<div class="social-sharing">

    <a class="js-social-share facebook fa fa-facebook" href="http://www.facebook.com/sharer.php?u=<?php echo $post_url; ?>" target="new"></a>

    <a class="js-social-share twitter fa fa-twitter" href="https://twitter.com/intent/tweet/?text=<?php echo $post_title; ?>%20-%20<?php echo $post_summary; ?>&url=<?php echo $shorURL; ?>&via=<?php echo $twitter_handle?>" target="_blank"></a>

    <a class="js-social-share pinterest fa fa-pinterest" href="https://www.pinterest.com/pin/create/button/?url=<?php echo $post_url; ?> &media=<?php echo $feat_image[0]; ?> &description=<?php echo $post_summary; ?> &hashtags="target="new"><i class=""></i></a>
</div><!-- /.social-sharing -->






<?php /* ?>

<!-- Google+ -->
<a class="js-social-share google" href="https://plus.google.com/share?url=<?php echo $post_url; ?>"target="new">Share on Google+</a>

<!-- Pinterest -->
<a href="https://www.pinterest.com/pin/create/button/?url=<?php echo $post_url; ?> &media=<?php echo $feat_image[0]; ?> &description=<?php echo $post_summary; ?> &hashtags="target="new">Share on Pinterest</a>

<!-- Facebook -->
<a href="http://www.facebook.com/sharer.php?u=<?php echo $post_url; ?>" target="new">
    Share on Facebook
</a>

<!-- LinkedIn -->
    <a class="js-social-share linkedin"  href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $post_url; ?>&title=<?php echo $post_title; ?>&summary=<?php echo $post_summary; ?>&source=<?php echo $post_url; ?>" target="new"><i class="fa fa-linkedin"></i> <span>LinkedIn</span></a>

<!-- EMAIL -->
    <a class="js-social-share email fa fa-envelope" href="mailto:?subject=<?php echo $post_title; ?>&body=Check%20out%20this%20post%20on%20https://thatsagoal.com%20[<?php echo $post_url; ?>]"></a>

<?php */?>
