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


    public function success($msg, $fadeOut = true){
        $arr = [
            "type" => "success",
            "msg" => $msg,
            "icon" => $this->success_icon,
            "color" => $this->success_color,
            "fadeout" => $fadeOut,
        ];
        array_push($_SESSION['flashmcqueen'], $arr);
    }
    public function error($msg, $fadeOut = true){
        $arr = [
            "type" => "error",
            "msg" => $msg,
            "icon" => $this->error_icon,
            "color" => $this->error_color,
            "fadeout" => $fadeOut,
        ];
        array_push($_SESSION['flashmcqueen'], $arr);
    }
    public function info($msg, $fadeOut = true){
        $arr = [
            "type" => "info",
            "msg" => $msg,
            "icon" => $this->info_icon,
            "color" => $this->info_color,
            "fadeout" => $fadeOut,
        ];
        array_push($_SESSION['flashmcqueen'], $arr);
    }
    public function custom($msg, $icon, $color, $fadeOut = true){
        $arr = [
            "type" => "custom",
            "msg" => $msg,
            "icon" => $icon,
            "color" => $color,
            "fadeout" => $fadeOut,
        ];
        array_push($_SESSION['flashmcqueen'], $arr);
    }


    public function display(bool $destroyAfter = true){

        echo '<div class="flashmcqueen__wrapper">';

        foreach($_SESSION['flashmcqueen'] as $msg){

            echo '
            <div class="flashmcqueen__wrapper_msg ' . (($msg['fadeout']) ? 'flashmc_fadeout' : '') . '" style="border-color: '.$msg['color'].';background: '.$msg['color'].'">
                <p>'.$msg['msg'].'</p>
                <span class="'. $msg['type'] .'" style="background: '.$this->adjustBrightness($msg['color'], -40).'">'.$msg['icon'].'</span>
            </div>';

        }

        echo '</div>';



        if($destroyAfter){
            $_SESSION['flashmcqueen'] = [];
        }
    }


    /**
     * Adjust colors
     *
     * @param $hex
     * @param $steps
     * @return string
     */
    private function adjustBrightness($hex, $steps) {
        $steps = max(-255, min(255, $steps));

        $hex = str_replace('#', '', $hex);
        if (strlen($hex) == 3) {
            $hex = str_repeat(substr($hex,0,1), 2).str_repeat(substr($hex,1,1), 2).str_repeat(substr($hex,2,1), 2);
        }

        // Split into three parts: R, G and B
        $color_parts = str_split($hex, 2);
        $return = '#';

        foreach ($color_parts as $color) {
            $color   = hexdec($color);
            $color   = max(0,min(255,$color + $steps));
            $return .= str_pad(dechex($color), 2, '0', STR_PAD_LEFT);
        }

        return $return;
    }


}