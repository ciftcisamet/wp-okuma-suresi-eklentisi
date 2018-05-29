<?php
/**
 * Plugin Name: Okuma Suresi
 * Plugin URI: https://sametciftci.me/wordpress-yazi-okuma-suresi-eklentisi
 * Description: Wordpress blogunuzda paylaştığınız yazıların okunacağı ortalama süreyi hesaplayan eklenti.
 * Version: 1.0.0
 * Author: Samet Çiftci
 * Author URI: https://sametciftci.me
 */

  function okuma_suresini_hesapla($id, $dbk = 100 ) {
	$icerik = get_post_field('post_content',$id); // yazının içeriğini aldık
	$temiz_icerik = strip_shortcodes( $icerik ); // yazıdaki kısa kodları temizledik
	$temiz_icerik = strip_tags( $temiz_icerik ); // yazıdaki strip tagsları temizledik
	$kelime_say = str_word_count( $temiz_icerik ); // yazının kaç kelime olduğunu bulduk
	$sure = ceil( $kelime_say / $dbk ); // yazının toplam kelime sayısını, belirlediğimiz dakika başı kelime sayısına böldük
	return $sure; // değeri döndürdük
	}

	function ekrana_yazdir(){
		echo okuma_suresini_hesapla(); // fonksiyon içerisinde döndürdüğümüz değeri yazdırmak için fonksiyonu çağırdık
	}

	add_shortcode( 'HESAPLA', 'ekrana_yazdir' ); // çıktıyı short code çalıştırarak alabilmek için fonksiyon kullandık


?>
