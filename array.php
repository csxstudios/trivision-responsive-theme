<?php 
$tplugins = array ( 
	array (
	"slug" => "contact-form-7",
	"uri" => "https://wordpress.org/plugins/contact-form-7/",
	"title" => "Contact Form 7"
	),
	array (
	"slug" => "types",
	"uri" => "https://wordpress.org/plugins/types/",
	"title" => "Types"
	),
	array (
	"slug" => "scalable-vector-graphics-svg",
	"uri" => "https://wordpress.org/plugins/scalable-vector-graphics-svg/",
	"title" => "Scalable Vector Graphics (SVG)"
	),
	array (
	"slug" => "envira-gallery-lite",
	"uri" => "https://wordpress.org/plugins/envira-gallery-lite/",
	"title" => "Envira Gallery Lite"
	),
	array (
	"slug" => "duplicator",
	"uri" => "https://wordpress.org/plugins/duplicator/",
	"title" => "Duplicator"
	),
	array (
	"slug" => "wp-google-maps",
	"uri" => "https://wordpress.org/plugins/wp-google-maps/",
	"title" => "WP Google Maps"
	),
	array (
	"slug" => "wp-video-lightbox",
	"uri" => "https://wordpress.org/plugins/wp-video-lightbox/",
	"title" => "WP Video Lightbox"
	),
	array (
	"slug" => "advanced-responsive-video-embedder",
	"uri" => "https://wordpress.org/plugins/advanced-responsive-video-embedder/",
	"title" => "Advanced Responsive Video Embedder"
	),
	array (
	"slug" => "password-protect-wordpress",
	"uri" => "https://wordpress.org/plugins/password-protect-wordpress/",
	"title" => "Private Blog"
	)
);
foreach ($tplugins as $tplugin) {
    $tslug = $tplugin['slug'];
    $turi = $tplugin['uri'];
    $ttitle = $tplugin['title'];
	echo $tslug.', '.$turi.', '.$ttitle.'<br/>';
}
?>
