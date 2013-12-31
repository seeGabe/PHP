<html>
<head><title>Top Tracks</title>
<style> 
	body{
		background-color:gray;
		font:sans serif;
	}
	ol {
		margin: 0px;
		padding: 0px;
		font:inherit;
		font-size: 0.8em;
	}
	ol li {
		width: 32%;
		font:inherit;
		font-size: 1em;
		text-align: center;
		border: 3px solid red;
		background-color: #ffffc0;
		line-height: 3em;
		margin: 0px 4px 25px 0px;
	}

</style></head>
<?php
//  This is a test implementation of using RESTful web services
function last_read_xml(){
$output ; //start empty array
$b = '<br />';
$genre = 'nerd rock';
$limit = 10;
$api_key = 'Get your own and put it here';
$load = simplexml_load_file('http://ws.audioscrobbler.com/2.0/?method=tag.gettoptracks&tag='.$genre.'&limit='.$limit.'&api_key='.$api_key);
//var_dump($load);
//var_dump($load->toptracks->track);

//go thru the object and try to make sense of it
    foreach($load->toptracks->track as $data=>$k){
        //print_r($data);
		//var_dump($k);
		$final[] = array('rank' => (string)$k['rank'],
						'name' => (string)$k->name,
						'artist' => (string)$k->artist->name,
						'image' => (string)$k->image);
                                           
     // var_dump($final);
    }
$end = count($final);
$output = '<h2>Top '.$limit.' '.$genre.' tracks on Last.fm</h2><ol>';
for ($i=0;$i<$end;$i++){
    $output .= '<li>'.$final[$i]['artist'].$b.$final[$i]['name'].$b.'<img src="'.$final[$i]['image'].'"/></li>';
}
return $output.'</ol>';
}
?>
<body>

<?php echo last_read_xml(); ?>dd
<?php echo last_read_xml(); ?>

</body>
</html>