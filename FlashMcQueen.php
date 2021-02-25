<?php

class FlashMcQueen
{

    private $msgs;

    private $wrapper_class = 'flashmcqueen__wrapper';
    private $wrappermsg_class = 'flashmcqueen__wrapper_msg';
    private $wrapper = '<div class="%1%">%2%</div>';

    private $success_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>';
    private $error_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';
    private $info_icon = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z"/></svg>';

    private $success_color = '#4CAF50';
    private $error_color = '#F44336';
    private $info_color = '#009688';

    /**
     * FlashMcQueen constructor.
     */
    public function __construct(){
        if(!array_key_exists('flashmcqueen', $_SESSION)){
            $_SESSION['flashmcqueen'] = [];
        }
    }


    public function success($msg){
        $arr = [
            "type" => "success",
            "msg" => $msg
        ];
        array_push($_SESSION['flashmcqueen'], $arr);
    }
    public function error($msg){
        $arr = [
            "type" => "error",
            "msg" => $msg
        ];
        array_push($_SESSION['flashmcqueen'], $arr);
    }
    public function info($msg){
        $arr = [
            "type" => "info",
            "msg" => $msg
        ];
        array_push($_SESSION['flashmcqueen'], $arr);
    }


    public function display(bool $withLose = true){

        echo '<div class="flashmcqueen__wrapper">';

        foreach($_SESSION['flashmcqueen'] as $msg){

            switch($msg['type']){
                case 'success':
                    echo '<div class="flashmcqueen__wrapper_msg" style="border-color: '.$this->success_color.';background: '.$this->success_color.'">
                        <p>'.$msg['msg'].'</p>
                        <span class="'. $msg['type'] .'" style="background: #fff;fill: '.$this->success_color.'">'.$this->success_icon.'</span>
                    </div>';
                    break;
                case 'error':
                    echo '<div class="flashmcqueen__wrapper_msg" style="border-color: '.$this->error_color.';background: '.$this->error_color.'">
                        <p>'.$msg['msg'].'</p>
                        <span class="'. $msg['type'] .'" style="background: #fff;fill: '.$this->error_color.'">'.$this->error_icon.'</span>
                    </div>';
                    break;
                case 'info':
                    echo '<div class="flashmcqueen__wrapper_msg" style="border-color: '.$this->info_color.';background: '.$this->info_color.'">
                        <p>'.$msg['msg'].'</p>
                        <span class="'. $msg['type'] .'" style="background: #fff;fill: '.$this->info_color.'">'.$this->info_icon.'</span>
                    </div>';
                    break;
            }


        }

        echo '</div>';



        if($withLose){
            $_SESSION['flashmcqueen'] = [];
        }
    }


}