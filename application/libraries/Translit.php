<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Translit
{

  /**
   * Encode windows to utf-8
   * @return 
   * @param object $s
   */
  private function win2utf($s)
  {
    return iconv('cp1251', 'utf-8', $s);
  }
  
  /**
   * Encode utf-8 to windows
   * @return 
   * @param object $s
   */
  private function utf2win($s)
  {
    return iconv('utf-8', 'cp1251', $s);
  }
    
  /**
   * Return ru-en translited string
   * @return
   * @param object $s
   */
    
  public function transliter($var)
  {
    $var = self::utf2win($var);
    $var = trim($var);
    $var = strtolower($var);
        
    //транслит
    $f = array('а','б','в','г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'щ', 'ъ', 'ы', 'ь', 'э', 'ю', 'я', 'А','Б','В','Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Щ', 'Ъ', 'Ы', 'Ь', 'Э', 'Ю', 'Я');
    foreach($f as $k=>$v) $f[$k] = self::utf2win($v);
    $r = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sch', '', 'y', '', 'e', 'yu', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'y', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'sz', '', 'y', '', 'e', 'yu', 'ya');
    $var = str_replace($f, $r, $var);
    $var = str_replace('-',' ',$var);
    $var = str_replace('/',' ',$var);
        
    // оставляем только числовые и буквенные символы
    $var = preg_replace('/[^a-z0-9-]+/',' ',$var);

    // заменяем пробельные символы на " "
    $var = preg_replace('/(\s+)/', ' ', $var);
    $var = trim($var);
    
    // заменяем пробельные символы на "-"
    $var = preg_replace('/(\s+)/', '-', $var);
    
    // преобразуем в utf
    $var = self::win2utf($var);
    return $var;
  }

  public static function rusDate($int)
	{
	  $dates = array(
	    '01' => 'января',
		  '02' => 'февраля',
		  '03' => 'марта',
		  '04' => 'апреля',
		  '05' => 'мая',
		  '06' => 'июня',
		  '07' => 'июля',
		  '08' => 'августа',
		  '09' => 'сентября',
		  '10' => 'октября',
		  '11' => 'ноября',
		  '12' => 'декабря'
	  );
	  
	  return $dates[$int];
	}

	public static function showDate($date)
	{
	  $tmp = explode(' ', $date);
	  $tmp = $tmp[0];
	  $tmp = explode('-', $tmp);
	  $tmp = $tmp[2].' '.self::rusDate($tmp[1]).' '.$tmp[0];
	  return $tmp;
	}
}
