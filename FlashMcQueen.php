<?php

class FlashMcQueen
{

    private $msgs;

    private $wrapper_class = 'flashmcqueen__wrapper';
    private $wrappermsg_class = 'flashmcqueen__wrapper_msg';
    private $wrapper = '<div class="%1%">%2%</div>';


    const DEFAULT_TYPES = [
        'ERROR' => [
            'type' => 'error',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>',
            'color' => '#F44336',
        ],
        'WARNING' => [
            'type' => 'error',
            'icon' => '<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12 0l-2.138 2.63-3.068-1.441-.787 3.297-3.389.032.722 3.312-3.039 1.5 2.088 2.671-2.088 2.67 3.039 1.499-.722 3.312 3.389.033.787 3.296 3.068-1.441 2.138 2.63 2.139-2.63 3.068 1.441.786-3.296 3.39-.033-.722-3.312 3.038-1.499-2.087-2.67 2.087-2.671-3.038-1.5.722-3.312-3.39-.032-.786-3.297-3.068 1.441-2.139-2.63zm0 15.5c.69 0 1.25.56 1.25 1.25s-.56 1.25-1.25 1.25-1.25-.56-1.25-1.25.56-1.25 1.25-1.25zm1-1.038v-7.462h-2v7.462h2z"/></svg>',
            'color' => '#FF9800',
        ],
        'SUCCESS' => [
            'type' => 'error',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z"/></svg>',
            'color' => '#4CAF50',
        ],
        'INFO' => [
            'type' => 'error',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z"/></svg>',
            'color' => '#009688',
        ],
    ];


    /**
     * Default Type for messages
     */
    const DEFAULT_TYPE = 'INFO';


    /**
     * FlashMcQueen constructor.
     */
    public function __construct(){

        if(!array_key_exists('flashmcqueen', $_SESSION)){
            $_SESSION['flashmcqueen'] = [];
        }

    }


    public function success($msg, $persistent = false){
        $this->add($msg, 'SUCCESS', $persistent);
    }
    public function error($msg, $persistent = false){
        $this->add($msg, 'ERROR', $persistent);
    }
    public function warning($msg, $persistent = false){
        $this->add($msg, 'WARNING', $persistent);
    }
    public function info($msg, $persistent = false){
        $this->add($msg, 'INFO', $persistent);
    }


    public function display(string $types = []){

        if($types === [])
            $types = self::DEFAULT_TYPES;


        echo '<div class="flashmcqueen__wrapper">';

        foreach($types as $type => $typeData){

            foreach($_SESSION['flashmcqueen'][$type] as $msg){

                $class = ($msg['persistent']) ? echo 'd' : echo '';

                echo '<div class="flashmcqueen__wrapper_msg ' .  . '" style="border-color: '.$msg['color'].';background: '.$msg['color'].'">
                        <p>'.$msg['msg'].'</p>
                        <span class="'. $typeData['type'] .'" style="background: #fff;fill: '.$msg['color'].'">'.$msg['icon'].'</span>
                    </div>';

            }

        }

        echo '</div>';




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


    }



    /*==============================================

        Utilities functions

==============================================*/
    /**
     * @param array $type
     * @return bool
     */
    protected function hasMessages($type = []): bool
    {
        if($type === [])
            return ($_SESSION['flashmcqueen'] !== null && !empty($_SESSION['flashmcqueen']));
        else
            return ($_SESSION['flashmcqueen'][$type] !== null && !empty($_SESSION['flashmcqueen'][$type]));
    }


    protected function add($msg, string $type = self::DEFAULT_TYPE, bool $persistent = false, string $icon = NULL, string $color = NULL){

        /*Secure $msg*/
        $msg = htmlentities($msg);

        /*If specified type does not exist, replace it by the default value*/
        if(!array_key_exists($type, self::DEFAULT_TYPES))
            $type = self::DEFAULT_TYPE;


        if($icon === null)
            $icon = self::DEFAULT_TYPES[$type]['icon'];

        if($color === null)
            $color = self::DEFAULT_TYPES[$type]['color'];


        /*If table does not exist, create an empty table*/
        if(!$this->hasMessages($type))
            $_SESSION['flashmcqueen'][$type] = [];

        /*Then add the message*/
        $_SESSION['flashmcqueen'][$type][] = ['msg' => $msg, 'persistent' => $persistent, 'icon' => $icon, 'color' => $color];

    }


    protected function clear($types = []){
        if($types === [])
            $types = array_keys(self::DEFAULT_TYPES);

        foreach($types as $type => $val){
            unset($_SESSION['flashmcqueen'][$type]);
        }
    }


}