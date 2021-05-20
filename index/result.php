<?php 
//https://api.themoviedb.org/3/search/movie?api_key=c71a84891365ebe5ddf2ade7ce653c73&query=2004&page=1&year=2004

$thisday=!empty($_GET['day']) ? $_GET['day'] : '';
$thismonth=!empty($_GET['month']) ? $_GET['month'] : '';
$thisyear=!empty($_GET['year']) ? $_GET['year'] : '';
$thisdate=$thisday.'/'.$thismonth.'/'.$thisyear;
echo $thisdate;

$example_url = "https://api.themoviedb.org/3/search/movie?api_key=c71a84891365ebe5ddf2ade7ce653c73&query=2004&page=1&year=2004";
$api_key = "c71a84891365ebe5ddf2ade7ce653c73";
$base_uri = "https://api.themoviedb.org/3/";
$language = "&language=en-US";
$searchkey = "search/movie";
$release_datearray[]="";
$titlearray[]="";
$popularityarray[]="";
$filmsbyday[]="";
$filmsbymonth[]="";
$pagelength2=1;

for ($j=1; $j<=$pagelength2; $j++) 
{  
    $date_url = $base_uri.$searchkey."?api_key=".$api_key.$language."&query=".$thisyear."&page=".$j."&year=".$thisyear;
    $json = file_get_contents($date_url);
    $posted = json_decode($json, true);
    $resultslength = $posted["total_results"]; //toplam data sayısı
    $pagelength = $posted["total_pages"]; //dataların sayfa sayısı. her sayfada 20 indis var.
    $pagelength2=$pagelength; //sayfa uzunluğunu datadan çekip güncelliyor
    $stop = ($resultslength-($pagelength-1)*20); //son sayfadaki sonuç sayısını veriyor. (verilerin toplam sayısı)-(sayfa sayısı-1)*(sayfadaki veri sayısı)
    for ($i=0; $i<=19; $i++) {
        if($j==$pagelength2 && $i==$stop){
            break; // sonuç sayısına ulaşıldığında loop sona eriyor
        }
        else { //yıla göre çekilen bütün filmlerin bütün dataları arraylere yazdırılıyor. ilk indisler boş
            array_push($release_datearray,  $posted["results"][$i]["release_date"]);
            array_push($titlearray,  $posted["results"][$i]["title"]);
            array_push($popularityarray,  $posted["results"][$i]["popularity"]); 
        }
    }
}
for ($k=1; $k < $resultslength; $k++) { //çekilen bütün dataya indise göre ulaşmayı sağlıyor. ilk indis boş. 
    $filmmonth = date("m",strtotime($release_datearray[$k])); //film tarihinin gününü alıyor
    $filmday = date("d",strtotime($release_datearray[$k])); //film tarihinin ayını alıyor
    $filmyear = date("Y",strtotime($release_datearray[$k])); //film tarihinin yılını alıyor
    
    if ($thismonth==$filmmonth && $thisyear==$filmyear) //girilen tarihle filmin tarihinnin ay ve yılı eşit mi?
    {
        if($thisday==$filmday)//günleri eşitse yeni array oluşuyor
        {
            array_push($filmsbyday,array($release_datearray[$k], $titlearray[$k], $popularityarray[$k])); //do while dene
            //filmsbyday'de her indise aynı gün çıkan film'in datalarını ekliyor
        }
        elseif($thisday!=$filmday && $thismonth==$filmmonth) //günler farklıysa yeni array oluşturuyor.
        {
            array_push($filmsbymonth,array($release_datearray[$k], $titlearray[$k], $popularityarray[$k])); 
            //filmsbyday'de her indise aynı ay çıkan film'in datalarını ekliyor
               
        }
    }
} 

//echo "the film when you were born: ".$filmsbyday[1][0]."_".$filmsbyday[1][1]."_".$filmsbyday[1][2]."</br> Girilen ayda çıkan filmler array: "; //[1][2]; ekrana 1. indisteki film datalarını yazdırır, 0. indis boş. 
echo '<pre>'; print_r($filmsbymonth); echo  '</pre>'; //aynı ay olanların array çıktısı 
    
   



?>