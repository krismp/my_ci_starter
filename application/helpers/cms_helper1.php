<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function dump($array)
{
	echo "<pre>";
	print_r($array);
	echo "</pre>";
}

function btn_submit($text)
{
	return '<button type="submit" class="btn btn-default"><i class="fa fa-save"></i> '. $text.'</button>';
}

function link_edit($uri, $attributes = ''){
	foreach ($attributes as $key => $value) {
		return anchor($uri, '<i class="fa fa-edit"></i>',
		array(
			$key => $value,
			'type' => 'button',
			'class' => 'btn btn-info'
		));
	}
}

function fb_button($text, $link){

	return '<a href="http://www.facebook.com/sharer.php?u='. $link .'" title="Share to Facebook." target="_new" class="btn btn-primary"> <i class="fa fa-facebook"></i> '. $text.'</a>';
}

function twitter_button($text, $link){
	return '<a target="_new" href="https://twitter.com/share?url='. $link .'" class="btn btn-info" title="Share to Twitter" data-href="'. $link .'"> <i class="fa fa-twitter"></i> '. $text.'</a>';
}

function link_view($uri, $attributes = ''){
	foreach ($attributes as $key => $value) {
		return anchor($uri, '<i class="fa fa-eye"></i>',
		array(
			$key => $value,
			'type' => 'button',
			'class' => 'btn btn-warning'
		));
	}
}

function getBulan($bln)
	{
		switch ($bln)
		{
			case 1: 
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	} 		
	

function date_format_id($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = getBulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
	}

function ci_send_mail($email, $title_email, $summary)
	{
		
	}
	
function title_to_link($title)
	{
    $spasi = array (' ');
    $find = array ('  ','-','/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','&','*','=','?','+');

    $link = str_replace($find, '', $title); // Hilangkan karakter yang telah disebutkan di array $d
    
    $link = strtolower(str_replace($spasi, '-', $link)); // Ganti spasi dengan tanda - dan ubah hurufnya menjadi kecil semua
    return $link;
	}

function link_delete($uri, $attributes = ''){
	foreach ($attributes as $key => $value) {
		return anchor($uri, '<i class="fa fa-trash-o"></i>',
		array(
			'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are You sure?')",
			$key => $value,
			'type' => 'button',
			'class' => 'btn btn-danger',
		));
	}
}

function link_to_add_page($uri, $attributes = '')
{
	// return '<a href="'.site_url($uri).'" class="btn btn-default"><i class="fa fa-plus-circle"></i> '. $text.'</a>';
	foreach ($attributes as $key => $value) {
		return anchor($uri, '<i class="fa fa-plus-circle"></i> Add',
		array(
			$key => $value,
			'type' => 'button',
			'class' => 'btn btn-default',
		));
	}
}

function link_to_previous_page($uri, $text)
{
	return '<a href="'.site_url($uri).'" class="btn btn-default" title="back to previous page"><i class="fa fa-arrow-circle-o-left"></i> '. $text.'</a>';
}

function msg_success($text)
{
	return '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Well done!</strong> '.$text.'</div>';
}

function msg_error($text)
{
	return '<div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>Ups!</strong> '.$text.'</div>';
}