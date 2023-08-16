<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Goutte\Client;
use Illuminate\Http\Request;

class ScrapperController extends Controller
{
    function QuestionScrapper(){
        $client = new Client();
        $url= "https://www.femmeactuelle.fr/amour/couple/briser-la-routine-mieux-se-connaitre-50-questions-a-se-poser-pour-jouer-en-couple-2108386";
        $page = $client->request("GET", $url);
        $datas = [];

        $page->filter("div > ul > li > em")->each( function ($data) use (&$datas){
            if(substr(trim($data->text()), -1) === '?' AND str_word_count($data->text()) >= 4){
                $str = str_replace(array('"', '\\'),"",$data->text());
                Question::create([
                    "question"=>$str,
                    "categorie"=>"generale"

                ]);
            }

            array_push($datas,$data->text());
        });

        return $datas;
    }

    function  QuestionScrapper2(){
        $client = new Client();
        $url= "https://liiqa.com/questions-a-se-poser-pour-jouer-en-couple/";
        $page = $client->request("GET", $url);
        $datas = [];

        $page->filter(" ol > li")->each(function ($data) use (&$datas){

            if(substr(trim($data->text()), -1) === '?' AND str_word_count($data->text()) >= 4){
                $str = str_replace(array('"', '\\'),"",$data->text());
                Question::create([
                    "question"=>$str,
                    "categorie"=>"generale"
                ]);
            }

            array_push($datas,$data->text());

        });
        return $datas;
    }

    function hotscrapper(){
        $client = new Client();
        $url= "https://technologie.toutcomment.com/article/250-questions-erotiques-et-hot-14432.html";
        $page = $client->request("GET", $url);
        $datas = [];

        $page->filter(" ol > li")->each(function ($data) use (&$datas){

            if(substr(trim($data->text()), -1) === '?'){
                $str = str_replace(array('"', '\\'),"",$data->text());
                Question::create([
                    "question"=>$str,
                    "categorie"=>"hot"
                ]);
            }

            array_push($datas,$data->text());

        });
        return $datas;
    }

    function hotscrapper2(){
        $client = new Client();
        $url= "https://www.onlineseduction.fr/questions-coquines/";
        $page = $client->request("GET", $url);
        $datas = [];

        $page->filter(" p > strong ")->each(function ($data) use (&$datas){

            if(substr(trim($data->text()), -1) === '?'){
                $str = str_replace(array('"', '\\',"."),"",$data->text());

                $question=preg_replace('/[0-9]+/', '',$str);

                if(substr_count($question,"?")>1){
                    $qs = explode('?',$question);

                    for($i=0;$i<sizeof($qs);$i++){
                        if($i<sizeof($qs)-1){
                            Question::create([
                                "question"=>$qs[$i].'?',
                                "categorie"=>"hot"
                            ]);
                        }else{
                            break;
                        }

                    }

                }else{
                    Question::create([
                        "question"=>$question,
                        "categorie"=>"hot"
                    ]);
                }

            }
            array_push($datas,$data->text());

        });
        return $datas;
    }
    function qui_de_nous(){
        $client = new Client();
        $url= "https://www.parlerdamour.fr/qui-de-nous-deux-pour-couple-100-questions/";
        $page = $client->request("GET", $url);
        $datas = [];

        $page->filter(" ol > li")->each(function ($data) use (&$datas){

            if(substr(trim($data->text()), -1) === '?'){
                $str = str_replace(array('"', '\\'),"",$data->text());
                Question::create([
                    "question"=>"Qui de nous ".strtolower($str),
                    "categorie"=>"qui_de_nous"
                ]);
            }

            array_push($datas,$data->text());

        });
        return $datas;
    }
    function je_nai_jamaisscrapper(){
        $client = new Client();
        $url= "https://loisirs.toutcomment.com/article/je-n-ai-jamais-les-meilleures-questions-soft-et-hot-13767.html";
        $page = $client->request("GET", $url);
        $datas = [];

        $page->filter(" ol > li")->each(function ($data,$i=0) use (&$datas){

             $str = str_replace(array('"', '\\'),"",$data->text());

             //ceci est un code de flemme il ya une facon plus pro de le faire mais la j'ai la flemme
             if($i>8){
                 Question::create([
                     "question"=>$str,
                     "categorie"=>"je_nai_jamais"
                 ]);
             }



            array_push($datas,$data->text());

        });
        return $datas;
    }

    function dis_moiscrapper(){
        $client = new Client();
        $url= "https://laviedesreines.com/questions/100-sujets-de-conversation/";
        $page = $client->request("GET", $url);
        $datas = [];

        $page->filter(" div > p")->each(function ($data,$i=0) use (&$datas){
            if(substr(trim($data->text()), -1) === '?' AND preg_match('/[0-9]+/',$data->text())){
                $str = str_replace(array('"', '\\','.'), "", $data->text());
                $question = preg_replace('/[0-9]+/',"",$str);
                Question::create([
                    "question" => $question,
                    "categorie" => "dis_moi"
                ]);

            }
            array_push($datas,$data->text());

        });
        return $datas;
    }
}
